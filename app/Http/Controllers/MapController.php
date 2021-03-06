<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Menu;
use App\Http\Helpers\FlickrHelper;
use Session;

use App\Http\Models\MapLocationSite;
use App\Http\Models\MapLocation;

class MapController extends Controller
{
    protected $navMenu = '';
    protected $title = '';
    
    public function __construct(Request $request)
    {
        $this->navMenu = Menu::getMenu();
        $this->title = Menu::getTitle();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function findall()
    {
        $mapLocationSite = new MapLocationSite();
        $mapLocation = new MapLocation();
        /*$allSites = $mapLocationSite::all();
        foreach ($allSites as $site) {
            $site->mapLocation;
        }*/
        
        $locations = $mapLocation::all();
        /*foreach ($locations as $location) {
            //$location->mapLocationSite;
            $location->mapLocationSite;
        }*/
        //$output = $locations->toJson();
        return view('map.all', ['menu' => $this->navMenu, 'locations' => $locations, 'googleapikey' => config('siteconfig.googleapiKey')]);
    }
    
    /**
     * Show list of 
     *
     * @return Response
     */
    public function country()
    {
        //$mapLocationSite = new MapLocationSite();
        $mapLocation = new MapLocation();
        $locations = $mapLocation::all();
        return view('map.country', ['menu' => $this->navMenu, 'locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return view
     */
    public function createSite(Request $request)
    {
        $mapLocationSite = new MapLocationSite();
        $mapLocation = new MapLocation();
        if ($request->isMethod('post')) {
            $mapLocationSite->location_id = $request->input('locationid');
            $mapLocationSite->name = $request->input('name');
            $mapLocationSite->lat = $request->input('lat');
            $mapLocationSite->lng = $request->input('lng');
            $mapLocationSite->photo_set = $request->input('photo_set');
            $mapLocationSite->video = $request->input('video');
            $mapLocationSite->description = $request->input('description');
            $mapLocationSite->save();
        }
        
        $locations = $mapLocation::all();
        $error = Session::get('error');
        return view('map.siteedit', ['menu' => $this->navMenu, 
                                     'title' => $this->title,
                                     'site' => $mapLocationSite, 
                                     'locations' => $locations,
                                     'error' => $error]);
    }

    /**
     * Show site detail
     *
     * @param  $name (from router)
     * @return view
     */
    public function site($id)
    {
        $mapLocationSite = MapLocationSite::where('id', $id)->first();
        if (count($mapLocationSite) == 0) {
            return redirect('map/findall')->with('error', array('type' => 'danger', 'message' => 'Can\'t found this dive site.'));
        }
        $mapLocation = new MapLocation();
        $location = $mapLocation::where('id', $mapLocationSite->location_id)->first();
        
        
        
        $error = Session::get('error');
        return view('map.site', ['menu' => $this->navMenu, 
                                 'title' => $this->title,
                                 'googleapikey' => config('siteconfig.googleapiKey'),
                                 'site' => $mapLocationSite, 
                                 'location' => $location,
                                 'imageList' => explode(',', $mapLocationSite->image_list), 
                                 'error' => $error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @return view
     */
    public function editSite(Request $request, $id)
    {
        $mapLocationSite = MapLocationSite::where('id', $id)->first();
        if (count($mapLocationSite) == 0) {
            return redirect('map/createsite')->with('error', array('type' => 'danger', 'message' => 'Can\'t found this dive site.'));
        }
        $mapLocation = new MapLocation();
        if ($request->isMethod('post')) {
            if ($mapLocationSite->photo_set != $request->input('photo_set')) {
                $mapLocationSite->photo_set = $request->input('photo_set');
                $mapLocationSite->image_list = FlickrHelper::getFlickPhotosByPhotoset($request->input('photo_set'), 'Medium', 6);
            }
            $mapLocationSite->location_id = $request->input('locationid');
            $mapLocationSite->name = $request->input('name');
            $mapLocationSite->lat = $request->input('lat');
            $mapLocationSite->lng = $request->input('lng');
            $mapLocationSite->video = $request->input('video');
            $mapLocationSite->description = $request->input('description');
            $mapLocationSite->save();
        }
        
        $locations = $mapLocation::all();
        $error = Session::get('error');
        return view('map.siteedit', ['menu' => $this->navMenu, 
                                     'title' => $this->title,
                                     'site' => $mapLocationSite, 
                                     'locations' => $locations,
                                     'error' => $error]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
