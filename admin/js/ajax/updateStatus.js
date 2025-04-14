$('tr').on('click', 'button', function(){
    idTicket = $(this).val();
    value = $(this).text();

    $.ajax({
        url: 'php/updateStatus.php',
        type: 'POST',
        dataType: 'json',
        data: {
            idTicket,
            value
        },

        success (data) {
            if (data.status==true) {
                location.reload();
            }
        }
    });
});