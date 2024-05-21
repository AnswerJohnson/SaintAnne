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
if ($select) {
    $fetch = mysqli_fetch_assoc($select);  
}}
echo '<form action="" method="POST">
   <h1>Import Product</h1>
           <label for="Product Name">Product Name</label><br>
           <input type="text" name="productname" value="'.$fetch['ProductName'].'" readonly><br><br>
           <label for="priceperunit">Unique price</label><br>
           <input type="number" name="priceperunit"> <br><br>
           <label for="priceperunit">Quantity</label><br>
           <input type="number" name="quantity"> <br><br>
           <label for="date">Date</label><br>
           <input type="date" name="date"> <br><br>
       <button type="submit" name="import">Import</button> 
   </form>';
?>
        <?php
if (isset($_POST['import'])) {
    $productname = $fetch['ProductName'];
    $priceperunit = $_POST['priceperunit'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $totalprice = $priceperunit * $quantity;  
    $sql = "SELECT * FROM stock_in where ProductId=$pid";
    $query = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) > 0) {
        $newquantity = $fetch['Quantity'] + $quantity;
        $newpriceperunit = $_POST['priceperunit'];
        $newdate= $_POST['date'];
        $initialtotalprice = $newquantity * $newpriceperunit;
        $newtotalprice = $initialtotalprice;
        $update = mysqli_query($conn,"UPDATE stock_in SET Unit_Price=$newpriceperunit,Quantity=$newquantity,Total_Price=$newtotalprice WHERE ProductId=$pid");
        if ($update) {
            echo "Product is succesfully imported";
            echo '<a href="./productin.php">View stock in</a>';
            
        }
    }
    else{
    $add =  mysqli_query($conn,"INSERT INTO stock_in(Unit_Price,Quantity,Total_Price,`Date`,ProductId) VALUES('$priceperunit','$quantity','$totalprice','$date','$pid')");
    if ($add) {
        header("location:./productin.php");
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