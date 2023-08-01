<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                <th scope="col">Doctor Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Speciality</th>
                <th scope="col">Room</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctor as $datas)
                <tr style="color: white">
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->phone }}</td>
                    <td>{{ $datas->speciality }}</td>
                    <td>{{ $datas->room }}</td>
                    <td><img src="doctorimage/{{ $datas->image }}" alt="" height="200px" width="200px"></td>
                </tr>
                <tr>
                    <td><a class="btn btn-success" href="{{ url('updatedoctor', $datas->id)}}">Update</a></td>
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
