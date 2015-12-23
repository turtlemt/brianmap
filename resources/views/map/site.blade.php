@extends('layout.template')
@section('title')
{{$site->name}}
@stop

@section('content')
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key={{$googleapikey}}&sensor==false">
</script>

<div class="alert alert-<?php echo $error['type'];?>" role="alert"><?php echo $error['message'];?></div>
<div class="row">
    <div class="col-md-12 well grid-buffer">
        <div class="row">
            <div class="col-md-12 grid-row-buffer">
                <div id="map_canvas" style="height:500px"></div>
                <script type="text/javascript">
                    function initialize()
                    {
                        var mapOptions = {
                            center: new google.maps.LatLng(<?php echo $site->lat;?>, <?php echo $site->lng;?>),
                            zoom: 11,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                        var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(<?php echo $site->lat;?>, <?php echo $site->lng;?>), map: map, title: '<?php echo $site->name;?>' });
                    }
                    initialize();
                </script>
            </div>
            <div class="col-md-12 grid-row-buffer margin-top-30">
                <label for="name">{{$site->name}} ({{$location->location}} {{$location->country}})</label>
                @if (Auth::check())
                    <a href="/map/editsite/{{$site->id}}" target="_self"><button type="button" class="btn btn-primary">Edit</button></a>
                @endif
            </div>
            <div class="col-md-5 grid-row-buffer margin-top-30">
                <label for="price">Description: </label>
                <p>{{$site->description}}</p>
            </div>
            <div class="col-md-7 grid-row-buffer margin-top-30">
                <iframe width="560" height="315" src="{{$site->video}}" frameborder="0" allowfullscreen></iframe>
            </div>
            
            <div class="col-md-12 grid-row-buffer margin-top-15">
                <label for="flick_link"><a target="_blank" href="{{$site->photo_set}}">All Photos</a></label>
            </div>
            
            @foreach ($imageList as $image)
            <div class="col-md-6 grid-row-buffer margin-top-30 text-left">
                <img src="{{$image}}" style="height: 375px;"/>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection