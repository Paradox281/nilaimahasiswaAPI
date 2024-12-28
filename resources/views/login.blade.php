<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Aplikasi Nilai Siswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <center>
                <img src="/img/tutwurihandayani.png" width="140px">
            </center>
            <h2 class="text-center"><b>ANISA</b><br>Aplikasi Nilai Siswa</h3>
            <hr>
            @if(session('error'))
                {!!session('error')!!}
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <!-- <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div> -->
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Log In</button>
                <hr>
                <p class="text-center">Copyright &copy <?php echo date('Y') ?> | ANISA - Aplikasi Nilai Siswa</p>
            </form>
        </div>
    </div>
</body>
</html>