<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>White Board</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{url('assets/styles/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .row {
        --bs-gutter-x: 0 !important;
    }

    @media(max-width:990px) {
        .row {
            width: 100% !important;
        }
    }

    @media(max-width:575px) {
        .loginDetails {
            width: 100% !important;
        }
    }
</style>

<body style="background-color: #eee;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row bg-white m-lg-0 m-3 my-5"
            style="border-radius: 10px;box-shadow: 0px 0px 2px 1px silver;width: 60vw;">
            <div class="col-6 p-lg-5 p-md-5 p-4 loginDetails">
                <div class="justify-content-center d-flex align-items-center" style="height: 100%;">
                    <div>
                        <div class="" style="font-size: 25px;font-weight:bold">Log In</div>
                        <div style="text-align: justify;color: #999999;font-weight: 600;">Welcome to something please
                            put your login creditentials below to
                            start using the service</div>
                        
                            @if (isset($error))
                                <p class="mb-0" style="color: red;">{{ $error }}</p>
                            @endif
                            @if (session()->has('success'))
                                <p class="mb-0" class="text-success">{{ session('success') }}</p>
                            @endif

                        <form class="mt-3" method="post" action="{{ route('user-login-post') }}">
                            @csrf
                            <label style="font-weight: 500;">E-mail:</label>
                            <input type="email" class="form-control mt-1" name="email" placeholder="Enter Email" required />

                            <label class="mt-3" style="font-weight: 500;">Password:</label>
                            <input type="password" class="form-control mt-1" name="password" placeholder="Enter Password" required />

                            <a href="{{ route('forgot-password') }}" class="justify-content-end d-flex mt-1 text-decoration-none"
                                style="margin-left: auto;font-weight: 500;">Forgot Password?</a>
                            <hr>
                            <button class="btn btn-primary mt-2 shadow-sm"
                                style="background-color: #7548FE;border: 1px solid #7548FE;">Log In</button>
                        </form>
                        <div class="mt-4 text-center" style="font-weight: 500;">Don’t have an account ? <span><a
                                    href="{{ route('user-signup') }}" class="text-decoration-none">Sign
                                    up</a></span></div>
                    </div>
                </div>
            </div>
            <div class="col-6 d-lg-block d-md-block d-sm-block d-none">
                <img src="{{url('assets/images/loginImg.jpg')}}" class="img-fluid"
                    style="height: 100%;width: 100%;border-radius:0px 10px 10px 0px;" />
            </div>
        </div>
    </div>
</body>

</html>