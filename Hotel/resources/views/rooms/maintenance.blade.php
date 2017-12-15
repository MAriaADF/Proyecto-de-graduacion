@extends('layouts.index')
@section('content')
      <script src="hotel/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<div class="modal fade bs-pago-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h2><i class="fa fa-user"></i> Finalización de mantenimiento</h2>
                        </div>
                        <div class="modal-body">
                     <br>
                    <div class="box-body">
                        <form name="f2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('/endMaintenance')}}">
                  <div class="form-group">
                    {{csrf_field()}}
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="id_room" maxlength="9" name="id_room" style="display: none;" >
                        </div>
                      </div>
                      <div class="form-group">
                         <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  required  id="observation"  name="observation"/>
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
                    <h2>Mantenimiento de habitaciones</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>

                  </div>
                    @if (session('status'))
                    <div class = "alert alert-success">
                        {{ session ('status') }}
                    </div>
                @endif
                  <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('insertmaintenance')}}">
                       <div class="row">
                     <div class="form-group">
                      {{csrf_field()}}
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Habitación</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="room"  class="form-control " id="room"  required>
                           <option value='' selected>Selecciona...</option>
                             @foreach($room as $room)
                            <option value="{{ $room['id'] }}">{{$room['number']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Observaciones</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  id="observation"  name="observation"  class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success btn-round">Guardar</button>
                         <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                        </div>
                      </div>
                      <div class="x_title">
                    <h2>Habitaciones en mantenimiento</h2>
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
                     <br>
                       <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Número de habitacón</th>
                          <th style=text-align:center >Cantidad de personas</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($hist as $post)
                        <tr>
                          <td style=text-align:center>{{$post->number}}</td>
                          <td style=text-align:center>{{$post->type}}</td>
                          <th style=text-align:center> <button type="button" onclick="show_data_price({{$post->id}});"   class='btn btn-round btn btn-dark btn-xs' data-toggle="modal" data-target=".bs-pago-modal-sm"><i class="fa fa-search"></i>Finalizar</button><!--href="{{url('/endMaintenance', $post->id)}}"-->
                           </th>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
  <script >
    
  function show_data_price(  $id){
    
    document.f2.id_room.value = $id; 
  }

  </script>
  @endsection

            
     