@extends('webpage.index')
@section('content')
         <!-- CAROUSEL -->  	
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme">
               <div class="item">
                  <img src="/Hotel/public/img/first.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Theme based on Responsee framework</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>With amazing responsive carousel
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="/Hotel/public/img/second.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Build new layout in 10 minutes!</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>Lightweight, more intuitive and useful responsive CSS framework
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="/Hotel/public/img/third.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Design theme is under the MIT license</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>Best theme based on Responsee framework
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIRST BLOCK --> 	
         <div id="first-block">
            <div class="line">
               <h2>Bienvenidos al Hotel Sueño de Luna</h2>
               <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
               </p>
               <div class="margin">
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-paperplane_ico icon2x"></i>
                     <h3>About</h3>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-star icon2x"></i>
                     <h3>Company</h3>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-message icon2x"></i>
                     <h3>Services</h3>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-mail icon2x"></i>
                     <h3>Contact</h3>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- GALLERY --> 	
         <div id="third-block">
            <div class="line">
               <h2>Responsive gallery</h2>
               <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
               </p>
               <div class="margin">
                  <div class="s-12 m-6 l-3">
                     <img src="img/first-small.jpg" alt="alternative text">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img src="img/second-small.jpg" alt="alternative text">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img src="img/third-small.jpg" alt="alternative text">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img src="img/fourth-small.jpg" alt="alternative text">      
                     <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                     </p>
                  </div>
               </div>
            </div>
         </div>
           @endsection