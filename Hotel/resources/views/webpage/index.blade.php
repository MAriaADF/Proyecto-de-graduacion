<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Hotel Sueño de Luna</title>
      <link rel="stylesheet" href="/Hotel/public/css/components.css">
      <link rel="stylesheet" href="/Hotel/public/css/responsee.css">
      <link rel="stylesheet" href="/Hotel/public/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="/Hotel/public/owl-carousel/owl.theme.css">
      <link rel="stylesheet" href="/Hotel/public/css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script type="text/javascript" src="/Hotel/public/js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="/Hotel/public/js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="/Hotel/public/js/modernizr.js"></script>
      <script type="text/javascript" src="/Hotel/public/js/responsee.js"></script>   
      
   </head>
   <body class="size-1140">
      
<header>
<nav>
   <div class="line">
      <div class="top-nav">              
            <div class="logo hide-l">
               <a href="{{url('/index')}}">Hotel<br />Sueño de Luna</a>
            </div>                  
               <p class="nav-text">Menu</p>
            <div class="top-nav s-12 l-5">
               <ul class="right top-ul chevron">
                  <li><a href="{{ url('/index_page')}}">Inicio</a></li>
                  <li><a href="{{url('/nuestrohotel')}}">Nuestro Hotel</a></li>
                  <li><a href="{{url('/create')}}">Reserva</a></li>
               </ul>
            </div>
               <ul class="s-12 l-2">
                  <li class="logo hide-s hide-m">

                    <img src="img/hotelh.jpg">
               </ul>
            <div class="top-nav s-12 l-5">
               <ul class="top-ul chevron">
                  <li><a href="{{url('/galeria')}}">Galeria</a></li>
                  <li><a href="{{url('/conctactenos')}}">Contactenos</a></li>
                  <li><a href="{{url('/login')}}">Sistema</a></li>
               </ul> 
            </div>
      </div>
   </div>
</nav>
</header>

     <div class="right_col" >
         
            @yield('content')


          </div>
    <footer>
      <div align="center">
         <p>©Todos los derehos reservados C&H Solutions
         </p>
    </div>
</footer>
      <script type="text/javascript" src="/Hotel/public/owl-carousel/owl.carousel.js"></script>   
      <script type="text/javascript">
         jQuery(document).ready(function($) {  
           $("#owl-demo").owlCarousel({
         	slideSpeed : 300,
         	autoPlay : true,
         	navigation : false,
         	pagination : false,
         	singleItem:true
           });
           $("#owl-demo2").owlCarousel({
         	slideSpeed : 300,
         	autoPlay : true,
         	navigation : false,
         	pagination : true,
         	singleItem:true
           });
         });	
          
      </script> 
   </body>

</html>