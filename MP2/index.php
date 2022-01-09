<!DOCTYPE html>
<html lang="pt-pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 #mensage {
 width: 350px;
 right: 300px;  
 border: black 2px solid;
   background-color: rgb(190,184, 190);     
   color:black;

}
    </style>
</head>
<body>
<form method="POST">
nome : <br>
<input type="text" name="nome"  />
<br><br>
mensangem :  <br>
<textarea name="mensagem" cols="30" rows="10"></textarea>
<br><br>

<input type="submit" value="Enviar Mensagem"  />
</form>
    
</body>
</html>

<br><br>


<?php

// variaves para receber as credencias da base de dados
$servidor="localhost";
$usuario ="root";
$senha ="";
$banco="mp2";
//  metodo para  conectar a base de dado//
$conectar = mysqli_connect($servidor,$usuario,$senha,$banco);

// variaveis para pegar dados do formulario
if (isset($_POST['mensagem'])) {

$nome=$_POST['nome'];
$mensagem =$_POST['mensagem'];

$query = mysqli_query($conectar,"INSERT INTO conversa(nome,mensagem,data_msg) VALUES('$nome','$mensagem ',NOW())");

}

$query = mysqli_query($conectar,"SELECT*FROM conversa order by id desc");


while ($resultado = mysqli_fetch_assoc($query)) {

    echo "Nome : ".$resultado['nome']." <br>";

    echo "Mensagem :  <div id='mensage'>  <br> ".$resultado['mensagem']." </div> <br> <br>";
    echo "Data da mensagem : ".$resultado['data_msg']." <br><hr>";
  
}





?>
