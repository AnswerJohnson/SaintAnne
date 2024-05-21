<?php
include "./nav.php"
?>
  <?php
$conn = mysqli_connect("localhost","root","","saint_anne");
if (isset($_GET['id'])) {
    $trade_id = $_GET['id'];
    
    $sql = "DELETE FROM `stock_in` WHERE `ProductId`=$trade_id";
    $result = mysqli_query($conn,$sql);
    if ($result === TRUE) {
        $sql2 = "DELETE FROM `stock_out` WHERE `ProductId`=$trade_id";   
        $result2 = mysqli_query($conn,$sql2);
        if ($result2) {
          $sql3 = "DELETE FROM `products` WHERE `ProductId`=$trade_id";   
          $result3 = mysqli_query($conn,$sql3); 
          if ($result3) {
           header('location:./products.php');
          }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<?php
    include "./footer.php"
    ?>