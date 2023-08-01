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
               <div class="card">
  <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room Number</th>
                <th scope="col">Room Category</th>
                <th scope="col">Availability</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data1 as $datas)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $datas->room_number }}</td>
                    <td>{{ $datas->category }}</td>
                    <td>{{ $datas->availability }}</td>
                    <td><a class="btn btn-primary" href="{{ url("reserve", $datas->id) }}">Book Now</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
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
