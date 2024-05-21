
<?php
include "./nav.php";
if ($_GET['id']) {
    $pid = $_GET['id']; 
       
if (isset($_POST['update'])) {
   $productname = $_POST['productname'];
   $sql = "UPDATE products SET `ProductName` = '{$productname}' WHERE `ProductId`= {$pid}";
   $query = mysqli_query($conn,$sql);
       if ($query) {
           header('location:./products.php');
       }
    else{
        echo "data is not updated";
    } }
}
?>
<?php
   $select = mysqli_query($conn,"SELECT * FROM products WHERE ProductId=$pid");
   if ($select) {
       $fetch = mysqli_fetch_assoc($select);  
   }
echo '<form action="" method="POST">
   <h1>Update Product</h1>
           <label for="Product Name">Product Name</label><br>
           <input type="text" name="productname" value="'.$fetch['ProductName'].'"><br><br>
       <button type="submit" name="update">Update</button> 
   </form>';
?>

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