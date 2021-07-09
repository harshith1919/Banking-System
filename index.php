<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Sparks Banking</title>
    <style>
      body{
        background : url("images/bankimg.jpg")  no-repeat center center fixed;
        background-size: cover;
      }
      .container{
        display:flex;
        flex-direction: column;
        align-items: center;
        margin-top: 150px;
      }
      .btn{
        width: 300px;
      }
      a{
        color:white;
      }
      a:hover{
        text-decoration : none;
        color:white;
      }
    </style>
</head>
<body>
<?php
  include 'navbar.php';
?>

<div class="container">
      <button type="button" class="btn btn-info" onclick="window.location.href='customers.php'">View Customers</button><br>
      <button type="button" class="btn btn-info" onclick="window.location.href='history.php'">Transfer History</button><br>
</div>
</body>
</html>