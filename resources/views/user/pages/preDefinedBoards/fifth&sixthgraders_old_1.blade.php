<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>White Board</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
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
                
                     
                    <div class="col-12 midSection bg-white"
                        style="height: 100vh; overflow-y: scroll;overflow-x: hidden;">
                        <div class="p-2 d-flex" style="top:0;position: sticky;background-color: #d0d0d0;">
                            <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                                style="width:fit-content;background-color:#172337 ;" onclick="backBoard()">Switch to
                                BackBoard&nbsp;<img style="height: 20px ;"
                                    src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                                    <div class="btn rounded-pill text-white px-3 d-flex align-items-center"
                            style="z-index: 1;left:0;background-color: rgb(7,109,168); margin-left: auto;" id="sendEnquiryBtn">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;&nbsp;Send Enquiry <input type="hidden" name="gradeId" value="4"> </div>
                        </div>
                        <div>
                            <img style="width:100% ;height:auto ;" src="{{ url('assets\images\boardImages\WF 5th F.1.jpg') }}" /> 
                        </div>
             
                    </div>
                     
                </div>
            </div>
            <!-- <div class="col-2">
                <div class="bottom-0 position-absolute">
                    <div class="" style="height: 100vh;width: 16.5vw; overflow-y: scroll;">
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

            </div> -->
        </div>
    </section>

    <section id="backBoard" style="display:none;">
        
             
            <div class="col-12 midSection bg-white" style="height: 100vh; overflow-y: scroll;">
                <div class="p-2" style="top:0;position: sticky;background-color: #d0d0d0;">
                    <div class="btn btn-dark rounded-pill text-white px-3 d-flex align-items-center"
                        style="width:fit-content;background-color:#172337;" onclick="backBoard()">Switch to
                        FrontBoard&nbsp;<img style="height: 20px;"
                            src="https://img.icons8.com/material-outlined/24/FFFFFF/move-right.png" /></div>
                </div>
                <div>
                    <img style="width:100% ;height:auto ;" src="{{ url('assets/images/boardImages/wb 5th B.1.jpg') }}" /> 
                </div>
                </div>
                
            </div>
            
             
    </section>
</body>

<script src="{{ asset('public/js/sendEnquiry.js') }}"></script>

</html>