<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserWorkflows
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
     * An array of workflows
     *
     * @var list<UserWorkflow>|null
     */
    protected $userWorkflowList;
    /**
     * An array of workflows
     *
     * @return list<UserWorkflow>|null
     */
    public function getUserWorkflowList(): ?array
    {
        return $this->userWorkflowList;
    }
    /**
     * An array of workflows
     *
     * @param list<UserWorkflow>|null $userWorkflowList
     *
     * @return self
     */
    public function setUserWorkflowList(?array $userWorkflowList): self
    {
        $this->initialized['userWorkflowList'] = true;
        $this->userWorkflowList = $userWorkflowList;
        return $this;
    }
}