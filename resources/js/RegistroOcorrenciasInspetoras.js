$(document).ready(function() {

    $("#registrar-ocorrencia").click(function() {

        if($('#aluno').val() == "" || $('#inspetora_responsavel').val() == "" || $('#ocorrido').val() == "" || $('#procedimento_realizado').val() == "" || $('#turma').val() == ""){
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Por favor, preencha todos os campos.',
            });

            return false;
        }

        let inspetora = $.cookie('inspetora');
        let token_inspetora = $.cookie('token_inspetora');

        jq.ajax({
            url: '../api/salvar_ocorrencias',
            type: 'POST',
            data: {
                nome_aluno: $('#aluno').val(),
                turma_aluno: $('#turma').val(),
                rm_aluno: $('#rm').val(),
                inspetora_responsavel: $('#inspetora_responsavel').val(),
                ocorrido: $('#ocorrido').val(),
                procedimento_realizado: $('#procedimento_realizado').val()
            },
            success: function(response) {

                if(response.erro == 'n'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: 'mensagem de sucesso',

                    })
                }
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'mensagem de erro',
                });
            }
        });

    });

});