<?php

$user = 'root';
$pass = '';

try {
    $connection = new PDO(
        "mysql:host=127.0.0.1; dbname=tienda; port=3306",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        // echo "<Script>alert('Conectado ... ')</Script>";
    );
} catch (PDOException $exception) {
    echo $exception->getMessage();
    // echo "<Script>alert('Error ... ')</Script>";exit;
}

//Duplico linea hasta refactorizar la pagina de Busqueda con PDO
try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1; dbname=tienda; port=3306",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        // echo "<Script>alert('Conectado ... ')</Script>";
    );
} catch (PDOException $exception) {
    echo $exception->getMessage();
    // echo "<Script>alert('Error ... ')</Script>";exit;
}
