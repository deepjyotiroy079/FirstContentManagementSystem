<?php
    include_once 'connection.php';

    $query = "SELECT * FROM articles";
    $article = mysqli_query($conn, $query) or die(mysqli_error($conn));