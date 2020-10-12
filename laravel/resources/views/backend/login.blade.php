<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{--  Bootstrap core CSS  --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-6">
                <div class="login-box">
                    <form method="POST" action="{{route('login')}}">
                        {{csrf_field()}}
                        <h3 class="mb-3">後台登入</h3>
                        <hr>
                        <div class="form-group row">
                            <label for="username" class="col-sm-12 col-from-label">帳號</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-12 col-from-label">密碼</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary col-sm-12 mt-3">登入</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>