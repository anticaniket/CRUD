<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container ">
    <div class="d-flex justify-content-between py-3">
        <div class="h5">Students</div>
        <div class="">
            <a href="{{route('student.create')}}" class="btn btn-info">Create</a>
        </div>
    </div>

   
      @if(Session::has('success'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
      @endif


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>City</th>
                <th>Hobby</th>
                <th>Image</th>
                <th>Gender</th>
                <th>Password</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr valign="middle">
            <td>{{ $student->id}}</td>
            <td>{{ $student->name}}</td>
            <td>{{ $student->email}}</td>
            <td>{{ $student->address}}</td>
            <td>{{ $student->contact}}</td>
            <td>{{ $student->city}}</td>
            <td>{{ $student->hobby}}</td>
            <td>
              @if($student->image != '' && file_exists(public_path().'/uploads/student/'.
              $student->image))
              <img src="{{ url('uploads/student/'.$student->image)}}" alt="" srcset="" width="50"
              height="50" class="rounded-circle">
              @else
              @endif
            </td>
            <td>{{ $student->gender}}</td>
            <td>{{ $student->password}}</td>
            <td class="my-3 ">
              <!-- <a href="{{url('/edit')}}/{{$student->id}}" class="btn btn-primary btn-sm ">Edit</a>   url method -->
              <a href="{{ route('student.edit',$student->id) }}" class="btn btn-primary btn-sm my-3 ">Edit</a>

              <a href="{{ route('student.destroy',$student->id) }}" class="btn btn-danger btn-sm ">Delete</a>


            </td>
          </tr>
          @endforeach
        </tbody>
      
    </table>

    <div class="mt-3">
      {{ $students->links('pagination::bootstrap-4') }}
    </div>
</div>


    
</body>
</html>