<?php 
    include_once 'includes/connection.php'; 
    include_once 'includes/article_process.php';

    if(isset($_GET['id'])) {
        // display the article
        $id = $_GET['id'];
        $query = "SELECT * FROM articles WHERE article_id = '$id'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while($row = mysqli_fetch_assoc($result)) { ?>
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
                <div class="container justify-content-center">
                    <div class="card-deck mb-3 text-center">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal"><?php echo $row['article_title']; ?></h4>
                            </div>
                            <img class="card-img-top" src="<?php echo $row['article_img']; ?>" height="500px" alt="Card image cap">
                            <div class="card-body text-left">
                                <h5>Posted<small class="text-muted"> <?php echo date('l jS', $row['article_timestamp']); ?></small></h5>
                                <p class="lead"> <?php echo $row['article_content']; ?></p>
                                <br />
                                <a href="index.php">&larr;Back</a>
                            </div>
                        </div>
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

   <?php 
        } else {
            header('Location : index.php');
            exit();
        } 
    ?>