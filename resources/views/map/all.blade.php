@extends('layout.template')
@section('title', 'All dive sites')

@section('content')
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key={{$googleapikey}}&sensor==false">
</script>

<div class="row">
    <div class="col-md-12 text-center"></div>
    <div class="col-md-12">
        <div id="map_canvas" style="width:100%; height:500px"></div>
        <script type="text/javascript">
            /*
            $(document).ready(function() {
                getGeoCode("117 W. 9th Street, Suite 1009 Los Angeles, CA 90015");
            });

            function getGeoCode(addr)
            {
                $.ajax({
                    ContentType: "application/json; charset=utf-8",
                    url: 'http://maps.googleapis.com/maps/api/geocode/json?address=' + addr + '&sensor=false',
                    success: function(msg){
                        initialize(msg);
                    },

                    error:function(xhr, ajaxOptions, thrownError){
                       alert('error');
                    }
                });
            }*/

            function initialize() 
            {
                <?php
                foreach ($locations as $location) :
                    $sites = $location->mapLocationSite;
                ?>
                    var mapOptions = {
                        center: new google.maps.LatLng(<?php echo $sites[0]->lat;?>, <?php echo $sites[0]->lng;?>),
                        zoom: 11,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                        <?php foreach ($sites as $site) :?>
                            var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(<?php echo $site->lat;?>, <?php echo $site->lng;?>), map: map, title: '<?php echo $site->name;?>' });  
                            marker.addListener('click', function() {
                                window.location = "/map/engname";
                            });
                        <?php endforeach;?>
                   
                <?php endforeach;?>
            }

            /*public double GetDistance(double Lat1, double Long1, double Lat2, double Long2)
            {
                double Lat1r = ConvertDegreeToRadians(Lat1);
                double Lat2r = ConvertDegreeToRadians(Lat2);
                double Long1r = ConvertDegreeToRadians(Long1);
                double Long2r = ConvertDegreeToRadians(Long2);

                double R = 6371; // Earth's radius (km)
                double d = Math.Acos(Math.Sin(Lat1r) *
                    Math.Sin(Lat2r) + Math.Cos(Lat1r) *
                    Math.Cos(Lat2r) *
                    Math.Cos(Long2r-Long1r)) * R;
                return d;
            }

            private double ConvertDegreeToRadians(double degrees)
            {
                return (Math.PI/180)*degrees;
            }*/
            initialize();
        </script>
    </div>
</div>
@endsection