<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    $birthDate = new DateTime($dob);
    $today = new DateTime('today');
    $diff = $birthDate->diff($today);
    $age_display = $diff->y . " ปี " . $diff->m . " เดือน " . $diff->d . " วัน";

    $height_m = $height / 100;
    $bmi = round($weight / ($height_m * $height_m), 2);

    $label = ""; $advice = ""; $color = "#38bdf8";
    if ($bmi < 18.5) { 
        $label = "น้ำหนักน้อยกว่ามาตรฐาน (ผอม)"; 
        $advice = "ควรรับประทานอาหารที่มีสารอาหารครบ 5 หมู่ และเพิ่มปริมาณแคลอรี่ต่อวัน"; 
        $color = "#fbbf24"; 
    } elseif ($bmi <= 22.9) { 
        $label = "น้ำหนักปกติ (สุขภาพดี)"; 
        $advice = "รักษาสุขภาพให้ดีแบบนี้ต่อไป ออกกำลังกายสม่ำเสมอครับ"; 
        $color = "#10b981"; 
    } elseif ($bmi <= 24.9) { 
        $label = "น้ำหนักเกิน (ท้วม)"; 
        $advice = "เริ่มมีความเสี่ยง ควรควบคุมปริมาณน้ำตาลและแป้งในอาหาร"; 
        $color = "#f59e0b"; 
    } else { 
        $label = "อ้วน"; 
        $advice = "ควรปรับเปลี่ยนพฤติกรรมการกิน และปรึกษาแพทย์หรือนักโภชนาการ"; 
        $color = "#ef4444"; 
    }
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลการคำนวณ BMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background: #0f172a; color: #f8fafc; font-family: 'Kanit', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; }
        .result-card { background: #1e293b; padding: 2.5rem; border-radius: 20px; width: 100%; max-width: 550px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); }
        .row { display: flex; padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .label { flex: 0 0 160px; color: #94a3b8; font-size: 0.95rem; }
        .value { flex: 1; color: #fff; font-weight: 400; }
        .highlight { color: <?php echo $color; ?>; font-weight: 600; }
        .btn-back { display: block; width: 100%; padding: 14px; background: transparent; border: 1px solid #334155; color: #94a3b8; text-align: center; text-decoration: none; border-radius: 12px; margin-top: 2rem; transition: 0.3s; }
        .btn-back:hover { background: rgba(255,255,255,0.05); color: #fff; border-color: #94a3b8; }
    </style>
</head>
<body>
    <div class="result-card">
        <div class="row"><div class="label">ชื่อ - สกุล :</div><div class="value"><?php echo $fullname; ?></div></div>
        <div class="row"><div class="label">วันเกิด :</div><div class="value"><?php echo date('d/m/Y', strtotime($dob)); ?></div></div>
        <div class="row"><div class="label">อายุ :</div><div class="value highlight"><?php echo $age_display; ?></div></div>
        <div class="row"><div class="label">น้ำหนัก :</div><div class="value"><?php echo $weight; ?> กก.</div></div>
        <div class="row"><div class="label">ส่วนสูง :</div><div class="value"><?php echo $height; ?> ซม.</div></div>
        <div class="row"><div class="label">ค่า BMI :</div><div class="value highlight" style="font-size: 1.5rem;"><?php echo $bmi; ?></div></div>
        <div class="row"><div class="label">แปลผลค่า BMI :</div><div class="value highlight"><?php echo $label; ?></div></div>
        <div class="row" style="border:none;"><div class="label">คำแนะนำ BMI :</div><div class="value"><?php echo $advice; ?></div></div>
        
        <a href="post.html" class="btn-back">กลับหน้าหลัก</a>
    </div>
</body>
</html>
<?php } ?>