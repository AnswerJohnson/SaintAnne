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
    padding: 40px;
    color:#fff;
    margin-left:400px
}
a{
    color:green
}
.add{
    margin-left:700px   
}
</style>

<body>
    <a href="./addproduct.php" class="add">Add Product</a> <br> <br>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>action</th>
                <th>Import</th>
                
            </tr>
        </thead>
        <tbody>
<?php

$sql = "SELECT * FROM products";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
    $i = 1;
    while ($fetch =mysqli_fetch_assoc($query)) {
        $tbody = '
        <tr>
                <td>'.$fetch['ProductId'].'</td>
                <td>'.$fetch['ProductName'].'</td>
                <td><a href="./updateproduct.php?id='.$fetch['ProductId'].'">Update</a>&nbsp;
                <a href="./deleteproduct.php?id= '.$fetch['ProductId'].'">Delete</a>&nbsp;</td>
                <td><a href="./addimport.php?id= '.$fetch['ProductId'].'">Import</a>&nbsp;</td>
                
   
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