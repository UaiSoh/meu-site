<?php
    
    session_start();
    include("conexao.php");
    if(empty($_GET['email']) || empty($_GET['senha'])){
      header("Location: loginErro.html");
    }
      $email = mysqli_real_escape_string($conexao,$_GET['email']);
      $senha = mysqli_real_escape_string($conexao,$_GET['senha']);

      $query = "SELECT email from teste.dados where email ='$email' and senha = '$senha'"; 
      $result = mysqli_query($conexao, $query);
      $row = mysqli_num_rows($result);

      if($row == 1){
         $_SESSION['email'] = $email;
         header("Location: inicial.html");
         exit();
      }else{
         $_SESSION['nao_autenticado'] = true;
         header("Location: loginErro.html");
         exit();
      }
    



?>    