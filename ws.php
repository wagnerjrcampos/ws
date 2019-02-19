<?php
    require('./funcoes.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = json_decode(file_get_contents('php://input'), true);
        if(setUser($user['nome'], $user['email'], $user['telefone'])) {
            echo json_encode(array("status"=>"200"));
        } else {
            echo json_encode(array("status"=>"500"));
        }

    } else if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if($_GET['usuario'] === ""){
            echo json_encode(getUsers());
        }else {
            echo json_encode(getUserByEmail($_GET['usuario']));
        }
    } else if($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $user = json_decode(file_get_contents('php://input'), true);
        if(updateUser($user['id'], $user['nome'], $user['email'], $user['telefone'])){
            echo json_encode(array("status" => "200"));
        } else {
            echo json_encode(array("status" => "500"));
        }

    } else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
        $id = json_decode(file_get_contents('php://input'), true);
        if(deleteUser($id['id'])) {
            echo json_encode(array("status" => "200"));
        } else {
            echo json_encode(array("status" => "500"));
        }
    }