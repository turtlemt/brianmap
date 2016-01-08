<?php

namespace App\Http\Helpers;

use Route;
use Auth;
use Request;

class Menu
{
    protected static $menu = array(array('controller' => 'MapController', 
                                         'action' => 'findall', 
                                         'title' => 'Map', 
                                         'link' => '/map/findall', 
                                         'subtitle' => array(array('title' => 'All Sites', 'action' => 'findall', 'link' =>'/map/findall'),
                                                             array('title' => 'Create Site', 'action' => 'createsite', 'link' =>'/map/createsite'),
                                                             array('title' => 'Site', 'action' => 'site', 'link' =>'/map/site'),
                                                            ), 
                                         'focus' => false),
                                   array('controller' => 'MapController', 
                                         'action' => 'index', 
                                         'title' => 'Country', 
                                         'link' => '/map/index', 
                                         'focus' => false),
                                   );
    
    protected static $publicMenu = array(array('controller' => 'MapController', 
                                         'action' => 'findall', 
                                         'title' => 'All Sites', 
                                         'link' => '/map/findall', 
                                         'focus' => false),
                                         array('controller' => 'MapController', 
                                         'action' => 'index', 
                                         'title' => 'Site List', 
                                         'link' => '/map/country', 
                                         'focus' => false),
                                   );
    
    protected static $title = '';
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
        if (Auth::check()) {
            $menu = self::$menu;
        } else {
            $menu = self::$publicMenu;
        }
        $segment = self::processAction();
        $isAllow = false;
        foreach ($menu as $key => $element) {
            if ($element['controller'] == $segment[0] && $element['action'] == $segment[1]) {
                $menu[$key]['focus'] = true;
                $isAllow = true;
                /*if (isset($element['subtitle'])) {
                    foreach ($element['subtitle'] as $subtitle) {
                        if ($subtitle['action'] == strtolower($segment[1])) {
                            $menu[$key]['focus'] = true;
                            self::$title = $subtitle['title'];
                        }
                    }
                } else {
                    $menu[$key]['focus'] = true;
                }*/
            }
        }
        
        if (!$isAllow) {
            redirect()->action('MapController@findall')->with('error', array('type' => 'danger', 'message' => 'Error url.'))->send();
        }
        return $menu;
    }
    
    /**
     * Get menu with focus status
     *
     * @var array
     */
    public static function getTitle()
    {
        return self::$title;
    }
}
