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
                {{-- @if (session()->has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>

                @endif --}}
                <form action="{{ url('update_doctor', $updatedata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Doctor Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="{{ $updatedata->name }}" required>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $updatedata->email }}" required>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" aria-describedby="phoneHelp" value="{{ $updatedata->phone }}" required>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="speciality" class="form-label" style="margin-right: 2px">Speciality</label>
                        <select class="form-select" name="speciality" aria-label="Default select example">
                            <option selected>{{ $updatedata->speciality }}</option>
                            <option value="skin">Skin</option>
                            <option value="medicine">Medicine</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>
                            <option value="therapy">Therapy</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="room" class="form-label">Room Number</label>
                        <input type="text" class="form-control" name="room" id="room" aria-describedby="roomHelp" value="{{ $updatedata->room }}" required>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Old Image</label>
                        <img src="doctorimage/{{ $updatedata->image }}" alt="" height="100px" width="100px">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Image</label>
                        <input class="form-control" type="file" name="file" id="file">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
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
