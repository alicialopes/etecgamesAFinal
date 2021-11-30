<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Busca por cpf
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <form method="Post">
                    <div>
                        <label for="codfun" class="forma-label">Digite o cpf do cliente</label>
                        <input type="number" name="codFun" id="codfun" class="form-control" placeholder="Exemplo: 123">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
$request = service('request');

$codfun = isset($cliente->CpfCli) ? $cliente->CpfCli : 0;
$nomeFun = isset($cliente->nomeCli) ? $cliente->nomeCli : "";
$foneFun = isset($cliente->foneCli) ? $cliente->foneCli : "";

if ($CpfCli) {

?>
    </br>
    <div class="container">
        <form method="Post">
            <div class="mb-3">

                <label for="CpfCli" class="form-label">Cpf</label>
                <input type="text" class="form-control" id="CpfCli" value="<?= $CpfCli ?>" name="codCliAlterar" readonly aria-describedby="nomeHelp">
            </div>

            <div class="mb-3">
                <label for="nomeCli" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nomeCli" value="<?= $nomeCli ?>" name="nomeCliente" aria-describedby="nomeHelp" required>
            </div>

            <div class="mb-3">
                <label for="foneCli" class="form-label">Fone</label>
                <input type="text" class="form-control" id="foneCli" value="<?= $foneCli ?>" name="foneCli" required>
            </div>


            <button type="submit" class="btn btn-info">Alterar</button>
        </form>

        <form method="Post">
            <input type="hidden" name="codCliExcluir" value="<? $codcli ?>">
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>


<?php
}
