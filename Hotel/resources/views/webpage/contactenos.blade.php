@extends('webpage.index')
@section('content')
         <div id="head">
            <div class="line">
               <h1>Contactenos</h1>
            </div>
         </div>
         <div id="content" class="left-align contact-page">
            <div class="line">
               <div class="margin">
                  <div class="s-12 l-6">
                     <h2>Contactenos</h2>
                     <address>
                        <p><i class="icon-home icon"></i> 600 metros este del Banco Nacional, en Aguas Zarcas de San Carlos.</p>
                        <p><i class="icon-globe_black icon"></i> Costa Rica.</p>
                        <p><i class="icon-mail icon"></i> suenoluna@vhotel.com</p>
                     </address>
                     <br />
                     <h2>Redes sociales</h2>
                     <p><i class="icon-facebook icon"></i> <a href="https://www.facebook.com/Hotel-Sue%C3%B1o-de-Luna-433312033543572/">Hotel Sueño de Luna</a></p>
                        <p class="margin-bottom"><i class="icon-twitter icon"></i> <a href="https://twitter.com/MyResponsee">Hotel Sueño de Luna</a></p>
                  </div>
                  <div class="s-12 l-6">
                     <h2>Ubicación</h2>
                     <form class="customform" action="">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.5890641096844!2d-84.33547768982886!3d10.374704899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa06347615e6189%3A0x426207e09d95f1a5!2sHotel+Sue%C3%B1o+de+Luna!5e0!3m2!1ses-419!2s!4v1507168165598" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         </div>  
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
@endsection