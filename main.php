Main page
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
    include_once 'sql.php';
    include_once 'Member.php';
    include_once 'Cart.php';
    include_once 'Product.php';
    session_start();

    if(!isset($_SESSION['member'])) header('Location: login.php');
    $member = $_SESSION['member'];
    $cart = $_SESSION['cart'];
    $sql ="select * from product";
    $result = $mysqli->query($sql);
?>
<hr>
Hello, <a href="editProfile.php?>">修改資料</a><?php echo $member->name; ?>
<?php
    $icon = base64_encode($member->icon);
?>
<img src="date:image/png;base64,<?php echo $icon; ?>"/>
<br>
Product List:<br>
<table border="1" width="100%">
    <tr>
        <th>Pname</th>
        <th>Price</th>
        <th>Num.</th>
        <th>Update Cart</th>
    </tr>
    <script>
        function addCart(pid){
            var num = $("#num_" + pid).val();
            // alert(pid + ":" + num);
            $.get("addCart.php?pid="+pid+"&num="+num,function(data,status){
                if(status == 'success'){
                    alert(data);
                }
            })
        }
    </script>

    <?php
    while($product = $result->fetch_object('Product')) {
        echo '<tr>';
        echo "<td>{$product->pname}</td>";
        echo "<td>{$product->price}</td>";
        $num = $cart->getItemNum($product->id);
        echo "<td><input type='number' id='num_{$product->id}' value='{$num}'></td>";
        echo "<td><input type='button' 
        onclick='addCart({$product->id})'
        value='上傳'></td>";
        echo '</tr>';
    }
    ?>
</table>
<hr>
<a href="logout.php">登出</a>
<hr>
<a href="checkout.php">確認</a>