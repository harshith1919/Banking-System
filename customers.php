<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/table.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Customers</title>
    <style>
    a {
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <h2 class="text-center pt-4 heading">Customers</h2>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Current Balance</th>
                    </tr>
                </thead>
                <tbody>
         <?php
                include 'connection.php';
                $sql ="select * from customer";
                $query =mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query))
                {
         ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['Name']; ?></td>
                        <td class="py-2"><?php echo $rows['Email']; ?></td>
                        <td class="py-2"><?php echo $rows['Current_Balance']; ?> </td>
                        <td class="py-2"><button type="button" class="btn btn-info"
                                onclick="window.location.href='transfer.php?customer_id= <?php echo $rows['Customer_Id'] ;?>'">Details/Transfer</button>
                        </td>
                    </tr>
          <?php
                }
          ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>