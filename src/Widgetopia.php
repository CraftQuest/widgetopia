<?php

/**
 * Widgetopia module for Craft CMS 3.x
 *
 * A module that makes multiple useful Craft CP dashboard widgets available.
 *
 * @link      https://craftquest.io
 * @copyright Copyright (c) 2021 CraftQuest
 */

namespace craftquest;

use craft\events\RegisterComponentTypesEvent;
use Yii\base\Module;
use Yii\base\Event;
use craft\services\Dashboard;
use craftquest\widgets\DeprecWidget;
use Craft;

class Widgetopia extends Module
{

    /**
     * Initialize module components, etc.
     */
    public function init()
    {
        parent::init();
        Craft::setAlias('@widgetopia', __DIR__);
        $this->_registerWidgets();

    }


    private function _registerWidgets()
    {
        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function(RegisterComponentTypesEvent $event)
            {
                $event->types[] = DeprecWidget::class;
            }
        );
    }


}

