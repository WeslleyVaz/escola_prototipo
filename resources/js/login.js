$(document).ready(function() {
    $('#login-inspetoras').submit(function(event) {
        event.preventDefault();

        var cpf = $('#cpf-inspetora').val();
        var senha = $('#senha-inspetora').val();

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
            url: '/api/login_inspetoras',
            type: 'POST',
            data: {
                cpf: cpf,
                senha: senha
            },
            success: function(response) {
                if(response.erro === 'n') {
                    $.cookie('inspetora_token', response.token, { expires: 7, path: '/' });
                    $.cookie('inspetoras_id', response.inspetora.id, { expires: 7, path: '/' });
                    window.location.href = '/dashboard-inspetoras';
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

    $('#login-gestao').submit(function(event) {
        event.preventDefault();

        const cpf = $('#cpf-gestao').val();
        const senha = $('#senha-gestao').val();

        if (!cpf || !senha) {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Preencha o CPF e a senha.',
            });
            return;
        }

        $.ajax({
            url: '/api/login_gestao',
            type: 'POST',
            data: { cpf, senha },
            success: function(response) {
                if (response.erro === 'n') {
                    $.cookie('gestao_token', response.token, { expires: 7, path: '/' });
                    $.cookie('gestao_id', response.gestao.id, { expires: 7, path: '/' });
                    window.location.href = '/dashboard-coordenacao';
                    return;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Não foi possível entrar',
                    text: response.message,
                });
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
