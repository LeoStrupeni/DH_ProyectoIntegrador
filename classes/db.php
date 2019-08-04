<?php

abstract class DB
{
    public static function getAllUsers(): array
    {
        global $connection;

        $query = $connection->prepare("
            SELECT *
            FROM usuarios as u 
            INNER JOIN usuarios_perfil as u_p
            ON u.IdPerfil = u_p.idUsuario_Perfil
            INNER JOIN usuarios_tipodoc as u_t
            ON u.TipoDoc = u_t.Id_Doc;
            ");

        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        $usersObject = [];

        foreach ($users as $user) {
            $userFinal = new Usuario(
                $user['email'], 
                $user['password'], 
                $user['apellido'], 
                $user['nombre'], 
                $user['nacimiento'],
                $user['documento']);

            $usersObject[] = $userFinal;
        }

        return $usersObject;
    }

    public static function saveUser(Usuario $user): bool
    {
        global $connection;

        if (!self::checkIfUserExists($user)) {
            try {
                $query = $connection->prepare("
                INSERT INTO usuarios (nombre, apellido, documento, email, password, nacimiento)
                VALUES (:nombre, :apellido, :documento, :email, :password, :nacimiento)
                ");

                $query->bindValue(':nombre', $user->getNombre(), PDO::PARAM_STR);
                $query->bindValue(':apellido', $user->getApellido(), PDO::PARAM_STR);
                $query->bindValue(':documento', $user->getDocumento(), PDO::PARAM_INT);
                $query->bindValue('email', $user->getEmail(), PDO::PARAM_STR);
                $query->bindValue('password', $user->getPassword());
                $query->bindValue('nacimiento', $user->getNacimiento(), PDO::PARAM_STR);

                //Chequear los campos UNIQUE en la tabla usuarios
                $query->execute();

                return true;
            } catch (PDOException $ex) {
                return false;
            }
        } else {
            return false;
        }
    }

    private static function checkIfUserExists(Usuario $user): bool
    {
        //Obtengo todos los usuarios
        $users = self::getAllUsers();

        $userEmails = [];

        //Extraigo los emails de todos los usuarios
        foreach ($users as $userInDb) {
            $userEmails[] = $userInDb->getEmail();
        }

        //Chequeo si el mail ya esta registrado
        if (!in_array($user->getEmail(), $userEmails)) {
            return false;
        } else {
            return true;
        }
    }

    public static function getAllProducts(): array
    {
        global $connection;

        $query= $connection->prepare("
            SELECT * FROM productos
            WHERE idProductos < 9
            ");

        $query->execute();

        $listProducts = $query->fetchAll(PDO::FETCH_ASSOC);

        $productsObjects = [];

        foreach ($listProducts as $product) {
            $productFromDB = new Producto($product['Name'], $product['Descripcion'], $product['Precio'], $product['Categoria']);

            $productFromDB->setImagen($product['imagen']);
            $productFromDB->setIdProducto($product['idProductos']);

            $productsObjects[] = $productFromDB;
        }

        return $productsObjects;
    }

    public static function getProductByID(int $id): Producto
    {
        global $connection;

        $query = $connection->prepare("
        SELECT * FROM productos
        WHERE idProductos = :id");

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        $product = $query->fetch(PDO::FETCH_ASSOC);

        $productObject = new Producto($product['Name'], $product['Descripcion'], $product['Precio'], $product['Categoria']);
        
        $productObject->addProductDetails($product);

        return $productObject;
    }

    public static function getProductsWithSimilarCategory(Producto $product)
    {
        global $connection;

        $query = $connection->prepare("
        SELECT * FROM productos
        WHERE Categoria = :categoria
        ORDER BY RAND()
        LIMIT 4");

        $query->bindValue(':categoria', $product->getCategoria(), PDO::PARAM_INT);

        $query->execute();

        $listProducts = $query->fetchAll(PDO::FETCH_ASSOC);

        $productsObjects = [];

        foreach ($listProducts as $product) {
            $productFromDB = new Producto($product['Name'], $product['Descripcion'], $product['Precio'], $product['Categoria']);
            $productFromDB->addProductDetails($product);

            $productsObjects[] = $productFromDB;
        }

        return $productsObjects;
    }

    public static function getAllPaises(): array
    {
        global $connection;

        $query = $connection->prepare("
        SELECT *
        FROM dom_pais;
        ");

        $query->execute();

        $listPaises = $query->fetchAll(PDO::FETCH_ASSOC);

        $paisesObject = [];

        foreach ($listPaises as $pais) {
            $paisFromDB = new Pais($pais['Nombre']);

            $paisesObject[] = $paisFromDB;
        }

        return $paisesObject;
    }
}
