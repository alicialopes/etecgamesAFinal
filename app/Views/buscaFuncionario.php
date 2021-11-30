<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Busca por código
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form method="Post">
    <div>
        <label for="codfun" class="forma-label">Digite o código do Funcionario</label>
        <input type="number" name="codFun" id="codfun" class="form-control" placeholder="Exemplo: 123">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>      
</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Busca por nome
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form method="Post">
    <div>
        <label for="codfun" class="forma-label">Digite o nome do Funcionario</label>
        <input type="text" name="nomeFuncionario" id="codfun" class="form-control" placeholder="Exemplo: 123">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>      </div>
    </div>
  </div>
  
</div>



<?php
$request = service('request');

$codfun = isset($funcionario->codFun) ? $funcionario->codFun : 0;
$nomeFun = isset($funcionario->nomeFun) ? $funcionario->nomeFun : "";
$foneFun = isset($funcionario->foneFun) ? $funcionario->foneFun : "";

if ($codfun) {

?>
</br> <div class="container">
    <form method="Post">
        <div class="mb-3">

            <label for="codFun" class="form-label">Código Funcionario</label>
            <input type="text" class="form-control" id="codFun" value="<?= $codfun ?>" name="codFunAlterar" readonly aria-describedby="nomeHelp">
        </div>

        <div class="mb-3">
            <label for="nomeFun" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nomeFun" value="<?= $nomeFun ?>" name="nomeFuncionario" aria-describedby="nomeHelp" required>
        </div>

        <div class="mb-3">
            <label for="fone" class="form-label">Fone</label>
            <input type="text" class="form-control" id="fone" value="<?= $foneFun ?>" name="foneFun" required>
        </div>


        <button type="submit" class="btn btn-info">Alterar</button>
    </form>

    <form method="Post">
        <input type="hidden" name="codFunExcluir" value="<? $codfun ?>">
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
</div>


<?php
}

$nomeFuncionario = isset($nomeFuncionario)? $nomeFuncionario : '';

if($nomeFuncionario){
?>


<table class="table">
    <thead>
        <th>Código</th>
        <th>Email</th>
        <th>Alterar</th>
        <th>Deletar</th>
    </thead>
    <tbody>
        <?php
        $codusu = isset($usuario->codusu) ? $usuario->codusu : "";
        $emailusu = isset($usuario->emailUsu) ? $usuario->emailUsu : "";
        ?>
        <tr>
            <td><?php echo ($codusu) ?></td>
            <td><?php echo ($emailusu) ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codUsuAlterar" value="<?php echo ($codusu) ?>">
                    <button type="submit" class="btn btn-warning">Alterar</button>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codUsuDel" value="<?php echo ($codusu) ?>">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>

    </tbody>
</table>

<?php
}
?>