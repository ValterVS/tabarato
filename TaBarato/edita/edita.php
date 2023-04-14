<?php
  include '../php/conexao.php';
  session_start(); // Inicia uma sessão para que a variável $_SESSION possa ser usada onde tiver uma sessão.

  if (isset($_SESSION['erro'])){ // Verifica se existe o erro.
    echo "<script>alert('". $_SESSION['erro'] ."')</script>"; // Mensagem de alerta com o erro.
    unset($_SESSION['erro']); // Apaga o erro da sessão.
  }
  
  $id = $_GET['id'];
  $query = "SELECT * FROM mercados WHERE ID_Mercado = '$id'";
  $resultado = mysqli_query($conexao, $query);
  $linha = mysqli_fetch_array($resultado);
  mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="admin.css" />
    <title>ADMIN</title>
  </head>
  <body>
    <div id="container">
      <nav class="barra">
        <a href="../TaBarato_inicial/index.php"><img
          src="imagens/logo.png"
          alt="logo da marca TaBarato"
          style="width: 297px; height: 60px"
        />
        </a>
      </nav>
      <div class="header">
        <div class="welcome">
          <a href="../admin/admin.php" style="text-decoration:none;color:white; flex-direction:column;">
            <h1>Bem - Vindo<br />Administrador</h1>
          </a>
        </div>
      </div>  
      <div class="admin">
        <form action="../php/edita.php" method="POST">
          <table class="table tb_a">
            <thead>
              <th>Nome da empresa</th>
              <th id="thcnpj">CNPJ</th>
              <th>Email cadastrado</th>
              <th>Endereço</th>
              <th></th>
            </thead>
            <tbody>
              <tr>
                  <td><input type="hidden" name="id" value="<?php echo $linha['ID_Mercado']; ?>"><?php echo $linha['Nome'] ?></td>
                  <td><input type="text" name ="cnpj" value="<?php echo $linha['CNPJ']; ?>"></td>
                  <td><input type="text" name="email" value="<?php echo $linha['Email']; ?>" maxlength="199"></td>
                  <td><input type="text" name="endereco" value="<?php echo $linha['Endereco']; ?>" maxlength="199"></td>
                  <td><button type="submit" class="edit"><img src="imagens/editar.png"/></buttton></td>
              </tr> 
            </tbody>
          </table> 
        </form>
      </div>
    </div>
  </body>
</html>