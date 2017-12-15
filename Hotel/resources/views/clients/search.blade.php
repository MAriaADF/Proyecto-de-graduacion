@extends('layouts.index')
@section('content')
       <link rel="stylesheet" href="/hotel/public/plugins/datatables/dataTables.bootstrap.css">
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     <h2><i class="fa fa-users"></i> Clientes</h2>
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('/indexClient')}}">
                     <br>
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Nombre</th>
                          <th style=text-align:center >1° Apellido</th>
                          <th style=text-align:center >2° Apellido</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Correo</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($person as $post)
                        <tr>
                          <th style=text-align:center>{{$post['name']}}</th>
                          <td style=text-align:center>{{$post['last_name_1']}}</td>
                          <td style=text-align:center>{{$post['last_name_2']}}</td> 
                          <td style=text-align:center>{{$post['phone']}}</td>
                          <td style=text-align:center>{{$post['email']}}</td> 
                          <td style=text-align:center >
                           <a href="{{action('PersonController@edit', $post['id'])}}" class=' btn btn-round btn btn-primary btn-xs'><i class="fa fa-pencil"></i> Editar</a>
                           <a href="{{url('/destroy', [$post->id])}}" class='btn btn-round btn btn-danger btn-xs' ><i class="fa fa-trash"></i> Eliminar</a>
                           <a href="{{url('/historialClient', $post->id)}}" class='btn btn-round btn btn-success btn-xs' ><i class="fa fa-history"></i> Historial</a></td>
                         </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group row">
                    <div  class=" col-md-offset-11">
                      <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                    </div>
                  </div>
                  <br>
              </div>
  @endsection

