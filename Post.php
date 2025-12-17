<?php

$bmi_result = null;
$label = "";
$advice = "";
$color = "#38bdf8";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if ($weight > 0 && $height > 0) {
        $height_m = $height / 100;
        $bmi = $weight / ($height_m * $height_m);
        $bmi_result = round($bmi, 2);

        if ($bmi_result < 18.5) {
            $label = "ผอมเกินไป";
            $advice = "ควรรับประทานอาหารที่เพิ่มพลังงานและโปรตีน";
            $color = "#fbbf24"; 
        } elseif ($bmi_result <= 22.9) {
            $label = "น้ำหนักปกติ";
            $advice = "สุขภาพดีมาก รักษาวินัยนี้ไว้ครับ";
            $color = "#10b981";
        } elseif ($bmi_result <= 24.9) {
            $label = "น้ำหนักเกิน (ท้วม)";
            $advice = "ควรเริ่มคุมแป้งและน้ำตาล";
            $color = "#f59e0b"; 
        } else {
            $label = "อ้วน";
            $advice = "ควรปรึกษาผู้เชี่ยวชาญและออกกำลังกายสม่ำเสมอ";
            $color = "#ef4444";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern BMI Calculator</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root { --bg: #0f172a; --card: #1e293b; --accent: <?php echo $color; ?>; }
        body { background: var(--bg); color: #fff; font-family: 'Kanit', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background: var(--card); padding: 2rem; border-radius: 20px; width: 100%; max-width: 380px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); text-align: center; border: 1px solid rgba(255,255,255,0.1); }
        h2 { color: var(--accent); margin-bottom: 1.5rem; }
        .form-group { text-align: left; margin-bottom: 1rem; }
        label { color: #94a3b8; font-size: 0.85rem; }
        input { width: 100%; padding: 12px; background: #334155; border: 2px solid transparent; border-radius: 10px; color: #fff; outline: none; transition: 0.3s; margin-top: 5px; }
        input:focus { border-color: var(--accent); }
        button { width: 100%; padding: 14px; background: var(--accent); border: none; border-radius: 10px; color: #0f172a; font-weight: 600; cursor: pointer; margin-top: 1rem; transition: 0.3s; }
        button:hover { opacity: 0.9; transform: translateY(-2px); }
        
        .result-box { animation: slideUp 0.5s ease; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .bmi-val { font-size: 4rem; font-weight: 600; color: var(--accent); margin: 0.5rem 0; }
        .badge { background: var(--accent); color: #0f172a; padding: 4px 12px; border-radius: 50px; font-weight: 600; }
        .back-btn { display: inline-block; margin-top: 1.5rem; color: #94a3b8; text-decoration: none; font-size: 0.8rem; border-bottom: 1px solid #94a3b8; }
    </style>
</head>
<body>

<div class="container">
    <?php if ($bmi_result === null): ?>
        <h2>BMI CALCULATOR</h2>
        <form method="POST">
            <div class="form-group">
                <label>น้ำหนัก (กก.)</label>
                <input type="number" name="weight" step="0.1" placeholder="65.0" required>
            </div>
            <div class="form-group">
                <label>ส่วนสูง (ซม.)</label>
                <input type="number" name="height" step="0.1" placeholder="170.0" required>
            </div>
            <button type="submit">คำนวณเลย</button>
        </form>
    <?php else: ?>
        <div class="result-box">
            <h2>ผลการคำนวณ</h2>
            <div class="bmi-val"><?php echo $bmi_result; ?></div>
            <div class="badge"><?php echo $label; ?></div>
            <p style="color: #94a3b8; margin-top: 1.5rem; font-size: 0.9rem;">
                <strong>คำแนะนำ:</strong> <?php echo $advice; ?>
            </p>
            <a href="post.php" class="back-btn">กลับไปคำนวณใหม่</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
