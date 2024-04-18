<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>White Board</title>
    <link rel="icon" href="" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    .details {
        opacity: 1;
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 100%;
        transition: all 0.4s ease 0s;
        background: #023b7ae6;
    }

    .gradeCard {
        box-shadow: 0px 0px 4px 2px silver;
        transition: all 0.5s ease 0s;
    }

    .gradeCard:hover .details {
        bottom: 0;
    }

    .gradeCard:hover {
        bottom: 0;
        background: #023b7ae6;
    }

    .gradeCard:hover .tagline {
        color: white !important;
    }
</style>

<body style="background-color: #eee;">
    <!-- <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="container row px-5 pb-5 bg-white" style="box-shadow: 0px 0px 2px 1px silver;width: 100%;">
            <div class="text-center py-4" style="font-size: 30px;">Select Grade</div>
            <div class="col-lg-4 col-md-4 col-sm-12 gradeCard position-relative">
                <div class="details">
                    <a href="./Home.html" class="text-decoration-none">
                        <div class="justify-content-center p-5 align-items-center d-flex"
                            style="height: 300px;box-shadow: 0px 0px 2px 1px silver;cursor: pointer;">
                            <div class="text-center tagline" style="font-weight: 500;font-size:17px;color: black;">Pre-k & kindergarten board
                                preview
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="./Home.html" class="text-decoration-none">
                    <div class="justify-content-center p-5 align-items-center d-flex"
                        style="height: 300px;box-shadow: 0px 0px 2px 1px silver;cursor: pointer;border: 2px solid #023b7ae6;background-color: #023b7ae6;">
                        <div class="text-center text-white" style="font-weight: 500;font-size:17px">1st & 2nd Grade
                            board
                            preview</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 gradeCard position-relative">
                <div class="details">
                    <a href="./Home.html" class="text-decoration-none">
                        <div class="justify-content-center p-5 align-items-center d-flex"
                            style="height: 300px;box-shadow: 0px 0px 2px 1px silver;cursor: pointer;">
                            <div class="text-center tagline" style="font-weight: 500;font-size:17px;color: black;">3rd & 4th Grade board
                                preview
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container d-flex align-items-center justify-content-center my-lg-5 my-md-5" style="height: 100%">
        <div class="row bg-white px-5 pb-5" style="box-shadow: 0px 0px 2px 1px silver;">
            <div class="text-center py-4" style="font-size: 30px;">Select Grade</div>
            <div class="col-lg-4 mb-lg-0 mb-4 col-md-6 col-12">
                <div class="gradeCard">
                    <a href="./Home.html" class="text-decoration-none">
                        <div class="justify-content-center p-5 align-items-center d-flex"
                            style="height: 300px;box-shadow: 0px 0px 2px 1px silver;cursor: pointer;">
                            <div class="text-center tagline" style="font-weight: 500;font-size:17px;color: black;">
                                Pre-k & kindergarten board
                                preview
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-lg-4 mb-lg-0 mb-4 col-md-6 col-12">
                <div class="gradeCard">
                    <a href="./Home.html" class="text-decoration-none">
                        <div class="justify-content-center p-5 align-items-center d-flex"
                            style="height: 300px;box-shadow: 0px 0px 2px 1px silver;cursor: pointer;">
                            <div class="text-center tagline" style="font-weight: 500;font-size:17px;color: black;">
                                1st & 2nd Grade
                                board
                                preview
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mx-md-auto">
                <div class="gradeCard">
                    <a href="./Home.html" class="text-decoration-none">
                        <div class="justify-content-center p-5 align-items-center d-flex"
                            style="height: 300px;box-shadow: 0px 0px 2px 1px silver;cursor: pointer;">
                            <div class="text-center tagline" style="font-weight: 500;font-size:17px;color: black;">
                                3rd & 4th Grade board
                                preview
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>