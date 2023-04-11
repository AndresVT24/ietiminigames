<?php
function connectionBBDD(){
    try {
        $hostname = "localhost";
        $dbname = "laravel";
        $username = "admin";
        $pw = "";
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
        return $pdo;
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
};

function logIn(){
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);

    $pdo = connectionBBDD();
    // $stmt = $pdo ->prepare("SELECT * FROM users u WHERE u.email = ? AND u.password =  sha2(?,512);");     
    $stmt = $pdo ->prepare("SELECT * FROM laravel.users u WHERE u.email = ? AND u.password =  sha2(?,512);");            
    $stmt->bindParam(1,$user);
    $stmt->bindParam(2,$pass);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row){
        $_SESSION["user"] = [$row["id"],$row["email"],$row["username"],intval($row["role"])];
        logButtonClick("S","checkForm.php","S'ha iniciat la sessió correctament\n",$_SESSION['user'][2]);
        header('Location: dashboard.php');
    }else{
        array_push($_SESSION["errors"],["error","Credencials incorrectes"]);
        logButtonClick("E","checkForm.php","El usuari o la contrasenya son incorrectes\n");
        header('Location: login.php');
    }
}

?>