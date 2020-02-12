<?php

session_start();
include 'conexao.php';
if(empty($_SESSION["login"]))
{
	echo "<script>alert('Faça o login primeiramente!')</script>";
	header("Location:login.php");
}

if (isset($_POST["senhaatual"]) &&  (isset($_POST["novasenha"]) && (isset($_POST["confirmarsenha"])){
	// recebendo informaçao e colocando no var
	$senha_atual = $_POST["senhaatual"];
	$nova_senha = $_POST["novasenha"];
	$confirmar_senha = $_POST["confirmarsenha"];
	
	$login = $_SESSION["login"];
	$sql = "SELECT * FROM USUARIO WHERE LOGIN = '$login'";
	$resultado = mysqli_query($conexao, $sql);
	$vetor = mysqli_fetch_array($resultado);
	$senha_bd = $vetor["senha"];

	if($confirmar_senha != $nova_senha) {
		echo "<script>alert( 'Senhas diferentes')</script>";

	}

	else if ($senha_bd != md5($senha_atual)) {
		echo <script>alert('senha esta diferente do cadastro!')</script> {

		} else if ($senha_bd == mds5($nova_senha)) {
			echo "<script>alert('senha nova esta igual ao antigo')</script>";
		}else
		{
			$nova_senha = md5($nova_senha);
			$sql = "UPDATE usuarios SET senha='$nova_senha' WHERE login = '$login'";

			if(mysqli_query($conexao,$sql)) {
				echo "<script>alert('senha alterada com sucesso')</script>";
				header("location:index.php");
			}

		else {
			echo "<script>alert('erro na alteração da senha!')</script>";
		}
		}

	}
?>