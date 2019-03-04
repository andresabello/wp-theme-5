jQuery(document).ready(function($) {
    randomnum();
    $('#ac-submit').on('click', function(e) {
        e.preventDefault();
        var me = $(this);
        if (me.data('requestRunning')) {
            return;
        }
        me.data('requestRunning', true);
        var total = parseInt($('.rand1').html()) + parseInt($('.rand2').html());
        var total1 = $('#total').val();
        var nonce = $("input#ac_form_nonce").val();
        var name = $("input[name*='ac_name']").val();
        var phone = $("input[name*='ac_phone']").val();
        var email = $("input[name*='ac_email']").val();
        var option = $("#ac_select").val();
        var choice = $("input[name*='ac_choice']").val();
        var time = $("input[name*='ac_time']").val();
        var insurance = $("input[name*='ac_insurance']").val();
        var treatment = $("input[name*='ac_treatment']").val();
        var questions = $("textarea[name*='ac_message']").val();
        $.ajax({
            type: 'POST',
            url: acajax.ajaxurl,
            data: {
                action: 'ac_form_ajaxhandler',
                ac_name: name,
                ac_phone: phone,
                ac_email: email,
                ac_select: option,
                ac_choice: choice,
                ac_time: time,
                ac_insurance: insurance,
                ac_treatment: treatment,
                ac_message: questions,
                total: total,
                total1: total1,
                nonce: acajax.nonce
            },
            success: function(data, textStatus, XMLHttpRequest) {
                console.log(data);
                $('.errors').remove();
                $("input[name*='ac_name']").removeClass('error-input');
                $("input[name*='ac_email']").removeClass('error-input');
                $("input[name*='ac_phone']").removeClass('error-input');
                $("#total").removeClass('error-input');
                if (data.indexOf('No Name') > -1) {
                    $("input[name*='ac_name']").addClass('error-input');
                    $("input[name*='ac_name']").after("<p class='errors'>You must enter a Name</p>");
                }
                if (data.indexOf('No Email') > -1) {
                    $("input[name*='ac_email']").addClass('error-input');
                    $("input[name*='ac_email']").after("<p class='errors'>You must enter an Email</p>");
                }
                if (data.indexOf('No Phone') > -1) {
                    $("input[name*='ac_phone']").addClass('error-input');
                    $("input[name*='ac_phone']").after("<p class='errors'>You must enter a Phone number</p>");
                }
                if (data.indexOf('No Number') > -1) {
                    $("#total").addClass('error-input');
                    $("input#total").after("<p class='errors'>You must enter a Number</p>");
                }
                if (data.indexOf('Valid Email') > -1) {
                    $("input[name*='ac_email']").addClass('error-input');
                    $("input[name*='ac_email']").after("<p class='errors'>You must enter a valid Email</p>");
                }
                if (data.indexOf('Valid Phone') > -1) {
                    $("input[name*='ac_phone']").addClass('error-input');
                    $("input[name*='ac_phone']").after("<p class='errors'>You must enter a valid Phone number</p>");
                }
                if (data.indexOf('Answer') > -1) {
                    $("#total").addClass('error-input');
                    $("input#total").after("<p class='errors'>You must enter the right Answer</p>");
                }
                if (data.indexOf('success') > -1) {
                    $("#ac-form form").html("<div class='success-form'><h4>Thank you for submitting your information</h4><p>One of our counselors will call you as soon as possible</p></div>");
                }
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {},
            complete: function() {
                me.data('requestRunning', false);
            }
        });
    });

    function randomnum() {
        var number1 = 0;
        var number2 = 10;
        var randomnum = (parseInt(number2) - parseInt(number1)) + 1;
        var rand1 = Math.floor(Math.random() * randomnum) + parseInt(number1);
        var rand2 = Math.floor(Math.random() * randomnum) + parseInt(number1);
        $(".rand1").html(rand1);
        $(".rand2").html(rand2);
    }
});