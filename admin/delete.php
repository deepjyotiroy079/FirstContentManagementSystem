<?php
    session_start();
    include_once '../includes/connection.php';
    include_once '../includes/article_process.php';

    if(isset($_SESSION['logged_in'])) { 
        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "DELETE FROM articles WHERE article_id = '$id'";
            mysqli_query($conn, $query) or die(mysqli_error($conn));

            header('Location: delete.php');
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

                <title>Add Article</title>
            </head>
            <body>
                <div class="row justify-content-center form-group">
                    <div class="cols-md-12">
                        <h4>Click on an article to delete</h4>
                        <form action="delete.php" method="get">
                            <select name="id" class="form-control input-lg" onchange="this.form.submit();">
                                <?php while($row = mysqli_fetch_assoc($article)) {?>
                                    <option class="form-control input-lg" value="<?php echo $row['article_id']; ?>"><?php echo $row['article_title']; ?></option>
                                <?php }?>
                            </select>
                        </form>
                        <a href="index.php">&larr;Back</a>
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