@extends('layouts.index')
@section('content')
  <div class="row">
         
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro cliente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      
                    <form  data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('edit', $id)}}">
                     <div class="form-group">
                      {{csrf_field()}}
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name"  value="{{$person->name}}"required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> 1° Apellido<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name_1" name="last_name_1" value="{{$person->last_name_1}}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">2° Apellido
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name_2" name="last_name_2" value="{{$person->last_name_2}}" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" name="phone" class="date-picker form-control col-md-7 col-xs-12" value="{{$person->phone}}" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" value="{{$person->email}}" required />
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group row">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">       
                          <button type="submit"  class="btn btn-primary">Guardar</button> 4
                              <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-primary">Cerrar</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
 @endsection

