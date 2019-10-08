<script>

    function deleteSpecialChar(txtName) {
        if (txtName.value != '' && txtName.value.match(/^[\w ]+$/) == null) 
        {
            txtName.value = txtName.value.replace(/[\W]/g, '');
        }
    }

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
            if (!lista.includes(estado)) {
                lista.push(estado)
            }
        })
    }

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function montarTamanhos(lista) {
        $.each($(".busca-tamanho:checked"), function(){
            let tamanho = $(this).val()
            if (!lista.includes(tamanho)) {
                lista.push(pad(tamanho, 2))
            }
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
                let cnae = ui.item.value
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
            let nomeArquivo = $('#nome_arquivo').val()
            let email = $('#email').val()
            if (nomeArquivo == '') {
                $('#erro-corpo').text('É necessário definir um nome para seu arquivo, apenas assim conseguimos garantir que você receba as informações corretas.')
                $('#erroEnvio').modal('show')
                return false
            }
            if (!isEmail(email)) {
                $('#erro-corpo').text('É necessário um e-mail válido para o campo de e-mail.')
                $('#erroEnvio').modal('show')
                return false
            }
            montarEstados(estadoList)
            montarTamanhos(tamanhoList)
            let busca = new Object()
            busca.cnaes = cnaeList.map(element => element.substring(0, element.indexOf(' |')))
            busca.estados = estadoList
            busca.tamanhos = tamanhoList
            busca.nome = nomeArquivo
            busca.email = email
            busca = JSON.stringify(busca)
            $('#confirmacaoEnvio').modal('show')
            $.ajax({
                url: "<?=base_url('extrator/registrar_consulta')?>",
                type: 'POST',
                data: { busca },
                success: function(data) {
                    
                }
            })

        })
    })
</script>