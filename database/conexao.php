<?php

/** PARAMETROS DE CONEXAO MYSQL **/

/*
-- HOST -> ONDE O BANCO DE DADOS ESTA RODANDO
-- USER -> USUARIO DO BANCO DE DADOS
-- PASSWORD -> SENHA DO USUARIO DO BANCO DE DADOS
-- DATABASE -> NOME DO BANCO DE DADOS
*/

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'icatalogo';


$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if($conexao === false){

  die(mysqli_connect_error());

}

// echo '<pre>';
// var_dump($conexao);
// echo '</pre>';

?>