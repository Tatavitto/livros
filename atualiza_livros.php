<?php

// conexao
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

$codigoSQL = "UPDATE `livros` SET `nome` = :nm, `idioma` = :idioma, `paginas` = :pags, `editora` = :edit, `data` = :data, `isbn` = :isbn WHERE `livros`.`id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'idioma' => $_GET['idioma'], 'pags' => $_GET['paginas'], 'edit' => $_GET['editora'], 'data' => $_GET['data'], 'isbn' => $_GET['isbn'], 'id' => $_GET['id']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?> 