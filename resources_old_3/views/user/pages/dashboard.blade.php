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

        @media(max-width:450px) {

            .userProfile,
            .fa-question-circle-o {
                display: none;
            }
        }

        .tab {
            border-radius: 10px;
        }

        .tab.active {
            background-color: #eee;
            color: #7548FE;
        }
    </style>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="position-relative" style="box-shadow:1px 0px 2px 1px silver" style="z-index: 999;">
            <div class="sidebar-header d-flex align-items-center" style="box-shadow:0px 0px 2px 1px silver">
                <img src="{{url('assets/images/logo.png')}}" id="logo" class="img-fluid p-4" />
                <div id="close" style="display: none;">
                    <div class="position-relative d-flex align-items-center">
                        <div class="position-absolute px-2 pb-2" style="font-size: 48px;width: 100%;cursor: pointer;"
                            id="sidebarCollapse1">&times;</div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs list-unstyled px-3 my-5"
                style="color:black;font-weight: 500;border-bottom: none;font-size: 20px;">
                <li class="active py-2" style="width: 100%;">
                    <div class="active p-3 tab align-items-center d-flex" type="button" data-bs-toggle="tab"
                        href="#home">
                        <img src="{{url('assets/images/home.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />Home
                    </div>
                </li>
                <li class="py-2" style="width: 100%;">
                    <div class="p-3 tab align-items-center d-flex" id="customize" type="button" data-bs-toggle="tab"
                        href="#custom">
                        <img src="{{url('assets/images/customBoards.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />Custom Your Board
                    </div>
                </li>
                <li class="py-2" style="width: 100%;">
                    <div id="my-draft-btn" class="p-3 tab align-items-center d-flex" type="button" data-bs-toggle="tab"
                        href="#drafts">
                        <img src="{{url('assets/images/account_box.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />My Drafts
                    </div>
                </li>
                {{-- <li class="py-2" style="width: 100%;">
                    <div class="p-3 tab align-items-center d-flex" type="button" data-bs-toggle="tab" href="#enquiry">
                        <img src="{{url('assets/images/account_box.png')}}" class="img-fluid"
                            style="padding-right: 20px;" />Enquiry
                    </div>
                </li> --}}
                <li class="py-2" style="width: 100%;">
                    <div class="p-3 tab align-items-center d-flex" type="button" data-bs-toggle="tab" href="#about">
                        <img src="{{url('assets/images/about.png')}}" class="img-fluid"
                            style="padding-right: 20px;width: 44px;" />About Us
                    </div>
                </li>
                <li class="py-2" style="width: 100%;">
                    <div class="p-3 tab align-items-center d-flex" type="button" data-bs-toggle="tab" href="#contact">
                        <img src="{{url('assets/images/contacts.png')}}" class="img-fluid"
                            style="padding-right: 20px;width: 44px;" />Contact Us
                    </div>
                </li>
            </ul>
            <a href="{{ route('user-logout') }}" class="text-decoration-none" style="color: black;font-weight: 500;">
                <div class="bottom-0 position-absolute py-4 justify-content-center d-flex" style="width: 100%;">
                    <img src="{{url('assets/images/logout.png')}}" class="img-fluid text"
                        style="padding-right: 20px;" />Logout
                </div>
            </a>
        </nav>

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="top:0;position:sticky;z-index: 1;">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info text-white shadow-none"
                        style="background-color: #7548fe;border: 1px solid #7548FE;">
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
                        <div class="col-lg-8 col-12">
                            <div class="row mt-2" style="font-weight: 500;text-align:justify;">
                                <div style="font-size: 24px;font-weight:600">Handheld whiteboards with pre-printed
                                    learning
                                    charts for
                                    Pre-K thru 6th grade!</div>
                                <div class="my-3 mb-5" style="font-size: 16px;font-weight: 500;">You can choose from
                                    these 4
                                    basic boards or you can customize
                                    your own personal boards (30 or more)
                                    for your students.</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-5">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-kinder-garden')}}" style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">select</div>
                                            <img src="{{url('public/storage/kinder-green-improve.png')}}" class="img-fluid"
                                                style="width:250px;" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">Pre-K & Kindergarten</div>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-5">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-first-second')}} " style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">select</div>
                                            <img src="{{url('assets/images/kids.png')}} " class="img-fluid"
                                                style="width:250px;" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">1st & 2nd Graders</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-5">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-third-fourth')}} " style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">select</div>
                                            <img src="{{url('assets/images/kids1.png')}}" class="img-fluid"
                                                style="width:250px;" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">3rd & 4th Graders</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 px-2 col-12 mb-lg-0 mb-mb-0 mb-sm-0 mb-4">
                                    <div class="justify-content-center d-flex">
                                        <a href="{{ route('defined-fifth-sixth')}} " style="color: white;"
                                            class="text-decoration-none position-relative grade">
                                            <div class="position-absolute justify-content-center align-items-center d-flex select w-100"
                                                style="height: 100%;">select</div>
                                            <img src="{{url('assets/images/kids2.png')}}" class="img-fluid"
                                                style="width:250px;" />
                                        </a>
                                    </div>
                                    <div class="text-center" style="color: black;">5th & 6th Graders</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 justify-content-center d-flex">
                            <div>
                                <div class="position-relative">
                                    <div class="position-absolute text-center py-4 px-3 text-white"
                                        style="font-weight: 600;font-size:20px">
                                        Helping your child build a photographic memory!</div>
                                </div><img src="{{url('assets/images/Rectangle 11.png')}}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
                <div id="custom" class="tab-pane fade">
                    <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver;"
                        class="bg-dark p-4 text-white">Customize your board</div>
                    <div class="row">
                        <div class="col-lg-8 col-12 d-flex align-items-center">
                            <form action="{{ route('show-grade-board') }}" method="post">
                                @csrf
                                <div class="row mt-2" style="text-align:justify;">
                                    <div class="my-3 px-3 mb-4" style="font-size: 16px;font-weight: 500;">Design Your
                                        Student’s Chart</div>
                                    <div id="selectDimension" class="col-12 px-3 mb-4">
                                        <label for="customBoardDimension">Board Dimensions</label><br>
                                        <select name="dimensionId" id="customBoardDimension" class="form-select w-100 p-2 border-0 mt-1"
                                            style="background-color: #eee;height: 45px;border-radius: 10px;outline: 0;">
                                            {{-- Render Dimensions Here --}}
                                        </select>
                                    </div>
                                    <div id="selectGrade" class="col-12 px-3 mb-4">
                                        <label for="customSelectGrade">Select grade</label><br>
                                        <select name="grade" id="customSelectGrade"
                                            class="form-select w-100 p-2 border-0 mt-1"
                                            style="background-color: #eee;height: 45px;border-radius: 10px;outline: 0;">
                                            {{-- Render Grades Here --}}
                                        </select>
                                    </div>

                                    {{-- <div class="my-3 px-3 mb-5" style="font-size: 16px;font-weight: 500;">Number of
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
                                <div class="text-center mt-lg-0 mt-md-0 mt-sm-0 my-5">
                                    <button class="btn btn-primary border-0 w-25 py-2" id="nextBtn"
                                        style="border-radius: 10px;background-color: #7548FE;">
                                        Next
                                    </button>
                                    <!-- style="border-radius: 10px;background-color: #7548FE;" onclick="sendEnquiry()"> -->
                                </div>
                            </form>
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
                    <form action="{{ route('save-enquiry') }}" method="POST">
                        @csrf
                        <div style="font-size:24px;font-weight: 600;border-radius: 15px;box-shadow: 1px 1px 2px 1px silver;"
                            class="bg-dark p-4 text-white">Enquiry Form</div>
                        <div class="row mt-5" style="text-align:justify;">
                            @if (isset($grade_id))
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                <label for="enquiryGradeId">Grade</label><br>
                                <input type="text" id="enquiryGradeId" class="form-control border-0 mt-1"
                                    style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                    name="gradeName" value="{{ $grade }}" readonly />
                                <input type="hidden" name="gradeId" value="{{ $grade_id }}">
                            </div>
                            @else
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                <label for="enquiryDraftId">Draft ID</label><br>
                                <input type="text" id="enquiryDraftId" class="form-control border-0 mt-1"
                                    style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                    name="draftId" @if (isset($draft_id)) value="{{ $draft_id }}" @endif readonly />
                                    <input type="hidden" name="dimensionId" @if (isset($dimension_id)) value="{{ $dimension_id }}" @endif>
                            </div>
                            @endif
                            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                <label for="enquiryGradeId">Grade</label><br>
                                <select type="text" id="enquiryGradeId" class="form-control form-select border-0 mt-1"
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
                                    name="name" @if (null !== old('name')) value="{{ old('name') }}" @else value="{{ session('name') }}" @endif />
                                @error('name')
                                <span class="text-danger"><sup>* </sup>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                <label for="enquiryEmail">Email address</label><br>
                                <input type="email" id="enquiryEmail" class="form-control border-0 mt-1"
                                    style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                    name="email" @if (null !== old('email')) value="{{ old('email') }}" @else value="{{ session('email') }}" @endif />
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
                            {{-- <div class="col-12 px-3 mb-3">
                                <label for="enquiryRemarks">Remarks</label><br>
                                <input type="text" id="enquiryRemarks" class="form-control border-0 mt-1"
                                    style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                    name="remarks" />
                            </div> --}}
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3 mb-3">
                                <label for="enquiryQuality">Quantity required</label><br>
                                <select id="enquiryQuality" class="w-100 p-2 border-0 mt-1"
                                    style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                    name="quantity">
                                    <option>select</option>
                                    <option>select</option>
                                    <option>select</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 px-3">
                                <label for="enquiryMarkers">Markers</label><br>
                                <select id="enquiryMarkers" class="w-100 p-2 border-0 mt-1"
                                    style="height: 45px;background-color: #eee;border-radius: 10px;outline: 0;"
                                    name="markers">
                                    <option>select</option>
                                    <option>select</option>
                                    <option>select</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="text-center my-5">
                                <button id="enquiryBtn" class="btn btn-primary border-0 py-2 px-5 mx-2"
                                    style="border-radius: 10px;background-color: #7548FE;">Send Enquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="drafts" class="tab-pane fade px-3">
                    <h4 class="mb-3 mt-2">My Drafts</h4>
                    <div id="draftBtn" class="my-2 text-center">
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
                <div id="about" class="tab-pane fade">
                    <div class="d-flex flex-column align-items-center">
                        <h3 class="mt-2 mb-1">About Us</h3>
                        <div class="my-2" style="width: 90%;">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed quasi, sint mollitia
                                dolorem commodi dicta expedita dolorum iure, accusamus, error culpa rem corporis nostrum
                                magni?</p>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt provident in ab quia
                                distinctio nulla accusantium commodi iure! A aliquam cupiditate et magnam. Maxime magni
                                dolor voluptatum! Impedit dolore neque corrupti hic facilis adipisci et iste vel dolores
                                ipsam natus quis nesciunt magni, sapiente voluptas quisquam tempore! Ea odio ipsam
                                cumque tempora reiciendis quae id repudiandae repellat animi quod doloribus quaerat
                                cupiditate, voluptas veritatis inventore iste exercitationem nesciunt dolores nobis
                                omnis! Qui consectetur atque reprehenderit recusandae ullam ad at voluptate.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate vero eius adipisci
                                ipsum illum ipsa.</p>
                        </div>
                    </div>
                </div>
                <div id="contact" class="tab-pane fade">
                    <div class="row">
                        <div class="col-lg-6 col-12 px-5 py-lg-5">
                            <div style="font-size: 32px;font-weight: 500;">Contact us</div>
                            <div style="font-size: 16px;color: grey;">Any question or remarks? Just write us a message!
                            </div>
                            <form id="contactUsForm" action="#" method="post">
                                <table class="mt-4" style="font-size: 16px;width: 100%;">
                                    <tr>
                                        <td class="py-2" style="font-weight: 500;">Full Name</td>
                                        <td style="color: grey;text-align: end;"><input class="form-control" type="text"
                                                name="firstName" value="{{ session()->get('name') }}" required></td>
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
                                    <div class="btn btn-primary border-0 w-25 py-2" id="nextBtn"
                                        style="border-radius: 10px;background-color: #7548FE;">
                                        Submit</div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-12 colPadding text-white">
                            <div class="p-4" style="background-color: #7548FE;border-radius:10px;">
                                <div class="" style="font-size: 32px;">Contact information</div>
                                <div class="" style="font-size: 16px;">Fill upp the form and our team will get back to
                                    you </div>
                                <div class="py-4" style="font-size: 16px;">
                                    <div class="d-flex mb-3">
                                        <img src="{{url('assets/images/call.png')}}" class="img-fluid"
                                            style="height: 24px;width: 24px;margin-right: 20px;" />
                                        <div>+ 0123-456-789</div>
                                    </div>
                                    <div class="d-flex">
                                        <img src="{{url('assets/images/contactHelp.png')}}" class="img-fluid"
                                            style="height: 24px;width: 24px;margin-right: 20px;" />
                                        <div>contact@help.com</div>
                                    </div>
                                </div>
                                <img src="{{url('assets/images/contactImg.png')}}" class="img-fluid"
                                    style="width: 100%;" />
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
    </script>

</body>

</html>