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
    
    function montarEstados(lista) {
        $.each($(".busca-estado:checked"), function(){            
            lista.push($(this).val())
        })
    }

    function montarTamanhos(lista) {
        $.each($(".busca-tamanho:checked"), function(){            
            lista.push($(this).val())
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
                        } else {
                            $('#consulta-resposta').text(`
                                Ocorreu um erro durante a solicitação. Por favor entre em contato com o administrador do sistema.
                            `)
                            console.log(data)
                        }
                        $('#respostaServidor').modal('show')
                    }
                })
            })

        })
    })
</script>