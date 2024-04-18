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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    .row {
        --bs-gutter-x: 0 !important;
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

    <form action="{{ route('save-draft') }}" method="post">
        @csrf
        <section id="frontBoard">
            <div class="row">
                <div class="col-10">
                    {{-- for grade clarification --}}
                    <input type="hidden" value="1" name="grade_id">
                    <div class="row" style="height: 100vh;background-color: #172337;">
                        <div class="col-2 position-relative">
                            <div class="position-relative">
                                <img src="{{url('assets/images/triangle.png')}}" class="img-fluid"
                                    style="transform: rotate(180deg);width:100%" />
                            </div>
                            <div class="bottom-0 position-absolute" style="width: 100%;">
                                <img src="{{url('assets/images/10.png')}}" class="img-fluid" style="height: 40vh;" />
                            </div>
                        </div>
                        <div class="col-8 midSection bg-white"
                            style="height: 100vh; overflow-y: scroll;overflow-x: hidden;">
                            <div class="p-2 d-flex justify-content-between"
                                style="top:0;position: sticky;background-color: #d0d0d0;">
                                <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                                    style="width:fit-content;background-color:#172337;" onclick="backBoard()">Switch to
                                    BackBoard&nbsp;<img style="height: 20px ;"
                                        src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                                <div class="mt-2 mx-2 text-dark">
                                    <input type="hidden" name="dimensionId" value="{{ $dimension['id'] }}">
                                    Dimension : <span class="fst-italic">{{ $dimension['width'].' X
                                        '.$dimension['length'].' inches' }}</span>
                                </div>
                                <div style="margin-left: auto;">
                                    <button role="button" class="btn btn-primary position-relative rounded-pill"
                                        style="z-index: 1;left:0;background-color: #7548fe;" id="save"
                                        onclick="EquiryFrom()">
                                        <i class="fa fa-bookmark" aria-hidden="true"></i><span>&nbsp;&nbsp;Save</span>
                                    </button>
                                </div>
                            </div>

                            <select id="selectLines" class="form-select" name="lineId">
                                <option>No lines</option>
                                @foreach ($lines as $line)
                                <option value="{{ 'line'.$line['id'] }}">{{ ucwords($line['name']) }}</option>
                                @endforeach
                            </select>




                            <div class="line1 box">
                                <hr style="border-top: 3px solid black;">
                                @for ($i = 0; $i < 2; $i++)
                                <hr style="border-top: 3px dashed black;background-color: white;">
                                <hr style="border-top: 3px solid black;">
                                @endfor
                            </div>



                            <div class="line2 box">
                                <div>
                                    <hr style="border-top: 3px solid black;">
                                    <hr style="border-top: 3px solid black;">
                                </div>
                                @for ($i = 0; $i < 5; $i++) <div style="margin-top:2.5rem ;">
                                    <hr style="border-top: 3px solid black;">
                                    <hr style="border-top: 3px solid black;">
                            </div>
                            @endfor
                        </div>

                        <!-- kkl -->
                        <div class="line3 box">
                            @for ($i = 0; $i < 10; $i++) <hr style="border-top: 3px solid black;margin-top: 2rem;">
                                @endfor
                        </div>

                        <!-- javascript for selecting type of lines -->

                        <script src="https://code.jquery.com/jquery-1.12.4.min.js">
                        </script>
                        <script>
                            // jQuery functions to hide and show the div
                                $(document).ready(function () {
                                    $("#selectLines").change(function () {
                                        $(this).find("option:selected")
                                               .each(function () {
                                            var optionValue = $(this).attr("value");
                                            if (optionValue) {
                                                $(".box").not("." + optionValue).hide();
                                                $("." + optionValue).show();
                                            } else {
                                                $(".box").hide();
                                            }
                                        });
                                    }).change();
                                });
                        </script>

                        <div class="row bottom-0 position-absolute" style="width: 55.6%;">
                            @for ($i = 1; $i < 5; $i++) <div class="col">
                                <div id="{{ 'div'.$i }}"
                                    style="overflow-y: scroll;height: 173px;width:100%; border: 1px solid #a8a8a8"
                                    ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                        </div>
                        @endfor
                        {{-- <div class="col">
                            <div id="div2" style="overflow-y: scroll;height: 173px;width:100%" ondrop="drop(event)"
                                ondragover="allowDrop(event)"></div>
                        </div>
                        <div class="col">
                            <div id="div3" style="overflow-y: scroll;height: 173px;width:100%" ondrop="drop(event)"
                                ondragover="allowDrop(event)"></div>
                        </div>
                        <div class="col">
                            <div id="div4" style="overflow-y: scroll;height: 173px;width:100%" ondrop="drop(event)"
                                ondragover="allowDrop(event)"></div>
                        </div> --}}
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
                                    <img src="{{ asset('public/storage/'.$element['name'])}}" draggable="true"
                                        ondragstart="drag(event)" id="{{ $element['id'] }}"
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
                <div class="col-2">
                    <div class="">
                        <img src="{{url('assets/images/triangle.png')}}" class="img-fluid"
                            style="transform: rotate(180deg);width:100%" />
                    </div>
                    <div class="bottom-0 position-absolute">
                        <div class="" style="height: 65vh;width: 16.5vw; overflow-y: scroll;">
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
                                        <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>
                                        Subract
                                    </div>
                                    <div class="d-lg-flex text-center align-items-center mb-lg-2 mb-3">
                                        <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>Minus
                                    </div>
                                    <div class="d-lg-flex text-center align-items-center mb-lg-2 mb-3">
                                        <div class="mx-lg-3 mx-1 bg-danger" style="height: 5px;width: 80px;"></div>Take
                                        Away
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
                <div class="col-8 midSection bg-white" style="height: 100vh; overflow-y: scroll;">
                    <div class="p-2" style="top:0;position: sticky;background-color: #d0d0d0;">
                        <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                            style="width:fit-content;background-color:#172337;" onclick="backBoard()">Switch to
                            FrontBoard&nbsp;<img style="height: 20px;"
                                src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                    </div>

                    <div class="mt-2">
                        <img src="{{ url('public/storage/scales/12-inch-scale.png') }}" class="img-fluid" style="width:100%;" />
                    </div>

                    <div class="" style="height: 48vh;"></div>

                    @foreach ($back_lines as $line)
                    <div class="{{ 'back'.$line['id'] }} back-line-box mt-2">
                        <img src="{{ url('assets/images/'.$line['img_name']) }}" alt="whole-number"
                            style="width:100%;" />
                    </div>
                    @endforeach

                    <select id="selectBackLines" class="form-select" name="backLineId">
                        @foreach ($back_lines as $line)
                        <option value="{{ 'back'.$line['id'] }}">{{ $line['name'] }}</option>
                        @endforeach
                    </select>
                    <!-- javascript for selecting type of back lines -->

                    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
                    </script>
                    <script>
                        // jQuery functions to hide and show the div
                        $(document).ready(function () {
                            $("#selectBackLines").change(function () {
                                $(this).find("option:selected")
                                       .each(function () {
                                    var optionValue = $(this).attr("value");
                                    if (optionValue) {
                                        $(".back-line-box").not("." + optionValue).hide();
                                        $("." + optionValue).show();
                                    } else {
                                        $(".back-line-box").hide();
                                    }
                                });
                            }).change();
                        });
                    </script>

                    <div class="bg-dark" style="bottom: 0;position:sticky;width: 100%; height: 120px;">

                    </div>
                </div>

                <div class="col-2">
                    <div class="">
                        <img src="{{url('assets/images/triangle.png')}}" class="img-fluid position-absolute"
                            style="transform: rotate(270deg);" />
                    </div>
                    <div id="" class="bottom-0 position-absolute">
                        <div class="row" style="height: 65vh; overflow-y: scroll;">
                            <div class="justify-content-center d-flex">
                                <div class="text-center">
                                    <div class="fa fa-plus fa-4x" style="color: rgb(12, 241, 12);"></div>
                                    <div class="text-white mt-3" style="font-weight: 500; font-size: 27px;">Addition
                                    </div>
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
    </form>
</body>

{{-- JQuery CDN --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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