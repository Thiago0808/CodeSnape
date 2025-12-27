
<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header">Register</h1>
  </div>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Username: </label>
      <input type="text" class="mid-input form-control" id="exampleFormControlInput1" placeholder="Name" name="nome" maxlength="255"
        value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>"
      >
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email: </label>
      <input type="email" class="mid-input form-control" id="exampleFormControlInput1" placeholder="exemplo@gmail.com" name="email" maxlength="255"
        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
      >
      <p class="alerta"><?= $alertaEmail?></p>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Password: </label>
      <input type="password" class="mid-input form-control" id="exampleFormControlInput1" placeholder="Your password" name="senha1" maxlength="255"
        value="<?php echo isset($_POST['senha1']) ? htmlspecialchars($_POST['senha1']) : ''; ?>"
      >
      <p class="alerta"><?= $alertaSenha?></p>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Confirm Password: </label>
      <input type="password" class="mid-input form-control" id="exampleFormControlInput1" placeholder="Confirm password" name="senha2" maxlength="255"
        value="<?php echo isset($_POST['senha2']) ? htmlspecialchars($_POST['senha2']) : ''; ?>"
      >
      <p class="alerta"><?= $alertaSenha?></p>
    </div>
    <div>
      <button type="submit" class="btn btn-dark">Register</button>
    </div>
  </form>
  

</div>
