|@extends('master')
@section('content')
<div class="container">
  <form method="post" action="{{action('CarController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Brand</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="brand" name="brand" value="{{$car->brand}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Model</label>
      <div class="col-sm-10">
       <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="model" name="model" value="{{$car->model}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
@endsection