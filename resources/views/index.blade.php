<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <!-- Main header -->
    <div class="container">
        <header class="main-header">
            <div class="header-main__logo">
                <a href="#">
                    <img src="{{ asset('img/LOGO.png') }}" alt="Logo">
                </a>
            </div>
            <div class="main-header__languages">
                <a href="#">
                    <img class="main-header__app" src="{{ asset('img/app-store.png') }}" alt="app">
                </a>
                <a href="#">
                    <img class="main-header__app" src="{{ asset('img/google-play.png') }}" alt="google-play">
                </a>
                <a href="#">
                    <img class="main-header__flag" src="{{ asset('img/uzbflag.png') }}" alt="Uzb flag">
                </a>
                <a href="#">
                    <img class="main-header__flag" src="{{ asset('img/rusflag.jpg') }}" alt="Rus flag">
                </a>
                <a href="#">
                    <img class="main-header__flag" src="{{ asset('img/usaflag.jpg') }}" alt="USA flag">
                </a>
            </div>

            <nav class="main-navigation">
                <ul class="main-navigation__items">
                    <li class="main-navigation__item">
                        <a href="#">Bosh sahifa</a>
                    </li>
                    <li class="main-navigation__item">
                        <a href="#">Biz haqimizda</a>
                    </li>
                    <li class="main-navigation__item">
                        <a href="#">Jarima maydonlari</a>
                    </li>
                    <li class="main-navigation__item">
                        <a href="#">Kontaktlar</a>
                    </li>
                </ul>
            </nav>

            <!-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Link with href
</a>
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Button with data-bs-target
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div> -->

        </header>
    </div>
    <!-- /Main header -->

    <!-- Main section -->

    <section class="main-section">
        <div class="container">
            <div class="main-section__type">
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    Jis.shaxs
                </a>
                <a href="#">
                    <i class="fa fa-building"></i>
                    Yur.shaxs
                </a>
            </div>
            <div class="main-section__search">
                <div class="main-section__input">
                    <input type="text" id="input_one" class="main-section__input-one" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="01" maxlength="2">
                    <input type="text" id="input_two" class="main-section__input-two" placeholder="A 123 EA" maxlength="6" required>
                </div>
                <i class="fa fa-magnifying-glass"></i>
                <h3>Qidirish</h3>
            </div>
        </div>
    </section>

    <!-- /Main section -->



    <!-- Script tag -->

    <script>
        // input 
        var value;
        var value2;

        // const input_two = document.getElementById("input_two");
        // const firstChar = input_two.value.charAt(0);

        // input_two.addEventListener("input", function() {
        //     // Check if the first character is a digit
        //     if (/^[a-zA-Z]+$/.test(firstChar)) {
        //         console.log("First character is a letter");
        //     } else {
        //         console.log("First character is not a letter");
        //     }
        // });


        $(document).ready(function() {


            const inputElement = document.getElementById('input_two');

            inputElement.addEventListener('input', function(event) {
                const inputText = inputElement.value;
                const numberRegex = /^[0-9]+$/;
                const letterRegex = /^[a-zA-Z]+$/;
                const value = inputElement.value;
                const lastindex = value.charAt(value.length - 1);

                if (numberRegex.test(lastindex)) {
                    inputText[lastindex] = inputText[lastindex].replace(/[0-9]/g, '');
                } else if (value.length == 2) {
                    inputText[lastindex] = inputText[lastindex].replace(/[a-zA-Z]/g, '');
                }





                // if (letterRegex.test(inputElement[1])) {

                // } else if (numberRegex.test(inputElement[0])) {
                //     inputElement[0] = inputText.replace(/[^a-zA-Z]/g, '');
                // }
            });

        });







        $(document).ready(function() {




            if ($("#input_one").val() == "") {
                $("#input_one").focus(function() {
                    $(this).val(value);
                });

                $("#input_one").mouseover(function() {
                    $("#input_one").val("--");
                });

                $("#input_one").mouseout(function() {
                    $("#input_one").val(value);
                });
            }


            $("#input_one").keyup(function() {

                value = $("#input_one").val();
                console.log(value);

                if ($(this).val().length > 0 && $(this).val() != "") {
                    $("#input_one").mouseover(function() {
                        $("#input_one").val(value);
                    });
                } else {
                    $("#input_one").focus(function() {
                        $(this).val(value);
                    });

                    $("#input_one").mouseover(function() {
                        $("#input_one").val("--");
                    });

                    $("#input_one").mouseout(function() {
                        $("#input_one").val(value);
                    });
                }


            });

            if ($("#input_two").val() == "") {
                $("#input_two").focus(function() {
                    $(this).val(value2);
                });

                $("#input_two").mouseover(function() {
                    $("#input_two").val("- --- --");
                });

                $("#input_two").mouseout(function() {
                    $("#input_two").val(value2);
                });
            }

            $("#input_two").keyup(function() {
                value2 = $("#input_two").val();
                console.log(value2);

                if ($(this).val().length > 0 && $(this).val() != "") {
                    $("#input_two").mouseover(function() {
                        $("#input_two").val(value2);
                    });
                } else {
                    $("#input_two").focus(function() {
                        $(this).val(value2);
                    });

                    $("#input_two").mouseover(function() {
                        $("#input_two").val("- --- --");
                    });

                    $("#input_two").mouseout(function() {
                        $("#input_two").val(value2);
                    });
                }
            });

        });

        // end input

        // condition input
    </script>
</body>

</html>