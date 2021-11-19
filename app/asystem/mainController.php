<?php

class mainController
{
    public static function callView($module, $method, $params = [])
    {
        return view::frontView($module, $method, $params);
    }

    public static function callLayout($area, $layout, $module, $method, $params = [])
    {
        return view::frontLayout($area, $layout, $module, $method, $params);
    }
}