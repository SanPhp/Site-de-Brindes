<?php
  // User name and password for authentication
  $username = 'sitedebrindes';
  $password = 'sitedebrindes';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Site de Brindes!"');
    exit('<h2>Sistema Admistrativo Site de Brindes, AVISO!</h2>Desculpe, você tem que digitar um nome de usuario e senha validos para acessar esta página');
  }
?>
