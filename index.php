<?php
    require "model/users.php"; #require da, u slucaju greske, prekida izvrsenje daljih komandi
    require "dbBroker.php"; #mora ovo pre koriscenja $conn u kodu (linija 13)

    session_start();
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $uname=$_POST["username"];
        $upass =$_POST["password"];

        $korisnik= new User(1, $uname, $upass);

        //$conn= new mysqli(); - ostavi pravu konekciju, ova nam ne treba
        $odgovor = User::loginUser($korisnik, $conn);
        if($odgovor->num_rows){  #ako vrati 1, ulazi u petlju, ako vrati 0, preskace i ide dalje
            $_SESSION["user_id"]=$korisnik->id;
            header("Location: home.php"); #ako sve radi, prebaci me na home page
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>