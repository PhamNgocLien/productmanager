<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ket qua tim kiem mat hang</title>
</head>
<body>
<style>
    tr, th, td {
        border: 1px solid black;
    }
</style>
<h2>Ket qua tim kiem mat hang</h2>
<a href="index.php"><button>Xem danh sach mat hang</button></a>
<table style="border-collapse: collapse">
    <tbody>
    <tr>
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
                <a href="index.php?page=updateProduct&id=<?php echo $product->getId(); ?>">Chỉnh sửa</a>
                <a href="index.php?page=deleteProduct&id=<?php echo $product->getId(); ?>">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>