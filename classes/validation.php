<?php

abstract class Validation
{
    public static function vUserToRegister($input): array
    {
        $errores = [];

        if (strlen($input['nombre']) < 3 || trim($input['nombre']) == "") {
            $errores['nombre'] = "Ingrese un nombre de mas de 3 caracteres";
        }

        if (trim($input['apellido'] == "")) {
            $errores['apellido'] = "Ingrese un valor valido";
        }

        if ($input['documento'] <= 0) {
            $errores['documento'] = "Ingrese un numero de documento valido";
        }

        if ($input["fecnac"] == "") {
            $errores["fecnac"] = "Ingrese su fecha de nacimiento";
        } else if (!self::vAge($input['fecnac'])) {
            $errores["fecnac"] = "Debes ser mayor de 18 años";
        }

        if (empty($input['email']) || trim($input['email'] == "")) {
            $errores['email'] = "Ingrese su email";
        } else if (filter_var($input['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errores['email'] = "Su email no es valido";
        }

        if ($input['password'] != $input['password-2']) {
            $errores['password'] = "Las contrasenias no coinciden";
        }

        return $errores;
    }

    private static function vAge($fecnac, $edad = 18): bool
    {
        if (is_string($fecnac)) {
            $fecnac = strtotime($fecnac);
        }

        if (time() - $fecnac < $edad * 31536000) {
            return false;
        }

        return true;
    }
}
