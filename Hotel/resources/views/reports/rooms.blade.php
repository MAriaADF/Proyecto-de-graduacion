@extends('layouts.index')
@section('content')

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <link href="/hotel/public/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
   <script src="/hotel/public/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="/hotel/public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script src="/hotel/public/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script><script src="/Hotel/public/js/alert/alert_time.js"></script>
  <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-search"></i> Reporte de habitaciones</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                   @if (session('status'))
                    <div class = "alert alert-success">
                        {{ session ('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class = "alert alert-error">
                        {{ session ('error') }}
                    </div>
                @endif
                 <div class="x_content">
                    <br />
                    <form method="post" action="{{action('ReportsController@reportRoomTip')}}">
                 <div class="form-group">
                      {{csrf_field()}}
                        <div class="col-md-3">
                           <select name="room"  class="form-control " id="room"  required>
                           <option value='' selected>Selecciona...</option>
                             @foreach($room as $room)
                            <option value="{{ $room['id'] }}">{{$room['number']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3" class="form-group">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="date_start" name="date_start" class="form-control" required><span class="input-group-addon" ><i  required ></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>
                         </div>
                   <div class="col-md-3">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="date_end" name="date_end" class="form-control" required><span class="input-group-addon"><i  required></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>
                         </div>

                 <div class="col-md-3">
                 <button class="btn btn-round  btn btn-success btn-block">Generar</button>
                 <p id="demo"></p>
                 </div>
                  </div>
                  </div>
                  <div class="x_panel" id="datatable1" style="{{$style}}">
                  <div class="x_title">
                      <div class="form-group" lass="col-md-13 xdisplay_inputx form-group has-feedback">
                        <div class="col-md-3" >
                           <input type="text"  class="form-control" value="Habitación #{{$id_room}}" readonly="readonly">
                        </div>
                      </div>
                      <div class="col-md-3" class="form-group">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" class="form-control" value="{{$date_start}}" readonly="readonly" ><span class="input-group-addon" ><i  required ></i></span>
                              </div>
                            </div>
                         </div>
                   <div class="col-md-3">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text"  class="form-control"   value="{{$date_start}}" readonly="readonly" > <span class="input-group-addon" ><i  required></i></span>
                              </div>
                            </div>
                         </div>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center ># Reserva</th>
                          <th style=text-align:center >Nombre completo</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Fecha de entrada</th>
                          <th style=text-align:center >Fecha de salida</th>
                          <th style=text-align:center >id_inc_exp</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($rooms as $post)
                        <tr>
                          <th style=text-align:center>{{$post->reservation_num}}</th>
                          <td style=text-align:center>{{$post->name}}</td>
                          <td style=text-align:center>{{$post->phone}}</td> 
                          <td style=text-align:center>{{$post->date_check_in}}</td> 
                          <td style=text-align:center>{{$post->date_check_out}}</td> 
                          <td style=text-align:center>{{$post->id_inc_exp}}</td> 
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
            </div>

</script>
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'yyyy/mm/dd'
      
     });  

</script>    

<script type="text/javascript">
$('#sandbox-container .input-group.date').datepicker({
    format: "yyyy/mm/dd",
    todayBtn: "linked",
    language: "es",
    orientation: "auto left"
});
</script>  

    @endsection
