$(document).ready(function() {
    $('#login-gestao').submit(function(event) {
        event.preventDefault();

        var cpf = $('#cpf-gestao').val();
        var senha = $('#senha-gestao').val();

        if(cpf === '' || senha === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha todos os campos!',
            });
            return;
        }

        if(senha.length < 6) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'A senha deve ter pelo menos 6 caracteres!',
            });
            return;
        }

        $.ajax({
            url: '/api/Login_gestao',
            type: 'POST',
            data: {
                cpf: cpf,
                senha: senha
            },
            success: function(response) {
                if(response.erro === 'n') {
                    $.cookie('token_gestao', response.token, { expires: 7, path: '/' });
                    $.cookie('gestao_id', response.gestao.id, { expires: 7, path: '/' });
                    window.location.href = '/dashboard-coordenacao';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: response.message,
                    });
                }
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: response.responseJSON?.message || 'Não foi possível realizar o login. Tente novamente.',
                });
            }
        });
    });
});