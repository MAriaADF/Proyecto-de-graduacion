@extends('layouts.index')
@section('content')
        <link rel="stylesheet" href="/hotel/public/plugins/datatables/dataTables.bootstrap.css">
  <div class="row">
    <div class="modal fade bs-pago-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h2><i class="fa fa-user"></i> Detalle del pago</h2>
                        </div>
                        <div class="modal-body">
                     <br>
                    <div class="box-body">
                        <form name="f2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('/pago')}}">
                  <div class="form-group">
                    {{csrf_field()}}
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="id_reser" maxlength="9" name="id_reser" style="display: none;" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Número de reserva</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  readonly required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" id="reservation_num"  maxlength="6" name="reservation_num"/>
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Total </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  readonly required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" id="sum"  maxlength="6" name="sum"/>
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      </div>
                    <div class="modal-footer">
                          <button type="submit" class="btn btn-round btn btn-success">Guardar</button>
                          <button type="button" class=" btn btn-round btn btn-success" data-dismiss="modal">Cerrar</button> 
                        </div>
                    </form>
                  </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Reservas del dia</h3>
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('provision')}}">
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                      <div class="box-body">
                 <table id="datatable" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th style=text-align:center >Reserva </th>
                          <th style=text-align:center >Nombre</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Fecha de entrada</th>
                          <th style=text-align:center >Fecha de salida</th>
                          <th style=text-align:center >Pago</th>
                          <th style=text-align:center >Estado</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($reservation as $post)
                        <tr>
                          <th style=text-align:center>{{$post->reservation_num}}</th>
                          <td style=text-align:center>{{$post->name}}</td>
                          <td style=text-align:center>{{$post->phone}}</td> 
                          <td style=text-align:center>{{$post->date_check_in}}</td>
                          <td style=text-align:center>{{$post->date_check_out}}</td> 
                          <td style=text-align:center>
                            @if ( ($post->state) != 'Pendiente' and ($post->state) != 'Cancelada'   and  ($post->id_inc_exp) == 0)
                             <button type="button"  class="btn btn-round btn btn-default" onclick="show_data_price({{$post->reservation_num}}, {{$post->id_reservation}});" data-toggle="modal" data-target=".bs-pago-modal-sm"><i class="fa fa-money"></i></button>
                            @else
                              {{$post->id_inc_exp}}
                             @endif 
                        </td>
                          <td style=text-align:center>{{$post->state}}</td>
                           <td  >
                           <a href="{{url('/see', [$post->id_person, $post->id_reservation])}}" class='btn btn-round btn btn-dark btn-xs' ><i class="fa fa-search"></i> Ver</a>
                          @if ( ($post->id_inc_exp) != 0 and ($post->state) == 'Confirmada' )
                           <a href="{{url('/date_check_in', [$post->id_reservation])}}" class='btn btn-round btn btn-primary btn-xs' ><i class="fa fa-check"></i> Check in</a>
                          @endif             
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
                <div class="form-group row">
                    <div  class="col-md-12 col-sm-12 col-xs-12 col-md-offset-11">
                        <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-primary btn-round">Cerrar</a>
                    </div>
                  </div>
              </div>

   <script >
    
  function show_data_price( $reservation_num, $id){
    
    document.f2.id_reser.value = $id; 
    document.f2.reservation_num.value = $reservation_num; 
    
    $.get('http://localhost/Hotel/public/payment/'+$id, function(response){
    response.forEach(element => {
      var a = element.total;
      document.f2.sum.value = a; 
      });
    });
    
   
  }

  </script>
  @endsection

