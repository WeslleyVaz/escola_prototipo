$(document).ready(function() {
    $('#entrar').click(function() {
        
        alert('entrei');
    
    });

    if ($("cpf").val() === "" || $("senha").val() === "") {
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Preencha todos os campos!',
        });
    }

    var letras = $('#senha').val().length
    console.log(letras);
    if (letras < 6) {
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'A senha deve ter no mínimo 6 caracteres!',
        });
        return;
    }

    $.ajax({
        url: './api/login_inspetoras',
        type: 'POST',
        data: {
            email: $('#cpf').val(),
            senha: $('#senha').val()
        },
        success: function(response) {
            if (response.erro == 'n') {
                alert(response.token);
                $.cookie('token', response.token, { expires: 7 });
                $.cookie('inspetora_id', response.inspetora_id, { expires: 7 });
                setTimeout(function() {
                    window.location.href = './home';
                }, 3000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: response.mensagem,
                });
            }
        }
    });
});