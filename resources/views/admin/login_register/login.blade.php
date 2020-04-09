<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="{{ url('tema_utama/theme/bootstrap/font-awesome/css/font-awesome.min.css') }}">
    <title>Login</title>
</head>

<body>

    <style>
        body {
            background: #f7f7f7;
        }

        .card {
            border: 0;
            border-radius: 0;
        }

        .card>.card-header {
            background: transparent;
            border: 0;
            border-bottom: 1px solid #eee;
        }

        .form-controll {
            border-radius: 0;
        }

        .card-body {
            width: 300px;
        }

        .mt-12 {
            margin-top: 120px;
        }

        @media(max-width: 768px) {
            .mt-12 {
                margin-left: 128px;
            }

            .p-0 {
                position: absolute;
            }
        }
    </style>


    <div>
        <div class="row justify-content-md-center mt-12">
            <div style="box-shadow: 0 1px 1px rgba(0,0,0,0,0.4);" class="col-xs-8">
                <div class="row">
                    <div class="col-xs-6 p-0 hidden-android from-login">
                        <img height="389px;" width="500px;" src="{{ url('tema_utama/theme/image/service center.png') }}" alt="img-fluid">
                    </div>
                    <div class="col-xs-6">
                        <div class="card" style="height:402px;">
                            <div class="card-header">
                                <h4> <span class="fa fa-fw fa-user"></span> Login Admin</h4>
                            </div>

                            @if(session('lost-password'))
                                <div class="alert alert-danger">Password Salah</div>
                            @endif
                            <?php if (session('logout-berhasil')): ?>
                                <div class="alert alert-success">Logout Berhasil</div>
                            <?php endif ?>

                            @if(session('register-success'))
                            <div class="alert alert-success">Akun Terdaftar</div>
                            @endif

                            @if(session('no-akun'))
                            <div class="alert alert-danger">Akun belum terdaftar</div>
                            @endif

                            <div class="card-body" style="margin-top: -19px;">
                                <form method="post" action="{{ url('/admin/proses_login') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Usename</label>
                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" value="{{ old('username') }}">
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <p>Silahkan login !</p>
                                    <button type="submit" class="btn btn-primary">Masuk ></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<script type="text/javascript" src="{{ url('tema_utama/theme/jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('tema_utama/theme/bootstrap/js/bootstrap.js') }}"></script>

</html>