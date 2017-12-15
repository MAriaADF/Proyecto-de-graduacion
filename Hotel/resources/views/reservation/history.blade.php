@extends('layouts.index')
@section('content')
      
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-history"></i> Historial de la reserva {{ $idan }} </h2>
                    
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('provision')}}">
                     <br>
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Movimiento</th>
                          <th style=text-align:center >Fecha Hora</th>
                          <th style=text-align:center >Usuario</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($his as $post)
                        <tr>
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
                        <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                    </div>
                  </div>
                  <br>
              </div>
  @endsection

