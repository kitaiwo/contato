<?php
    $conexao=mysqli_connect("localhost","stamps","@Netuno317","u413309708_3gp3a");
    //criando a conexão com o banco de dados localizado no servidor(localhost)com o usuario root, e sua senha , identificador do banco de dados//
    if (isset($_POST["salvar"])) {//verifivar se o botão está clicando//
        $idusuario=$_POST["idusuario"];//tranformar HTML em PHP//
        $mensagem=$_POST["mensagem"];



        if (!empty($idusuario) && !empty($mensagem)) {
        $sql="SELECT * FROM   usuario WHERE idusuario="$idusuario";

        }
        $resultado=mysqli_query($conexao,$sql);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
    while ($linha= mysqli_fetch_assoc($resultado)){
    echo  $linha['nome'];
    
    
    }
        }
    $sql_mensagem = " INSERT INTO mensagens (idusuario, conteudo) VALUES ('$idusuario', '$mensagem')";
    if (mysqli_query($conexao, $sql_mensagem)) {
    echo "Sua mensagem foi enviada com sucesso!";
  } else {
                echo "Erro ao salvar a mensagem " . mysqli_error($conexao);
            }
        } else {
            echo "Usuário não encontrado!";
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
}
?>