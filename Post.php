<?php
// 1. สร้าง Function สำหรับคำนวณ BMI
function calculateBMI($weight, $height_cm) {
    // แปลงส่วนสูงจาก เซนติเมตร เป็น เมตร
    $height_m = $height_cm / 100;
    // สูตร BMI = น้ำหนัก (kg) / (ส่วนสูง (m) * ส่วนสูง (m))
    $bmi = $weight / ($height_m * $height_m);
    return round($bmi, 2);
}

// 2. รับค่าจาก Method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if ($weight > 0 && $height > 0) {
        $bmi_result = calculateBMI($weight, $height);
        
        // 3. แปลผลและให้คำแนะนำ
        $label = "";
        $advice = "";

        if ($bmi_result < 18.5) {
            $label = "น้ำหนักน้อยกว่ามาตรฐาน (ผอม)";
            $advice = "ควรรับประทานอาหารที่มีสารอาหารครบ 5 หมู่ และเพิ่มปริมาณแคลอรี่ต่อวัน";
        } elseif ($bmi_result >= 18.5 && $bmi_result <= 22.9) {
            $label = "น้ำหนักปกติ (สุขภาพดี)";
            $advice = "รักษาสุขภาพให้ดีแบบนี้ต่อไป ออกกำลังกายสม่ำเสมอครับ";
        } elseif ($bmi_result >= 23.0 && $bmi_result <= 24.9) {
            $label = "น้ำหนักเกิน (ท้วม)";
            $advice = "เริ่มมีความเสี่ยง ควรควบคุมปริมาณน้ำตาลและแป้งในอาหาร";
        } elseif ($bmi_result >= 25.0 && $bmi_result <= 29.9) {
            $label = "อ้วน (ระดับ 1)";
            $advice = "ควรปรับเปลี่ยนพฤติกรรมการกิน และหาเวลาออกกำลังกายอย่างจริงจัง";
        } else {
            $label = "อ้วนมาก (ระดับ 2)";
            $advice = "มีความเสี่ยงต่อโรคแทรกซ้อนสูง ควรปรึกษาแพทย์หรือนักโภชนาการ";
        }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลการคำนวณ BMI</title>
</head>
<body>
    <h2>ผลการคำนวณของคุณ</h2>
    <p>ค่า BMI ของคุณคือ: <strong><?php echo $bmi_result; ?></strong></p>
    <p>เกณฑ์น้ำหนัก: <strong><?php echo $label; ?></strong></p>
    <p><strong>คำแนะนำ:</strong> <?php echo $advice; ?></p>
    <br>
    <a href="index.php">กลับไปคำนวณใหม่</a>
</body>
</html>

<?php
    } else {
        echo "กรุณากรอกข้อมูลที่ถูกต้อง";
    }
}
?>
