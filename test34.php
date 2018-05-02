<form action="test35.php" method="post">
    Account:<input type="text" name="acccount"/><br>
    Password:<input type="text" name="pssswd"/><br>
    Gender:<input type="radio" name="gender" value="Male"/>Male
    <input type="radio" name="gender" value="Female"/>Female<br>
    興趣：
    <input type="checkbox" name="like[]" value="1"/>打東東
    <input type="checkbox" name="like[]" value="2"/>打東西
    <input type="checkbox" name="like[]" value="3"/>打北北
    <input type="checkbox" name="like[]" value="4"/>打嘻嘻
    <input type="checkbox" name="like[]" value="5"/>打喃喃<br>
    地區：
    <select name="zipcode">
        <option value="401">北屯區</option>
        <option value="402">南屯區</option>
        <option value="403">東屯區</option>
        <option value="404">西屯區</option>
    </select><br>
    <textarea name="area" cols="40" rows="20">//裡面不可有空格</textarea>
    <br>
    <input type="file" name="upload"/>
    <input type="submit" value="OK"/>
</form>

