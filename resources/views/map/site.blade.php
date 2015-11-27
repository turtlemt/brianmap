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
            <div class="col-md-12  grid-row-buffer">
                <label for="name">{{$site->name}} ({{$location->location}} {{$location->country}})</label>
            </div>
            <div class="col-md-12  grid-row-buffer">
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
            <div class="col-md-7  grid-row-buffer">
                <label for="price">Lat: </label>
                <input type="text" class="form-control" name="lat" value="<?php echo $site->lat;?>" />
            </div>
            <div class="col-md-7  grid-row-buffer">
                <label for="price">Lng: </label>
                <input type="text" class="form-control" name="lng" value="<?php echo $site->lng;?>" />
            </div>
            <div class="col-md-7  grid-row-buffer">
                <label for="price">Image: </label>
                <input type="text" class="form-control" name="image" value="<?php echo $site->image;?>" />
            </div>
            <div class="col-md-7  grid-row-buffer">
                <label for="price">Video: </label>
                <input type="text" class="form-control" name="video" value="<?php echo $site->video;?>" />
            </div>
            <div class="col-md-7  grid-row-buffer">
                <label for="price">Description: </label>
                <textarea class="form-control" rows="5" name="description"><?php echo $site->description;?></textarea>
            </div>
            <div class="pull-right">
                <button class="btn btn-success" name="submit_btn" value="merge">Save</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
    </div>
</div>
@endsection