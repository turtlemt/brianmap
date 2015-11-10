<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Menu;

use App\Http\Models\MapLocationSite;
use App\Http\Models\MapLocation;

class MapController extends Controller
{
    protected $navMenu = '';
    
    public function __construct()
    {
        $this->navMenu = Menu::getMenu();
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        echo 'this is map index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createSite()
    {
        $mapLocationSite = new MapLocationSite();
        $mapLocation = new MapLocation();
        $locations = $mapLocation::all();
        return view('map.siteedit', ['site' => $mapLocationSite, 'locations' => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        echo 'store';
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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
