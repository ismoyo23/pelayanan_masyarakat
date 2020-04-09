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
    <link href="{{ url('tema_utama/theme/bootstrap/select2/select2.css') }}" rel="stylesheet" />
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="theme/bootstrap//font-awesome/css/font-awesome.min.css">
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
            width: 400px;
        }

        .mt-12 {
            margin-top: 40px;
        }

        @media(max-width: 768px) {
            .mt-12 {
                margin-left: 57px;
            }

            .p-0 {
                position: absolute;
            }
        }
    </style>


    <div>
        <div class="row justify-content-md-center mt-12" style="margin-top: 120px;">
            <div style="box-shadow: 0 1px 1px rgba(0,0,0,0,0.4);" class="col-xs-8">
                <div class="row">
                    <div class="col-xs-6 p-0">
                        <img height="486px;" width="500px;" src="{{ url('tema_utama/theme/image/service.jpg') }}" alt="img-fluid">
                    </div>
                    <div class="col-xs-6">
                        <div class="card">
                            <div class="card-header">
                                <h4> <span class="fa fa-fw fa-user"></span> Register User</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ url('/proses_register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                         autocomplete="off" placeholder="Masukkan Nik" value="{{ old('nik') }}">
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input autocomplete="off" name="nama" type="text" class="form-control @error('nama') is-invalid      @enderror" placeholder="Nama" value="{{ old('nama') }}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                                            aria-describedby="Username" autocomplete="off" placeholder="Username" value="{{ old('username') }}">
                                    
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <input autocomplete="off" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">

                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                     </div>

                                    <div class="form-group">
                                        <input autocomplete="off" name="telp" type="text" class="form-control @error('telp') is-invalid @enderror" 
                                            placeholder="Masukkan Nomor Hp" value="{{ old('telp') }}">

                                        @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <p style="margin-top: 9px;">Sudah punya akun? <a href="{{ url('/login') }}">login</a></p>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
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
<script src="{{ url('tema_utama/theme/bootstrap/select2/select2.js') }}"></script>
<script>

$(function(){
    $('.select2').select2();
})

</script>

</html>