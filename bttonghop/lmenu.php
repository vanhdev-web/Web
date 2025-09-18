<?php
// Lấy dữ liệu từ file data.php (mảng $data)
require "data.php"; 

// Bắt đầu hiển thị danh sách menu
echo "<ul>";

foreach($data as $menuitem => $value) {
    echo "<li><a href='?gr=".$menuitem."'>".$menuitem."</a></li>";
}

echo "</ul>";
?>
