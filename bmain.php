<?php
    include_once 'sql.php' ;
    include_once 'Product.php';

    if(isset($_REQUEST['delid'])){
        $delid =$_REQUEST['delid'];
        $sql=" delete from product where id={$delid}";
        $mysqli->query($sql);
    }

    $sql=' select * from product';
    $result = $mysqli->query($sql);

?>

<a href="addProduct.php">Add New</a>
<hr>
Product List:<br>
<table border="1" width="100%">
    <tr>
        <th>pid</th>
        <th>pname</th>
        <th>price</th>
        <th>qty</th>
        <th>Delete</th>
        <th>edit</th>
    </tr>
    <script>
        function  ggg(pname) {
            return confirm('delete'+pname+'?')
        }

    </script>
    <?php
    while($product = $result->fetch_object('Product')){
        echo'<tr>';
        echo"<td>{$product->id}</td>";
        echo"<td>{$product->pname}</td>";
        echo"<td>{$product->price}</td>";
        echo"<td>{$product->qty}</td>";
//        echo"<td><a href='?delid={$product->id}'>delete</a></td>";
        echo "<td><a href='?delid={$product->id}' onclick='return ggg(\"{$product->pname}\");'>Delete</a></td>";
        echo "<td><a href='editProduct.php?editid={$product->id}'>Edit</a></td>";
        echo'</tr>';
    }
    ?>
</table>