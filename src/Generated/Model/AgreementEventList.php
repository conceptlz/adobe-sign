<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementEventList
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * An array of event objects.
     *
     * @var list<AgreementEvent>|null
     */
    protected $events;
    /**
     * An array of event objects.
     *
     * @return list<AgreementEvent>|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }
    /**
     * An array of event objects.
     *
     * @param list<AgreementEvent>|null $events
     *
     * @return self
     */
    public function setEvents(?array $events): self
    {
        $this->initialized['events'] = true;
        $this->events = $events;
        return $this;
    }
}