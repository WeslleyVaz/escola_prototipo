$(document).ready(function() {

    $("#registrar-inspetora").click(function() {

        if ($('#cpf').val() == "" || $('#senha').val() == "") {

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, preencha todos os campos.',
            });

            return false;
        }

        $.ajax({
            type: "POST",
            url: "../api/salvar_inspetora",
            data: {
                nome: $('#nome').val(),
                cpf: $('#cpf').val(),
                senha: $('#senha')
            },
            success: function (response) {
                if(response.erro == 'n'){
                    Swal.fire({
                        icon: 'sucess',
                        title: 'sucesso',
                        text: 'mensagem de sucesso',
                    })
                }
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'mensagem de erro'
                });
            }

        });

    });

});