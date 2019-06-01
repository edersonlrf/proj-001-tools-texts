<?php

$host     = $_ENV['DB_HOST']     ?? "localhost";
$user     = $_ENV['DB_USER']     ?? "root";
$password = $_ENV['DB_PASSWORD'] ?? "";
$database = $_ENV['DB_DATABASE'] ?? "proj-001-tools-texts";

$conexao = mysqli_connect($host, $user, $password, $database);

mysqli_query($conexao, "SET NAMES utf8");
