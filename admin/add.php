<?php
    session_start();
    include_once '../includes/connection.php';

    if(isset($_SESSION['logged_in'])) { 
        if(isset($_POST['title'])&&isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            if(!empty($title)&&!empty($content)) {
                // insert into the database
                $time = time();
                $insert_query = "INSERT INTO articles(article_title, article_content, article_timestamp) VALUES('$title', '$content', '$time')";
                $result = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
                header('Location: index.php');
            }
        }
    ?>
        <!--creating the add article page-->
        <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

                <title>Add Article</title>
            </head>
            <body>
                <div class="row justify-content-center">
                    <div class="cols-md-6">
                        <form class="form-signin" action="add.php" method="post">
                                <h1 class="h3 mb-3 font-weight-normal">Add Article</h1>
                                <label for="title" class="sr-only">Article's Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter a title" required autofocus="">
                                <label for="title" class="sr-only">Article's Title</label>
                                <br /><br />
                                <textarea type="text" name="content" class="md-textarea form-control" rows="15" cols="40" placeholder="Content" required></textarea>
                                <br /><br />
                                
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="add" value="Add">
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
    <?php
    } else {
        header('Location: index.php');
    } ?>