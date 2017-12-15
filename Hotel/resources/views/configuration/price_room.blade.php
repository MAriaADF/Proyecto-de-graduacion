@extends('layouts.index')
@section('content')
  <div class="row">
         
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Actualización de precios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      
                   <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th style=text-align:center >Cantidad Pax</th>
                          <th style=text-align:center >Precio</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($price_room as $post)
                        <tr> 
                          <td style=text-align:center>{{$post['pax_num']}}</td>
                          <td style=text-align:center> ₡ {{$post['price']}}</td> 
                            <td style=text-align:center >   
                   <button type="button"  onclick="show_data_price({{$post['id']}}, {{$post['pax_num']}},  {{$post['price']}} );" class="btn btn-round btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Editar</button>
                         </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h2><i class="fa fa-user"></i> Editar precio</h2>
                        </div>
                        <div class="modal-body">
                     <br>
                    <div class="box-body">
                 <form name="f1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('/priceRoom')}}">
                  <div class="form-group">
                    {{csrf_field()}}
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="id" maxlength="9" name="id" style="display: none;" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cantidad de personas<span >*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="pax_num" maxlength="9" name="pax_num" readonly class="form-control col-md-7 col-xs-12" /><span class="fa fa-sticky-note-o form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Precio<span class="required">*</span> </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" id="sum"  maxlength="6" name="sum"/>
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
                </div>
              </div>
            </div>
  <script >
    
  function show_data_price($id, $pax_num, $price){

    document.f1.pax_num.value = $pax_num;
    document.f1.sum.value = $price;
    document.f1.id.value = $id;
   
  }

  </script>
 @endsection

