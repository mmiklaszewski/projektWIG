$().ready(function() {

    $(document).on("keyup", "#search_form",  function(e) {
    //$('#search_form').on('keyup blur', (function (e) {
    //     $("#search_form").submit(function (e) {
        e.preventDefault();
        var $url = $(this).attr('action');
        var $data = $(this).serialize();




        $.ajax({
            type: "POST",
            cache: false,
            url: $url,
            data: $data,
            success: function (result) {
                   console.log(result);
//                   $("#html").html(result);
                var $container = $(result).find('#main').html();
//                    var $container = $(result).find('#main').html();  //do pelnej zamiany na strona główna




                //$login = '<div id="alert" class="alert alert-success alert-dismissable">Pomyślnie zalogowano</div>';
                //
                //$(".nav").html($menu);
                //$(".panel-title").text('Zalogowano');
                //$(".panel-body").html($login);
                //sessionStorage.counter = 0;
                //
                //if (typeof(Storage) !== "undefined") {
                //    localStorage.setItem("username", $username);
                //    //    $('#username').val(localStorage.getItem("username"));
                //    //    //console.log(localStorage.getItem("username"));
                //}

                $("#main").html($container);  //do pelnej zamiany na strona główna



            }
        });
    })
    //)
    ;

    //$('#login_form input').on('keyup blur', function () { // fires on every keyup & blur
    //    if ($('#login_form').valid()) {                   // checks form for validity
    //        $('button.btn').prop('disabled', false);        // enables button
    //    } else {
    //        $('button.btn').prop('disabled', 'disabled');   // disables button
    //    }
    //});
});