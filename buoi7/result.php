<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Thông Tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
<?php
// Danh sách quốc gia - phải đồng bộ với file index.php
$countries = [
    "AF" => "Afghanistan", "AL" => "Albania", "DZ" => "Algeria", "AD" => "Andorra", "AO" => "Angola",
    "AG" => "Antigua & Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AU" => "Australia", "AT" => "Austria",
    "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados",
    "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BT" => "Bhutan",
    "BO" => "Bolivia", "BA" => "Bosnia & Herzegovina", "BW" => "Botswana", "BR" => "Brazil", "BN" => "Brunei",
    "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon",
    "CA" => "Canada", "CV" => "Cape Verde", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile",
    "CN" => "China", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo", "CR" => "Costa Rica",
    "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark",
    "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt",
    "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia",
    "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GA" => "Gabon", "GM" => "Gambia",
    "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GR" => "Greece", "GD" => "Grenada",
    "GT" => "Guatemala", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti",
    "HN" => "Honduras", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia",
    "IR" => "Iran", "IQ" => "Iraq", "IE" => "Ireland", "IL" => "Israel", "IT" => "Italy",
    "JM" => "Jamaica", "JP" => "Japan", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya",
    "KI" => "Kiribati", "KP" => "North Korea", "KR" => "South Korea", "KW" => "Kuwait", "KG" => "Kyrgyzstan",
    "LA" => "Laos", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia",
    "LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MG" => "Madagascar",
    "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta",
    "MH" => "Marshall Islands", "MR" => "Mauritania", "MU" => "Mauritius", "MX" => "Mexico", "FM" => "Micronesia",
    "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MA" => "Morocco",
    "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal",
    "NL" => "Netherlands", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria",
    "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestine",
    "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines",
    "PL" => "Poland", "PT" => "Portugal", "QA" => "Qatar", "RO" => "Romania", "RU" => "Russia",
    "RW" => "Rwanda", "KN" => "Saint Kitts & Nevis", "LC" => "Saint Lucia", "VC" => "Saint Vincent & the Grenadines",
    "WS" => "Samoa", "SM" => "San Marino", "ST" => "Sao Tome & Principe", "SA" => "Saudi Arabia",
    "SN" => "Senegal", "RS" => "Serbia", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore",
    "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa",
    "SS" => "South Sudan", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname",
    "SZ" => "Eswatini", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "TW" => "Taiwan",
    "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo",
    "TO" => "Tonga", "TT" => "Trinidad & Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan",
    "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "GB" => "United Kingdom",
    "US" => "United States", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VA" => "Vatican City",
    "VE" => "Venezuela", "VN" => "Vietnam", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe"
];

// Danh sách sở thích - phải đồng bộ với file index.php
$hobbies = [
    "the_thao" => "Thể thao",
    "am_nhac" => "Âm nhạc",
    "nghe_thuat" => "Nghệ thuật"
];

// Lấy dữ liệu từ form
$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$password = isset($_POST['password']) ? '********' : ''; // Che mật khẩu, không hiển thị trực tiếp
$age = isset($_POST['age']) ? intval($_POST['age']) : 0;
$selectedHobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : array();
$country = isset($_POST['country']) ? $_POST['country'] : '';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="text-center mb-0">Thông Tin Người Dùng</h3>
                </div>
                <div class="card-body">
                    <?php if($username): ?>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h5><i class="bi bi-person"></i> Username:</h5>
                            <div class="alert alert-info">
                                <?php echo $username; ?>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <h5><i class="bi bi-lock"></i> Password:</h5>
                            <div class="alert alert-secondary">
                                <div class="d-flex align-items-center">
                                    <span id="passwordDisplay"><?php echo $password; ?></span>
                                    <button class="btn btn-sm ms-2" id="togglePasswordResult" title="Hiển thị/ẩn mật khẩu">
                                        <i class="bi bi-eye" id="eyeIconResult"></i>
                                    </button>
                                </div>
                                <small class="d-block mt-1 text-muted">(Click vào icon mắt để xem mật khẩu)</small>
                                <input type="hidden" id="realPassword" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <h5><i class="bi bi-calendar"></i> Tuổi:</h5>
                            <div class="alert alert-success">
                                <?php echo $age; ?> tuổi
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $age; ?>%" aria-valuenow="<?php echo $age; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <h5><i class="bi bi-heart"></i> Sở thích:</h5>
                            <?php if(!empty($selectedHobbies)): ?>
                            <div class="alert alert-warning">
                                <ul class="mb-0">
                                    <?php foreach($selectedHobbies as $hobby): ?>
                                    <li><?php echo $hobbies[$hobby]; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php else: ?>
                            <div class="alert alert-secondary">
                                Không có sở thích nào được chọn
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <h5><i class="bi bi-globe"></i> Quốc gia:</h5>
                            <div class="alert alert-primary">
                                <?php echo isset($countries[$country]) ? $countries[$country] . ' (' . $country . ')' : 'Không xác định'; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="index.php" class="btn btn-outline-primary">← Quay lại form</a>
                    </div>
                    
                    <?php else: ?>
                    <div class="alert alert-danger text-center">
                        <h4>Không có dữ liệu!</h4>
                        <p>Vui lòng <a href="index.php">quay lại form</a> để nhập thông tin.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Xử lý hiển thị/ẩn mật khẩu trong trang kết quả
const togglePasswordResult = document.getElementById('togglePasswordResult');
const passwordDisplay = document.getElementById('passwordDisplay');
const realPassword = document.getElementById('realPassword');
const eyeIconResult = document.getElementById('eyeIconResult');

if (togglePasswordResult) {
    let isShowing = false;
    togglePasswordResult.addEventListener('click', function() {
        if (isShowing) {
            // Ẩn mật khẩu
            passwordDisplay.textContent = '********';
            eyeIconResult.classList.remove('bi-eye-slash');
            eyeIconResult.classList.add('bi-eye');
        } else {
            // Hiện mật khẩu
            passwordDisplay.textContent = realPassword.value;
            eyeIconResult.classList.remove('bi-eye');
            eyeIconResult.classList.add('bi-eye-slash');
        }
        isShowing = !isShowing;
    });
}
</script>
</body>
</html>