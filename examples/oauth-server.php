<?php

/**
 * OAuth authorization-code flow with PHP's built-in server: no framework.
 *
 *   ADOBE_SIGN_CLIENT_ID=... ADOBE_SIGN_CLIENT_SECRET=... \
 *     php -S localhost:8080 examples/oauth-server.php
 *
 * Register http://localhost:8080/callback as a redirect URI on your app's
 * "Configure OAuth" page (enable agreement_read), then open http://localhost:8080/.
 *
 * Tokens go to a JSON file so a restart shows refresh-on-expiry working. Use your database
 * (encrypted) in a real app; refresh tokens are long-lived credentials.
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Auth\AccessToken;
use Conceptlz\AdobeSign\Auth\OAuthClient;
use Conceptlz\AdobeSign\Auth\OAuthConfig;
use Conceptlz\AdobeSign\Auth\TokenStore;
use Conceptlz\AdobeSign\Exception\AdobeSignException;

$clientId = getenv('ADOBE_SIGN_CLIENT_ID') ?: '';
$clientSecret = getenv('ADOBE_SIGN_CLIENT_SECRET') ?: '';
if ($clientId === '' || $clientSecret === '') {
    http_response_code(500);
    exit("Set ADOBE_SIGN_CLIENT_ID and ADOBE_SIGN_CLIENT_SECRET.\n");
}

$oauth = new OAuthClient(new OAuthConfig($clientId, $clientSecret, 'http://localhost:8080/callback'));

$store = new class (sys_get_temp_dir() . '/adobe-sign-example-tokens.json') implements TokenStore {
    public function __construct(private string $file)
    {
    }

    public function get(string $key): ?AccessToken
    {
        $all = is_file($this->file) ? json_decode((string) file_get_contents($this->file), true) : [];

        return isset($all[$key]) ? AccessToken::fromArray($all[$key]) : null;
    }

    public function put(string $key, AccessToken $token): void
    {
        $all = is_file($this->file) ? json_decode((string) file_get_contents($this->file), true) : [];
        $all[$key] = $token->toArray();
        file_put_contents($this->file, json_encode($all), LOCK_EX);
        chmod($this->file, 0600);
    }
};

session_start();
$userKey = 'example-user'; // your app's user id
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

try {
    if ($path === '/login') {
        $_SESSION['oauth_state'] = OAuthClient::generateState();
        header('Location: ' . $oauth->authorizationUrl(['user_login:self', 'agreement_read:self'], $_SESSION['oauth_state']));
        exit;
    }

    if ($path === '/callback') {
        $token = $oauth->handleCallback($_GET, $_SESSION['oauth_state'] ?? '');
        unset($_SESSION['oauth_state']);
        $store->put($userKey, $token);
        header('Location: /');
        exit;
    }

    if ($path === '/logout') {
        if ($token = $store->get($userKey)) {
            $oauth->revoke($token);
        }
        @unlink(sys_get_temp_dir() . '/adobe-sign-example-tokens.json');
        header('Location: /');
        exit;
    }

    header('Content-Type: text/plain; charset=utf-8');

    if ($store->get($userKey) === null) {
        echo "Not connected. Open /login\n";
        exit;
    }

    // Refreshes transparently when the access token is (nearly) expired.
    $sign = AdobeSign::withOAuth($oauth, $store, $userKey);
    $token = $store->get($userKey);
    echo "Connected to {$token->apiAccessPoint} (token expires {$token->expiresAt?->format(DATE_ATOM)})\n\n";

    $n = 0;
    foreach ($sign->agreements()->all(pageSize: 20) as $agreement) {
        printf("%-12s %-24s %s\n", $agreement->status, substr($agreement->id, 0, 24), $agreement->name);
        if (++$n === 10) {
            break;
        }
    }
    echo $n === 0 ? "No agreements yet.\n" : "\n/logout revokes the token.\n";
} catch (AdobeSignException $e) {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo get_class($e) . ': ' . $e->getMessage() . "\n";
}
