@extends('layout.template')
@section('title', 'All dive sites')

@section('content')
<div class="row">
    <div class="col-md-12 text-left">
        @foreach ($locations as $location)
        <div class="col-md-3">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    {{$location->country}} - {{$location->location}}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php $sites = $location->mapLocationSite;?>
                    @foreach ($sites as $site)
                        <li><a href="/map/site/{{$site->id}}">{{$site->name}}</a></li>
                    @endforeach
                </ul>
        @endforeach
    </div>
</div>
@endsection