<?php

// conexao
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

$codigoSQL = "UPDATE `produto` SET `nome` = :nm, `url` = :url, `descricao` = :desc, `preco` = :preco WHERE `produto`.`id` = :id";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'url' => $_GET['url'], 'desc' => $_GET['descricao'], 'preco' => $_GET['preco'], 'id' => $_GET['id']));

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