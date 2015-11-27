<?php

namespace App\Http\Helpers;

use Route;

class Menu
{
    protected static $menu = array(array('controller' => 'MapController', 
                                         'action' => 'findall', 
                                         'title' => 'Map', 
                                         'link' => '/map/findall', 
                                         'subtitle' => array(array('title' => 'All Sites', 'link' =>'/map/findall'),
                                                             array('title' => 'Create Site', 'link' =>'/map/createsite'),
                                                             array('title' => 'Edit Site', 'link' =>'/map/editsite'),
                                                            ), 
                                         'focus' => false),
                                   array('controller' => 'SiteController', 
                                         'action' => 'index', 
                                         'title' => 'Country', 
                                         'link' => '/site/index', 
                                         'focus' => false),
                                   );
    /**
     * Get controller and action
     *
     * @var array
     */
    protected static function processAction()
    {
        $segment = substr(Route::currentRouteAction(), strpos(Route::currentRouteAction(), 'App\Http\Controllers\\') + 21);
        $segment = explode('@', $segment);
        
        return $segment;
    }
    
    /**
     * Get menu with focus status
     *
     * @var array
     */
    public static function getMenu()
    {
        $segment = self::processAction();
        foreach (self::$menu as $key => $element) {
            if ($element['controller'] == $segment[0] && $element['action'] == $segment[1]) {
                self::$menu[$key]['focus'] = true;
            }
        }
        return self::$menu;
    }
}
