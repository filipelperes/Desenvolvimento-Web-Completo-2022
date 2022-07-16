<?php
    session_start();


    $auth = false;
    $id = null;
    $user_perfil_id = 1;

    $perfis = [
        1 => 'Administrativo',
        2 => "Usuario",
    ];

    $users = [
        ['id' => 1, 'email' => 'test@example.com', 'senha' => 'test@example.com', 'perfil' => 2],
        ['id' => 2, 'email' => 'teste@example.com', 'senha' => 'teste@example.com', 'perfil' => 2],
        ['id' => 3,'email' => 'admin@example.com', 'senha' => '123456', 'perfil' => 1],
    ];

    foreach($users as $user) {
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) { 
            $auth = true;
            $id = $user['id'];
            $user_perfil_id = $user['perfil'];
        } else header('Location: index.php?login=erro');
    }

    if($auth) {
        $_SESSION['auth'] = 'S';
        $_SESSION['id'] = $id;
        $_SESSION['perfil_id'] = $user_perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['auth'] = 'N';
        header('Location: index.php?login=erro');
    }
?>