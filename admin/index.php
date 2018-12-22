<?php
    session_start();
    include_once '../includes/connection.php';
    if(isset($_SESSION['logged_in'])) { ?>

<!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

                <title><?php echo $row['article_title']; ?></title>
            </head>
            <body>
                <div class="row justify-content-center">
                    <div class="container justify-content-center">
                        <ul class="list-group">
                            <li class="list-group-item">
                               <a href="add.php">Add Article</a>
                            </li>
                            <li class="list-group-item">
                               <a href="delete.php">Delete Article</a>
                            </li>
                        </ul> 
                        <br />
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </body>
            </html>
        
   <?php } else { 
        if(isset($_POST['username'])&&isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(empty($username) or empty($password)) {
                $error = "Please enter all details";
            } else {
                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                if($result = mysqli_query($conn, $query)) {
                    $row = mysqli_num_rows($result);
                    if($row==1) {
                        // do something
                        $_SESSION['logged_in'] = true;
                        header('Location: index.php');
                        exit();
                    } else {
                        echo '<script type="text/javascript">alert("Invalid Username/Password Combination");</script>';
                    }
                }
                
            }
        }    
    ?>
        <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

                <title><?php echo $row['article_title']; ?></title>
            </head>
            <body>
                <div class="row justify-content-center">
                    <div class="cols-md-6">
                        <small><?php if(isset($error)) { echo $error;}?></small>
                        <form class="form-signin" action="index.php" method="post">
                            <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus="">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>                 
                            <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login">
                        </form>
                    </div>   
                </div>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </body>
            </html>

    <?php } ?>

    