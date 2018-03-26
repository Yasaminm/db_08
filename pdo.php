<?php

require_once './config.php';

$username = filter_input(0, 'username', 513, FILTER_FLAG_NO_ENCODE_QUOTES);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if (isset($username) && isset($password)) {
    
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD);
    $query = "INSERT INTO add_user SET name=:u,password=:p";
    $stmt = $pdo->prepare($query);
    $passwordCrypt = sha1(SALT.$password);
    $stmt->bindValue(':u', $username, PDO::PARAM_STR);
    $stmt->bindValue(':p', $password, PDO::PARAM_STR);
    $stmt->execute();
    
    $lastId = $pdo->lastInsertId();
    
    
    }
//    $pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD);
//    $query = "SELECT * FROM add_user";
//    $stmt = $pdo->query($query);
//    $rows = [];
//    foreach ($stmt as $row){
//        $rows[]=$row;
//}
//    $rows = $stmt->fetchAll();
    ///////////////////////////////////////////////////////////////////
//    $pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD);
//    $query = "SELECT * FROM add_user WHERE id>=? AND id<=?";
//    $stmt = $pdo->prepare($query);
//    $stmt->execute([1, 5]);
//    $stmt->rowCount(); //Anzahl der ergebniszeilen.
//    $rows = $stmt->fetchAll();
//    
    /////////////////////////////////////////////////////////////////////
    
//   $pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD);
//    $query = "SELECT * FROM add_user WHERE id>=:min AND id<=:max";
//    $stmt = $pdo->prepare($query);
//    $status = $stmt->execute([
//        ':min' =>16, 
//        ':max' => 20
//        ]);
//    if($status){
////    $stmt->rowCount(); //Anzahl der ergebniszeilen.
//    $rows = $stmt->fetchAll();
//    }else{          // else show the exact error what kind of error it is. it is very helpfull. Mostly it should be given into a lock file not openlly in the page.
//        $rows=[];
//        echo $stmt->queryString;
//        echo '<br>';
//        $errInfo = $stmt->errorInfo();
//        echo $errInfo[2];
//    }
    
    ///////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 08 DB - PDO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
        <style>
            body {
                padding-top: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Nutzer hinzufügen</h1>
            <form method="post" action="pdo.php" >
                <div class="form-group">
                    <label>Benutzername   
                        <input class="form-control" required type="text" name="username">
                    </label>
                </div>
                <div class="form-group">
                    <label>Kennwort 
                        <input class="form-control" required type="password" name="password">
                    </label>
                </div>
                <button class="btn btn-primary">INSERT</button>
            </form>
        </div>
        <pre>
            <?php
            var_dump($rows);
            ?>
        </pre>
    </body>
</html>
