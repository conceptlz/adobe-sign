<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SettingsInfo
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
     * @var BooleanSettingInfo|null
     */
    protected $sendRestrictedToWorkflowsFromMatchText;
    /**
     * @var BooleanSettingInfo|null
     */
    protected $canUseMulticastWorkflows;
    /**
     * @var BooleanSettingInfo|null
     */
    protected $sendRestrictedToWorkflows;
    /**
     * @var BooleanSettingInfo|null
     */
    protected $libaryDocumentCreationVisible;
    /**
     * @var BooleanSettingInfo|null
     */
    protected $canUseSelfSigningWorkflows;
    /**
     * @var BooleanSettingInfo|null
     */
    protected $userCanSend;
    /**
     * @var BooleanSettingInfo|null
     */
    protected $widgetCreationVisible;
    /**
     * @return BooleanSettingInfo|null
     */
    public function getSendRestrictedToWorkflowsFromMatchText(): ?BooleanSettingInfo
    {
        return $this->sendRestrictedToWorkflowsFromMatchText;
    }
    /**
     * @param BooleanSettingInfo|null $sendRestrictedToWorkflowsFromMatchText
     *
     * @return self
     */
    public function setSendRestrictedToWorkflowsFromMatchText(?BooleanSettingInfo $sendRestrictedToWorkflowsFromMatchText): self
    {
        $this->initialized['sendRestrictedToWorkflowsFromMatchText'] = true;
        $this->sendRestrictedToWorkflowsFromMatchText = $sendRestrictedToWorkflowsFromMatchText;
        return $this;
    }
    /**
     * @return BooleanSettingInfo|null
     */
    public function getCanUseMulticastWorkflows(): ?BooleanSettingInfo
    {
        return $this->canUseMulticastWorkflows;
    }
    /**
     * @param BooleanSettingInfo|null $canUseMulticastWorkflows
     *
     * @return self
     */
    public function setCanUseMulticastWorkflows(?BooleanSettingInfo $canUseMulticastWorkflows): self
    {
        $this->initialized['canUseMulticastWorkflows'] = true;
        $this->canUseMulticastWorkflows = $canUseMulticastWorkflows;
        return $this;
    }
    /**
     * @return BooleanSettingInfo|null
     */
    public function getSendRestrictedToWorkflows(): ?BooleanSettingInfo
    {
        return $this->sendRestrictedToWorkflows;
    }
    /**
     * @param BooleanSettingInfo|null $sendRestrictedToWorkflows
     *
     * @return self
     */
    public function setSendRestrictedToWorkflows(?BooleanSettingInfo $sendRestrictedToWorkflows): self
    {
        $this->initialized['sendRestrictedToWorkflows'] = true;
        $this->sendRestrictedToWorkflows = $sendRestrictedToWorkflows;
        return $this;
    }
    /**
     * @return BooleanSettingInfo|null
     */
    public function getLibaryDocumentCreationVisible(): ?BooleanSettingInfo
    {
        return $this->libaryDocumentCreationVisible;
    }
    /**
     * @param BooleanSettingInfo|null $libaryDocumentCreationVisible
     *
     * @return self
     */
    public function setLibaryDocumentCreationVisible(?BooleanSettingInfo $libaryDocumentCreationVisible): self
    {
        $this->initialized['libaryDocumentCreationVisible'] = true;
        $this->libaryDocumentCreationVisible = $libaryDocumentCreationVisible;
        return $this;
    }
    /**
     * @return BooleanSettingInfo|null
     */
    public function getCanUseSelfSigningWorkflows(): ?BooleanSettingInfo
    {
        return $this->canUseSelfSigningWorkflows;
    }
    /**
     * @param BooleanSettingInfo|null $canUseSelfSigningWorkflows
     *
     * @return self
     */
    public function setCanUseSelfSigningWorkflows(?BooleanSettingInfo $canUseSelfSigningWorkflows): self
    {
        $this->initialized['canUseSelfSigningWorkflows'] = true;
        $this->canUseSelfSigningWorkflows = $canUseSelfSigningWorkflows;
        return $this;
    }
    /**
     * @return BooleanSettingInfo|null
     */
    public function getUserCanSend(): ?BooleanSettingInfo
    {
        return $this->userCanSend;
    }
    /**
     * @param BooleanSettingInfo|null $userCanSend
     *
     * @return self
     */
    public function setUserCanSend(?BooleanSettingInfo $userCanSend): self
    {
        $this->initialized['userCanSend'] = true;
        $this->userCanSend = $userCanSend;
        return $this;
    }
    /**
     * @return BooleanSettingInfo|null
     */
    public function getWidgetCreationVisible(): ?BooleanSettingInfo
    {
        return $this->widgetCreationVisible;
    }
    /**
     * @param BooleanSettingInfo|null $widgetCreationVisible
     *
     * @return self
     */
    public function setWidgetCreationVisible(?BooleanSettingInfo $widgetCreationVisible): self
    {
        $this->initialized['widgetCreationVisible'] = true;
        $this->widgetCreationVisible = $widgetCreationVisible;
        return $this;
    }
}