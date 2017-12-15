@extends('webpage.index')
@section('content')
         <div id="head">
            <div class="line">
               <h1>Galeria</h1>
            </div>
         </div>
         <div id="content">
            <div class="line">
               <div class="margin">
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/first-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/second-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/third-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/fourth-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/first-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/second-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/third-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/fourth-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/first-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/second-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/third-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
                   <div class="s-12 m-6 l-4">
                      <img src="/Hotel/public/img/fourth-small.jpg">      
                      <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </p>
                   </div>
               </div>
            </div>
         </div>
      </section>

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