$(document).ready(function() {

    $("#SalvarI").click(function() {

        if ($('#cpf').val() == "" || $('#senha').val() == "") {

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, preencha todos os campos.',
            });

            return false;
        }

        const token_gestao = $.cookie('token_gestao');
        const gestao_id = $.cookie('gestao_id');
        if($('#tokenGestao').val() == " " || $('#gestao_id').val() == " ") {
            Swal.fire({
                icon: 'error',
                title: 'sessão expirada',
                text: 'Entre novamente para continuar'
            });
            return;
        }
        
        let file = $("#imagem")[0].files[0];
        if (file && file.size > 100000000) {
            Swal.fire({
                icon: "warning",
                title: "imagem gigantesca slc",
                text: "coloque uma imagem mais magra pfvr"
            })
            return;
        }
        let formData = new FormData();
        if (file) {
            formData.append("imagem", file);
        }
        formData.append("nome", $("#nome").val());
        formData.append("cpf", $("#cpf").val());
        formData.append("senha", $("#senha").val());
        formData.append("gestao_id", gestao_id);
        formData.append("token_gestao", token_gestao);

        
        $.ajax({
            type: "POST",
            url: "../api/salvar_inspetora",
            data: formData,
            processData: false,
            contentType: false,

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