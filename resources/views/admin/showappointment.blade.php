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
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Massege</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointmentdata as $datas)
                <tr style="color: white">
                    <td>{{ $datas->name }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>{{ $datas->phone }}</td>
                    <td>{{ $datas->doctor }}</td>
                    <td>{{ $datas->date }}</td>
                    <td>{{ $datas->message }}</td>
                    <td>{{ $datas->status }}</td>
                </tr>
                <tr>
                    <td><a class="btn btn-success" href="{{ url('approved', $datas->id) }}">Approve</a></td>
                    <td><a class="btn btn-danger" href="{{ url('canceled', $datas->id) }}">Cancel</a></td>
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
