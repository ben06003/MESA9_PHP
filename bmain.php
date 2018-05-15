<?php
    include_once 'sql.php' ;
    include_once 'Product.php';
    include_once  'myconfig.php';

    if(isset($_REQUEST['delid'])){
        $delid =$_REQUEST['delid'];
        $sql=" delete from product where id={$delid}";
        $mysqli->query($sql);
    }
//        $sql = 'select count(*) as `sum` from product ';
//        $result = $mysqli->query($sql);
//        $data = $result->fetch_object();
//        $sum = $data['sum'];

        $sql = 'select id from product';
        $result = $mysqli->query($sql);
        $sum = $result->num_rows;

        $page = 1;
        if (isset($_REQUEST['page'])){
            $page = $_REQUEST['page'];
        }

        $total = ceil($sum/rpp);
        $prev = $page==1?1:$page-1;
        $next = $page==$total?$total:$page+1;


        $start = ($page-1)*rpp;
        $sql = " select * from product order by id limit {$start}," . rpp;
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
        echo"<td>{$product->id}<a href=\"showImage.php\">圖片</a></td>";
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
<hr>

<a href="?page=<?php echo $prev; ?>">prev</a>
<?php echo  '第'.$page.'頁 '; ?>
<a href="?page=<?php echo $next; ?>">next</a>