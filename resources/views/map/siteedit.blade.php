@extends('layout.template')
@section('title')
{{$title}}
@stop

@section('content')
<div class="alert alert-<?php echo $error['type'];?>" role="alert"><?php echo $error['message'];?></div>

<form class="well" method="post">
    <div class="row">
        <div class="col-md-12 well grid-buffer">
            <div class="row">
                <div class="col-md-7  grid-row-buffer">
                    <label for="name">Location: </label>
                    <select class="form-control" name="locationid">
                        <?php
                        foreach ($locations as $location) {
                            if ($site->location_id == $location->id) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            echo '<option value="' . $location->id . '" ' . $selected . '>' . $location->country . ' ' . $location->location . '</option>';
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
                    <label for="price">Image: </label>
                    <input type="text" class="form-control" name="image" value="<?php echo $site->image;?>" />
                </div>
                <div class="col-md-7  grid-row-buffer">
                    <label for="price">Video: </label>
                    <input type="text" class="form-control" name="video" value="<?php echo $site->video;?>" />
                </div>
                <div class="col-md-12  grid-row-buffer">
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
</form>
@endsection