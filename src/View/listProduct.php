<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sach mat hang</title>
</head>
<body>
<h2 style="text-align: center">Danh sách mặt hàng</h2>
<form method="POST" action = 'index.php?page=search'>
    Nhập tên hàng:
    <input type = "text" name="search">
    <button type="submit" class="btn btn-success">Tìm kiếm</button>
</form>
<a href="index.php?page=addProduct"><button class="btn btn-success">Thêm mặt hàng</button></a>
<table  class="table table-striped">
    <tbody>
    <tr style="background-color: #00A000; color: white">
        <th>#</th>
        <th>Tên hàng</th>
        <th>Loại hàng</th>
        <th></th>
    </tr>
    <?php foreach ($products as $key => $product) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $product->getName(); ?></td>
            <td><?php echo $product->getType(); ?></td>
            <td>
                            <a href="index.php?page=updateProduct&id=<?php echo $product->getId(); ?>">Chỉnh sửa</a> |
                            <a href="index.php?page=deleteProduct&id=<?php echo $product->getId(); ?>">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>