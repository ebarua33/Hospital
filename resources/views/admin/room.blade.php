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
                <th scope="col">Room Category</th>
                <th scope="col">Room Type</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>General</td>
                <td>Ac</td>
                <td><a class="btn btn-success" href="{{ url('generalac') }}">see more</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>General</td>
                <td>Non Ac</td>
                <td><a class="btn btn-success" href="{{ url('generalnonac') }}">see more</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Private</td>
                <td>Ac</td>
                <td><a class="btn btn-success" href="{{ url('privateac') }}">see more</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Private</td>
                <td>Non Ac</td>
                <td><a class="btn btn-success" href="{{ url('privatenonac') }}">see more</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>VIP</td>
                <td>Ac</td>
                <td><a class="btn btn-success" href="{{ url('vip') }}">see more</a></td>
            </tr>
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
