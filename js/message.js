function message(messageHeader, messageText, idTicket, textBtn) {
    $('.message-wrapper').css({'display':'flex'});
    $('.message-header').text(messageHeader);
    $('.message-text').text(messageText);
    $('.id-ticket').text(idTicket);
    $('#closeMessage').text(textBtn)
};

$(document).on('click', '#closeMessage', function(){
    $('.message-wrapper').css({'display':'none'});
    $('.message-text').text('');
    $('.message-header').text('');
    $('.id-ticket').text('');
    $('#closeMessage').text('');
    window.location.href='index.php';
});