<?php
require "data.php"; 

if (isset($_GET['gr'])) {
    $group = $_GET['gr'];

    if (isset($data[$group])) {
        foreach ($data[$group] as $brand => $products) {
            // Tiêu đề hãng
            echo "<div class='brand'>$brand</div>";
            
            // Danh sách sản phẩm
            echo "<div class='product-list'>";
            foreach ($products as $p) {
                echo "<div class='product-item'>";
                echo "<img src='".$p['img']."' alt='".$p['name']."'><br>";
                echo $p['name'];
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        echo "Không có dữ liệu cho nhóm này.";
    }
} else {
    echo "Vui lòng chọn nhóm sản phẩm ở menu.";
}
?>

<style>
.brand {
    background-color: #003366;
    color: white;
    padding: 5px 10px;
    font-weight: bold;
    margin-top: 10px;
}

.product-list {
    display: flex;
    gap: 10px;
    background-color: #ddd;
    padding: 10px;
    flex-wrap: wrap;
}

.product-item {
    background-color: #222266;
    color: white;
    padding: 10px;
    border-radius: 4px;
    min-width: 120px;
    text-align: center;
}

.product-item img {
    max-width: 100px;
    height: auto;
    display: block;
    margin: 0 auto 5px auto;
}
</style>
