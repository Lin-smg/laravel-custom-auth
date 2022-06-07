<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row justify-content-between">
            <div class="col-md-4 ">
            <span>{{$userInfo['name']}}</span>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <a href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
    
</body>
</html>