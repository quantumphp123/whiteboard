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
</style>

<script>
    function backBoard() {
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
            <div class="col-10">
                <div class="row" style="height: 100vh;background-color: #172337;">
                    <div class="col-2 position-relative">
                        <div class="position-relative">
                            <img src="{{url('assets/images/triangle.png')}}" class="img-fluid"
                                style="transform: rotate(180deg);width:100%" />
                               <a href="{{ route('save-draft', '4') }}"> <div class="btn btn-primary position-absolute m-lg-4 m-2 px-lg-3"
                                    style="z-index: 1;left:0;background-color: #7548fe;"><span class="fa fa-save"></span>&nbsp;&nbsp;Save</div></a>
                        </div>
                        <div class="bottom-0 position-absolute" style="width: 100%;">
                            <img src="{{url('assets/images/10.png')}}" class="img-fluid" style="height: 40vh;" />
                        </div>
                    </div>
                    <div class="col-8 midSection bg-white"
                        style="height: 100vh; overflow-y: scroll;overflow-x: hidden;">
                        <div class="p-2 d-flex" style="top:0;position: sticky;background-color: #d0d0d0;">
                            <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                                style="width:fit-content;background-color:#172337;" onclick="backBoard()">Switch to
                                BackBoard&nbsp;<img style="height: 20px ;"
                                    src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                        </div>

                        <div class="row bottom-0 position-absolute" style="width: 55.6%;">
                            <div class="col">
                                <div id="div1" style="overflow-y: scroll;height: 150px;width:100%" ondrop="drop(event)"
                                    ondragover="allowDrop(event)"></div>
                            </div>
                            <div class="col">
                                <div id="div2" style="overflow-y: scroll;height: 150px;width:100%" ondrop="drop(event)"
                                    ondragover="allowDrop(event)"></div>
                            </div>
                            <div class="col">
                                <div id="div3" style="overflow-y: scroll;height: 150px;width:100%" ondrop="drop(event)"
                                    ondragover="allowDrop(event)"></div>
                            </div>
                            <div class="col">
                                <div id="div4" style="overflow-y: scroll;height: 150px;width:100%" ondrop="drop(event)"
                                    ondragover="allowDrop(event)"></div>
                            </div>
                        </div>


                    </div>
                    <div class="col-2 position-relative">
                        <div class="">
                            <img src="{{url('assets/images/triangle.png')}}" class="img-fluid "
                                style="transform: rotate(270deg);width:100%" />
                        </div>
                        <div class="bottom-0 position-absolute" style="width: 100%;">
                            <img src="{{url('assets/images/9.png')}}" class="img-fluid" style="height: 40vh;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="bottom-0 position-absolute">
                    <div class="" style="height: 100vh;width: 16.5vw; overflow-y: scroll;">
                        <div class="row">
                            <div class="col-12 p-1" style="cursor: move;">
                                @foreach ($elements as $element)
                                    <div id="" ondrop="drop(event)" ondragover="allowDrop(event)">
                                        <img src="{{ asset('public/storage/'.$element['name'])}}" draggable="true" ondragstart="drag(event)" id="{{ $element['id'] }}"
                                            style="height: 100%;width:100%">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="backBoard" style="display:none;">
        <div class="row" style="height: 100vh;background-color: #172337;">
            <div class="col-2 position-relative">
                <div class="position-relative">
                    <img src="{{url('assets/images/triangle.png')}}" class="img-fluid"
                        style="transform: rotate(180deg);width:100%" />
                       <a href="{{ route('save-draft', '4') }}"> <div class="btn btn-primary position-absolute m-lg-4 m-2 px-lg-3"
                            style="z-index: 1;left:0;background-color: #7548fe;"><span class="fa fa-save"></span>&nbsp;&nbsp;Save</div></a>
                </div>
                <div class="bottom-0 position-absolute" style="width: 100%;">
                    <img src="{{url('assets/images/5th & 6th/45.png')}}" class="img-fluid" style="height: 40vh;" />
                </div>
            </div>
            <div class="col-8 midSection bg-white" style="height: 100vh; overflow-y: scroll;">
                <div class="p-2" style="top:0;position: sticky;background-color: #d0d0d0;">
                    <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                        style="width:fit-content;background-color:#172337;" onclick="backBoard()">Switch to
                        FrontBoard&nbsp;<img style="height: 20px;"
                            src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                </div>
                <div class="" style="height: 100vh;"></div>
                <div class="bg-dark" style="bottom: 0;position:sticky;width: 100%; height: 120px;">

                </div>
            </div>
            <div class="col-2 position-relative">
                <div class="">
                    <img src="{{url('assets/images/triangle.png')}}" class="img-fluid "
                        style="transform: rotate(270deg);width:100%" />
                </div>
                <div class="bottom-0 position-absolute" style="width: 100%;">
                    <img src="{{url('assets/images/5th & 6th/35.png')}}" class="img-fluid" style="height: 40vh;" />
                </div>
            </div>
    </section>
</body>

{{-- JQuery CDN --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    function getUrl() {
        return "{{ route('save-element') }}";
    }
    function getCsrfToken() {
        return "{{ csrf_token() }}";
    }
</script>
{{-- Drag and Drop js --}}
<script src="{{ asset('public/js/index.js') }}"></script>

</html>