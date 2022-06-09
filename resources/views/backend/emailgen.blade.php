@extends('layouts.backend')

@section('style')
<link href="{{asset("backend_assets")}}/css/emailgen.css" rel="stylesheet" />
<style>
    .page-content{
        padding-right: 0;
        padding-left: 0;
        background-image: url('{{asset('backend_assets')}}/images/hexagon.svg');
        background-size:cover;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row align-items-center top_row" style="height: 97vh;">
            <div class="form-holder col-sm-12 col-md-6">
                <!-- <form action=""> -->
                <div class="form-content">
                    <div class="form-items">
                        <h1 class="gradient_text">EFinder v1.2</h1>
                        <p>Fill in the data below.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control cs_bg" type="text" id="first_name" placeholder="First Name"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <input class="form-control cs_bg" type="text" id="last_name" placeholder="Last Name"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control cs_bg" type="text" id="domain" placeholder="example.com"
                                required>
                        </div>

                        <div class="mt-2 alert_box">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progess_secondary progress-bar-animated"
                                    id="progress_bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="alert_box">
                            <!-- <label class="form-check-label">I confirm, it's my responsibility.</label> -->
                            <small id="first_namecheck" style="color: rgb(255, 100, 100);">First Name
                                missing.</small>
                            <small id="last_namecheck" style="color: rgb(255, 100, 100);">Last Name missing.</small>
                            <small id="domaincheck" style="color: rgb(255, 100, 100);">Domain missing.</small>
                        </div>

                        <div class="form-button">
                            <button id="submitbtn" type="submit" class="btn me-2"><i class="fa-solid fa-dna"></i>
                                Genarate</button>
                            <button id="resetbtn" type="button" class="btn float-end"><i
                                    class="fa-solid fa-rotate-right"></i> Reset</button>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
            <div class="form-holder col-sm-12 col-md-6">
                <div class="form-content">
                    <div class="form-items text-light">
                        <h1 class="gradient_text">Generated Email</h1>
                        <p>Need to verify first</p>

                        <p class="text-light" id="output"></p>

                        <button id="copyFunc" type="button" class="btn btn-sm btn-success d-none"><i
                                class="fa-solid fa-copy"></i> Copy Emails</button>

                        <a id="sendFunc" href="" target="_blank" class="btn btn-sm btn-success d-none"><i
                                class="fa-solid fa-copy"></i> Send GMail</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="container-fluid m-0 p-0">
        <marquee behavior="scroll" direction="left" scrollamount="10" style="border-bottom: 2px solid #c2d7ef;">
            <img src="{{asset('backend_assets')}}/images/car.svg" class="vec_car">
        </marquee>
        <div class="col-sm-12 col-md-12">
            {{-- <p class="text-light text-center" style="margin-bottom: 5px"><small>Planning By Jayonta Debnath.</small>
            </p> --}}
            <p class="text-light text-center mt-2">Copyright &copy; <script type="text/javascript">
                    var year = new Date();
                    document.write(year.getFullYear());
                </script> 🤖 Development By <a class="link-copyright" target="_blank"
                    href="https://rixetbd.github.io/portfolio/">Rabiul Islam.</a></p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript"
        src="https://res.cloudinary.com/veseylab/raw/upload/v1636192990/magicmouse/magic_mouse-1.2.1.cdn.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.js"></script>



    <script>
        $('#first_namecheck').hide();
        $('#last_namecheck').hide();
        $('#domaincheck').hide();


        function progressBar() {
            if ($("#first_name").val() != '' && $("#domain").val() != '' && $("#last_name").val() != '') {
                $('#progress_bar').css("width", "100%");
                $('#progress_bar').css("background-color", "#008000");
                $('#submitbtn').addClass("bg-success");
            } else if ($("#first_name").val() == '' && $("#domain").val() !== '' && $("#last_name").val() !== '') {
                $('#progress_bar').css("width", "66%");
                $('#progress_bar').css("background-color", "#ffff0071");
                $('#submitbtn').removeClass("bg-success");
            } else if ($("#first_name").val() != '' && $("#domain").val() != '' && $("#last_name").val() == '') {
                $('#progress_bar').css("width", "66%");
                $('#submitbtn').removeClass("bg-success");
                $('#progress_bar').css("background-color", "#ffff0071");
            } else if ($("#first_name").val() != '' && $("#domain").val() == '' && $("#last_name").val() != '') {
                $('#progress_bar').css("width", "66%");
                $('#submitbtn').removeClass("bg-success");
                $('#progress_bar').css("background-color", "#ffff0071");
            } else if ($("#first_name").val() == '' && $("#domain").val() == '' && $("#last_name").val() != '') {
                $('#progress_bar').css("width", "33%");
                $('#submitbtn').removeClass("bg-success");
            } else if ($("#first_name").val() != '' && $("#domain").val() == '' && $("#last_name").val() == '') {
                $('#progress_bar').css("width", "33%");
                $('#submitbtn').removeClass("bg-success");
            } else if ($("#first_name").val() == '' && $("#domain").val() != '' && $("#last_name").val() == '') {
                $('#progress_bar').css("width", "33%");
                $('#submitbtn').removeClass("bg-success");
            } else {
                $('#progress_bar').css("width", "0%");
                $('#submitbtn').removeClass("bg-success");
            }
        }

        $("#first_name").focusout(function () {
            $('#progress_bar').css("transition", "1s ease-in");
            progressBar();
        });
        $("#first_name").keyup(function () {
            $('#progress_bar').css("transition", "1s ease-in");
            progressBar();
        });

        $("#last_name").focusout(function () {
            $('#progress_bar').css("transition", "1s ease-in");
            progressBar();
        });
        $("#last_name").keyup(function () {
            $('#progress_bar').css("transition", "1s ease-in");
            progressBar();
        });

        $("#domain").focusout(function () {
            $('#progress_bar').css("transition", "1s ease-in");
            progressBar();
        });
        $("#domain").keyup(function () {
            $('#progress_bar').css("transition", "1s ease-in");
            progressBar();
        });


        $("#submitbtn").click(function () {

            var firstNameInput = $("#first_name").val().toLowerCase().replace(/\s/g, '');
            var lastNameInput = $("#last_name").val().toLowerCase().replace(/\s/g, '');
            var domainInput = $("#domain").val().toLowerCase().replace(/\s/g, '.');

            if (firstNameInput.length == '') {
                $('#first_namecheck').show();
            } else {
                $('#first_namecheck').hide();
            }

            if (lastNameInput.length == '') {
                $('#last_namecheck').show();
            } else {
                $('#last_namecheck').hide();
            }

            if (domainInput.length == '') {
                $('#domaincheck').show();
            } else {
                $('#domaincheck').hide();
            }

            // ------------------------- Test

            var str1 = firstNameInput;
            var str2 = lastNameInput;
            var str3 = "@" + domainInput;
            // var str1 = localStorage.getItem("firstName");
            // var str2 = localStorage.getItem("lastName");
            // var str3 = "@" + localStorage.getItem("domain");

            var a = firstNameInput.concat(lastNameInput, str3);
            var b = firstNameInput.concat(str3);
            var c = lastNameInput.concat(str3);
            var d = lastNameInput.concat(firstNameInput, str3);
            var e = firstNameInput.charAt(0);
            var f = lastNameInput.charAt(0);

            let emails =
                `${b}\n${c}\n${a}\n${d}\n${str1 + "." + str2 + str3}\n${e + "." + str2 + str3}\n${str1 + "_" + str2 + str3}\n${str1 + "-" + str2 + str3}\n${e + str2 + str3}\n${str1 + f + str3}\n${str2 + e + str3}\n${e + f + str3}`;

            let gtomail = `${b};${c};${a};${d};${str1 + "." + str2 + str3};${e + "." + str2 + str3};${str1 + "_" + str2 + str3};${str1 + "-" + str2 + str3};${e + str2 + str3};${str1 + f + str3};${str2 + e + str3};${e + f + str3}`;

            const output = document.getElementById('output')
            const copyFunc = document.getElementById('copyFunc')
            const sendFunc = document.getElementById('sendFunc')

            // let mailtro = `mailto:${gtomail}`;
            let mailtro = `https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=${gtomail}&body=`;
            $('#sendFunc').attr("href", mailtro);

            if ($("#first_name").val() != '' && $("#domain").val() != '' && $("#last_name").val() != '') {
                output.innerText = emails
            // }

            // if (output.innerText != null) {
                copyFunc.classList.remove('d-none')
                sendFunc.classList.remove('d-none')
            }


            let divToast = null;

            copyFunc.addEventListener('click', function () {
                window.navigator.clipboard.writeText(output.innerText)
                if (divToast != null) {
                    divToast.remove();
                    divToast = null;
                }
                generateToastmessage(`All Email Copied`)
            })

            function generateToastmessage(msg) {
                divToast = document.createElement('div')
                divToast.innerText = msg;
                divToast.className = 'toast-message toast-message-slide-in';

                divToast.addEventListener('click', function () {
                    divToast.classList.remove('toast-message-slide-in');
                    divToast.classList.add('toast-message-slide-out');

                    divToast.addEventListener('animationend', function () {
                        divToast.remove();
                        divToast = null;
                    })
                })

                setTimeout(function () {
                    divToast.classList.remove('toast-message-slide-in');
                    divToast.classList.add('toast-message-slide-out');
                    divToast.remove();
                    divToast = null;
                }, 4000);

                document.body.appendChild(divToast);
            }


        });

        $("#resetbtn").click(function () {
            $('#first_name').val("");
            $('#last_name').val("");
            $('#domain').val("");
            let emails = null;
            const output = document.getElementById('output')
            output.innerText = emails
            const copyFunc = document.getElementById('copyFunc')
            copyFunc.classList.add('d-none')
            sendFunc.classList.add('d-none')
            progressBar();
            // location.reload();
        });

        // if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
        //     localStorage.clear();
        // }
    </script>

@endsection
