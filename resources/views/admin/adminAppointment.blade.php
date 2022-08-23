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
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Appointment Status Handle</h4>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Customer Name </th>
                            <th> Email </th>
                            <th> Date </th>
                            <th> doctor Name </th>
                            <th> Number </th>
                            <th> Meassge </th>
                            <th> Satatus </th>
                            <th class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($appointmentList as $Appointmentitem)

                            <tr>
                                <td>
                                    <span class="ps-2">{{$Appointmentitem->uname}}</span>
                                </td>
                                <td> {{$Appointmentitem->uemail}}</td>
                                <td> {{$Appointmentitem->udate}}</td>
                                <td> {{$Appointmentitem->udooctorName}} </td>
                                <td> {{$Appointmentitem->unumber}} </td>
                                <td> {{\Illuminate\Support\Str::limit($Appointmentitem->umessage, 20, ' ....')}} </td>

                                @if ($Appointmentitem->ustatus == 'in progress')
                                    <td class="text-white"> {{$Appointmentitem->ustatus}} </td>
                                @elseif($Appointmentitem->ustatus == 'Approved')
                                    <td class="text-success"> {{$Appointmentitem->ustatus}} </td>
                                @elseif ($Appointmentitem->ustatus == 'Cancel')
                                    <td class="text-danger"> {{$Appointmentitem->ustatus}} </td>
                                @endif

                                <td>
                                    <a href="{{url('admin-approve-appointment', $Appointmentitem->id)}}"><button class="badge badge-outline-success">Approve</button></a>
                                    <a href="{{url('admin-cancel-appointment', $Appointmentitem->id)}}"><button class="badge badge-outline-danger">Cancel</button></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- main-panel ends -->
        
<!--- footer --->
@include('admin.footer')