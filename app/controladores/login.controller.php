<?php

require_once "app/modelos/login.model.php";

class LoginController{

    public static function ctrVerifyUser(){
    
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])){
            $value = $_POST["email"];
            $password = $_POST["password"];

            $response = LoginModel::mdlVerifyUser($value);

            if(password_verify($password, $response["user_password"])){

            

                //if($response && $_POST["password"] === $response["user_password"]){

                $idUser = $response["pk_id_user"];
                $responseUserRole = LoginModel::mdlVerifyRole($idUser);
                
                $fkIdRole = $responseUserRole["fk_id_role"];
                $responseRoleName = LoginModel::mdlVerifyNameRole($fkIdRole);

                session_start();
                $_SESSION["authenticated"] = "ok";
                $_SESSION["user_name"] = $response["user_name"];
                $_SESSION["USER_ID"] = $response["pk_id_user"];
                $_SESSION["ROLE_ID"] = $fkIdRole;
                $_SESSION["ROLE_NAME"] = $responseRoleName["role_name"];
                header("Location: index.php");
            }else{
                echo '<div class="alert alert-danger text-center">Credenciales incorrectas</div>';
            }


        }


    }


}