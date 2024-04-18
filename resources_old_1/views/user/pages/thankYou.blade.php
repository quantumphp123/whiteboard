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
    body {
        background: url('../Images/thankyou.jpeg') no-repeat;
        background-size: cover;
        height: 100vh;
        background-attachment: fixed;
    }

    .btn-transparent:hover {
        background-color: #7548FE !important;
        border: 2px solid #7548FE !important;
    }
</style>

<body>
    <section class="justify-content-center d-flex align-items-center"
        style="background-color: rgb(0,0,0,0.8);min-height: 100vh;">
        <div class="text-center text-white container">
            <div class="" style="font-size: 80px;font-weight: 500;font-family: 'Times New Roman', Times, serif;">Thank
                You!</div>
            <div class="" style="font-size: 20px;">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has
                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                type and scrambled it to make a type specimen book.</div>
            <a href="{{ route('user-dashboard') }}">
                <div class="btn btn-transparent my-5"
                    style="border: 2px solid white;transition: 0.5s;color: white;font-weight: 500;border-radius: 50px;padding: 10px 50px;">
                    Back to Dashboard</div>
            </a>
        </div>
    </section>
</body>

</html>