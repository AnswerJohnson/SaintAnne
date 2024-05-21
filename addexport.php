<style>
body{
    background: black;
}
form{
    background: rgb(7, 109, 0);
    color: black;
    width: fit-content;
    padding: 30px;
    font-size: larger;
    margin-left: 600px;
    margin-top: 200px;
    border-radius: 10px;
}
#link{
color: black;
margin-left: 10px;
font-size: large;
text-decoration: none;
font-weight: bolder;
}
input{
    width: 300px;
    height: 30px;
    outline: none;
    border: none;
    box-shadow: 0 0 1px;
    border-radius: 5px;
}
button{
    width: 150px;
    height: 30px;
    font-weight: bolder;
    margin-left: 80px;
}
</style>
<?php
include "./nav.php";
if ($_GET['id']) {
    $pid = $_GET['id']; 
$select = mysqli_query($conn,"SELECT * FROM products WHERE ProductId=$pid");
$select2 = mysqli_query($conn,"SELECT * FROM stock_in WHERE ProductId=$pid");
if ($select) {
    $fetch = mysqli_fetch_assoc($select);  
}
if ($select2) {
    $fetch2 = mysqli_fetch_assoc($select2);  
}
}
echo '<form action="" method="POST">
   <h1>Export Product</h1>
   <label for="Product Name">Product Name</label><br>
   <input type="text" name="productname" value="'.$fetch['ProductName'].'" readonly><br><br>
   <label for="priceperunit">Unique price</label><br>
   <input type="number" name="priceperunit" value="'.$fetch2['Unit_Price'].'" readonly> <br><br>
   <label for="priceperunit">Quantity</label><br>
   <input type="number" name="quantity"> <br><br>
   <label for="date">Date</label><br>
   <input type="date" name="date"> <br><br>
<button type="submit" name="export">Export</button> 
   </form>';
?>
        <?php
if (isset($_POST['export'])) {
    $priceperunit = $_POST['priceperunit'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $totalprice = $priceperunit * $quantity;  
    $sql = "SELECT * FROM stock_out where ProductId=$pid";
    $query = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) > 0) {
        $newquantity = $fetch['Quantity'] + $quantity;
        $newpriceperunit = $fetch['Unit_Price'];
        $initialtotalprice = $newquantity * $newpriceperunit;
        $newtotalprice = $initialtotalprice;
        $update = mysqli_query($conn,"UPDATE stock_out SET Quantity=$newquantity,Total_Price=$newtotalprice WHERE ProductId=$pid");
        if ($update) {
            $insql = "SELECT * FROM stock_in where ProductId=$pid";
            $inquery = mysqli_query($conn,$insql);
            $infetch = mysqli_fetch_assoc($inquery);
            $newimportquantity = $infetch['Quantity'] - $quantity;
            $import = $newimportquantity *  $infetch['Unit_Price'];
            $importupdate = mysqli_query($conn,"UPDATE stock_in SET Quantity=$newimportquantity,Total_Price=$import WHERE ProductId=$pid");
           if ($importupdate) {
            
               echo "Product is successfully exported";
               echo '<a href="./productout.php">View stok out</a>';
           }
            
        }
    }
    else{
    $add =  mysqli_query($conn,"INSERT INTO stock_out(Unit_Price,Quantity,Total_Price,`Date`,ProductId) VALUES('$priceperunit','$quantity','$totalprice','$date','$pid')");
    if ($add) {
        $insql = "SELECT * FROM stock_in where ProductId=$pid";
        $inquery = mysqli_query($conn,$insql);
        $infetch = mysqli_fetch_assoc($inquery);
        $newimportquantity = $infetch['Quantity'] - $quantity;
        $import = $newimportquantity * $infetch['Unit_Price'];
        $importupdate = mysqli_query($conn,"UPDATE stock_in SET Quantity=$newimportquantity,Total_Price=$import WHERE ProductId=$pid");
       if ($importupdate) {
        
           echo "Product is successfully exported";
           echo '<a href="./productout.php">View stock out</a>';
       }
        header("location:./productout.php");
    }
}

        }

?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
footer{
    background: rgb(54, 77, 77);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: large;
    position: absolute;
    top: 900px;
    left: 0px;
    width: 100%;
}
</style>
<body>
</body>
</html>