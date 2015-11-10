@extends('layout.template')
@section('title', 'Edit dive site')

@section('content')
<form class="well" method="post">
    <div class="row">
        <div class="col-md-12 well grid-buffer">
            <div class="row">
                <div class="col-md-7  grid-row-buffer">
                    <label for="name">Location: </label>
                    <select class="form-control" name="locationid">
                    <?php 
                    foreach ($locations as $location) {
                        if ($site->locationId == $location->id) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        echo '<option value="' . $location->id . '" ' . $selected . '>' . $location->location . '</option>';
                    }
                    ?>
                </select>
                </div>
                <div class="col-md-7  grid-row-buffer">
                    <label for="weight">Name: </label>
                    <input type="text" class="form-control" name="name" value="<?php echo $site->name;?>" />
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
                    <label for="price">Deepth: </label>
                    <input type="text" class="form-control" name="deepth" value="<?php echo $site->deepth;?>" />
                </div>
                <div class="col-md-7  grid-row-buffer">
                    <label for="price">Temperature: </label>
                    <input type="text" class="form-control" name="temperature" value="<?php echo $site->temperature;?>" />
                </div>
                <div class="col-md-7  grid-row-buffer">
                    <label for="price">Season: </label>
                    <input type="text" class="form-control" name="season" value="<?php echo $site->season;?>" />
                </div>
                <div class="col-md-7  grid-row-buffer">
                    <label for="price">Visibility: </label>
                    <input type="text" class="form-control" name="visibility" value="<?php echo $site->visibility;?>" />
                </div>
                <div class="col-md-12  grid-row-buffer">
                    <label for="price">Description: </label>
                    <textarea class="form-control" rows="5" name="description"><?php echo $site->description;?></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection