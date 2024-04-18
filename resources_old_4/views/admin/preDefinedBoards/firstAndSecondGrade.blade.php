<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>White Board</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{url('assets/styles/style.css')}}">
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

    body {
        overflow-y: hidden;
    }
</style>
<script>
    const backBoard = () => {
        var x = document.getElementById('frontBoard');
        var y = document.getElementById('backBoard');

        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none"
            y.style.display = "block"
        }
    }


</script>

<body>

    <section id="frontBoard">
        <div class="row">
            <div class="col-12">
                <div class="row" style="height: 100vh;background-color: #172337;">
                    <div class="col-2 position-relative">
                        <div class="position-relative">
                            <img src="{{ url('assets/images/triangle.png') }}" class="img-fluid"
                                style="transform: rotate(180deg);width:100%" />
                            {{-- <div class="btn btn-primary position-absolute m-lg-4 m-2 px-lg-3"
                                style="z-index: 1;left:0;background-color: #7548fe;" id="save" onclick="EquiryFrom()">
                                <span class="fa fa-save"></span>&nbsp;&nbsp;Save</div> --}}
                        </div>
                        <div class="bottom-0 position-absolute" style="width: 100%;">
                            <img src="{{ url('assets/images/10.png') }}" class="img-fluid" style="height: 40vh;" />
                        </div>
                    </div>
                    <div class="col-8 midSection bg-white"
                        style="height: 100vh; overflow-x: hidden;">
                        <div class="p-2 d-flex" style="top:0;position: sticky;background-color: #d0d0d0;">
                            <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                                style="width:fit-content;background-color:#172337 ;" onclick="backBoard()">Switch to
                                BackBoard&nbsp;<img style="height: 20px ;"
                                    src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                                    {{-- <div style="margin-left:auto ;" class="btn btn-primary rounded-pill text-white px-3 d-flex align-items-center"
                            style="z-index: 1;left:0;background-color: #7548fe;" id="sendEnquiryBtn">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;&nbsp;Send Enquiry <input type="hidden" name="gradeId" value="2"> </div> --}}
                        </div>

                        <div>
                            @for ($i = 0; $i < 2; $i++)
                            @if ($i == 0)
                            <div>
                                <hr style="border-top: 3px solid black;">
                                <hr style="border-top: 2px dashed black;background-color: white;">
                                <hr style="border-top: 3px solid black;">
                            </div>
                            @else
                            <div>
                                <hr style="border-top: 2px dashed black;background-color: white;">
                                <hr style="border-top: 3px solid black;">
                            </div>
                            @endif
                            @endfor
                        </div>

                        <div class="row bottom-0 position-absolute" style="width: 66.6%;">
                            <div class="col">
                                <img src="{{ url('assets/images/1st & 2nd/6.png') }}" class="img-fluid "
                                style=" width:100%;; height: 182px" />
                            </div>
                            <div class="col">
                                <img src="{{ url('assets/images/1st & 2nd/8.png') }}" class="img-fluid "
                                style=" width:100%; height: 182px" />
                            </div>
                            <div class="col">
                                <img src="{{ url('assets/images/1st & 2nd/16.png') }}" class="img-fluid "
                                style=" width:100%; height: 182px" />
                            </div>
                            <div class="col">
                                <img src="{{ url('assets/images/1st & 2nd/21.png') }}" class="img-fluid "
                                style=" width:100%; height: 182px" />
                            </div>
                        </div>
                    </div>
                    <div class="col-2 position-relative">
                        <div class="">
                            <img src="{{ url('assets/images/triangle.png') }}" class="img-fluid "
                                style="transform: rotate(270deg);width:100%;" />
                        </div>
                        <div class="bottom-0 position-absolute" style="width: 100%;">
                            <img src="{{ url('assets/images/9.png') }}" class="img-fluid" style="height: 40vh;" />
                        </div>
                    </div>
                </div>
            </div>
             {{-- <div class="col-2">
                <div class="bottom-0 position-absolute">
                    <div class="" style="height: 100vh;width: 16.5vw; ">
                        <div class="row">
                            <div class="col-12 p-1" style="cursor: move;">
                                <div id="" ondrop="drop(event)" ondragover="allowDrop(event)">
                                    <img src="../Images/kindergarten/1.png" draggable="true" ondragstart="drag(event)"
                                        id="drag2" style="height: 100%;width:100%">
                                </div>
                            </div>
                            <div class="col-12 p-1" style="cursor: move;">
                                <div id="" ondrop="drop(event)" ondragover="allowDrop(event)">
                                    <img src="../Images/kindergarten/14.png" draggable="true" ondragstart="drag(event)"
                                        id="drag3" style="height: 100%;width:100%">
                                </div>
                            </div>
                            <div class="col-12 p-1" style="cursor: move;">
                                <div id="" ondrop="drop(event)" ondragover="allowDrop(event)">
                                    <img src="../Images/kindergarten/2.png" draggable="true" ondragstart="drag(event)"
                                        id="drag4" style="height: 100%;width:100%">
                                </div>
                            </div>
                            <div class="col-12 p-1" style="cursor: move;">
                                <div id="" ondrop="drop(event)" ondragover="allowDrop(event)">
                                    <img src="../Images/kindergarten/3.png" draggable="true" ondragstart="drag(event)"
                                        id="drag5" style="height: 100%;width:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    <section id="backBoard" style="display:none;">
        <div class="row" style="height: 100vh;background-color: #172337;">
            <div class="col-2">
                <div class="">
                    <img src="{{ url('assets/images/triangle.png') }}" class="img-fluid" style="transform: rotate(180deg);width:100%" />
                </div>
                <div class="bottom-0 position-absolute">
                    <div class="" style="height: 65vh;width: 16.5vw; ">
                        <div class="justify-content-center d-flex">
                            <div>
                                <div class="py-2 mx-5 bg-danger"></div>
                                <div class="text-white mt-3" style="font-weight: 500; font-size: 27px;">Substraction
                                </div>
                            </div>
                        </div>

                        <div class="justify-content-center d-flex text-white" style="margin-top: 150px;">
                            <div class="">
                                <div class="d-lg-flex text-center align-items-center mb-lg-2 mb-3">
                                    <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>Subract
                                </div>
                                <div class="d-lg-flex text-center align-items-center mb-lg-2 mb-3">
                                    <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>Minus
                                </div>
                                <div class="d-lg-flex text-center align-items-center mb-lg-2 mb-3">
                                    <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>Take Away
                                </div>
                                <div class="d-lg-flex text-center align-items-center mb-lg-2 mb-3">
                                    <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>>Less
                                    Than
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 midSection bg-white" style="height: 100vh; ">
                <div class="p-2" style="top:0;position: sticky;background-color: #d0d0d0;">
                    <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                        style="width:fit-content;background-color:#172337;" onclick="backBoard()">Switch to
                        FrontBoard&nbsp;<img style="height: 20px;"
                            src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                </div>
                <div class="mt-2">
                    <img src="{{ url('public/storage/scales/12-inch-scale.png') }}" class="img-fluid" style="width:100%;" />
                </div>

                <div class="" style="height: 55vh;"></div>
                <div class="mt-2">
                    <img src="{{ url('public/storage/scales/scale.jpeg') }}" class="img-fluid" style="width:100%;" />
                </div>
                <div class="bg-dark" style="bottom: 0;position:sticky;width: 100%; height: 120px;">

                </div>
            </div>
            <div class="col-2">
                <div class="">
                    <img src="{{ url('assets/images/triangle.png') }}" class="img-fluid position-relative"
                        style="transform: rotate(270deg);" />
                </div>
                <div id="" class="bottom-0 position-absolute">
                    <div class="row" style="height: 65vh; ">
                        <div class="justify-content-center d-flex">
                            <div class="text-center">
                                <div class="fa fa-plus fa-4x" style="color: rgb(12, 241, 12);"></div>
                                <div class="text-white mt-3" style="font-weight: 500; font-size: 27px;">Addition</div>
                            </div>
                        </div>
                        <div class="my-4 text-white justify-content-center d-flex">
                            <div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="fa fa-plus fa-lg px-2" style="color: rgb(12, 241, 12);"></div>Add
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="fa fa-plus fa-lg px-2" style="color: rgb(12, 241, 12);"></div>Plus
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="fa fa-plus fa-lg px-2" style="color: rgb(12, 241, 12);"></div>All
                                    Together
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="fa fa-plus fa-lg px-2" style="color: rgb(12, 241, 12);"></div>
                                    < Greater Than </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

<script src="{{ asset('public/js/sendEnquiry.js') }}"></script>

</html>