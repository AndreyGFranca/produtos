<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar produto</title>
</head>
<body>
	<?php
	if($_POST){
 
    include './config.php';
 
    try{
        $query = "INSERT INTO produtos SET nome=:nome, descricao=:descricao, preco=:preco";
 
        $stmt = $con->prepare($query);
 
        $nome=htmlspecialchars(strip_tags($_POST['nome']));
        $descricao=htmlspecialchars(strip_tags($_POST['descricao']));
        $preco=htmlspecialchars(strip_tags($_POST['preco']));

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
         
         
        // Execute the query
        if($stmt->execute()){
            echo "<div >Cadastrado com sucesso.</div>";
        }else{
            echo "<div>Erro ao cadastrar.</div>";
        }
         
    }
     
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

  <form method="post" action""> 
    <label for="nome">Nome:</label>
    <input type="text" name="nome">
	<br>
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao">
    <br>
    <label for="preco">Preço</label>
    <input type="text" name="preco">
    <input type="submit" value="salvar">
  </form>
</body>
</html>
