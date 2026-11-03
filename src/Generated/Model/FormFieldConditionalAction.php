<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldConditionalAction
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
     * The predicates to be evaluated in order to determine whether this condition is true
     *
     * @var list<FormFieldConditionPredicate>|null
     */
    protected $predicates;
    /**
     * It indicates if any one of the conditions or all of them have to be true.
     *
     * @var string|null
     */
    protected $anyOrAll;
    /**
     * Action to show/hide the form field is to be taken on the basis of evaluation of conditions.
     *
     * @var string|null
     */
    protected $action;
    /**
     * The predicates to be evaluated in order to determine whether this condition is true
     *
     * @return list<FormFieldConditionPredicate>|null
     */
    public function getPredicates(): ?array
    {
        return $this->predicates;
    }
    /**
     * The predicates to be evaluated in order to determine whether this condition is true
     *
     * @param list<FormFieldConditionPredicate>|null $predicates
     *
     * @return self
     */
    public function setPredicates(?array $predicates): self
    {
        $this->initialized['predicates'] = true;
        $this->predicates = $predicates;
        return $this;
    }
    /**
     * It indicates if any one of the conditions or all of them have to be true.
     *
     * @return string|null
     */
    public function getAnyOrAll(): ?string
    {
        return $this->anyOrAll;
    }
    /**
     * It indicates if any one of the conditions or all of them have to be true.
     *
     * @param string|null $anyOrAll
     *
     * @return self
     */
    public function setAnyOrAll(?string $anyOrAll): self
    {
        $this->initialized['anyOrAll'] = true;
        $this->anyOrAll = $anyOrAll;
        return $this;
    }
    /**
     * Action to show/hide the form field is to be taken on the basis of evaluation of conditions.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * Action to show/hide the form field is to be taken on the basis of evaluation of conditions.
     *
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
}