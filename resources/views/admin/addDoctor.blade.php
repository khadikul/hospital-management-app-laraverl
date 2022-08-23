<!-- header ----->
@include('admin.header')
      
<!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial:partials/_sidebar.html -->
<!---- navbar strat --->
@include('admin.navbar.navbar')
<!----- navbar end ---->

<!--- main panel strat--->
<div class="main-panel">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card offset-3 mt-3">
          <div class="card">
            
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span> </button>
                    {{session()->get('message')}}
                </div>
            @endif
            
            <div class="card-body">
              <h2 class="card-title">Add Doctor</h2>
              <form class="forms-sample" method="POST" action="{{url('doctor-details-save')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="name">Doctor Name</label>
                  <input type="text" name="dname" class="form-control" id="name" placeholder="Doctor Name">
                  <small id="emailHelp" class="form-text text-muted mt-1">
                        @error('dname')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="dnumber" class="form-control" id="phone" placeholder="Phone Number">
                  <small id="emailHelp" class="form-text text-muted mt-1">
                        @error('dnumber')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Speciality</label>
                  <select class="form-control" name="dspeciality">
                        <option value="skin specialist">skin specialist</option>
                        <option value="heart specialist">heart specialist</option>
                        <option value="surgery specialist">surgery specialist</option>
                        <option value="brain specialist">brain specialist</option>
                  </select>
                  <small id="emailHelp" class="form-text text-muted mt-1">
                        @error('dspeciality')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                  <label for="image">Doctor Image</label>
                  <input type="file" name="dimage" class="form-control" id="image">
                  <small id="emailHelp" class="form-text text-muted mt-1">
                        @error('dimage')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->
        
<!--- footer --->
@include('admin.footer')