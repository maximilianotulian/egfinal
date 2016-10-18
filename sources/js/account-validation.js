var onSubmitHandler = function () {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var repeat_password = $('#repeat-password').val();
    var mensaje = '';

    $('.warning').hide();

    if (!isOnlyText(first_name)) {
        $('#lbl_first_name').addClass('form-error').text('(*) Nombre');
        mensaje += 'El nombre no debe contener números.\n';
    } else {
        $('#lbl_first_name').removeClass('form-error').text('Nombre');
    }

    if (!isOnlyText(last_name)) {
        $('#lbl_last_name').addClass('form-error').text('(*) Apellido');
        mensaje += 'El apellido no debe contener números.\n';
    } else {
        $('#lbl_last_name').removeClass('form-error').text('Apellido');
    }

    if (!validatePassWord(password)) {
        $('#lbl_password').addClass('form-error').text('(*) Contraseña');
        mensaje += 'La contraseña debe estar compuesta por al menos 8 caracteres, 1 mayúscula, 1 minuscula y un número.\n';
    } else {
        $('#lbl_password').removeClass('form-error').text('Contraseña');
    }

    if (!isEqual(password, repeat_password)) {
        $('#lbl_repeat-password').addClass('form-error').text('(*) Repetir Contraseña');
        mensaje += 'Las contraseñas deben ser iguales.\n';
    } else {
        $('#lbl_repeat-password').removeClass('form-error').text('Repetir Contraseña');
    }

    if (!isEqual(mensaje, '')) {
        $('#lbl_form-account').addClass('form-error').text(mensaje);
    } else {
        $('#lbl_form-account').removeClass('form-error').text('');
    }

    return (mensaje === '') ? true : false;
};

$(document).ready(function () {
    $('#form-account').submit(onSubmitHandler);
});
