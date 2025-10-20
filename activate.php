<?php
// سیستم فعالسازی برای نرم افزار حسابداری
header('Content-Type: text/plain');

// دریافت اطلاعات از نرم افزار
$license_key = $_POST['license_key'] ?? '';
$hardware_id = $_POST['hardware_id'] ?? '';

// کلیدهای مجاز
$valid_licenses = [
    "AFG-1234-5678" => ["hwid" => "", "active" => true],
    "AFG-9999-8888" => ["hwid" => "", "active" => true]
];

// بررسی لایسنس
if (isset($valid_licenses[$license_key])) {
    $license = $valid_licenses[$license_key];
    
    if (!$license['active']) {
        echo "ERROR: لایسنس غیرفعال است";
    }
    elseif (empty($license['hwid'])) {
        // اولین فعالسازی
        echo "SUCCESS: فعالسازی موفق - سیستم: $hardware_id";
    }
    elseif ($license['hwid'] == $hardware_id) {
        echo "SUCCESS: قبلاً فعال شده";
    }
    else {
        echo "ERROR: لایسنس روی سیستم دیگری فعال است";
    }
} else {
    echo "ERROR: لایسنس نامعتبر";
}
?>
