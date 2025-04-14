function statusCert(idTicket, createDate, surname, name, lastname, typeCert, group, status) {
    $('.status-wrapper').css({'display':'flex'});
    $('.header-cert-info').text('Заявка №'+idTicket);
    $('.create-date').text('Создано: '+createDate);
    $('#surname').text(surname);
    $('#name').text(name);
    $('#lastname').text(lastname);
    $('.typeCert').text('Справка: '+typeCert);
    $('.group').text('Группа: '+group);
    $('#ready').val(status);
};

$(document).on('click', '#closeStatus', function(){
    $('.header-cert-info').text('');
    $('.create-date').text('');
    $('.surname').text('');
    $('.name').text('');
    $('.lastname').text('');
    $('.typeCert').text('');
    $('.group').text('');
    $('#ready').val('');
    $('.status-wrapper').css({'display':'none'});
    $('.ready-status').css({'opacity':'0.1'});
    $('.message-status').css({'display':'none'});
    window.location.href='index.php';
});