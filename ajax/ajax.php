

<?php
require_once "../models/database.php";

if (isset($_POST['login'])) {


    global $pdo;

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email && !$password) {
        header('Location:../views/login.php?empty');
    }else{
        $query = "SELECT * FROM doctors  WHERE email = :email AND password = :password";

        $stmt = $pdo->prepare($query);

        $stmt ->bindValue(':email', $email);
        
        $stmt ->bindValue(':password', $password);

        $stmt->execute();
        $user = $stmt->fetch();
        $stmt->closeCursor();


        // var_dump($user);

        if ($user) {
            session_start();
            $_SESSION['name'] = $user['username'];
            $_SESSION['user_id'] = $user['doctor_id'];

            header('Location: ../index.php');
            exit;
        }else{
            echo "<script>alert('something wrong')</script>";
            header('Location: ../views/login.php?loginE');
            exit();
        }
    }
}
