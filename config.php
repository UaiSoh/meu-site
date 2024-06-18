<?php
    
    include('conexao.php');

    
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $csenha = $_POST['check-senha'];

    if($senha === $csenha){
        $sql = "SELECT email FROM teste.dados WHERE email='$email'";
        $retorno = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($retorno);

        if($row){
            header("Location: cadastroErro.html");
        }else{
            //$hashsenha = password_hash($senha, PASSWORD_BCRYPT);
            $sql = "INSERT INTO teste.dados (nome, telefone, email, senha) 
            values('$nome','$telefone','$email','$senha')";
            $retorno = mysqli_query($conexao, $sql);

            if($retorno === true){
                header("Location: index.html");
            }else{
                header("Location: cadastroErro.html");
            }
        }

    }else{
        header("Location: cadastroErro.html");
    }

?>    
