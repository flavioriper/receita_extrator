<script>
    function montarCnaes(lista) {
        $('#cnaes-escolhidos').html('')
        lista.forEach(cnae => {
            $('#cnaes-escolhidos').append(`<span class="cnae-escolhido">${cnae}</span>`)
        });
    }

    function removeCnae(cnae, lista) {
        for (var i = 0; i < lista.length; i++){ 
            if (lista[i] === cnae) {
                lista.splice(i, 1); 
            }
        }
    }

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }
    
    function montarEstados(lista) {
        $.each($(".busca-estado:checked"), function(){
            let estado = $(this).val()
            lista.push(estado)
        })
    }

    function montarTamanhos(lista) {
        $.each($(".busca-tamanho:checked"), function(){
            let tamanho = $(this).val()          
            lista.push(pad(tamanho, 2))
        })
    }

    $(document).ready(function() {
        // Main script
        const cnaeList = []
        const estadoList = []
        const tamanhoList = []

        $("#cnaes").autocomplete({
            source: "<?=base_url();?>extrator/get_cnaes",
            minLength: 3,
            select: function( event, ui ) {
                let cnae = ui.item.id
                if (!cnaeList.includes(cnae)) {
                    cnaeList.push(cnae)
                }
                montarCnaes(cnaeList)
                $(this).val('')
                return false
            }
        })

        $(document).on('click', '.cnae-escolhido', function() {
            let cnaeEscolhido = $(this).text()
            removeCnae(cnaeEscolhido, cnaeList)
            montarCnaes(cnaeList)
        })

        $('#solicitacao-insight').click(function() {
            montarEstados(estadoList)
            montarTamanhos(tamanhoList)
            let busca = new Object()
            busca.ocupado = 1
            busca.cnaes = cnaeList
            busca.estados = estadoList
            busca.tamanhos = tamanhoList
            busca = JSON.stringify(busca)

            $('#confirmacaoEnvio').modal('show')
            $('#confirmacaoEnvio').on('hidden.bs.modal', function () {
                $.ajax({
                    url: "<?=base_url('extrator/registrar_consulta')?>",
                    type: 'POST',
                    data: { busca },
                    success: function(data) {
                        if (data == '400') {
                            $('#consulta-resposta').text(`
                                Infelizmente não pudemos realizar sua busca, o sistema já está realizando outra consulta neste momento,
                                espere que esta outra consulta finalize para que possamos atender sua demanda.
                            `)
                            $('#respostaServidor').modal('show')
                        } else if (data != '400' && data != '') {
                            $('#consulta-resposta').text(`
                                Ocorreu um erro durante a solicitação. Por favor entre em contato com o administrador do sistema.
                            `)
                            console.log(data)
                            $('#respostaServidor').modal('show')
                        }
                    }
                })
            })

        })
    })
</script>