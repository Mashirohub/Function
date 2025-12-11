<?php
function sum($num1, $num2){
    $result = $num1 + $num2;
    return $result;
}

function add_five($num) {
    $value = $num + 5;
    echo "ค่าภายในฟังก์ชั่น add_five() คือ <b>$value</b><br>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ฟังก์ชันที่สร้างขึ้นเอง - User-defined Function</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap');

        /* Reset */
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Kanit', sans-serif;
            margin: 0;
            padding: 2rem 1rem;
            min-height: 100vh;
        }

        h1, h2 {
            color: #81d4fa;
            text-align: center;
            margin-bottom: 1rem;
            font-weight: 600;
            text-shadow: 0 0 8px #29b6f6;
        }

        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.5rem;
            margin-top: 3rem;
        }

        .content {
            max-width: 720px;
            margin: 0 auto;
            background: #1e1e1e;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 20px #0288d1;
            line-height: 1.6;
        }

        hr {
            border: none;
            border-top: 1px solid #0288d1;
            margin: 2rem 0;
            opacity: 0.4;
        }

        b {
            color: #4fc3f7;
        }

        p, span {
            font-size: 1.1rem;
        }

        /* Highlight results */
        .result {
            background-color: #263238;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: inset 0 0 10px #0288d1;
            font-weight: 600;
            color: #81d4fa;
            user-select: text;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .content {
                padding: 1rem;
                margin: 0 1rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

    <h1>การใช้ User-defined Function ฟังก์ชันที่สร้างขึ้นเอง</h1>

    <div class="content">
        <p>ผลบวกของ 10 กับ 20 คือ <span class="result"><?= sum(10, 20) ?></span></p>
        <p>ผลบวกของ 15 กับ 25 คือ <span class="result"><?= sum(15, 25) ?></span></p>
        <?php $a = 30; $b = 45; ?>
        <p>ผลบวกของ <?= $a ?> กับ <?= $b ?> คือ <span class="result"><?= sum($a, $b) ?></span></p>

        <hr>

        <?php
            $num = 50;
        ?>
        <p>ค่าของ num ก่อนเรียกใช้ฟังก์ชัน <b>add_five()</b> คือ <span class="result"><?= $num ?></span></p>

        <div class="result">
        <?php add_five($num); ?>
        </div>

        <p>ค่าของ num หลังเรียกใช้ฟังก์ชัน <b>add_five()</b> คือ <span class="result"><?= $num ?></span></p>

        <h2>ตัวอย่าง function ที่มีพารามิเตอร์หลายตัว</h2>

        <?php
        function sumListofNumbers(...$x){
            $n = 0;
            $len = count($x);
            for($i=0; $i<$len; $i++){
                $n += $x[$i];
            }
            return $n;
        }
        ?>

        <p>ผลบวกของตัวเลข 5, 10, 15 คือ <span class="result"><?= sumListofNumbers(5, 10, 15) ?></span></p>
        <p>ผลบวกของตัวเลข 1 ถึง 10 คือ <span class="result"><?= sumListofNumbers(1,2,3,4,5,6,7,8,9,10) ?></span></p>

        <?php
        function myFamily($lastName, ...$firstName) {
            $len = count($firstName);
            echo '<h2>ฟังก์ชัน myFamily แสดงชื่อ-นามสกุล</h2>';
            for ($i = 0; $i<$len; $i++) {
                echo "<p>สวีดัส คุณ <b>" . $firstName[$i] . " " . $lastName . "</b></p>";
            }
        }
        myFamily("Humyai", "Tasan", "Sonkhan", "SomShai", "SomYing");
        ?>
    </div>

</body>
</html>
