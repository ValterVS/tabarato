<?php 
  session_start(); // Inicia uma sessão para que a variável $_SESSION possa ser usada onde tiver uma sessão.

  if (isset($_SESSION['erro'])){ // Verifica se existe o erro.
    echo "<script>alert('". $_SESSION['erro'] ."')</script>"; // Mensagem de alerta com o erro.
    unset($_SESSION['erro']); // Apaga o erro da sessão.
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login/Cadastrar-se</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div id="container">
    <div class="barra">
      <a href="../TaBarato_inicial/index.php">
        <img
          src="imagens/logo.png"
          alt="Logo do site"
          style="width: 297px; height: 60px"
        />
      </a>
    </div>
    <div class="login">
      <div class="login-content">
        <form action="../php/validalogin.php" method="POST">
          <div class="flex">
            <label for="email-login">E-mail :</label>
            <input type="email" name="email" id="email-login" placeholder="digiteseuemail@aqui.com"/>
          </div>
          <div class="flex">
            <label for="senha-login">Senha :</label>
            <input type="password" name="senha" id="senha-login" placeholder="Digite sua senha"/>
          </div>
          <div class="btn">
              <button type="submit">Entrar</button>
          </div>
        </form>
      </div>
    </div>
    <div class="cadastro">
      <a href="../criar_conta/cadastro.php" class="link_criar"><div class="criar_conta">CRIAR CONTA</div></a>
    </div>
  </div>
</body>
</html>