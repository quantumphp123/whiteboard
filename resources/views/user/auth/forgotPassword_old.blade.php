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
                        <div class="hide" style="font-size: 25px;font-weight:bold">Forgot Password</div>
                        <div class="hide" style="text-align: justify;color: #999999;font-weight: 600;">Please Enter Your Email.<br>We Will Send a Link to Reset Your Password</div>
                        
                            @if (session()->has('success'))
                                <span class="text-success"><strong>{{ session('success') }}</strong></span>
                            @endif

                        <form class="mt-3 hide" method="post" action="{{ route('reset-password-link') }}">
                            @csrf
                            <label style="font-weight: 500;">E-mail:</label>
                            <input type="email" class="form-control mt-1" name="email" placeholder="Enter Email" required />
                            @error('email')
                                <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                            @enderror
                            <a href="{{ route('user-login') }}" class="justify-content-end d-flex mt-1 text-decoration-none"
                                style="margin-left: auto;font-weight: 500;">Login</a>
                            <hr>
                            <button class="btn btn-primary mt-2 shadow-sm"
                                style="background-color: #7548FE;border: 1px solid #7548FE;">Send Password Reset Link</button>
                        </form>
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

{{-- jquery cdn --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    if ("{{ session()->has('success') }}") {
        $('.hide').hide()
    }
</script>
</html>