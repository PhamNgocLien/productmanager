<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa mặt hàng</title>
</head>
<body>
<h2>Chỉnh sửa mặt hàng <?php echo $product['name']; ?></h2>
<form method="POST">
    <table style="margin-top: 20px">
        <tr>
            <td><label for="validationDefault01">Tên hàng</label></td>
            <td><input class="form-control" id="validationDefault01" required style="width: 300px" type="text" name="name" value="<?php echo $product['name']?>"></td>
        </tr>
        <tr>
            <td><label for="validationDefault02">Loại hàng</label></td>
            <td><select class="form-control" id="validationDefault02" required style="width: 300px" name="type">
                    <?php foreach ($types as $type) : ?>
                        <option value="<?php echo $type->getName(); ?>" <?php if ($type->getName() == $product['type']){echo 'selected';} ?>><?php echo $type->getName(); ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
        <tr>
            <td><label for="validationDefault03">Giá</label></td>
            <td><input class="form-control" id="validationDefault03" required style="width: 300px" type="text" name="price" value="<?php echo $product['price']?>"></td>
        </tr>
        <tr>
            <td><label for="validationDefault04">Số lượng</label></td>
            <td><input class="form-control" id="validationDefault04" required style="width: 300px" type="text" name="amount" value="<?php echo $product['amount']?>"></td>
        </tr>
        <tr>
            <td><label for="validationDefault05">Mô tả</label></td>
            <td><textarea class="form-control" id="validationDefault05" required style="width: 300px" name="description" ><?php echo $product['description']?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" class="btn btn-success">Sửa mặt hàng</button></td>
            <td><a href="index.php"><button onclick="window.history.go(-1); return false;" class="btn btn-success">Thoát</button></a></td>
        </tr>
    </table>
</form>
</body>
</html>