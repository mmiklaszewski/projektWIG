$(document).ready(function(){
    $(".edit_group_form").validate({
        rules: {
            group_name: {
                required: true,
                pattern: /^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{1,20}$/
            }
        },
        messages: {
            group_name: {
                required: "Pole jest wymagane",
                pattern: "Nazwa grupy musi rozpoczynać się z dużej litery"
            }
        }
    });


    $('.edit_group_form input').on('keyup blur', function () { // fires on every keyup & blur
        if ($('.edit_group_form').valid()) {                   // checks form for validity
            $('button.btn').prop('disabled', false);        // enables button
        } else {
            $('button.btn').prop('disabled', 'disabled');   // disables button
        }
    });

    $("form").submit(function(e) {
        e.preventDefault();
        var $url = $(this).attr('action');
        var $data = $(this).serialize();

        var $id = $(this).find('input[name="group_id"]').val();
        var $name = $(this).find('input[name="group_name"]').val();




        $.ajax({
            type: "POST",
            cache: false,
            url: $url,
            data: $data,
            success: function(data){

                console.log($url);
                $(".alert").text("Zmiany zostały wprowadzone");
                $(".alert").show().delay(2000).fadeOut();

                $("."+$id+"-name").text($name);


            }
        });
    })

    $('.remove').click(function(e){
        var $url = $(this).attr('href');
        var $id = $(this).attr('id');
        e.preventDefault();


        var confirm1 = confirm('Czy napewno usunac?');
        if (confirm1) {
            $removed = '<td colspan="6"><div id="alert" class="alert alert-danger alert-dismissable" style="margin-bottom: 0px">Skasowana</div></td>';
            $.ajax({
                type: "POST",
                url: $url,
                success: function(){
                    $("#contentRow-"+$id).html($removed);

                }
            });
        }
    });

});
