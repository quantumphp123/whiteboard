<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>White Board</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{url('assets/styles/styles.css')}}">
    <link rel="stylesheet" href="{{url('assets/user/vendors/fontawesome-pro-5/css/all.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        $(document).ready(function () {
            $('#sidebarCollapse1').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // const sendEnquiry1 = () => {
        //     document.getElementById("next").style.display = "block";
        //     document.getElementById("enquiry").style.display = "none";
        // }
        // const sendEnquiry = () => {
        //     document.getElementById("next").style.display = "none";
        //     document.getElementById("enquiry").style.display = "block";
        // }

    </script>
    <style>
        /* #content {
            overflow: scroll;
        } */
        #content::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        #content::-webkit-scrollbar-track {
            background: #fff;
            border-left: 1px solid rgb(48, 48, 48);
        }

        .scrollbar::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        .scrollbar::-webkit-scrollbar-track {
            background: #076DA8;
        }

        .scrollbar::-webkit-scrollbar-thumb {
            background: white;
            border-radius: 0px;
        }

        .nav-tabs {
            font-size: 16px !important;
        }

        .select {
            opacity: 0;
        }

        .grade,
        .select {
            transition: 0.5s;
        }

        .grade:hover {
            z-index: 1;
        }

        .grade:hover .select {
            border-radius: 8px;
            opacity: 1;
            background-color: rgb(0, 0, 0, 0.6);
        }

        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(1.7);
            cursor: grab;
        }

        @media(max-width:450px) {

            .userProfile,
            .fa-question-circle-o {
                display: none;
            }
        }

        .tab {
            border-radius: 10px;
            color: #fff;
        }

        .tab img {
            filter: invert(100%);
        }

        .tab.active {
            background-color: #eee;
            color: rgb(7, 109, 168);
        }

        .tab.active img {
            filter: invert(0);
        }

        .hide {
            display: none;
        }
        .sidebar-menu-item:hover {
            color: #fff;
        }
    </style>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="position-relative" style="box-shadow:1px 0px 2px 1px silver" style="z-index: 999;">
            <div class="sidebar-header d-flex align-items-center" style="box-shadow:0px 0px 2px 1px silver">
                <img src="{{url('assets/images/logo-4.png')}}" id="logo" class="img-fluid p-4" />
                <div id="close" style="display: none;">
                    <div class="position-relative d-flex align-items-center">
                        <div class="position-absolute px-2 pb-2" style="font-size: 48px;width: 100%;cursor: pointer;"
                            id="sidebarCollapse1">&times;</div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs list-unstyled px-3 py-5 scrollbar"
                style="color:black;font-weight: 500;border-bottom: none;font-size: 20px; background-color: rgb(7,109,168);height:90vh;overflow:scroll;">
                <li class="active py-2" style="width: 100%;">
                    <a class="active p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" id="home-href" type="button"
                        href="{{ route('user-dashboard') }}">
                        <img src="{{url('assets/images/home.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />Home
                </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a class="p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" id="customize" type="button"
                        href="{{ route('show-custom-board') }}">
                        <img src="{{url('assets/images/customBoards.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />Custom Your Board
                </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <div id="my-draft-btn" class="p-3 tab align-items-center d-flex" type="button" data-bs-toggle="tab"
                        href="#drafts">
                        <img src="{{url('assets/images/account_box.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />My Drafts
                </div>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a id="50ReasonsBtn" class="p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" type="button" href="{{ route('show-50-reasons') }}">
                        <img src="{{url('assets/images/reasonable.png')}}" class="img-fluid"
                            style="padding-right: 20px; width: 42px" />50 Reasons
                    </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a id="eBookBtn" class="p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" type="button" href="{{ route('show-e-book') }}">
                        <img src="{{url('assets/images/contacts.png')}}" class="img-fluid"
                            style="padding-right: 20px;width: 44px;" />E Book
                    </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a id="paymentBtn" class="p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" type="button" href="{{ route('show-payment') }}">
                        <img src="{{url('assets/images/contacts.png')}}" class="img-fluid"
                            style="padding-right: 20px;width: 44px;" />Payment
                    </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a id="aboutUsBtn" class="p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" type="button" href="{{ route('show-about-us') }}">
                        <img src="{{url('assets/images/about.png')}}" class="img-fluid"
                            style="padding-right: 20px;width: 44px;" />About Us
                    </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a id="contactUsBtn" class="p-3 tab align-items-center d-flex text-decoration-none sidebar-menu-item" type="button" href="{{ url('user-show-contact-us') }}">
                        <img src="{{url('assets/images/contacts.png')}}" class="img-fluid"
                            style="padding-right: 20px;width: 44px;" />Contact Us
                    </a>
                </li>
                <li class="py-2" style="width: 100%;">
                    <a href="{{ route('user-logout') }}" class="text-decoration-none"
                        style="color: white;font-weight: 500;">
                        <div class="p-3 tab align-items-center d-flex"
                            style="width: 100%; background-color: rgb(7,109,168);">
                            <img src="{{url('assets/images/logout.png')}}" class="img-fluid text"
                                style="padding-right: 20px; filter:invert(100%)" />Logout
                        </div>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="top:0;position:sticky;z-index: 1;">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info text-white shadow-none"
                        style="background-color: rgb(7,109,168);border: 1px solid rgb(7,109,168);">
                        <i class="fa fa-angle-right" style="font-size:26px"></i>
                    </button>
                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars fa-lg text-white"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div> -->
                    <div class="d-flex align-items-center justify-content-end" style="margin-left: auto;">
                        {{-- <div class="fa fa-question-circle-o fa-lg" style="padding-right: 50px;"></div> --}}
                        <div class="userProfile">
                            <div style="font-weight: 500;">{{ session()->get('name') }}</div>
                            <div class="" style="font-size: 12px;color: grey;">{{ session()->get('email') }}</div>
                        </div>
                        <div style="padding-left: 15px;">
                            <img src="{{url('assets/images/user.png')}}" class="img-fluid userLogo" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation" style="border-radius:50px;" />
                        </div>
                    </div>

                </div>
            </nav>

            <div class="tab-content mt-4">
                <div id="home" class="active tab-pane">
                    <div class="row">
                        @if (session()->has('success'))
                        <div class="col-lg-8 col-12">
                            <p style="color: green;font-weight:bolder">{{ session()->get('success') }}</p>
                        </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="col-lg-8 col-12">
                            <p style="color: red;font-weight:bolder">{{ session()->get('error') }}</p>
                        </div>
                        @endif
                        <div class="col-lg-8 col-12">
                            <div class="row mt-2" style="font-weight: 500;text-align:justify;">
                                <div style="font-size: 24px;font-weight:600">Handheld whiteboards with pre-printed
                                    learning
                                    charts for
                                    Pre-K thru 6th grade!</div>
                                <div class="my-3 mb-5" style="font-size: 16px;font-weight: 500;">You can choose from
                                    these 4 basic boards for your grade student’s grade level, or you can customize your
                                    own personal boards by selecting from the chart menu.</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-5">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-kinder-garden')}}" style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">Pre-K & Kindergarten</div>
                                            {{-- <img src="{{url('public/storage/kinder-green-improve.png')}}"
                                                class="img-fluid" style="width:250px;" /> --}}
                                            <img style="width:250px ;height:auto ;"
                                                src="{{ url('assets/images/boardImages/Pre K - WH F 1.2.jpg') }}" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">Pre-K & Kindergarten</div>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-5">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-first-second')}} " style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">1st & 2nd Graders</div>
                                            {{-- <img src="{{url('assets/images/kids.png')}} " class="img-fluid"
                                                style="width:250px;" /> --}}
                                            <img style="width:250px ;height:auto ;"
                                                src="{{ url('assets\images\boardImages\1and2-front.jpg') }}" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">1st & 2nd Graders</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-5">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-third-fourth')}} " style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">3rd & 4th Graders</div>
                                            {{-- <img src="{{url('assets/images/kids1.png')}}" class="img-fluid"
                                                style="width:250px;" /> --}}
                                            <img style="width:250px"
                                                src="{{ url('assets\images\boardImages\WB F.1 3rd.jpg') }}" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">3rd & 4th Graders</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-lg-0 mb-mb-0 mb-sm-0 mb-4">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-fifth-sixth')}} " style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">5th & 6th Graders</div>
                                            {{-- <img src="{{url('assets/images/kids2.png')}}" class="img-fluid"
                                                style="width:250px;" /> --}}
                                            <img style="width:250px ;height:auto ;"
                                                src="{{ url('assets\images\boardImages\WF 5th F.1.jpg') }}" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">5th & 6th Graders</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 justify-content-center d-flex">
                            <div>
                                <div class="position-relative">
                                    {{-- <div class="position-absolute text-center py-4 px-3 text-white"
                                        style="font-weight: 600;font-size:20px">
                                        Helping your child build a photographic memory!</div> --}}
                                {{-- </div><img src="{{url('assets/images/Rectangle 11.png')}}" class="img-fluid" /> --}}
                                </div><img src="{{url('assets/images/IMG_20230201_175352.jpg')}}" class="img-fluid" style="border-radius: 15px"/>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-2" style="border-radius: 8px;background-color: rgb(211,244,240);"> --}}
                        <div class="row mb-2">
                            <div class="mt-5" style="width: 70%; margin:auto;">
                                {{-- <div style="margin:auto;">
                                    <iframe style="height: 100%;" allowfullscreen
                                        src="https://video.wixstatic.com/video/a3ba42_c9b0194121be4c35bdf94b6489d92775/1080p/mp4/file.mp4"
                                        frameborder="0"></iframe>
                                </div> --}}
                                <div class="d-flex flex-column align-items-center"
                                    style="font-size: 35px; font-weight: bold; color: rgb(59,17,123);">
                                    <p>How to Customize Your Board?</p>
                                    <img src="{{ url('assets/images/Pal instrutions.png') }}" alt="how to"
                                        width="60%" />
                                </div>
                                {{-- <div style="font-size: 35px; font-weight: bold; color: rgb(59,17,123);">
                                    <p>Handheld whiteboards with pre-printed learning charts for <span
                                            style="color: rgb(255,64,64)">Pre-K</span> thru <span
                                            style="color: rgb(255,64,64)">6th</span> grade!</p>
                                    <p class="my-4" style="width: 75%; display: block; margin: auto">Helping your child
                                        build a photographic memory!</p>
                                </div>
                                <div style="font-size: 25px;color: rgb(59,17,123); width: 70%; margin:auto;">
                                    <p class="mb-0">Why is my child behind in school?</p>
                                    <p class="mb-0">Why isn't my child learning?</p>
                                    <p class="mb-0">Why my child can remember a song, but not his school work?</p>
                                </div>
                                <div class="mt-4" style="font-weight:bold; font-size: 20px;color: rgb(59,17,123);">
                                    <p>
                                        Whose fault is it? It doesn't matter and it doesn't fix the problem! The
                                        question
                                        is... what can we do right now, to help our children learn easier and with
                                        confidence?
                                    </p>
                                    <h1 class="mt-4 mb-4"><strong>Happy Writing Boards is the answer!</strong></h1>
                                </div> --}}
                                {{-- <div>
                                    <p style="color: #E21C21; font-weight:bold;">
                                        <span style="font-size: 50px;">50</span>
                                        <span style="font-size: 30px;"> Reasons why you should buy Happy writing boards
                                            for
                                            your child/students.</span>
                                    </p>
                                    <ol type="1" class="mt-4"
                                        style="font-size: 20px; color: rgb(59,17,123); font-weight:bold;">
                                        <li>Best reference guide ever</li>
                                        <li>The educational charts snap a picture in the brain</li>
                                        <li>Doesn’t need to look around the classroom’s wall for information </li>
                                        <li>Doesn’t need to constantly ask a sibling, parent, or teacher </li>
                                        <li>Go-green – less paper waste </li>
                                        <li>Exposes new ideas </li>
                                        <li>Practice over and over and over again </li>
                                        <li>Self-help</li>
                                        <li>How to solve math problems like fractions right on the board</li>
                                        <li>Inclusive</li>
                                        <li>Boost brain activity one-on-one</li>
                                        <li>Pictionary</li>
                                        <li>Spelling corrected easily</li>
                                        <li>Brainstorming with other children</li>
                                        <li>Easy to correct mistakes </li>
                                        <li>Allows for a quick, unplanned activity when you are interrupted </li>
                                        <li>Increases the imagination </li>
                                        <li>Allows for last-minute decisions </li>
                                        <li>Best group collaboration </li>
                                        <li>Increases student engagement </li>
                                        <li>Builds confidence </li>
                                        <li>Allows for quick assessment </li>
                                        <li>Correct answer easily </li>
                                        <li>Less frustration</li>
                                        <li>Increases hope</li>
                                        <li>A level of storytelling that mixes with the visual</li>
                                        <li>Transforming the way, we teach children</li>
                                        <li>Great to diagnose children with writing or reading disabilities</li>
                                        <li>Helps children that are behind catch-up </li>
                                        <li>Convenient </li>
                                        <li>Portable</li>
                                        <li>Quickly write, erase, and rewrite </li>
                                        <li>Easy to Learn</li>
                                        <li>Easy to Write</li>
                                        <li>Easy storage</li>
                                        <li>Wipes clean. If used a permanet marker, just use nail polish remover </li>
                                        <li>Inexpensive </li>
                                        <li>Board stands up independently </li>
                                        <li>Reusable </li>
                                        <li>Active recall </li>
                                        <li>Productivity hacks </li>
                                        <li>Helps visual learner </li>
                                        <li>Waterproof </li>
                                        <li>Siblings will be more willing to help</li>
                                        <li>Lightweight </li>
                                        <li>Great for games</li>
                                        <li>The teacher doesn't have to visit each student for a response</li>
                                        <li>An easier way to get a vote </li>
                                        <li>Practice, practice, and more practice</li>
                                        <li>Most of all they are fun to use and learn from</li>
                                    </ol>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div id="custom" class="tab-pane fade">
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">Customize your board</div>
                        <div class="row">
                            <div class="col-lg-8 col-12 d-flex align-items-center">
                                {{-- <form action="{{ route('show-grade-board') }}" method="post">
                                    @csrf --}}
                                    <div class="row mt-2" style="text-align:justify;">
                                        <div class="my-3 px-3 mb-4"
                                            style="font-size: 22px; font-weight: bold; color: rgb(59,17,123);">To Design
                                            Your Student’s Chart by Clicking Your Student's Grade Level</div>
                                        @php
                                        $grades = [
                                        'Pre-K & KinderGarden' => 'kinder-green-improve.png',
                                        '1st & 2nd Graders' => 'kids.png',
                                        '3rd & 4th Graders' => 'kids1.png',
                                        '5th & 6th Graders' =>'kids2.png']
                                        @endphp
                                        @foreach ($grades as $grade => $icon)
                                        <div class="col-sm-6 mb-4">
                                            <div class="justify-content-center d-flex">
                                                <a href="{{ route('show-grade-board', $grade) }}" style="color: white;"
                                                    class="text-decoration-none position-relative grade">
                                                    <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                        style="height: 100%; font-weight: 500;">{{ $grade }}</div>
                                                    <img src="{{url('assets/images/'.$icon)}}" class="img-fluid"
                                                        style="width:250px;" />
                                                </a>
                                            </div>
                                            <div class="text-center mt-2" style="color: black; font-weight: 500;">{{
                                                $grade }}</div>
                                        </div>
                                        @endforeach
                                        {{-- <div id="selectDimension" class="col-12 px-3 mb-4">
                                            <label for="customBoardDimension">Board Dimensions</label><br>
                                            <select name="dimensionId" id="customBoardDimension"
                                                class="form-select w-100 p-2 border-0 mt-1"
                                                style="background-color: #eee;height: 45px;border-radius: 10px;outline: 0;">
                                                Render Dimensions Here
                                            </select>
                                        </div>
                                        <div id="selectGrade" class="col-12 px-3 mb-4">
                                            <label for="customSelectGrade">Select grade</label><br>
                                            <select name="grade" id="customSelectGrade"
                                                class="form-select w-100 p-2 border-0 mt-1"
                                                style="background-color: #eee;height: 45px;border-radius: 10px;outline: 0;">
                                                Render Grades Here
                                            </select>
                                        </div> --}}

                                        {{-- <div class="my-3 px-3 mb-5" style="font-size: 16px;font-weight: 500;">
                                            Number of
                                            elements
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-5">
                                            <label>Front of board:</label><br>
                                            <select class="w-100 p-2 border-0"
                                                style="background-color: #eee;height: 45px;border-radius: 10px;outline: 0;">
                                                <option>select</option>
                                                <option>select</option>
                                                <option>select</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3">
                                            <label>Back of board:</label><br>
                                            <select class="w-100 p-2 border-0"
                                                style="background-color: #eee;height: 45px;border-radius: 10px;outline: 0;">
                                                <option>select</option>
                                                <option>select</option>
                                                <option>select</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="text-center mt-lg-0 mt-md-0 mt-sm-0 my-5">
                                        <button class="btn btn-primary border-0 py-2" id="nextBtn"
                                            style="border-radius: 10px; background-color: rgb(7,109,168);">
                                            Next
                                        </button>
                                        <!-- style="border-radius: 10px;background-color: #7548FE;" onclick="sendEnquiry()"> -->
                                    </div> --}}
                                    {{--
                                </form> --}}
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="my-3 mb-4" style="font-size: 16px;font-weight: 500;">Number of Elements
                                </div>
                                <div class="py-5 my-3 text-center" style="background-color: #eee;">
                                    <img src="{{url('assets/images/image 30.png')}}" style="height:70px"
                                        class="img-fluid" />
                                </div>
                                <div class="py-5 my-3 text-center" style="background-color: #eee;">
                                    <img src="{{url('assets/images/image 31.png')}}" style="height:70px"
                                        class="img-fluid" />
                                </div>
                            </div>


                        </div>


                    </div>
                    <div class="tab-pane fade" id="enquiry">
                        @if (isset($grade_id))
                        <form action="{{ route('checkout') }}" method="POST">
                        @else
                        <form action="{{ route('save-enquiry') }}" method="POST">
                        @endif
                            @csrf
                            <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168)"
                                class="p-4 text-white">
                                @if (isset($grade_id))
                                    Checkout
                                @else
                                    Enquiry Form
                                @endif
                            </div>
                            <div class="row mt-5" style="text-align:justify;">
                                @if (isset($grade_id))
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryGradeId">Grade</label><br>
                                    <input type="text" id="enquiryGradeId" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="gradeName" value="{{ $enquiry_grade }}" readonly />
                                    <input type="hidden" name="gradeId" value="{{ $grade_id }}">
                                </div>
                                @else
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryDraftId">Draft ID</label><br>
                                    <input type="text" id="enquiryDraftId" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="draftId" @if (isset($draft_id)) value="{{ $draft_id }}" @endif readonly />
                                    <input type="hidden" name="dimensionId" @if (isset($dimension_id))
                                        value="{{ $dimension_id }}" @endif>
                                </div>
                                @endif
                                {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryGradeId">Grade</label><br>
                                    <select type="text" id="enquiryGradeId"
                                        class="form-control form-select border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="gradeId">
                                        <option value="1">Pre-K & Kindergarden</option>
                                        <option value="2">1st & 2nd Graders</option>
                                        <option value="3">3rd & 4th Graders</option>
                                        <option value="4">5th & 6th Graders</option>
                                    </select>
                                </div> --}}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquirySchoolName">School Name</label><br>
                                    <input type="text" id="enquirySchoolName" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="schoolName" value="{{ old('schoolName') }}" />
                                    @error('schoolName')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryName">Name</label><br>
                                    <input type="text" id="enquiryName" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="name" @if (null !==old('name')) value="{{ old('name') }}" @else
                                        value="{{ session('name') }}" @endif />
                                    @error('name')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryEmail">Email address</label><br>
                                    <input type="email" id="enquiryEmail" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="email" @if (null !==old('email')) value="{{ old('email') }}" @else
                                        value="{{ session('email') }}" @endif readonly="true"/>
                                    @error('email')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryContact">Contact number</label><br>
                                    <input type="tel" id="enquiryContact" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="contactNumber" value="{{ old('contactNumber') }}" />
                                    @error('contactNumber')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                    <label for="enquiryRemarks">Remarks</label><br>
                                    <input type="text" id="enquiryRemarks" class="form-control border-0 mt-1"
                                        style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="remarks" value="{{ old('remarks') }}" />
                                    @error('remarks')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 px-3 mb-3">
                                    <label for="enquiryAddress">Address</label><br>
                                    <textarea rows="5" id="enquiryAddress" class="border-0 px-3 py-2 mt-1"
                                        style="width: 100%;background-color: #eee;border-radius: 10px;outline: 0;"
                                        name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 px-3 mb-3">
                                    <label for="enquiryQuality">Board Quantity</label><br>
                                    <input type="number" min="0" name="boardQuantity" class="form-control border-0 mt-1" style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;" />
                                    @error('boardQuantity')
                                    <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 px-3 mb-3">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <input id="black_marker" type="checkbox" name="markers[]" value="black_marker">
                                            <label for="black_marker">Black Markers</label>
                                            <input type="number" min="0" class="form-control border-0 mt-2 hide" style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;" placeholder="How Many?" name="black_marker">
                                        </div>
                                        <div class="col-sm-3">
                                            <input id="red_marker" type="checkbox" name="markers[]" value="red_marker">
                                            <label for="red_marker">Red Markers</label>
                                            <input type="number" min="0" class="form-control border-0 mt-2 hide" style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;" placeholder="How Many?" name="red_marker">
                                        </div>
                                        <div class="col-sm-3">
                                            <input id="blue_marker" type="checkbox" name="markers[]" value="blue_marker">
                                            <label for="blue_marker">Blue Markers</label>
                                            <input type="number" min="0" class="form-control border-0 mt-2 hide" style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;" placeholder="How Many?" name="blue_marker">
                                        </div>
                                        <div class="col-sm-3">
                                            <input id="green_marker" type="checkbox" name="markers[]" value="green_marker">
                                            <label for="green_marker">Green Markers</label>
                                            <input type="number" min="0" class="form-control border-0 mt-2 hide" style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;" placeholder="How Many?" name="green_marker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="text-center my-4">
                                    <button id="enquiryBtn" class="btn btn-primary border-0 py-2 px-5 mx-2"
                                        style="font-weight: 500; box-shadow: 1px 1px 2px 1px silver; border-radius: 10px;background-color: rgb(7,109,168);">
                                        @if (isset($grade_id))
                                            Checkout
                                        @else
                                            Send Enquiry                                            
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="drafts" class="tab-pane fade">
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">My Drafts</div>
                        <div id="draftBtn" class="my-2 text-center mt-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td scope="col">View</td>
                                        <td scope="col">Grade</td>
                                        <td scope="col">Created At</td>
                                        <td scope="col">Updated At</td>
                                        <td scope="col">Remove</td>
                                    </tr>
                                </thead>
                                <tbody id="draftBody">
                                    {{-- Render Draft Details Here --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="reasons" class="tab-pane fade">
                        {{-- <div
                            style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">My Drafts</div> --}}
                        <div class="row mb-2" style="border-radius: 8px;background-color: rgb(211,244,240);">
                            <div class="mt-5" style="width: 70%; margin:auto;">
                                <div>
                                    <p style="color: #E21C21; font-weight:bold;">
                                        <span style="font-size: 50px;">50</span>
                                        <span style="font-size: 30px;"> Reasons why you should buy Happy writing boards
                                            for
                                            your child/students.</span>
                                    </p>
                                    <ol type="1" class="mt-4"
                                        style="font-size: 20px; color: rgb(59,17,123); font-weight:bold;">
                                        <li>Best reference guide ever</li>
                                        <li>The educational charts snap a picture in the brain</li>
                                        <li>Doesn’t need to look around the classroom’s wall for information </li>
                                        <li>Doesn’t need to constantly ask a sibling, parent, or teacher </li>
                                        <li>Go-green – less paper waste </li>
                                        <li>Exposes new ideas </li>
                                        <li>Practice over and over and over again </li>
                                        <li>Self-help</li>
                                        <li>How to solve math problems like fractions right on the board</li>
                                        <li>Inclusive</li>
                                        <li>Boost brain activity one-on-one</li>
                                        <li>Pictionary</li>
                                        <li>Spelling corrected easily</li>
                                        <li>Brainstorming with other children</li>
                                        <li>Easy to correct mistakes </li>
                                        <li>Allows for a quick, unplanned activity when you are interrupted </li>
                                        <li>Increases the imagination </li>
                                        <li>Allows for last-minute decisions </li>
                                        <li>Best group collaboration </li>
                                        <li>Increases student engagement </li>
                                        <li>Builds confidence </li>
                                        <li>Allows for quick assessment </li>
                                        <li>Correct answer easily </li>
                                        <li>Less frustration</li>
                                        <li>Increases hope</li>
                                        <li>A level of storytelling that mixes with the visual</li>
                                        <li>Transforming the way, we teach children</li>
                                        <li>Great to diagnose children with writing or reading disabilities</li>
                                        <li>Helps children that are behind catch-up </li>
                                        <li>Convenient </li>
                                        <li>Portable</li>
                                        <li>Quickly write, erase, and rewrite </li>
                                        <li>Easy to Learn</li>
                                        <li>Easy to Write</li>
                                        <li>Easy storage</li>
                                        <li>Wipes clean. If used a permanet marker, just use nail polish remover </li>
                                        <li>Inexpensive </li>
                                        <li>Board stands up independently </li>
                                        <li>Reusable </li>
                                        <li>Active recall </li>
                                        <li>Productivity hacks </li>
                                        <li>Helps visual learner </li>
                                        <li>Waterproof </li>
                                        <li>Siblings will be more willing to help</li>
                                        <li>Lightweight </li>
                                        <li>Great for games</li>
                                        <li>The teacher doesn't have to visit each student for a response</li>
                                        <li>An easier way to get a vote </li>
                                        <li>Practice, practice, and more practice</li>
                                        <li>Most of all they are fun to use and learn from</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ebook" class="tab-pane fade">
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">E Book - Monkey Mac</div>
                            <div class="my-3 px-3 mb-4"
                            style="font-size: 22px; font-weight: bold; color: rgb(59,17,123);">Right Click on Any Image, Open image in new tab and Zoom in for Better Readability</div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6">
                                <img src="assets/images/ebook/monkey-mac/front cover.jpg" alt="front-cover" width="80%">
                                <p class="mt-2" style="font-size: 15px; color:rgb(59,17,123);font-weight:500;">Front Cover</p>
                            </div>
                            <div class="col-md-6">
                                <img src="assets/images/ebook/monkey-mac/back cover 10.png" alt="back-cover"
                                    width="80%">
                                    <p class="mt-2" style="font-size: 15px; color:rgb(59,17,123);font-weight:500;">Back Cover</p>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6">
                                <img src="assets/images/ebook/monkey-mac/EMMA MONKEY MAC FINAL SS_1935730578.png"
                                    alt="comming-soon" width="80%">
                            </div>
                            <div class="col-md-6">
                                <img src="assets/images/ebook/monkey-mac/Emma - coming soon happy boards.png"
                                    alt="comming-soon" width="80%">
                            </div>
                        </div>
                    </div>
                    <div id="paymentDone" class="tab-pane fade">
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">Payment</div>
                            @if (session()->has('success'))
                            <div class="col-lg-8 col-12 mt-3">
                                <p style="color: green;font-weight:bolder">{{ session()->get('success') }}</p>
                            </div>
                            @endif
                            @if (session()->has('error'))
                            <div class="col-lg-8 col-12 mt-3">
                                <p style="color: red;font-weight:bolder">{{ session()->get('error') }}</p>
                            </div>
                            @endif
                        <div class="d-flex justify-content-around align-items-center" style="height:55vh;">
                            @if (isset($bill))
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price(in USD Dollar)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $bill['board']['item'] }}</td>
                                            <td>{{ $bill['board']['quantity'] }}</td>
                                            <td>{{ $bill['board']['price'] }}</td>
                                        </tr>
                                        @foreach ($bill['markers'] as $marker)
                                            <tr>
                                                <td>{{ $marker['item'] }}</td>
                                                <td>{{ $marker['quantity'] }}</td>
                                                <td>{{ $marker['price'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            <div>
                                <form action="{{ route('payment') }}" method="post">
                                    @csrf
                                    <label for="payment_amount" class="fw-bold">Payable Amount (in USD Dollar)</label>
                                    <input id="payment_amount" type="number" name="amount" @if (isset($bill['total']))
                                    readonly="true"
                                    value="{{ $bill['total'] }}"
                                    @endif class="form-control border-0 mt-2 marker-input" style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;" />
                                    <button type="submit" class="btn btn-primary border-0 py-2 px-5 mx-2 mt-2"
                                    style="font-weight: 500; box-shadow: 1px 1px 2px 1px silver; border-radius: 10px;background-color: rgb(7,109,168);">Pay with PayPal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="about" class="tab-pane fade">
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">About Us</div>
                        <div class="d-flex flex-column align-items-center mt-4"
                            style="border-radius: 8px;background-color: rgb(211,244,240);">
                            <div class="row my-2">
                                <div class="mt-4" style="width: 70%; margin:auto;">
                                    <div style="font-size: 35px; font-weight: bold; color: rgb(59,17,123);">
                                        <p>Handheld whiteboards with pre-printed learning charts for <span
                                                style="color: rgb(255,64,64)">Pre-K</span> thru <span
                                                style="color: rgb(255,64,64)">6th</span> grade!</p>
                                        <p class="my-4" style="width: 75%; display: block; margin: auto">Helping your
                                            child
                                            build a photographic memory!</p>
                                    </div>
                                    <div style="font-size: 25px;color: rgb(59,17,123); width: 70%; margin:auto;">
                                        <p class="mb-0">Why is my child behind in school?</p>
                                        <p class="mb-0">Why isn't my child learning?</p>
                                        <p class="mb-0">Why my child can remember a song, but not his school work?</p>
                                    </div>
                                    <div class="mt-4" style="font-weight:bold; font-size: 20px;color: rgb(59,17,123);">
                                        <p>
                                            Whose fault is it? It doesn't matter and it doesn't fix the problem! The
                                            question is... what can we do right now, to help our children learn easier
                                            and
                                            with confidence?
                                        </p>
                                        <h1 class="mt-4 mb-4"><strong>Happy Writing Boards is the answer!</strong></h1>
                                    </div>
                                    <div class="my-3">
                                        <video width="419" height="200" controls style="display:block; margin: auto">
                                            <source
                                                src="https://video.wixstatic.com/video/a3ba42_c9b0194121be4c35bdf94b6489d92775/1080p/mp4/file.mp4"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                    <div style="font-size: 20px;color: rgb(59,17,123);">
                                        <p>
                                            We wonder why our children misbehave or are uninspired in school, leaving
                                            many
                                            of us with little hope for their future. It's no secret that electronic
                                            games
                                            and videos have taken their attention away from their education.
                                        </p>
                                        <p>
                                            These boards will give the children, parents, teachers, and tutors, the hope
                                            that we all need. They get to practice, practice and practice until they get
                                            it
                                            right.
                                        </p>
                                        <p>
                                            Hope is not having to look for help when it's right on the board. Hope is
                                            when
                                            you can try and try over and over again without getting frustrated from
                                            using so
                                            much paper. Hope is when your siblings and parents don't mind helping you
                                            because they love markers too.
                                        </p>
                                        <p>
                                            They need one of these boards at school and at home...just having one at
                                            school
                                            is not enough.
                                        </p>
                                    </div>
                                    <div class="my-3">
                                        <video width="500" height="281" controls style="display:block; margin: auto">
                                            <source
                                                src="https://video.wixstatic.com/video/a3ba42_b9cc5be0b8c54f8197627c986776bfe1/1080p/mp4/file.mp4"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                    <div>
                                        <p style="color: #E21C21; font-weight:bold;">
                                            <span style="font-size: 50px;">50</span>
                                            <span style="font-size: 30px;"> Reasons why you should buy Happy writing
                                                boards
                                                for
                                                your child/students.</span>
                                        </p>
                                        <ol type="1" class="mt-4"
                                            style="font-size: 20px; color: rgb(59,17,123); font-weight:bold;">
                                            <li>Best reference guide ever</li>
                                            <li>The educational charts snap a picture in the brain</li>
                                            <li>Doesn’t need to look around the classroom’s wall for information </li>
                                            <li>Doesn’t need to constantly ask a sibling, parent, or teacher </li>
                                            <li>Go-green – less paper waste </li>
                                            <li>Exposes new ideas </li>
                                            <li>Practice over and over and over again </li>
                                            <li>Self-help</li>
                                            <li>How to solve math problems like fractions right on the board</li>
                                            <li>Inclusive</li>
                                            <li>Boost brain activity one-on-one</li>
                                            <li>Pictionary</li>
                                            <li>Spelling corrected easily</li>
                                            <li>Brainstorming with other children</li>
                                            <li>Easy to correct mistakes </li>
                                            <li>Allows for a quick, unplanned activity when you are interrupted </li>
                                            <li>Increases the imagination </li>
                                            <li>Allows for last-minute decisions </li>
                                            <li>Best group collaboration </li>
                                            <li>Increases student engagement </li>
                                            <li>Builds confidence </li>
                                            <li>Allows for quick assessment </li>
                                            <li>Correct answer easily </li>
                                            <li>Less frustration</li>
                                            <li>Increases hope</li>
                                            <li>A level of storytelling that mixes with the visual</li>
                                            <li>Transforming the way, we teach children</li>
                                            <li>Great to diagnose children with writing or reading disabilities</li>
                                            <li>Helps children that are behind catch-up </li>
                                            <li>Convenient </li>
                                            <li>Portable</li>
                                            <li>Quickly write, erase, and rewrite </li>
                                            <li>Easy to Learn</li>
                                            <li>Easy to Write</li>
                                            <li>Easy storage</li>
                                            <li>Wipes clean. If used a permanet marker, just use nail polish remover
                                            </li>
                                            <li>Inexpensive </li>
                                            <li>Board stands up independently </li>
                                            <li>Reusable </li>
                                            <li>Active recall </li>
                                            <li>Productivity hacks </li>
                                            <li>Helps visual learner </li>
                                            <li>Waterproof </li>
                                            <li>Siblings will be more willing to help</li>
                                            <li>Lightweight </li>
                                            <li>Great for games</li>
                                            <li>The teacher doesn't have to visit each student for a response</li>
                                            <li>An easier way to get a vote </li>
                                            <li>Practice, practice, and more practice</li>
                                            <li>Most of all they are fun to use and learn from</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="contact" class="tab-pane fade">
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver; background-color: rgb(7,109,168);"
                            class="p-4 text-white">Contact Us</div>
                        <div class="row">
                            <div class="col-lg-6 col-12 px-5 py-lg-5">
                                <div style="font-size: 16px;">Any question or remarks? Just write us a message!
                                </div>
                                <form id="contactUsForm" action="{{ route('contactus-post') }}" method="post">
                                    @csrf
                                    <table class="mt-4" style="font-size: 16px;width: 100%;">
                                        <tr>
                                            <td class="py-2" style="font-weight: 500;">Full Name</td>
                                            <td style="color: grey;text-align: end;"><input class="form-control"
                                                    type="text" name="name" value="{{ session()->get('name') }}"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td class="py-2" style="font-weight: 500;">E-mail</td>
                                            <td style="color: grey;text-align: end;"><input class="form-control"
                                                    type="email" name="email" value="{{ session()->get('email') }}"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td class="py-2" style="font-weight: 500;">Message</td>
                                            <td style="color: grey;text-align: end;"><textarea class="form-control"
                                                    name="message" cols="30" rows="6" required></textarea></td>
                                        </tr>
                                    </table>
                                    <div class="text-end mt-4 mb-5">
                                        <button class="btn btn-primary border-0 w-25 py-2"
                                            style="border-radius: 10px; background-color: rgb(7,109,168);">
                                            Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-12 colPadding text-white mt-5">
                                {{-- <div class="p-4" style="background-color: #7548FE;border-radius:10px;"> --}}
                                    <div class="p-4" style="background-color: rgb(7,109,168);border-radius:10px;">
                                        <div class="" style="font-size: 32px;">Contact information</div>
                                        <div class="" style="font-size: 16px;">Fill upp the form and our team will get
                                            back
                                            to
                                            you </div>
                                        <div class="py-4" style="font-size: 16px;">
                                            <div class="d-flex mb-3">
                                                <img src="{{url('assets/images/call.png')}}" class="img-fluid"
                                                    style="height: 24px;width: 24px;margin-right: 20px; filter: invert(100%)" />
                                                <div>+ 0123-456-789</div>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <img src="{{url('assets/images/email.png')}}" class="img-fluid"
                                                    style="height: 24px;width: 24px;margin-right: 20px; filter: invert(100%)" />
                                                <div>Happywritingboards@gmail.com</div>
                                            </div>
                                            <div class="d-flex">
                                                <img src="{{url('assets/images/contactHelp.png')}}" class="img-fluid"
                                                    style="height: 24px;width: 24px;margin-right: 20px; filter: invert(100%)" />
                                                <div>
                                                    Happy Writing Boards<br>
                                                    4921 Tilden Road<br>
                                                    Bladensburg, Maryland 20710
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <img src="{{url('assets/images/contactImg.png')}}" class="img-fluid"
                                            style="width: 100%;" /> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- JQuery CDN --}}
            <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
            <script>
                // Custom Your Board
        let customYourBoard = document.getElementById('customize')  
        customYourBoard.addEventListener('click', ()=> {
            $.ajax({
                url: "{{ route('custom-parameters') }}",
                type: "GET",
                dataType: 'json',
                success: function(response) {
                    let selectGrade = document.querySelector('#selectGrade select')
                    let selectDimension = document.querySelector('#selectDimension select')
                    selectDimension.textContent = ''
                    selectGrade.textContent = ''
                    Array.from(response.dimensions).forEach(element => {
                        let option = document.createElement('option')
                        option.setAttribute('value', element['id'])
                        option.innerHTML = element['width'] + ' X ' + element['length'] + ' inches'
                        selectDimension.append(option)
                    });
                    Array.from(response.grades).forEach(element => {
                        let option = document.createElement('option')
                        option.setAttribute('value', element['id'])
                        option.innerHTML = element['grade']
                        selectGrade.append(option)
                    });
                    console.log("SUCCESS: " +JSON.stringify(response.grades))
                },
                error: function(error) {
                    console.log("ERROR: " +error)
                }
            })
        })

        // My Draft
        let myDraftBtn = document.getElementById('my-draft-btn')
        myDraftBtn.addEventListener('click', ()=> {
            $.ajax({
                url: "{{ route('my-drafts') }}",
                type: "GET",
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.length == 0) {
                        let table = document.querySelector('#draftBtn > table')
                        table.remove()
                        let draftSection = document.getElementById('draftBtn')
                        draftSection.className += ' d-flex justify-content-center align-items-center'
                        draftSection.setAttribute('style', 'width: 100%; height: 60vh;')
                        let h5 = document.createElement('h5')
                        h5.innerHTML = `<strong>Oops!</strong><br>Looks Like You Have No Draft`
                        draftSection.append(h5)
                    }
                    else {
                        let table = document.querySelector('#draftBtn > table')
                        let tbody = document.querySelector('#draftBody')
                        tbody.textContent = ''
                        for (let i = 0; i < response.length; i++) {
                            let tr = document.createElement('tr')
                            let td = document.createElement('td')
                            let url = location.origin + '/projects/whiteboard/show-draft/' + response[i]['id'] + '/' + response[i]['grade_id']
                            console.log(url)
                            td.innerHTML = `<a href='${url}' class="mx-2">
                                <i class="fa fa-eye text-primary" aria-hidden="true"></i>
                                </a>` 
                            tr.append(td)
                            for (let j = 0; j < 3; j++) {
                                let td = document.createElement('td')
                                td.innerHTML = response[i][(Object.keys(response[i]))[j]]
                                tr.append(td)
                            }
                            td = document.createElement('td')
                            url = "{{ route('remove-draft', '') }}" + '/' + response[i]['id']
                            td.innerHTML = `<a href="${url}" class="mx-2">
                                <i class="fa fa-remove text-danger" aria-hidden="true"></i>
                                </a>`
                            tr.append(td)
                            tbody.append(tr)
                        }
                        // table.append(tbody)
                        table.append(tbody)
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })

        function showDraft(draftId, gradeId) {
            let url = "{{ route('show-draft', [':draftId', ':gradeId']) }}"
            url = url.replace(':draftId', draftId)
            url = url.replace(':gradeId', gradeId)
            window.location.href = url
        } 

        // Show Enquiry Form
        if("{{ isset($draft_id) }}" || "{{ isset($grade_id) }}") {
            document.querySelector('#enquiry').className += ' show active'
            document.querySelector('#home').classList.remove('active')
        }
        // Show Payment Page
        if("{{ isset($payment) }}") {
            document.querySelector('#paymentDone').className += ' show active'
            document.querySelector('#home').classList.remove('active')
        }
        // Show Custom Board Page
        if("{{ isset($controller_custom_board) }}") {
            document.querySelector('#custom').className += ' show active'
            document.querySelector('#customize').className += ' active'
            document.querySelector('#home').classList.remove('active')
            document.querySelector('#home-href').classList.remove('active')
        }
        // Show 50 Reasons Page
        if("{{ isset($controller_50_reasons) }}") {
            document.querySelector('#reasons').className += ' show active'
            document.getElementById('50ReasonsBtn').className += ' active'
            document.querySelector('#home').classList.remove('active')
            document.querySelector('#home-href').classList.remove('active')
        }
        // Show E-Boook Page
        if("{{ isset($controller_e_book) }}") {
            document.querySelector('#ebook').className += ' show active'
            document.getElementById('eBookBtn').className += ' active'
            document.querySelector('#home').classList.remove('active')
            document.querySelector('#home-href').classList.remove('active')
        }
        // Show Payment Page
        if("{{ isset($controller_payment) }}") {
            document.querySelector('#paymentDone').className += ' show active'
            document.getElementById('paymentBtn').className += ' active'
            document.querySelector('#home').classList.remove('active')
            document.querySelector('#home-href').classList.remove('active')
        }
        // Show About Us Page
        if("{{ isset($controller_about_us) }}") {
            document.querySelector('#about').className += ' show active'
            document.getElementById('aboutUsBtn').className += ' active'
            document.querySelector('#home').classList.remove('active')
            document.querySelector('#home-href').classList.remove('active')
        }
        // Show Contact Us Page
        if("{{ isset($controller_contact_us) }}") {
            document.querySelector('#contact').className += ' show active'
            document.getElementById('contactUsBtn').className += ' active'
            document.querySelector('#home').classList.remove('active')
            document.querySelector('#home-href').classList.remove('active')
        }
            </script>
            <script>
                let markers = document.getElementsByName('markers[]')
                let blackMarker = document.getElementsByName('black_marker')[0]
                let blueMarker = document.getElementsByName('blue_marker')[0]
                let greenMarker = document.getElementsByName('green_marker')[0]
                let redMarker = document.getElementsByName('red_marker')[0]
                let inputs = [blackMarker, blueMarker, greenMarker, redMarker]
                Array.from(markers).forEach(marker => {
                    marker.addEventListener('click', (ele)=> {
                        inputs.forEach(input => {
                            if (ele.target.value == input.name) {
                                if (ele.target.checked) {
                                    input.classList.remove("hide")
                                } else {
                                    input.classList.add("hide")
                                }
                            }
                        })
                    })
                })
            </script>

</body>

</html>