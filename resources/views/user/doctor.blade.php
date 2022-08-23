<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

        @if ($doctors)
          @foreach ($doctors as $doctorsDetailsDisplay)
            <div class="item">
              <div class="card-doctor">
                <div class="header">
                  <img src="upload/{{$doctorsDetailsDisplay->DoctorImage}}" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">{{$doctorsDetailsDisplay->DoctorName}}</p>
                  <span class="text-sm text-grey">{{$doctorsDetailsDisplay->DoctorSpeciality}}</span>
                </div>
              </div>
            </div>
          @endforeach
        @else
            <h3>No Doctor Here</h3>
        @endif
        
      </div>
    </div>
  </div>