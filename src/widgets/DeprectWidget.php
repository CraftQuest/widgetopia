<?php

namespace craftquest\widgets;
use craft\base\Widget;
use craft\helpers\UrlHelper;
use Craft;

class DeprecWidget extends Widget
{

    public static function displayName(): string
    {
       return "Deprecation Warnings";
    }

    public function getTitle(): string
    {
        return '';
    }

    public static function maxColspan(): int
    {
        return 2;
    }

    public static function icon()
    {
        return Craft::getAlias('@appicons/bug.svg');
    }

    protected static function allowMultipleInstances(): bool
    {
        return false;
    }

    public function getBodyHtml(): string
    {
        $count = Craft::$app->getDeprecator()->getTotalLogs();
        $deprecUrl = UrlHelper::url('utilities/deprecation-errors');

        return "<div class='centeralign'><h2 style='font-size:3rem;'>{$count}</h2><p class='centeralign'>deprecation warnings to address.</p><p><a class='btn small' href='{$deprecUrl}'>Review and Fix</a></p></div>";
    }
}
