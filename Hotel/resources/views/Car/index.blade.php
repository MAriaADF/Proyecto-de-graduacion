@extends('home')
@section('content')
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @if (Auth::check())
      @foreach($cars as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['model']}}</td>
        <td>{{$post['brand']}}</td>
       
          <form action="{{action('CarController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
      @else              
      @endif
    </tbody>
  </table>
  @if (Auth::check())
  <a href="{{action('CarController@create')}}" class="btn btn-warning">New Car</a>
  @else              
  @endif
  </div>
  @endsection