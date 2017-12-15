@extends('layouts.index')
@section('content')

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <link href="/hotel/public/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
   <script src="/hotel/public/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="/Hotel/public/js/reports/reservation.js"></script>
   <script src="/hotel/public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script src="/hotel/public/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
   <script src="/Hotel/public/js/alert/alert_time.js"></script>
  <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bar-chart"></i> Reporte de ingresos y gastos</h2>
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
                    <form method="post" action="{{action('IncomeExpensesController@searchInExpTip')}}">
                       <div class="form-group">
                      {{csrf_field()}}
                        <div class="col-md-3">
                          <select name="tipo" id="tipo"  class="form-control" required>
                           <option value='' selected>Selecciona...</option>
                         <option value="1">  Ingresos </option>
                         <option value="0">  Gastos </option>
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
                  <div class="x_panel" id="datatable1" style="{{$style}}">
                    <div class="form-group" lass="col-md-13 xdisplay_inputx form-group has-feedback">
                       <div class="form-group">
                      {{csrf_field()}}
                        <div class="col-md-3">
                          <input type="text"  class="form-control" name="tipo1" id="tipo1" value="{{$tipo}}" readonly="readonly">
                        </div>
                      </div>
                      <div class="col-md-3" class="form-group">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="date_start1" name="date_start1" value="{{$date_start}}" class="form-control" required><span class="input-group-addon" ><i  required ></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>
                         </div>
                   <div class="col-md-3">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="date_end2" name="date_end2" value="{{$date_start}}" class="form-control" required><span class="input-group-addon"><i  required></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>
                         </div>
                  <div class="x_title">
                      
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Factura</th>
                          <th style=text-align:center >Concepto</th>
                          <th style=text-align:center >Total</th>
                          <th style=text-align:center >Fecha factura</th>
                          <th style=text-align:center >Usuario</th>
                          <th style=text-align:center >Usuario</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($incomexp as $post)
                        <tr>
                          <th style=text-align:center>{{$post->bill_num}}</th>
                          <td style=text-align:center>{{$post->concept}}</td>
                          <td style=text-align:center>{{$post->sum}}</td> 
                          <td style=text-align:center>{{$post->invoce_date}}</td>
                          <td style=text-align:center>{{$post->user}}</td> 
                           <td style=text-align:center>
                            <a href="{{url('/editInExpe', $post->id)}}" class='btn btn-round btn btn-primary btn-xs'><i class="fa fa-pencil"></i> Editar</a>
                             <a href="{{url('destroyInExpe', $post->id)}}" class='btn btn-round btn btn-success btn-xs' ><i class="fa fa-history"></i> Eliminar</a>
                           </td> 
                         </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
               </form>
             </div>
                </div>
              </div>
            </div>

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
