<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Página dos Produtos</title>
</head>
<body>
	<?php
	include './config.php';
	 
	 
	$query = "SELECT id, nome, descricao, preco FROM produtos ORDER BY id DESC";
	$stmt = $con->prepare($query);
	$stmt->execute();
	 
	$num = $stmt->rowCount();
	
	echo "<a href='cadastrar.php''>Cadastrar um novo Produto</a>";
	 
	if($num>0){
	 
	    echo "<table >";
	    echo "<tr>";
	        echo "<th>ID</th>";
	        echo "<th>Nome</th>";
	        echo "<th>Descricao</th>";
	        echo "<th>Preco</th>";
	    echo "</tr>";
     
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
     
    echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$nome}</td>";
        echo "<td>{$descricao}</td>";
        echo "<td>&#36;{$preco}</td>";
        echo "<td>";
    echo "</tr>";
}
 
echo "</table>";
	     
	}
	
	else{
	    echo "<div >Nenhum dado armazenado.</div>";
	}
	?>
</body>
</html>
