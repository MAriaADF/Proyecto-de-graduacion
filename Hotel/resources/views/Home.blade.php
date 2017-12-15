@extends('layouts.index')
@section('content')
 <script src="/Hotel/public/js/alert/alert_time.js"></script>
 
<div class="container">
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
    <div class="row">
          <div class="">
          <div class="content-wrapper">
         @for ($i = 1; $i < 11; $i++)
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                 <div class="tile-stats">
                  <div class="icon"><i  class="fa fa-bed" style="color:pink" ></i></div>
                  <div class="count"> {{ $i }}</div>
                  <h3> <font color="darkblue">Disponible</font></h3>
                </div>
              </div>
          @endfor
          @for ($i = 1; $i < 31; $i++)
   <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i  class="fa fa-bed" style="color:lightblue" ></i></div>
                  <div class="count"> {{ $i }}</div>
                  <h3> <font color="darkblue">Ocupada</font></h3>
                </div>
              </div>
          @endfor
            </div>
        </div>
    </div>
</div>
@endsection
