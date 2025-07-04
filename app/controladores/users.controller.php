<?php

require_once "app/modelos/users.model.php";

class UserController{

    public static function ctrUserSave(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $userName = trim($_POST["userName"]);
            $userEmail = filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL);
            $userPassword = $_POST["userPassword"];

            $passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);

            $data = [
                "user_name" => $userName,
                "user_email" => $userEmail,
                "user_password" => $passwordHash
            ];

            $response = UserModel::mdlUserSave($data);

            if ($response === "ok") {
                echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al registrar usuario</div>";
            }

        }

    }

    public static function ctrGetAllUsers(){
        return UserModel::mdlGetAllUsers();
    }

    public static function ctrUserUpdate(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $userId = $_POST["userId"];
            $userName = trim($_POST["userName"]);
            $userEmail = filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL);
            $userPassword = $_POST["userPassword"];

            $data = [
                "user_id" => $userId,
                "user_name" => $userName,
                "user_email" => $userEmail
            ];
            
            //si ingresa una nueva contraseña, la encriptamos

            if (empty($userPassword)){
                $passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);
                $data["userPassword"] = $passwordHash;

            }

        
            $response = UserModel::mdlUserUpdate($data);

            if ($response === "ok") {
                echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al registrar usuario</div>";
            }

        }

    }

}