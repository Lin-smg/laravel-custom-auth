<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/dist/css/bootstrap.min.css') }}">
    <title>Register</title>
</head>
<body>

<div class="container">
    <div class="row" style="margin-top: 45px;">
        <div class="col-md-4 col-md-offset-4">
            <h1>Login</h1>
            <form action="{{route('registerUser')}}" method="post">

                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{old('name')}}">
                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>

                <button type="submit" class="btn btn-block btn-primary">Register</button>
                <br>
                <a href="{{route('login')}}">I have already an account, login</a>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>