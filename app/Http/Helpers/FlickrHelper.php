<?php

namespace App\Http\Helpers;

use Route;

class FlickrHelper
{
    /**
     * Get Flickr image path by photo set id.
     *
     * @return string
     */
    public static function getFlickPhotosByPhotoset($photoset, $size, $count)
    {
        $photosetId = explode('/', $photoset);
        $photosetId = $photosetId[count($photosetId) - 1];
        
        $imageList = '';
        $flickPhotoset = self::getPhotosetPhotos($photosetId);
        for ($i = 0; $i < $count; $i++) {
            $images = self::getPhotosSizes($flickPhotoset['photoset']['photo'][$i]['id']);
            foreach ($images['sizes']['size'] as $image) {
                if($image['label'] == $size)
                $imageList .= ',' . $image['source'];
            }
        }
        return substr($imageList, 1);
    }
    
    /**
     * Get Flickr data of photo set.
     *
     * @var array
     */
    protected static function getPhotosetPhotos($photosetId)
    {
        $params = array(
            'method'	=> 'flickr.photosets.getPhotos',
            'photoset_id'	=> $photosetId,
        );
        return self::get($params);
    }
    
    /**
     * Get Flickr data of photo set.
     *
     * @var array
     */
    protected static function getPhotosSizes($photoId)
    {
        $params = array(
            'method'	=> 'flickr.photos.getSizes',
            'photo_id'	=> $photoId,
        );
        return self::get($params);
    }
    
    /**
     * Get Flickr data of photo set.
     *
     * @var array
     */
    protected static function get($params)
    {
        $flickrKey = config('siteconfig.flickrKey');
        $params['api_key'] = $flickrKey;
        $params['format'] = 'php_serial';
        
        $encoded_params = array();
        foreach ($params as $k => $v){
            $encoded_params[] = urlencode($k).'='.urlencode($v);
        }
        $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        $rsp = file_get_contents($url);
        $rsp_obj = unserialize($rsp);
        return $rsp_obj;
    }
}
