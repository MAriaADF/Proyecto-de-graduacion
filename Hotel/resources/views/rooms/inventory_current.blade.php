@extends('layouts.index')
@section('content')
      
    <script src="/hotel/public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/hotel/public/plugins/datatables/dataTables.bootstrap.min.js"></script>
     <link rel="stylesheet" href="/hotel/public/plugins/datatables/dataTables.bootstrap.css">
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inventario actual</h2>
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('provision')}}">
                     <br>
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th style=text-align:center >Producto</th>
                          <th style=text-align:center >Cantidad</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($provi as $post)
                        <tr>
                          <td style=text-align:center>{{$post['detail']}}</td>
                          <td style=text-align:center>{{$post['quantity']}}</td> 
                           <td style=text-align:center >
                           <a href="{{action('ProvisionController@edit', $post['id'])}}" " class='btn btn-primary btn-xs' >Historial</a></td>

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

