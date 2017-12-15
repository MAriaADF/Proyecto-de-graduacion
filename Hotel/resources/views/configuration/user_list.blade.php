@extends('layouts.index')
@section('content')
      
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inventario actual</h2>
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('provision')}}">
                     <br>
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                    <div class="table table-striped table-bordered bulk_action">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >id</th>
                          <th style=text-align:center >Producto</th>
                          <th style=text-align:center >Cantidad</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($provi as $post)
                        <tr>
                          <th style=text-align:center scope="row">{{$post['id']}}</th>
                          <td style=text-align:center>{{$post['detail']}}</td>
                          <td style=text-align:center>{{$post['quantity']}}</td> 
                           <td style=text-align:center >
                           <a href="{{action('ProvisionController@edit', $post['id'])}}" " class='btn btn-xs btn-warning no-print' >Historial</a></td>

                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
  @endsection

