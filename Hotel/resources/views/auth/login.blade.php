@extends('layouts.logi')
@section('content')
<div class="container">
        <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
              <h1>Hotel Sueño de Luna</h1>
                        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                            <div >
                                <input id="user" type="text" class="form-control" name="user" value="{{ old('user') }}" required autofocus  placeholder="Usuario">

                                @if ($errors->has('user'))
                                    <span class="help-block">
                                        <strong>{{  $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div >
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div >
                                <button type="submit"  class="btn btn-default submit">
                                    Ingresar
                                </button>  
                                 <div class="clearfix"></div>
                             <br />
                           <div>
                       <h1><i class="fa fa-moon-o"></i> Sistema de administración</h1>
                          <p> ©Todos los derehos reservados  <a href="https://www.hotelsuenodeluna.com">C&H Solutions</a></p>
                            </div>                    
                         </div>
                     </div>
                </form>  
            </div>
        </div>
     </div>
@endsection
