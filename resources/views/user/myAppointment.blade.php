@include('user.header')

<div class="container">
    <table class="table my-5">
        <thead class="thead-light">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

           @foreach ($appoint as $appointmentList)

                <tr>
                    <th scope="row">{!! date('dS F, Y', strtotime($appointmentList->udate)) !!}</th>
                    <td>{{$appointmentList->udooctorName}}</td>
                    <td>{{\Illuminate\Support\Str::limit($appointmentList->umessage, 20, ' ....')}}</td>
                    <td>{{$appointmentList->ustatus}}</td>
                    <td><a href="{{url('cancelAppointment', $appointmentList->id)}}"><button class="btn btn-danger">Cnacel</button></a></td>
                </tr>
           @endforeach

        </tbody>
    </table>
    
</div>
@include('user.footer')