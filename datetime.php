<?php
function MyFooter($myname) {
    echo "<footer>";
    echo "<p>PHP Built-in Function Example &copy; 2024</p>";
    echo "<p>สร้างโดย: <b>$myname</b></p>";
    echo "</footer>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHP Built-in Function</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap');

        /* Reset */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #1c1c1c, #0d1117);
            color: #e6edf3;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            background-color: #0d1117;
            padding: 2rem 1rem;
            text-align: center;
            border-bottom: 3px solid #58a6ff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
        }

        header h1 {
            font-weight: 600;
            font-size: 1.8rem;
            color: #58a6ff;
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 2rem auto 4rem;
        }

        h2 {
            color: #79c0ff;
            border-left: 6px solid #58a6ff;
            padding-left: 10px;
            margin-bottom: 1rem;
            font-weight: 600;
            font-size: 1.3rem;
        }

        .card {
            background: rgba(88, 166, 255, 0.1);
            border-radius: 15px;
            padding: 1.6rem 2rem;
            margin-bottom: 2rem;
            box-shadow:
                0 4px 30px rgba(88, 166, 255, 0.3),
                inset 0 0 10px rgba(88, 166, 255, 0.2);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(88, 166, 255, 0.4);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 8px 40px rgba(88, 166, 255, 0.5),
                inset 0 0 20px rgba(88, 166, 255, 0.3);
        }

        b {
            color: #f0f6fc;
        }

        code {
            background: rgba(255, 255, 255, 0.15);
            padding: 3px 8px;
            border-radius: 6px;
            font-family: 'Courier New', Courier, monospace;
            user-select: text;
        }

        footer {
            background: #161b22;
            text-align: center;
            padding: 1.8rem 1rem;
            border-top: 3px solid #58a6ff;
            color: #8b949e;
            font-size: 0.9rem;
            box-shadow: inset 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        footer b {
            color: #58a6ff;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .container {
                width: 95%;
                margin: 1rem auto 3rem;
            }

            header h1 {
                font-size: 1.4rem;
            }

            h2 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>⚡ PHP Built-in Function ฟังก์ชันที่มีพร้อมใช้ใน PHP ⚡</h1>
    </header>

    <main class="container">

        <section>
            <h2>ทดสอบการใช้ Date / Time</h2>
            <div class="card">
                <?php
                echo "วันนี้วันที่: <b>" . date("d/m/Y") . "</b><br>";
                echo "เวลาปัจจุบัน: <b>" . date("H:i:s") . "</b><br>";
                echo "วันนี้เป็นวัน: <b>" . date("l") . "</b>";
                ?>
            </div>
        </section>

        <section>
            <h2>ทดสอบการใช้ date_diff()</h2>
            <div class="card">
                <?php
                $date1 = date_create("2005-12-04");
                $date2 = date_create("2025-12-11");
                $diff = date_diff($date1, $date2);

                echo "จำนวนวันทั้งหมด: <b>" . $diff->days . " วัน</b><br>";
                echo "แตกเป็น: <b>{$diff->y} ปี {$diff->m} เดือน {$diff->d} วัน</b>";
                ?>
            </div>
        </section>

        <section>
            <h2>ทดสอบการใช้ Math Function</h2>
            <div class="card">
                <?php
                $num1 = 10.7;
                $num2 = 15.3;
                $pi = 3.14159;

                echo "ปัดขึ้นของ $num1 = <b>" . ceil($num1) . "</b><br>";
                echo "ปัดลงของ $num2 = <b>" . floor($num2) . "</b><br>";
                echo "pi (2 ตำแหน่ง) = <b>" . round($pi, 2) . "</b><br>";
                echo "ค่า pi() = <b>" . pi() . "</b><br>";
                echo "5 ยกกำลัง 3 = <b>" . pow(5, 3) . "</b><br>";
                echo "รากที่สองของ 49 = <b>" . sqrt(49) . "</b><br>";
                echo "สุ่ม 1 - 100 = <b>" . rand(1, 100) . "</b><br>";
                echo "สุ่ม 50 - 150 = <b>" . rand(50, 150) . "</b><br>";

                $arr = [3, 5, 1, 8, 2];
                echo "ค่าสูงสุดใน Array = <b>" . max($arr) . "</b><br>";
                echo "ค่าต่ำสุดใน Array = <b>" . min($arr) . "</b><br>";
                ?>
            </div>
        </section>

        <section>
            <h2>ทดสอบการใช้ String Function</h2>
            <div class="card">
                <?php
                $str = "Hello PHP Function";

                echo "ความยาวสตริง = <b>" . strlen($str) . "</b> ตัว<br>";
                echo "ตัวพิมพ์ใหญ่ = <b>" . strtoupper($str) . "</b><br>";
                echo "ตัวพิมพ์เล็ก = <b>" . strtolower($str) . "</b><br>";
                echo "ตัวแรกใหญ่ = <b>" . ucfirst($str) . "</b><br>";
                echo "ทุกคำตัวแรกใหญ่ = <b>" . ucwords($str) . "</b><br>";

                $substr = "PHP";
                echo "ตำแหน่งคำว่า 'PHP' = <b>" . strpos($str, $substr) . "</b><br>";

                $replace = str_replace("Function", "ฟังก์ชั่น", $str);
                echo "แทนคำว่า Function = <b>$replace</b><br>";

                $str2 = "   PHP      function      with      Space   ";
                echo "ก่อน trim(): '<code>$str2</code>'<br>";
                echo "หลัง trim(): '<b>" . trim($str2) . "</b>'<br>";
                ?>
            </div>
        </section>

    </main>

    <?php MyFooter("Tanawat Wongsanao"); ?>

</body>
</html>

