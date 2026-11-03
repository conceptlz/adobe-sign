<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Generated\Model\DetailedUserInfo;
use Conceptlz\AdobeSign\Generated\Model\UserEvent;
use Conceptlz\AdobeSign\Generated\Model\UserGroupsInfo;
use Conceptlz\AdobeSign\Generated\Model\UserInfo;
use Conceptlz\AdobeSign\Generated\Model\UserStatusUpdateResponse;
use Conceptlz\AdobeSign\Hydration\ModelMapper;

/**
 * Users in the account. Most calls need an account-admin token (user_read / user_write :account).
 *
 * Every method that calls the API throws ApiException (or a subclass) on an error response and
 * TransportException on a network failure; see AbstractResource.
 */
final class Users extends AbstractResource
{
    /**
     * GET /users
     *
     * @return \Generator<int, UserInfo>
     */
    public function all(int $pageSize = 100, ?bool $accountAdminFilter = null): \Generator
    {
        return $this->paginate('users', ['pageSize' => $pageSize, 'accountAdminFilter' => $accountAdminFilter], 'userInfoList', UserInfo::class);
    }

    /**
     * GET /users/{userId}. "me" is the user the token belongs to.
     */
    public function get(string $userId): DetailedUserInfo
    {
        return $this->fetch(DetailedUserInfo::class, self::path('users', $userId));
    }

    /**
     * GET /users/me: the user the token belongs to.
     */
    public function me(): DetailedUserInfo
    {
        return $this->get('me');
    }

    /**
     * POST /users
     *
     * The spec reuses DetailedUserInfo (whose "required" list includes server-set fields like id);
     * in practice email is what's needed. Pass a raw array to send only what you mean to.
     *
     * @param DetailedUserInfo|array<string, mixed> $user
     * @return string the new user id
     */
    public function create(DetailedUserInfo|array $user): string
    {
        return $this->createResource('users', $user);
    }

    /**
     * PUT /users/{userId}
     *
     * @param DetailedUserInfo|array<string, mixed> $user
     */
    public function update(string $userId, DetailedUserInfo|array $user): void
    {
        $this->put(self::path('users', $userId), $user);
    }

    /**
     * GET /users/{userId}/groups
     */
    public function groups(string $userId): UserGroupsInfo
    {
        return $this->fetch(UserGroupsInfo::class, self::path('users', $userId) . '/groups');
    }

    /**
     * PUT /users/{userId}/state
     *
     * @param string $state ACTIVE | INACTIVE
     * @param string|null $comment why the user is being activated or deactivated
     */
    public function updateState(string $userId, string $state, ?string $comment = null): UserStatusUpdateResponse
    {
        $body = ['state' => $state];
        if ($comment !== null) {
            $body['comment'] = $comment;
        }

        $response = $this->transport->send('PUT', self::path('users', $userId) . '/state', headers: ['Accept' => 'application/json'], body: $body);
        $data = json_decode((string) $response->getBody(), true);

        return ModelMapper::hydrate(UserStatusUpdateResponse::class, is_array($data) ? $data : []);
    }

    /**
     * GET /users/{userId}/events
     *
     * @return \Generator<int, UserEvent>
     */
    public function events(string $userId, int $pageSize = 100): \Generator
    {
        return $this->paginate(self::path('users', $userId) . '/events', ['pageSize' => $pageSize], 'userEvents', UserEvent::class);
    }
}
