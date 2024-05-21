<?php
include "./nav.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table,th,thead,tbody,td{
    border-collapse: collapse;
    border: 1px solid green;
    color:#fff;
    padding: 40px;
    margin-left:200px
}
h2{
    margin-left:600px; 
    margin-bottom:60px; 
    color:green
}
a{
    color:green
}
</style>

<body>
    <h2>Imported Products</h2>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>product name</th>
                <th>quantity</th>
                <th>Price per unity</th>
                <th>Total</th>
                <th>Date</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
<?php
$query = mysqli_query($conn,"SELECT * FROM stock_in INNER JOIN products ON stock_in.ProductId = products.ProductId");

 if (mysqli_num_rows($query) > 0) {
     $i = 1;
     while ($fetch =mysqli_fetch_assoc($query)) {
         $tbody = '
         <tr>
                 <td>'.$i++.'</td>
                 <td>'.$fetch['ProductName'].'</td>
                 <td>'.$fetch['Quantity'].'</td>
                 <td>'.$fetch['Unit_Price'].'</td>
                 <td>'.$fetch['Total_Price'].'</td>
              <td>'.$fetch['Date'].'</td>
                <td> <a href="./addexport.php?id= '.$fetch['ProductId'].'">Export</a>&nbsp;</td>
                
                
   
             </tr>
        ';
        echo $tbody;
    }
}

?>
        </tbody>

    </table>
</body>

</html>