<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomeCliente = $_POST["nomeCli"];
    $dataNascCliente = $_POST["dataNascCli"];
    $alturaCliente = $_POST["alturaCli"];
    $pesoCliente = $_POST["pesoCli"];
    $sexoCliente = $_POST["sexoCli"];

    $dataNasc = new DateTime($dataNascCliente);
    $dataAtual = new DateTime();
    $idade = $dataNasc->diff($dataAtual)->y;

    $imc = $pesoCliente / pow($alturaCliente, 2);

    if($imc >= 0 && $imc < 18.5) {
        $mensagem = "Abaixo do peso";
    } else if ($imc >= 18.5 && $imc < 24.9) {
        $mensagem = "com Peso Normal";
    } else if ($imc >= 24.9 && $imc < 29.9){
        $mensagem = "com Obesidade I";
    } else if ($imc >= 29.9){
        $mensagem = "com Obesidade II";
    } else {
        $mensagem = "Erro!";
    }

    if($sexoCliente == 'M') {
        $pron = "Sr. ";
    } else if ($sexoCliente == 'F') {
        $pron = "Sra. ";
    }

    function resultado($pron, $nomeCliente, $idade, $imc, $mensagem) {
        echo "$pron $nomeCliente de $idade anos, Seu IMC é de $imc que é considerado IMC de uma pessoa $mensagem !";
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body id="telaPrincipal">

    <header>
       <h1>Consultório da Dra. Bolota</h1>
    </header><br><br>

    <form action="" method="POST" id="formCliente">
        <label for="nomeCli">Nome do Cliente:</label><br>
        <input type="text" name="nomeCli" id="nome"><br><br>

        <label for="dataNascCli">Data de Nascimento:</label><br>
        <input type="date" name="dataNascCli" id="dataNasc"><br><br>

        <label for="alturaCli">Altura:</label><br>
        <input type="number" name="alturaCli" id="altura" step="0.01"><br><br>

        <label for="pesoCli">Peso:</label><br>
        <input type="number" name="pesoCli" id="peso" step="0.01"><br><br>

        <label>Sexo:</label><br>
        <label for="masculino">
            <input class="btnRadio" type="radio" id="masculino" name="sexoCli" value="M" required> Masculino
        </label>
        <label for="feminino">
            <input class="btnRadio" type="radio" id="feminino" name="sexoCli" value="F" required> Feminino
        </label><br><br>

        <input type="submit" value="Avaliar">
        <input type="reset" value="Limpar">
    </form>

    <h3><?php if(isset($pron)){resultado($pron, $nomeCliente, $idade, $imc, $mensagem);} ?></h3>

</body>

</html>