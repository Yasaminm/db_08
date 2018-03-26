<?php 

session_start();
//MBfD0pfBDeOYIE6I

require_once 'config.php';

$username = filter_input(0, 'username', 513, FILTER_FLAG_NO_ENCODE_QUOTES);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//var_dump($username);

if(isset($username) && isset($password)){
    
    ////////////////////Varian 1
//$link = mysqli_connect(HOST, USER, PASSWORD, DB);
//$passwordCrypt = sha1(SALT.$password);
//$u = mysqli_real_escape_string($link, $username);
//$query = "INSERT INTO "
//        . "add_user (name,password) "
//        . "VALUES ('$u', '$passwordCrypt')";
//mysqli_query($link, $query) or die(mysqli_error($link));

//////////////////////////Variant 2 with mysqli function (Class)
    
//    $link = new mysqli(HOST, USER, PASSWORD, DB);
//    
//    $passwordCrypt = sha1(SALT.$password);
//    $u = mysqli_real_escape_string($link, $username);
//    $query = "INSERT INTO "
//            . "add_user (name,password) "
//            . "VALUES ('$u', '$passwordCrypt')";
//    $link->query($query);
    
    /////////////////////////Variant 3 
    
//    $link = new mysqli(HOST, USER, PASSWORD, DB);
//    $query = "INSERT INTO add_user(name, password) VALUES(?, ?)";
//    $stmt = $link->prepare($query);
//    $passwordCrypt = sha1(SALT.$password);
//    $stmt->bind_param('ss', $username, $passwordCrypt);
//    $stmt->execute();
//    echo $stmt->affected_rows; //1 - Anzahl der betroffenen Zeilen.
//    
    
}
$db = new mysqli(HOST, USER, PASSWORD, DB);
if(!$db->connect_errno){
    $query1 = "SELECT * FROM add_user WHERE id>=? AND id<=?";
    $stmt = $db->prepare($query1);
    $idFrom = 8;
    $idTo = 9;
    $stmt->bind_param('ii', $idFrom, $idTo);
    $stmt->execute();
    $result = $stmt->get_result();
    echo $result->num_rows; // 2 - Anzahl der gefunden Ergebnisyeilen
//    $rows = [];
//    while($row = $result->fetch_assoc()){
//        $rows[]=$row;
//    }
    
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    
   
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 08 DB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <h1>Nutzer hinzufügen</h1>
            
            <form method="post" action="mysqli.php">
                <label>Benutzername
                    <input class="form-control" required type="text" name="username">
                </label>
                <label>Kennwort
                    <input class="form-control" required type="password" name="password">
                </label>
                <hr>
                <button class="btn" type='submit' name='submit'>INSERT</button>
            </form>
        </div>
<?php 

 var_dump($rows);
?>
    </body>
</html>
