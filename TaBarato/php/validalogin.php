<?php 
    session_start(); // Inicia uma sessão para que a variável $_SESSION possa ser usada onde tiver uma sessão.
    include 'conexao.php'; // Conexão com o banco de dados.
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT ID_Mercado, Email, Senha 
              FROM mercados 
              WHERE Email = '$email'"; // Comando SQL para pesquisar.
    $resultado = mysqli_query($conexao, $query); // Gera um objeto que contém o resultado da busca, precisa ser manipulado.

    if($email == "admin@admin" and $senha == "admin"){
      header("location: ../admin/admin.php");
    }
    else{
      if(mysqli_num_rows($resultado) == 1){
        $usuario = mysqli_fetch_assoc($resultado); // Associa o resultado(busca) a uma array, onde usando os colchetes, acessa a coluna desejada.
        if($senha == $usuario['Senha']){
            header("location: ../admin_mercado/admin.php?id=" . $usuario['ID_Mercado']);
        }
        else{
            $_SESSION['erro'] = "Senha incorreta.";
            header("location: ../login/login.php"); // Retorna para a página com o erro de "Senha incorreta".
        }
      }
      else{
        $_SESSION['erro'] = "Email não encontrado."; 
        header("location: ../login/login.php"); // Retorna para a página com o erro de "Email não encontrado".
      }
    }
    
    mysqli_close($conexao);
?>
