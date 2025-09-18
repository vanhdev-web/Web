<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nhập Thông Tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
<?php
// Danh sách quốc gia
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

// Danh sách sở thích
$hobbies = [
    "the_thao" => "Thể thao",
    "am_nhac" => "Âm nhạc",
    "nghe_thuat" => "Nghệ thuật"
];
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center mb-0">Thông Tin Người Dùng</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="result.php" id="userForm">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                            <div class="form-text">Mật khẩu của bạn sẽ được bảo mật</div>
                        </div>
                        
                        <!-- Age (Slider) -->
                        <div class="mb-3">
                            <label for="age" class="form-label">Tuổi: <span id="ageValue">18</span></label>
                            <input type="range" class="form-range" id="age" name="age" min="1" max="100" value="18" oninput="document.getElementById('ageValue').textContent = this.value">
                        </div>

                        <!-- Hobby (Checkbox) -->
                        <div class="mb-3">
                            <label class="form-label">Sở thích:</label>
                            <div class="row">
                                <?php foreach($hobbies as $key => $value): ?>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="<?php echo $key; ?>" id="<?php echo $key; ?>">
                                        <label class="form-check-label" for="<?php echo $key; ?>">
                                            <?php echo $value; ?>
                                        </label>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Country (Select) -->
                        <div class="mb-3">
                            <label for="country" class="form-label">Quốc gia:</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">-- Chọn quốc gia --</option>
                                <?php foreach($countries as $code => $name): ?>
                                <option value="<?php echo $code; ?>"><?php echo $name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('cancelBtn').addEventListener('click', function() {
    document.getElementById('userForm').reset();
});

// Xử lý hiển thị/ẩn mật khẩu
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');

togglePassword.addEventListener('click', function() {
    // Đổi loại input giữa password và text
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Thay đổi icon mắt
    if (type === 'password') {
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    } else {
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    }
});

// Hàm xử lý sự kiện submit form
document.getElementById('userForm').addEventListener('submit', function(event) {
    // event.preventDefault(); // Bỏ comment nếu muốn ngăn form submit mặc định
    
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value;
    const age = document.getElementById('age').value;
    const country = document.getElementById('country').value;
    const selectedHobbies = Array.from(document.querySelectorAll('input[name="hobbies[]"]:checked'))
        .map(checkbox => checkbox.value);
    
    // Kiểm tra dữ liệu trước khi gửi
    if (!username) {
        alert('Vui lòng nhập username!');
        event.preventDefault();
        return false;
    }
    
    if (!password) {
        alert('Vui lòng nhập password!');
        event.preventDefault();
        return false;
    }
    
    if (!country) {
        alert('Vui lòng chọn quốc gia!');
        event.preventDefault();
        return false;
    }
    
    console.log('Form hợp lệ, đang gửi dữ liệu:');
    console.log('Username:', username);
    console.log('Password:', '********'); // Che mật khẩu trong console
    console.log('Tuổi:', age);
    console.log('Sở thích:', selectedHobbies);
    console.log('Quốc gia:', country);
    
    // Form sẽ được gửi đến result.php
    return true;
});
</script>
</body>
</html>