<?php
    session_start();
    if(isset($_SESSION['uid'])){
        header('location:admin/index.php');
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device, initial-scale=1">
        <title>Login - Ebukumenu</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap');
            * {
                padding:0;
                margin:0;
            }
            body {
                font-family: "Nunito Sans", sans-serif;
                background-color: #0A7029;
            }
            a {
                color: inherit;
                text-decoration: none;
            }
            .container {
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .card-login {
                border:1px solid #ccc;
                background-color: #fff;
                width: 300px;
                padding: 25px 15px;
                box-sizing: border-box;
                border-radius: 5px;
            }
            .card-login h2 {
                margin-bottom: 10px;
            }
            .input-control {
                width: 100%;
                display: block;
                padding: 0.5rem 1rem;
                box-sizing: border-box;
                font-size: 1rem;
                margin-bottom: 8px;
            }
            .btn {
                display: block;
                width: 100%;
                padding: 0.5rem 1rem;
                cursor: pointer;
                font-size: 1rem;
            }
        </style>
    </head>
    <body>

        <!-- login -->
         <div class="container">
            <div class="card-login">
                <h2>Login</h2>
                <form action="" method="post">
                    <input type="text" name="user" placeholder="Username" class="input-control">
                    <input type="password" name="pass" placeholder="Password" class="input-control">
                    <button type="submit" name="login" class="btn">Login</button>
                </form>
                <?php
                    // cek jika tombol login ditekan
                    if(isset($_POST['login'])){

                        include 'database.php';
                        
                        // cek data login
                        $query_select = 'select * from user
                        where username = "'.mysqli_real_escape_string($conn, $_POST['user']).'"
                        and password = "'.mysqli_real_escape_string($conn, md5($_POST['pass'])).'" ';

                        $run_query_select = mysqli_query($conn, $query_select);
                        $d = mysqli_fetch_object($run_query_select);

                        if($d){

                            // buat sesion
                            $_SESSION['uid']    = $d->idproduk;
                            $_SESSION['uname']  = $d->namalengkap;

                            header('location:admin/index.php');

                        }else{
                            echo 'Username atau password salah';
                        }
                    }
                ?>
            </div>
         </div>

    </body>
</html>