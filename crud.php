<?php

require_once('./connection.php');

function fnCreateUser($nome, $email, $telefone){
    $link = getConnection();

    $query = "insert into users values (null, '{$nome}', '{$email}', '{$telefone}')";

    if(!mysqli_query($link, $query)){
        throw new \Exception("Error ao gravar", 1);
    }
}

function fnListUser(){
    $link = getConnection();

    $query = "select * from users";

    $rs = mysqli_query($link, $query);

    $users = array();
    while($row = mysqli_fetch_assoc($rs)){
        array_push($users, $row);
    }

    return $users;
}

function fnFinUserById($id){
    $link = gwtConnection();

    $query = "select * from users where id = {$id}";

    $rs = mysqli_query($link, $query);

    return mysqli_fetch_assoc($rs);
}

function fnListUsersByEmail($email){
    $link = getConnection();

    $query = "select * from users where email '{$email}'";

    $rs = mysqli_query($link, $query);

    return mysqli_fetch_assoc($rs);
}

function fnListUsersByName($name){
    $link = getConnection();

    $query = "select * from users where nome like '%{$name}%'";

    $rs = mysqli_query($link, $query);

    $users = array();
    while($row = mysqli_fetch_assoc($rs)){
        array_push($users, $row);
    }

    return $users;
}

function fnDeleteUser($id){
    $link = getConnection();

    $query = "delete from users where id = {$id}";

    mysqli_query($link, $query);
}

function fnUpdateUser($id, $nome, $email, $telefone){
    $link = getConnection();

    $query = "update users set nome = '{$nome}', email = '{$email}', telefone = '{$telefone}' where id = {$id}";

    mysqli_query($link, $query);
}