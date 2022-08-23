<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{$inProgressAppointmentCount}}</h3>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-loop icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">In Progress</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{$approvedAppointmentCount}}</h3>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <span class="mdi mdi-checkbox-multiple-marked icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Approved</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{$cancelAppointmentCount}}</h3>
                    {{-- <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p> --}}
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-danger">
                    <span class="mdi mdi-close icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Cancel</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Doctor List</h4>
                <p class="text-muted mb-1">Doctor Action</p>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="preview-list">

                    @foreach ($doctor as $doctorList)
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-primary">
                            <img src="upload/{{$doctorList->DoctorImage}}" alt="doctorImg">
                          </div>
                        </div>
                        <div class="preview-item-content d-sm-flex flex-grow">
                          <div class="flex-grow">
                            <h6 class="preview-subject">{{$doctorList->DoctorName}}</h6>
                            <p class="text-muted mb-0">{{$doctorList->DoctorSpeciality}}</p>
                          </div>
                          <div class="me-auto text-sm-right pt-2 pt-sm-0">
                            <a href="{{url('deleteDoctor', $doctorList->id)}}"><button class="btn btn-warning text-muted">Delete</button></a>
                          </div>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Appointment Status</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> Customer Name </th>
                      <th> Email </th>
                      <th> Date </th>
                      <th> Doctor Name </th>
                      <th> Number </th>
                      <th> Messase </th>
                      <th> Status </th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($appointments as $appointmentStatusShow)
                      <tr>
                        <td><span class="ps-2">{{$appointmentStatusShow->uname}}</span></td>
                        <td> {{$appointmentStatusShow->uemail}} </td>
                        <td> {!! date('dS F, Y', strtotime($appointmentStatusShow->udate)) !!} </td>
                        <td> {{$appointmentStatusShow->udooctorName}} </td>
                        <td> {{$appointmentStatusShow->unumber}} </td>
                        <td> {{\Illuminate\Support\Str::limit($appointmentStatusShow->umessage, 20, ' ....')}} </td>

                        @if ($appointmentStatusShow->ustatus == 'in progress')
                            <td class="text-white"> {{$appointmentStatusShow->ustatus}} </td>
                        @elseif($appointmentStatusShow->ustatus == 'Approved')
                            <td class="text-success"> {{$appointmentStatusShow->ustatus}} </td>
                        @elseif ($appointmentStatusShow->ustatus == 'Cancel')
                            <td class="text-danger"> {{$appointmentStatusShow->ustatus}} </td>

                        @endif
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title">Messages</h4>
                <p class="text-muted mb-1 small">View all</p>
              </div>
              <div class="preview-list">
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <img src="admin/assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
                  </div>
                  <div class="preview-item-content d-flex flex-grow">
                    <div class="flex-grow">
                      <div class="d-flex d-md-block d-xl-flex justify-content-between">
                        <h6 class="preview-subject">Leonard</h6>
                        <p class="text-muted text-small">5 minutes ago</p>
                      </div>
                      <p class="text-muted">Well, it seems to be working now.</p>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <img src="admin/assets/images/faces/face8.jpg" alt="image" class="rounded-circle" />
                  </div>
                  <div class="preview-item-content d-flex flex-grow">
                    <div class="flex-grow">
                      <div class="d-flex d-md-block d-xl-flex justify-content-between">
                        <h6 class="preview-subject">Luella Mills</h6>
                        <p class="text-muted text-small">10 Minutes Ago</p>
                      </div>
                      <p class="text-muted">Well, it seems to be working now.</p>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <img src="admin/assets/images/faces/face9.jpg" alt="image" class="rounded-circle" />
                  </div>
                  <div class="preview-item-content d-flex flex-grow">
                    <div class="flex-grow">
                      <div class="d-flex d-md-block d-xl-flex justify-content-between">
                        <h6 class="preview-subject">Ethel Kelly</h6>
                        <p class="text-muted text-small">2 Hours Ago</p>
                      </div>
                      <p class="text-muted">Please review the tickets</p>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <img src="admin/assets/images/faces/face11.jpg" alt="image" class="rounded-circle" />
                  </div>
                  <div class="preview-item-content d-flex flex-grow">
                    <div class="flex-grow">
                      <div class="d-flex d-md-block d-xl-flex justify-content-between">
                        <h6 class="preview-subject">Herman May</h6>
                        <p class="text-muted text-small">4 Hours Ago</p>
                      </div>
                      <p class="text-muted">Thanks a lot. It was easy to fix it .</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Portfolio Slide</h4>
              <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                <div class="item">
                  <img src="admin/assets/images/dashboard/Rectangle.jpg" alt="">
                </div>
                <div class="item">
                  <img src="admin/assets/images/dashboard/Img_5.jpg" alt="">
                </div>
                <div class="item">
                  <img src="admin/assets/images/dashboard/img_6.jpg" alt="">
                </div>
              </div>
              <div class="d-flex py-4">
                <div class="preview-list w-100">
                  <div class="preview-item p-0">
                    <div class="preview-thumbnail">
                      <img src="admin/assets/images/faces/face12.jpg" class="rounded-circle" alt="">
                    </div>
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">CeeCee Bass</h6>
                          <p class="text-muted text-small">4 Hours Ago</p>
                        </div>
                        <p class="text-muted">Well, it seems to be working now.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <p class="text-muted">Well, it seems to be working now. </p>
              <div class="progress progress-md portfolio-progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">To do list</h4>
              <div class="add-items d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                <button class="add btn btn-primary todo-list-add-btn">Add</button>
              </div>
              <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Create invoice </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Visitors by Countries</h4>
              <div class="row">
                <div class="col-md-5">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-us"></i>
                          </td>
                          <td>USA</td>
                          <td class="text-right"> 1500 </td>
                          <td class="text-right font-weight-medium"> 56.35% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-de"></i>
                          </td>
                          <td>Germany</td>
                          <td class="text-right"> 800 </td>
                          <td class="text-right font-weight-medium"> 33.25% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-au"></i>
                          </td>
                          <td>Australia</td>
                          <td class="text-right"> 760 </td>
                          <td class="text-right font-weight-medium"> 15.45% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-gb"></i>
                          </td>
                          <td>United Kingdom</td>
                          <td class="text-right"> 450 </td>
                          <td class="text-right font-weight-medium"> 25.00% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-ro"></i>
                          </td>
                          <td>Romania</td>
                          <td class="text-right"> 620 </td>
                          <td class="text-right font-weight-medium"> 10.25% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-br"></i>
                          </td>
                          <td>Brasil</td>
                          <td class="text-right"> 230 </td>
                          <td class="text-right font-weight-medium"> 75.00% </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-7">
                  <div id="audience-map" class="vector-map"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>