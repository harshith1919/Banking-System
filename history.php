<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/table.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Transfer History</title>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <h2 class="text-center pt-4">Transfer History</h2>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                include 'connection.php';
                $sql ="select * from transfer_history";
                $query =mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query))
                {
            ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['Sender']; ?></td>
                        <td class="py-2"><?php echo $rows['Receiver']; ?></td>
                        <td class="py-2"><?php echo $rows['Amount']; ?> </td>
                        <td class="py-2"><?php echo $rows['Transfered_Date']; ?> </td>
            <?php
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>