<?php

  include 'conecta.php';

  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];
  $cidade = $_POST['cidade'];
  $data_nascimento = $_POST['data_nascimento'];

$sql = "UPDATE pessoa SET nome = ?, email = ?, celular = ?, cidade = ?, data_nascimento = ? WHERE id = ?";
$stmt = $conn->prepare($sql) or die($conn->error);

if(!$stmt){
  echo 'Erro na atualização: '.$conn->errno.' - '.$conn->error;
}

$stmt->bind_param('sssssi', $nome, $email, $celular, $cidade, $data_nascimento, $id);
$stmt->execute();
$conn->close();
header("Location: index.php#tabs-4");
?>