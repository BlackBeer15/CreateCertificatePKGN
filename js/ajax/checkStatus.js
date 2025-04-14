$(document).on('click', '#checkStatus', function(e){
    e.preventDefault();

    idTicket = $('input[name="idTicket"]').val();

    if (idTicket.length==0) {
        message('Упс 😬', 'Не указан номер заявки', '', 'Понятно');
    } else {
        $.ajax({
            url: 'php/checkStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                idTicket
            },
    
            success (data) {
                if (data.valid==true) {
                    statusCert(data.idTicket, data.createDate, data.surname, data.name, data.lastname, data.typeCert, data.group, data.status);
                    if ($('#ready').val()=='Готово') {
                        $('.ready-status').css({'opacity':'1'});
                        $('.message-status').css({'display':'block'});
                    }
                } else {
                    message(data.header, data.message, '', data.btnText);
                }
            }
        });
    }
});