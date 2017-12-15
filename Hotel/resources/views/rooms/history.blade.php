@extends('layouts.index')
@section('content')
      
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Historial</h2>
                     <form method="post" action="{{url('HistProvi')}}">
                     <br>
                       <div class="ln_solid"></div>
                           {{csrf_field()}}
                    <div class="table table-striped table-bordered bulk_action">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center ># Habitación</th>
                          <th style=text-align:center >Observación</th>
                          <th style=text-align:center >Fecha</th>
                          <th style=text-align:center >Movimiento</th>
                          <th style=text-align:center>Usuario</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($hist as $post)
                        <tr>
                          <td style=text-align:center>{{$post->number}}</td>
                          <td style=text-align:center>{{$post->observation}}</td>
                          <td style=text-align:center>{{$post->date}}</td> 
                          <td style=text-align:center>{{$post->action_type}}</td> 
                          <td style=text-align:center>{{$post->user}}</td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
                        <div class="form-group">
                        <div class=" col-xs-12 col-md-offset-11">
                          <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                        </div>
                      </div>
              </div>
  @endsection

