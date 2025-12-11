<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวอย่างวันที่แบบไทย</title>
    <style>
        body {
            font-family: "Sarabun", "Arial", sans-serif;
            background-color: #f4f6f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #ff6b6b;
            margin-bottom: 25px;
            font-size: 28px;
        }

        .date {
            background-color: #f0f8ff;
            display: inline-block;
            padding: 15px 25px;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 22px;
            color: #0077b6;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .date:hover {
            background-color: #0077b6;
            color: #fff;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ตัวอย่าง function ที่มีพารามิเตอร์ค่าเริ่มต้น</h2>
        <?php
        function thai_date($strDate="now") {
            $strYear = date("Y", strtotime($strDate)) + 543;
            $strMonth = date("n", strtotime($strDate));
            $strDay = date("j", strtotime($strDate));

            $thaiMonthNames = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
                               "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม",
                               "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

            $strMonthThai = $thaiMonthNames[$strMonth];
            return "$strDay $strMonthThai พ.ศ. $strYear";
        }

        echo '<div class="date">' . thai_date("2025-12-11") . '</div>';
        echo '<div class="date">' . thai_date() . '</div>';
        ?>
    </div>
</body>
</html>
