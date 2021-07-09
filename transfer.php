 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles/navbar.css">
     <link rel="stylesheet" href="styles/table.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
         integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <title>Transfer</title>
    <style>
     .amount {
         margin-top: 30px;
         display: flex;
     }

     .choose {
         width: 350px;
         margin-left: 40px;
     }

     .amount_input {
         width: 350px;
         margin-left: 59px;
     }

     .transfer_to {
         display: flex;
     }

     .transfer_wrapper {
         margin-top: 150px;
         display: flex;
         align-items: center;
         flex-direction: column;
     }

     label {
         margin-top: 5px;
     }

     button {
         margin-top: 50px;
     }
     </style>
 </head>

 <body>
     <?php
        include 'navbar.php';
        include 'connection.php';
        $sender_id=$_GET['customer_id'];
        if(isset($_POST['submit']))
        {
            $from = $sender_id;
            $to = $_POST['receiver_id'];
            $amount = $_POST['amount'];

            $sql = "SELECT * from customer where Customer_Id=$from";
            $query = mysqli_query($conn,$sql);
            $sender = mysqli_fetch_array($query); 

            $sql = "SELECT * from customer where Customer_Id=$to";
            $query = mysqli_query($conn,$sql);
            $receiver = mysqli_fetch_array($query);
    
            if (($amount)<=0)
                {
                   echo "<script> alert('Please enter amount greater than 0');
                    window.location='customers.php';
                   </script>";
                }

            else if($amount > $sender['Current_Balance']) 
                {
                    
                    echo "<script> alert('Insuffient Balance!');
                    window.location='customers.php';
                   </script>";
                }
            else {
                $remaining_balance = $sender['Current_Balance'] - $amount;
                $sql = "UPDATE customer set Current_Balance=$remaining_balance where Customer_Id=$from";
                mysqli_query($conn,$sql);
                
                
                $remaining_balance = $receiver['Current_Balance'] + $amount;
                $sql = "UPDATE customer set Current_Balance=$remaining_balance where Customer_Id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sender['Name'];
                $receiver = $receiver['Name'];
                $sql = "INSERT INTO transfer_history(`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);
                if($query){
                    echo "<script> alert('Transaction Successful');
                                    window.location='customers.php';
                        </script>";
                    
                }
                $remaining_balance= 0;
                $amount =0;
            }
        }
    ?>
     <div class="container">
         <h2 class="text-center pt-4 heading">Sender Details</h2>
         <form method="post" name="tcredit" class="tabletext" action=''>
             <div class="table-responsive-sm">
                <table class="table table-hover table-striped table-condensed table-bordered" style="margin-top:20px">
                     <thead>
                         <tr>
                             <th class="text-center">Name</th>
                             <th class="text-center">Email</th>
                             <th class="text-center">Current Balance</th>
                         </tr>
                     </thead>
                     <tbody>
                    <?php
                        $sql ="select * from customer where Customer_Id=$sender_id";
                        $query =mysqli_query($conn, $sql);
                        if($row = mysqli_fetch_assoc($query))
                        {
                    ?>
                        <tr>
                             <td class="py-2"><?php echo $row['Name']; ?></td>
                             <td class="py-2"><?php echo $row['Email']; ?></td>
                             <td class="py-2"><?php echo $row['Current_Balance']; ?> </td>
                         </tr>
                    <?php
                 }
                        else{
                            echo "<script> alert('Error while connecting. Please try again later!');
                                                window.location='customers.php';
                                    </script>";
                        }
                    ?>
                     </tbody>
                 </table>
             </div>
             <div class='transfer_wrapper'>
                 <div class='transfer_to'>
                     <label>Transfer To:</label>
                     <select name="receiver_id" class="form-control choose" required>
                         <option value="" disabled selected>Receiver</option>
                         <?php
                            $sql ="select * from customer where Customer_Id!=$sender_id";
                                $result=mysqli_query($conn,$sql);
                                if(!$result)
                                {
                                    echo "<script> alert('Error while connecting. Please try again later!');
                                                    window.location='customers.php';
                                        </script>";
                                }
                                while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                         <option class="table" value="<?php echo $rows['Customer_Id'];?>">
                             <?php echo $rows['Name'] ;?>
                         </option>
                         <?php 
                            } 
                         ?>
                         <div>
                     </select>
                     </div>
                     <div class='amount'>
                         <label>Amount:</label>
                         <input type="number" class="form-control amount_input" name="amount" required>
                     </div>
                     <div class="text-center">
                         <button class="btn btn-info" name="submit" type="submit" >Transfer</button>
                     </div>
             </div>
         </form>
     </div>
 </body>
 </html>