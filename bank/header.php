<?php session_start() ?>
<?php require_once("./db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Home -banking</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="img/logo.jfif" />
    </head>
    <body>
    <div id="layoutDefault">
    <div id="layoutDefault_content">
        <main>
        
            <nav class="navbar navbar-marketing  navbar-expand-lg bg-success-soft navbar-light">
                <div class="container">
                    <a href="./index.php" style="padding-right:5%" ><img class="bank-logo " src="./img/bank.png" alt="bank" ></a>
                    <a class="navbar-brand text-dark  text-center " href="./index.php" style="padding-right: 50px;"> <h1 class="display-4 font-weight-400"><strong>Sparks</strong><br>Bank</h1> </a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><img src="img/menu.png" style="height:20px;width:25px" /><i data-feather="menu"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-lg-5">
                            <li class="nav-item dropdown no-caret">
                                <a class="btn btn-success" style="height:40px ; width: 200px; margin-bottom: 2%;" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown no-caret">
                                <a class="btn btn-success" style="height:40px ; width: 200px; margin-bottom: 2%;" href="./users.php">Users<i class="fas fa-arrow-right ml-1"></i></a>
                            </li>
                            <li class="nav-item dropdown no-caret">
                                <a class="btn btn-success" style="height:40px ; width: 200px; margin-bottom: 2%;" href="./transaction.php">Transaction<i class="fas fa-arrow-right ml-1"></i></a>
                            </li>
                            <li class="nav-item dropdown no-caret">
                                <a class="btn btn-success" style="height:40px ; width: 200px; margin-bottom: 2%;" href="./transaction-history.php">History<i class="fas fa-arrow-right ml-1"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>