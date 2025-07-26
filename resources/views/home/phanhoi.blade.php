   <section class="testimonial-section section" id="phan-hoi-slider">
       <div class="decorative-line about-decorative-line"></div>
       <div class="container">
           <!-- TIÊU ĐỀ -->
           <div class="section-title-phanhoi  position-relative d-flex justify-content-center align-items-end">
               <div class="position-absolute   phanhoi-2-image" style="">
                   <img src="{{ asset('assets/images/img_about2.svg') }}" alt="upleft-image" class="img-fluid z-1">
               </div>
               <h2>Phản hồi của khách hàng</h2>
               <div class="position-absolute   phanhoi-1-image" style="">
                   <img src="{{ asset('assets/images/img_about1.svg') }}" alt="upleft-image" class="img-fluid z-1">
               </div>
           </div>

           <!-- SLIDER -->
           <div class="slider-container">
               <!-- Nút điều hướng trái -->
               <button class="slider-btn" id="prev-btn2">
                   <img src="{{ asset('assets/images/previcon.svg') }}" alt="" class="img-fluid">
               </button>

               <!-- Viewport để "cắt" các slide -->
               <div class="slider-viewport">
                   <!-- Track chứa tất cả các card và sẽ di chuyển -->
                   <div class="slider-track-phanhoi" id="slider-track-phanhoi">
                       @foreach ($phanhoi as $phanhoiitem)
                           <article class="testimonial-card">
                               <span class="card-deco-top"></span>
                               <span class="card-deco-bottom"></span>

                               <div class="card-header">
                                   <img src="https://i.imgur.com/3YQ5Yf1.png" alt="Avatar Chị Hà Trang" class="avatar">
                                   <div class="author-info">
                                       <h3>{{ $phanhoiitem->name ?? '' }}</h3>
  <p>{{ \Carbon\Carbon::parse($phanhoiitem->created_at)->format('d/m/Y') }}</p>
                                   </div>
                               </div>
                               <p class="testimonial-text">
                                   {{ $phanhoiitem->note ?? '' }}
                               </p>
                           </article>
                       @endforeach




                   </div>
               </div>

               <!-- Nút điều hướng phải -->
               <button class="slider-btn" id="next-btn2">
                   <img src="{{ asset('assets/images/nexticon.svg') }}" alt="" class="img-fluid">
               </button>
           </div>
       </div>
   </section>
