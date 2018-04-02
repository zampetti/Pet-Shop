$(document).ready(function () {
    var $form = $('#form');
    var ajaxmessage = $('#ajax-message');
        
    $form.submit(function (event) {
        event.preventDefault();
        var serializedData = $form.serialize();
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: serializedData
        })
            .done(function (response) {
                $(ajaxmessage).removeClass('error');
                $(ajaxmessage).addClass('success');
                $(ajaxmessage).text(response);
              
                $('#FirstName').val('');
                $('#LastName').val('');
                $('#Email').val('');
                $('#Message').val('');
            })
            .fail(function (data) {
                $(ajaxmessage).removeClass('success');
                $(ajaxmessage).addClass('error');
                if (data.responseText !== '') {
                    $(ajaxmessage).text(data.responseText);
                } else {
                    $(ajaxmessage).text('Oops! An error occured and your message could not be sent.');
                }
            });
    });
});
