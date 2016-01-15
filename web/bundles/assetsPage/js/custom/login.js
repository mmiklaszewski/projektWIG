$().ready(function() {
    $("form").submit(function (e) {
        e.preventDefault();
        var $url = $(this).attr('action');
        var $data = $(this).serialize();

        //login z formularza
        var $username = $(this).find('input[name="_username"]').val();

        //licznik zalogowań w sesji
        if(typeof(Storage) !== "undefined") {
            if (sessionStorage.counter) {
                sessionStorage.counter = Number(sessionStorage.counter) + 1;
            } else {
                sessionStorage.counter = 0;
            }
        }


        $.ajax({
            type: "POST",
            cache: false,
            url: $url,
            data: $data,
            success: function (result) {
//                   console.log(result);
//                   $("#html").html(result);
                var $page = $(result).find('.address-bar').text();
                var $menu = $(result).find('.nav').html();
//                    var $container = $(result).find('#main').html();  //do pelnej zamiany na strona główna



                if($page == 'Logowanie'){
                    if(sessionStorage.counter < 3){
                        $("#alert").html('Niepoprawne dane');
                        $("#alert").removeClass('hidden');
                    } else {
                        $("#alert").html('<a href="'+$url+'/reminder">Hasło zostało wpisane nie poprawnie 3 razy, kliknij aby przejść do przypomnienia</a>');
                        $("#alert").removeClass('hidden');
                    }



                } else if($page == 'Strona główna'){

                    $login = '<div id="alert" class="alert alert-success alert-dismissable">Pomyślnie zalogowano</div>';

                    $(".nav").html($menu);
                    $(".panel-title").text('Zalogowano');
                    $(".panel-body").html($login);
                    sessionStorage.counter = 0;

                    //if (typeof(Storage) !== "undefined") {
                        localStorage.setItem("username", $username);
                        //    $('#username').val(localStorage.getItem("username"));
                        //    //console.log(localStorage.getItem("username"));
                  //  }

//                        $("#main").html($container);  //do pelnej zamiany na strona główna
                }


            }
        });
    });

    function init() {
        if (localStorage["username"]) {
            $("#avatar").removeClass('hidden');
            $("#not-me").removeClass('hidden');
            $('#username').val(localStorage["username"]);
            $("#avatar-user").text(localStorage["username"]);
            $("#username").addClass('hidden');
            //$('#username').prop('disabled', 'disabled');
        }
    }
    init();

    $('#not-me').click(function(){
        localStorage.clear();
    });


    $("#login_form").validate({
        rules: {
            _username: {
                required: true,
                //pattern: /^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/
            },
            _password: {
                required: true,
                //pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/
            }
        },
        messages: {
            _username: {
                required: "Pole jest wymagane",
                //pattern: "Wprowadź poprawna nazwę użytkownika"
            },
            _password: {
                required: "Pole jest wymagane",
                //pattern: "Hasło musi zawierać mała literę, duża literę oraz cyfrę"
            }
        }
    });
    $('#login_form input').on('keyup blur', function () { // fires on every keyup & blur
        if ($('#login_form').valid()) {                   // checks form for validity
            $('#_submit').prop('disabled', false);        // enables button
        } else {
            $('#_submit').prop('disabled', 'disabled');   // disables button
        }
    });
});