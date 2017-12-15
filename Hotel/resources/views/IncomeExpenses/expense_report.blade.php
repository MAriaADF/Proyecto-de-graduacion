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
                    <h2><i class="fa fa-long-arrow-left"></i> Registro gastos </h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('storeReport')}}">
                     <div class="form-group">
                      {{csrf_field()}}
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha<span class="required">*</span> 
                        </label>                       
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="invoce_date" name="invoce_date" class="form-control"><span class="input-group-addon"><i  required="required" ></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>                    
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Factura<span >*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="bill_num"  maxlength="9" name="bill_num" required="required"  class="form-control col-md-7 col-xs-12">
                           <span class="fa fa-sticky-note-o form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Concepto<span >*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="concept" maxlength="50" name="concept" required="required"  class="form-control col-md-7 col-xs-12">
                          <span class="fa fa-pencil-square-o form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total<span class="required">*</span> 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  required="required" id="sum" name="sum" maxlength="6" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-round btn btn-success">Guardar</button>
                          <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                          
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
