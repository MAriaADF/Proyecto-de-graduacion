@extends('layouts.index')
@section('content')
      
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Historial de {{$detail}}</h2>
                     <form method="post" action="{{url('HistProvi')}}">
                     <br>
                       <div class="ln_solid"></div>
                           {{csrf_field()}}
                    <div class="table table-striped table-bordered bulk_action">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Cantidad</th>
                          <th style=text-align:center >Movimiento</th>
                          <th style=text-align:center >Fecha</th>
                          <th style=text-align:center>Usuario</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($hist as $post)
                        <tr>
                           <td style=text-align:center>{{$post->quantity}}</td>
                          <td style=text-align:center>{{$post->action_type}}</td>
                          <td style=text-align:center>{{$post->date}}</td> 
                          <td style=text-align:center>{{$post->user}}</td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group row">
                    <div  class="col-md-12 col-sm-12 col-xs-12 col-md-offset-11">
                        <a href="{{action('ProvisionController@create')}}" type='button' value='Cerrar' class="btn btn-primary">Cerrar</a>
                    </div>
                  </div>
                  <br>
              </div>
  @endsection

