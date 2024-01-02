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
            <a href="{{route('student.index')}}" class="btn btn-info">Back</a>
        </div>
    </div>
   
    <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter name" 
                    class="form-control" value="{{ old('name') }}">
                    @if($errors->has('name'))
                         <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter email" class="form-control" value="{{old('email')}}">
                    @if($errors->has('email'))
                         <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"  >Address</label>
                    <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter address" value="{{ old('address') }}"></textarea>
                    @if($errors->has('address'))
                         <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="contact" name="contact" id="contact" placeholder="Enter contact" class="form-control" value="{{old('contact')}}">
                    @if($errors->has('contact'))
                         <p class="text-danger">{{ $errors->first('contact') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select name="city" id=""class="form-control" value="{{old('city')}}">
                        <option value="">Select</option>
                        <option value="mumbai">mumbai</option>
                        <option value="thane">thane</option>
                        <option value="pune">pune</option>

                    </select>
                    @if($errors->has('city'))
                         <p class="text-danger">{{ $errors->first('city') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="hobby" class="form-label">Hobby</label>
                    <input type="text" name="hobby" id="hobby" placeholder="Enter hobby" class="form-control" value="{{old('hobby')}}">
                    @if($errors->has('hobby'))
                         <p class="text-danger">{{ $errors->first('hobby') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                    @if($errors->has('image'))
                         <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>
                <div class="form-group mb-3">
                <label for="gender">Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="male">Male 
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="female">Female
                        </label>
                    </div>
                    <div class="radio ">
                        <label>
                            <input type="radio" name="gender" value="other">Other
                        </label>
                    </div>  
                    @if($errors->has('gender'))
                         <p class="text-danger">{{ $errors->first('gender') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" id="password" placeholder="Enter password" class="form-control" value="{{old('password')}}">
                    @if($errors->has('password'))
                         <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

            </div>
        </div>
        <button class="btn btn-primary mt-3">Save Student</button>
    </form>
    
</div>
    
</body>
</html>