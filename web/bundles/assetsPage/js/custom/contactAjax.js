$(document).ready(function(){
    $(".commentForm").validate({
        rules: {
            contact_name: {
                required: true,
                pattern: /^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{1,20}$/
            },
            contact_surname: {
                required: true,
                pattern: /^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{1,20}$/
            },
            contact_email: {
                required: true,
                email: true
            },
            contact_phone: {
                required: true,
                pattern: /^[56789][0-9]{8}$/
            },
            contact_province: {
                required: true
            },
            contact_city: {
                required: true,
                pattern: /^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{1,20}$/
            },
            contact_street: {
                required: true,
                pattern: /^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]{1,20}$/
            },
            contact_home_number: {
                required: true,
                digits: true
            },
            contact_postal_code: {
                required: true,
                pattern: /^[0-9]{2}\-[0-9]{3}$/
            }
        },
        messages: {
            contact_name: {
                required: "Pole jest wymagane",
                pattern: "Imie musi rozpoczynać się z dużej litery"
            },
            contact_surname: {
                required: "Pole jest wymagane",
                pattern: "Naziwsko musi rozpoczynać się z dużej litery"
            },
            contact_email: {
                required: "Pole jest wymagane",
                email: "Pole musi zawierać adres email: test@test.pl"
            },
            contact_phone: {
                required: "Pole jest wymagane",
                pattern: "Wprowadź poprawny numer telefonu"
            },
            contact_province: {
                required: "Pole jest wymagane"
            },
            contact_city: {
                required: "Pole jest wymagane",
                pattern: "Wprowadź poprawnie miasto"
            },
            contact_street: {
                required: "Pole jest wymagane",
                pattern: "Wprowadź poprawnie miasto"
            },
            contact_home_number: {
                required: "Pole jest wymagane",
                digits: "Numer domu musi być liczbą"
            },
            contact_postal_code: {
                required: "Pole jest wymagane",
                pattern: "Kod pocztowy 00-000"
            }
        }
    });


    $('.commentForm input').on('keyup blur', function () {
        if ($('.commentForm').valid()) {                   // checks form for validity
            $('button.btn').prop('disabled', false);        // enables button
        } else {
            $('button.btn').prop('disabled', 'disabled');   // disables button
        }
    });


    $("form").submit(function(e) {
        e.preventDefault();
        var $url = $(this).attr('action');
        var $data = $(this).serialize();

        var $id = $(this).find('input[name="contact_id"]').val();
        var $name = $(this).find('input[name="contact_name"]').val();
        var $surname = $(this).find('input[name="contact_surname"]').val();
        var $group = $(this).find('select[name="group_id"]').val();
        var $email = $(this).find('input[name="contact_email"]').val();
        var $phone = $(this).find('input[name="contact_phone"]').val();
        var $province = $(this).find('select[name="contact_province"]').val();
        var $city = $(this).find('input[name="contact_city"]').val();
        var $street = $(this).find('input[name="contact_street"]').val();
        var $home = $(this).find('input[name="contact_home_number"]').val();
        var $code = $(this).find('input[name="contact_postal_code"]').val();




        $.ajax({
            type: "POST",
            cache: false,
            url: $url,
            data: $data,
            success: function(data){

                $(".alert").text("Zmiany zostały wprowadzone");
                $(".alert").show().delay(2000).fadeOut();

                $("."+$id+"-name").text($name);
                $("."+$id+"-surname").text($surname);
                $("."+$id+"-group").text($group);
                $("."+$id+"-email").text($email);
                $("."+$id+"-phone").text($phone);
                $("."+$id+"-province").text($province);
                $("."+$id+"-city").text($city);
                $("."+$id+"-street").text($street);
                $("."+$id+"-home").text($home);
                $("."+$id+"-code").text($code);


            }
        });
    })

    $('.remove').click(function(e){
        var $url = $(this).attr('href');
        var $id = $(this).attr('id');
        e.preventDefault();


        var confirm1 = confirm('Czy napewno usunac?');
        if (confirm1) {
            $removed = '<td colspan="6"><div id="alert" class="alert alert-danger alert-dismissable" style="margin-bottom: 0px">Skasowany</div></td>';
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