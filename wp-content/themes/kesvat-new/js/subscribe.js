var form = $("#subscribeForm");
form.submit(function (e) {
    e.preventDefault();
    $("button").prop('disabled', false);
    $("#fail_message").html("");
    $("#success_message").html("");

    var data = {};
    data.action = 'subscribe-form';
    form.find('input').each(function () {
        data[$(this).attr('name')] = $(this).val();
    });
    $.ajax({
        data: data,
        type: 'POST',
        url: _info.templateUrl + 'theme/Router.php',
        cache: false,
        success: function (response) {
            if (response.success === true) {
                $("button").prop('disabled', false);
                form.find('input').not("#_token").each(function () {
                    $(this).val("");
                    $(this).attr('disabled', true);
                    $(this).addClass('disabled');
                    $("button").hide();
                });
                $("#success_message").html(response.message + '<div class="form-message-close"><i class="fa fa-times"></i></div>');
                $("#success_message").append("</ul>");
                $("#success_message").addClass('show');

            }
            else {
                $("button").prop('disabled', false);
                $("#fail_message").html('');
                $("#fail_message").append('<ul><div class="form-message-close"><i class="fa fa-times"></i></div></ul>');
                $.each(response.errors, function (k, v) {
                    $("#fail_message ul").append("<li>" + v + "</li>");
                });
                $("#fail_message").append("</ul>");
                $("#fail_message").addClass('show');
                grecaptcha.reset();
            }
        },
        error: function (e) {
            $("#fail_message").html("Sorry there is something wrong we are working on it :(");
        }
    });
});

$('.form-message-close').on('click', function (e) {
    e.preventDefault();
    closeToaster();
});
$('body').on('click', function (e) {
    closeToaster();
});
function closeToaster() {
    $('.form-message').removeClass('show');
}

function SubscribeForm(){

    form.trigger('submit');


}
