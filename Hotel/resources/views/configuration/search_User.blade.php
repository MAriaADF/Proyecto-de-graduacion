@extends('layouts.index')
@section('content')
 {{csrf_field()}}
       <link rel="stylesheet" href="/hotel/public/plugins/datatables/dataTables.bootstrap.css">
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     <h2><i class="fa fa-users"></i> Usuarios</h2>
                     <form data-parsley-validate class="form-horizontal form-label-left" method="" action="">
                     <br>
                        
                       <div class="ln_solid"></div>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Nombre completo</th>
                          <th style=text-align:center >Usuario</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Correo</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($person as $post)
                        <tr>
                          <th style=text-align:center>{{$post['name']}} {{$post['last_name_1']}} {{$post['last_name_2']}}</th>
                          <td style=text-align:center>{{$post['user']}}</td> 
                          <td style=text-align:center>{{$post['phone']}}</td>
                          <td style=text-align:center>{{$post['email']}}</td> 
                          <td style=text-align:center >
                           <a href="{{url('/editPerson', [$post->id, $post->id_user])}}" class='btn btn-round btn btn-primary btn-xs'><i class="fa fa-pencil"></i> Editar</a>
                           <a  href="{{url('/destroyUser', $post->id_user)}}" class='btn btn-round btn btn-primary btn-xs'><i class="fa fa-pencil"></i> Eliminar</a>
                            <a  href="{{url('/historyUser', $post->id)}}" class='btn btn-round btn btn-primary btn-xs'><i class="fa fa-pencil"></i> Historial</a></td>
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
                    <div  class="col-md-12 col-sm-12 col-xs-12 col-md-offset-11">
                        <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-primary">Cerrar</a>
                    </div>
                  </div>
                  <br>
              </div>
  @endsection

