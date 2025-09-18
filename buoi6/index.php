<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng nhân viên</title>
</head>
<body>
<?php
function taoNhanVienMoi($id, $hoten, $tuoi, $hsl) {
    return array("id"=>$id, "hoten"=>$hoten, "tuoi"=>$tuoi, "hsl"=>$hsl);
}

$ds = array();
$ds[] = taoNhanVienMoi("NV01", "Nguyen Van A", 25, 2.5);
$ds[] = taoNhanVienMoi("NV02", "Tran Thi B", 30, 3.2);
$ds[] = taoNhanVienMoi("NV03", "Le Van C", 28, 2.8);
$ds[] = taoNhanVienMoi("NV04", "Pham Thi D", 22, 2.0);
?>

<button id="toggleBtn">Toggle Table</button>
<button id="randomColorBtn" style="display:none">Random Colors</button>
<button id="zebraBtn" style="display:none">Zebra Colors</button>
<button id="resetBtn">Reset Data</button>

<div id="tableContainer" style="display:none">
    <table id="nhanvienTable" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Tuổi</th>
            <th>Lương</th>
            <th>Hành động</th>
        </tr>
    </table>
</div>

<script>
let nhanVienArr = <?php echo json_encode($ds); ?>;
let table = document.getElementById("nhanvienTable");
let container = document.getElementById("tableContainer");
let toggleBtn = document.getElementById("toggleBtn");

// Hàm định dạng số tiền với dấu phân cách hàng nghìn
function formatCurrency(amount) {
    return amount.toLocaleString('vi-VN') + ' VNĐ';
}

window.onload = function() {
    const savedData = localStorage.getItem('nhanVienArr');
    if(savedData) nhanVienArr = JSON.parse(savedData);
};

function luuLocalStorage() {
    localStorage.setItem('nhanVienArr', JSON.stringify(nhanVienArr));
}

function veLaiBang() {
    const header = table.rows[0].outerHTML;
    table.innerHTML = header;
    nhanVienArr.forEach((nv,index)=>{
        const row = table.insertRow();
        row.innerHTML = `
            <td>${nv.id}</td>
            <td>${nv.hoten}</td>
            <td>${nv.tuoi}</td>
            <td>${formatCurrency(nv.hsl * 3600000)}</td>
            <td><button class="btnXoa" data-index="${index}">Xóa</button></td>
        `;
    });
    ganSuKienXoa();
}

function ganSuKienXoa() {
    document.querySelectorAll(".btnXoa").forEach(btn=>{
        btn.onclick = ()=>{
            const index = parseInt(btn.getAttribute('data-index'));
            const deleted = nhanVienArr.splice(index,1)[0];
            luuLocalStorage();
            veLaiBang();
            alert(`Đã xóa nhân viên ${deleted.hoten}. Còn lại ${nhanVienArr.length} nhân viên.`);
        };
    });
}

// toggle hiển thị bảng
toggleBtn.onclick = ()=>{
    if(container.style.display==="none"){
        veLaiBang();
        container.style.display="block";
        document.getElementById("randomColorBtn").style.display="inline";
        document.getElementById("zebraBtn").style.display="inline";
    }else{
        container.style.display="none";
        document.getElementById("randomColorBtn").style.display="none";
        document.getElementById("zebraBtn").style.display="none";
    }
};

// random màu
document.getElementById("randomColorBtn").onclick = ()=>{
    for(let i=1;i<table.rows.length;i++){
        table.rows[i].style.backgroundColor = "#" + Math.floor(Math.random()*16777215).toString(16).padStart(6,"0");
    }
};

// zebra
document.getElementById("zebraBtn").onclick = ()=>{
    for(let i=1;i<table.rows.length;i++){
        table.rows[i].style.backgroundColor = (i%2===0)?"#f2f2f2":"#cccccc";
    }
};

// reset dữ liệu
document.getElementById("resetBtn").onclick = ()=>{
    if(confirm('Bạn có chắc chắn muốn reset dữ liệu ban đầu?')){
        nhanVienArr = <?php echo json_encode($ds); ?>;
        luuLocalStorage();
        if(container.style.display!=="none") veLaiBang();
        alert('Đã reset dữ liệu về ban đầu!');
    }
};
</script>
</body>
</html>
