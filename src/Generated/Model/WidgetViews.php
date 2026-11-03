<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetViews
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
     * List of web form views
     *
     * @var list<WidgetView>|null
     */
    protected $widgetViewList;
    /**
     * List of web form views
     *
     * @return list<WidgetView>|null
     */
    public function getWidgetViewList(): ?array
    {
        return $this->widgetViewList;
    }
    /**
     * List of web form views
     *
     * @param list<WidgetView>|null $widgetViewList
     *
     * @return self
     */
    public function setWidgetViewList(?array $widgetViewList): self
    {
        $this->initialized['widgetViewList'] = true;
        $this->widgetViewList = $widgetViewList;
        return $this;
    }
}