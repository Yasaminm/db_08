<?php 

session_start();
//MBfD0pfBDeOYIE6I

//$_SESSION['login'] = false;


//////////////////////////////////////////////////////
$servername = "localhost";
$username = "yasamin";
$password = "MBfD0pfBDeOYIE6I";
$dbname = "add_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$addusername = filter_input(INPUT_POST, 'username', 513);
$addpassword = filter_input(INPUT_POST, 'password', 513);

if(isset($_POST['submit'])){
$sql = "INSERT INTO add_user (name, password)
VALUES ('$addusername', '$addpassword')";

if ($conn->query($sql) === TRUE) {
    
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
///////////////////////////////////////////////




//
//$ins = "INSERT INTO add_user (name) $username , (password) $password";
//$add = prepare($ins);
//
////$st->bindValue($username, $password PDO::PARAM_STR);
//$add->execute();



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
            
            <form method="post" action="index_1.php">
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

    </body>
</html>
