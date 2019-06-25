<?php

function validarRegistracion($datos)
{

  $errores = [];

  if (strlen($datos["nombre"]) < 3 || trim($datos["nombre"]) == "") {
    $errores["nombre"] = "Ingrese un nombre de más de 3 caracteres";
  }

  if ($datos["fecnac"] == "") {
    $errores["fecnac"] = "Ingrese su fecha de nacimiento";
  } else if (validarEdad($datos["fecnac"]) == false) {
    $errores["fecnac"] = "Debes ser mayor de 18 años";
  }

  if ($datos["email"] == "") {
    $errores["email"] = "Ingrese su email";
  } else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "Su email no es válido";
  }


  return $errores;
}

function armarUsuario($datos)
{
  return [
    "id" => proximoId(),
    "nombre" => ucfirst($datos["nombre"]),
    "email" => $datos["email"],
    "fecnac" => $datos["fecnac"],
  ];
}

function proximoId()
{

  $usuarios = traerTodosLosUsuarios();

  if (empty($usuarios)) {
    return 1;
  }

  $ultimoUsuario = end($usuarios);


  return $ultimoUsuario["id"] + 1;
}

function traerTodosLosUsuarios()
{

  $archivo = file_get_contents("usuarios.json");

  if ($archivo == "") {
    return [];
  }

  $usuarios = json_decode($archivo, true);

  return $usuarios;
}

function registrar($usuario)
{
  $usuarios = traerTodosLosUsuarios();

  $usuarios[] = $usuario;

  $usuariosJSON = json_encode($usuarios);

  file_put_contents("usuarios.json", $usuariosJSON);
}

function validarEdad($fecnac, $edad = 18)
{

  if (is_string($fecnac)) {
    $fecnac = strtotime($fecnac);
  }


  if (time() - $fecnac < $edad * 31536000) {
    return false;
  }

  return true;
}

function mostrarErroresEnFormulario($error)
{
  echo '<div class="alert alert-danger mt-1"><i class="fas fa-exclamation-circle"></i> ' . $error . '</div>';
}
