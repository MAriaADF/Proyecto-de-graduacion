@extends('layouts.index')
@section('content')
      <script src="hotel/vendor/datatables.net/js/jquery.dataTables.min.js"></script>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_title">
                    <h2>Limpieza de Habitaciones</h2>
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
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('rooms')}}">
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
                          <input type="text"  id="observation"  name="observation"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success btn-round">Guardar</button>
                          <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
  @endsection

            
     