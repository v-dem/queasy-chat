(function($, window, undefined) {
    var chatId = '';

    function get$Message(data) {
        var html = 
            '<blockquote class="blockquote qc-chat-message">'
                + '<p class="mb-0"><span class="fa fa-commenting-o"></span>&nbsp;<span class="qc-message-text"></span>'
                + '<footer class="blockquote-footer"><span class="qc-message-author"></span> <cite class="qc-message-date"></cite></footer>'
            + '</blockquote>';

        var $message = $(html);
        $message.data('id', data.id);
        $message.data('poster-id', data.poster_id);
        $message.find('.qc-message-text').text(data.text);
        $message.find('.qc-message-author').text(data.poster_name);
        $message.find('.qc-message-date').text(data.date_created);

        return $message;
    }

    $('#chatForm').submit(function() {
        var $form = $(this);

        $.ajax({
            'url': this.action,
            'method': this.method,
            'data': $form.serialize(),
            'timeout': 10000
        }).done(function(response) {
            $form[0].reset();
        }).fail(function(error) {
            console.log(error);
        });

        return false;
    });

    function reload() {
        $.ajax({
            'url': chatId,
            'method': 'GET',
            'cache': false,
            'dataType': 'json',
            'timeout': 10000
        }).done(function(response) {
            var messages = [];
            for(var i = 0; i < response.length; i++) {
                messages.push(get$Message(response[i]));
            }

            $('#chatWindow .qc-chat-message').remove();
            $('#chatWindow').append(messages);
        }).fail(function(error) {
            console.log(error);
        }).always(function() {
            setTimeout(reload, 2000);
        });
    }

    reload();
})(jQuery, window);

