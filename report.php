<?php 
include "nav.php";

$sql = mysqli_query($conn, " SELECT *,stock_out.Quantity AS expoquant,stock_in.Quantity AS impoquant,stock_out.Date as expodate,stock_in.Date as impodate FROM stock_in INNER JOIN products ON stock_in.ProductId = products.ProductId INNER JOIN stock_out ON products.ProductId = stock_out.ProductId" );
$form = '';
if($sql == true){
    $num_rows = mysqli_num_rows($sql);
    if($num_rows > 0){
        $a = 0;
        while($fetch = mysqli_fetch_assoc($sql)){
            $a++;
            $form .= ' <tr>
                        <td>'.$a.'</td>
                        <td>'.$fetch['ProductName'].'</td>
                        <td>'.$fetch['impoquant'].'</td>
                        <td>'.$fetch['impodate'].'</td>
                        <td>'.$fetch['expoquant'].'</td>
                        <td>'.$fetch['expodate'].'</td>
                    </tr>';
        }

    }else{
        $tbody = '<tr> <td> No record! </td> </tr>';  
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>

table,th,thead,tbody,td{
    border-collapse: collapse;
    border: 1px solid green;
    padding: 40px;
    color:#fff;
    margin-left:100px
}
a{
    color:green
}
.add{
    margin-left:600px   
}
h1{
    margin-left:550px
}
button{
    margin-left:600px;
    margin-bottom:20px;
    width:200px;
    height:5vh;
}
</style>
</head>
<body>
    <H1>Saint anne Report</H1><button onclick="print()" id="button">Print</button>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Import Quantity</th>
                <th>Export Quantity</th>
                <th>Import Date</th>
                <th>Export Date</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $form; ?>
            <tr>
                <td>Total: </td>
                <td colspan="8"> <?php echo $num_rows; ?></td>
            </tr>
        </tbody>
    </table>
    </div>
</footer>
  
</body>
</html>