<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando dados</title>
</head>
<body>
    <?php
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$id = $_GET['id'];
$comandoSQL = "SELECT `nome`, `idioma`, `paginas`, `editora`, `data`, `isbn` FROM `livros` WHERE `id` = $id";

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    if($linha = $comando->fetch()) {
?>
<form action="atualiza_livros.php">
	<label for="nome">Nome:</label>
<?php echo "<input type='text' name='nome' value='{$linha['nome']}'><br>"; ?>
   
    <label for="idioma">Idioma:</label>
<?php echo "<input type='text' name='idioma' value='{$linha['idioma']}'><br>"; ?>
   
    <label for="nome">Páginas:</label>
<?php echo "<input type='text' name='paginas' value='{$linha['paginas']}'><br>"; ?>
   
    <label for="nome">Editora:</label>
<?php echo "<input type='text' name='editora' value='{$linha['editora']}'><br>"; ?>
   
    <label for="nome">Data:</label>
<?php echo "<input type='date' name='data' value='{$linha['data']}'><br>"; ?>

	<label for="isbn">ISBN:</label>
<?php 
    echo "<input type='text' name='isbn' value='{$linha['isbn']}'><br>"; 
    echo "<input type='hidden' name='id' value=$id>";
?>
	<input type="submit">
    </form>
<?php
    }
} else {
    echo "Erro no comando SQL";
}
    ?>    
</body>
</html> 