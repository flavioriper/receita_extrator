<div class="row py-3">
    <div class="col-10 m-auto py-3">
        <div class="col-12">
            <h1 class="ml-4">Digite o nome do arquivo <span class="small">(Será o nome do arquivo para referência ao final, escolha um nome objetivo)</span></h1>
            <div class="container-fix p-3">
                <input 
                    id="nome_arquivo" 
                    placeholder="Informe o nome do arquivo"
                    name="nome_arquivo" 
                    type="text" 
                    class="form-control" 
                    aria-required="true" 
                    aria-invalid="false"
                    onkeyup="javascript:deleteSpecialChar(this)">
            </div>
        </div>
    </div>
    <div class="col-10 m-auto py-3">
        <div class="col-12">
            <h1 class="ml-4">Digite o e-mail para envio do arquivo finalizado</h1>
            <div class="container-fix p-3">
                <input 
                    id="email" 
                    placeholder="Informe um e-mail inhouse válido"
                    name="email" 
                    type="text" 
                    class="form-control" 
                    aria-required="true" 
                    aria-invalid="false">
            </div>
        </div>
    </div>
    <div class="col-10 m-auto py-3">
        <div class="col-12">
            <h1 class="ml-4">Por estado <span class="small">(Não altere para selecionar todos os estados)</span></h1>
            <div class="container-fix p-3 pl-5">
                <?php foreach($estados as $estado) {?>
                    <label for="inline-checkbox1" class="form-check-label col-3">
                        <input 
                            type="checkbox"
                            name="busca_estado"
                            value="<?=$estado->sigla?>"
                            class="form-check-input busca-estado"><?=$estado->nome?> (<?=$estado->sigla?>)
                    </label>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-10 m-auto py-3">
        <div class="col-12">
            <h1 class="ml-4">Por CNAE <span class="small">(Não altere para selecionar todos os CNAEs. Clique no Cnae escolhido para retirar da busca)</span></h1>
            <div class="container-fix p-3">
                <input 
                    id="cnaes" 
                    placeholder="Digite o CNAE ou atividade para pesquisa"
                    name="cnaes" 
                    type="text" 
                    class="form-control" 
                    aria-required="true" 
                    aria-invalid="false">
                <div class="p-2" id="cnaes-escolhidos"></div>
            </div>
        </div>
    </div>
    <div class="col-10 m-auto py-3">
        <div class="col-12">
            <h1 class="ml-4">Por tamanho <span class="small">(Não altere para selecionar todos os tamanhos)</span></h1>
            <div class="container-fix p-3">
                <div class="form-check-inline form-check">
                    <?php foreach($portes as $porte) {?>
                        <label for="inline-checkbox1" class="form-check-label px-4">
                            <input
                                type="checkbox"
                                name="busca-tamanho"
                                value="<?=$porte->codigo?>"
                                class="form-check-input busca-tamanho"><?=$porte->descricao?>
                        </label>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 m-auto">
        <button id="solicitacao-insight" type="button" class="btn btn-lg btn-success btn-block">
            <i class="fa fa-check fa-lg"></i>&nbsp;
            <span id="payment-button-amount">Enviar requisição</span>
        </button>
    </div>
</div>

<!-- Modal de resposta do servidor -->
<div class="modal fade" id="confirmacaoEnvio" tabindex="-1" role="dialog" aria-labelledby="confirmacaoEnvioLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacaoEnvioLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sua consulta foi enviada para a fila. Assim que estiver disponível enviaremos um e-mail com o link para download.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de erro do servidor -->
<div class="modal fade" id="erroEnvio" tabindex="-1" role="dialog" aria-labelledby="erroEnvioLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="erroEnvioLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="erro-corpo"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>