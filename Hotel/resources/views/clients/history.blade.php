@extends('layouts.index')
@section('content')
      
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-history"></i> Historial de el cliente  </h2>
                    
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('provision')}}">
                     <br>
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Reserva</th>
                          <th style=text-align:center >Fecha de entrada</th>
                          <th style=text-align:center >Fecha de salida</th>
                          <th style=text-align:center >Pago</th>
                          <th style=text-align:center >Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($reservation as $post)
                        <tr>
                          <th style=text-align:center>{{$post->reservation_num}}</th> 
                          <td style=text-align:center>{{$post->date_check_in}}</td>
                          <td style=text-align:center>{{$post->date_check_out}}</td> 
                          <td style=text-align:center>{{$post->id_inc_exp}}</td>
                          <td style=text-align:center>{{$post->state}}</td>
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

