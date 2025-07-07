
<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header">Login</h1>
  </div>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Email: </label>
      <input type="email" class="mid-input form-control" id="exampleFormControlInput1" placeholder="exemplo@gmail.com" name="email" maxlength="255"
        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
      >
      <p class="alerta"><?= $alertaEmail?></p>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Senha: </label>
      <input type="password" class="mid-input form-control" id="exampleFormControlInput1" placeholder="Sua senha" name="senha" maxlength="255"
        value="<?php echo isset($_POST['senha']) ? htmlspecialchars($_POST['senha']) : ''; ?>"
      >
      <p class="alerta"><?= $alertaSenha?></p>
    </div>
    <div>
      <button type="submit" class="btn btn-dark">Logar</button>
    </div>
  </form>
  <div class="col-lg-12">
    <a href='?p=cadastro'><button type='button' class='btn btn-default botao-cadastro'>Sem conta? Clique aqui para se Cadastrar</button></a>
  </div>
  

</div>
