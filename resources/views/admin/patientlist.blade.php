<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">
            <div class="container" style="margin-top: 50px">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Patient Name</th>
                <th scope="col">Age</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Room Number</th>
                <th scope="col">Admit Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patientdata as $datas)
                <tr style="color: white">
                    <td>{{ $datas->patient_name }}</td>
                    <td>{{ $datas->age }}</td>
                    <td>{{ $datas->bgroup }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->phone }}</td>
                    <td>{{ $datas->room_number }}</td>
                    <td>{{ $datas->date }}</td>
                </tr>
                <tr>
                    <td><a class="btn btn-success" href="{{ url('update_doctor', $datas->id) }}">Update</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this')" href="{{ url('delete_doctor', $datas->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

     </div>


        <!-- partial -->
        {{-- @include('admin.body') --}}
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
