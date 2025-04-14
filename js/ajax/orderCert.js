$(document).on('click', '#createOrder', function (e) {
	e.preventDefault();

    var student = {
        name: $('input[name="name"]').val(),
        surname: $('input[name="surname"]').val(),
        lastname: $('input[name="lastname"]').val(),
        group: $('select[name="group"]').val(),
        typeCert: $('select[name="typeCert"]').val(),
        dateRateStart: $('input[name="dateRateStart"]').val(),
        dateRateEnd: $('input[name="dateRateEnd"]').val(),
    };

    if (student.name.length == 0 || student.surname.length == 0 || student.lastname.length == 0) {
        message('Упс 😬', 'Поля "Имя", "Фамилия", "Отчество" должны быть заполнены!', '', 'Понятно');
    } else if (student.typeCert != 'О стипендии') {
        $.ajax({
            url: 'php/createCert.php',
            type: 'POST',
            dataType: 'json',
            data: {
                student
            },
    
            success (data) {
                message(data.header, data.message, data.idTicket, data.btnText);
            }
        });
    } else if (student.typeCert == 'О стипендии' && student.dateRateStart.length == 0 || student.dateRateEnd.length == 0) {
        message('Упс 😬', 'Для заказа справки "О стипендии" необходимо указать желаемый промежуток времени!', '', 'Понятно')
    } else if (student.typeCert == 'О стипендии' && student.dateRateStart.length != 0 && student.dateRateEnd.length != 0) {
        $.ajax({
            url: 'php/createCert.php',
            type: 'POST',
            dataType: 'json',
            data: {
                student
            },
    
            success (data) {
                message(data.header, data.message, data.idTicket, data.btnText);
                $('.create-cert-form')[0].reset();
            }
        });
    } 

});