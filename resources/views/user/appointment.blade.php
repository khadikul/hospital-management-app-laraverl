@if (Auth::id())
    
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      <form class="main-form" method="POST" action="{{url('appointment')}}">
        @csrf
        @method('POST')
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="uname" class="form-control" placeholder="Full name">
            <small id="emailHelp" class="form-text text-muted mt-1">
              @error('uname')
                  {{$message}}
              @enderror
            </small>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="uemail" class="form-control" placeholder="Email address..">
            <small id="emailHelp" class="form-text text-muted mt-1">
              @error('uemail')
                  {{$message}}
              @enderror
            </small>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
            <small id="emailHelp" class="form-text text-muted mt-1">
              @error('date')
                  {{$message}}
              @enderror
            </small>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="doctor" class="custom-select">

              <option value="">Select Doctor</option>
              
              @foreach ($doctors as $doctorItem)
                  <option value="{{$doctorItem->DoctorName}}">{{$doctorItem->DoctorName}} : {{$doctorItem->DoctorSpeciality}}</option>
              @endforeach
              <small id="emailHelp" class="form-text text-muted mt-1">
                @error('doctor')
                    {{$message}}
                @enderror
              </small>
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="number" class="form-control" placeholder="Number..">
            <small id="emailHelp" class="form-text text-muted mt-1">
              @error('number')
                  {{$message}}
              @enderror
            </small>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
            <small id="emailHelp" class="form-text text-muted mt-1">
              @error('message')
                  {{$message}}
              @enderror
            </small>
          </div>
        </div>

        <button type="submit" id="apointment-submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
@else
<div class="container text-center">
  <p class="mt-5">You're Not Login Please login Before Create Appointment</p>
  <a href="{{url('register')}}"><button class="btn btn-danger mb-5">Register</button></a>
</div>
@endif