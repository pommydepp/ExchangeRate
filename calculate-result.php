<?php

    $thb = $_POST['thb'];
    $type = $_POST['type'];

    if ($type=="usd") {
        $result = $thb / 31.2273;
    } elseif ($type=="jyp") {
        $result = $thb / 28.9814;
    } elseif ($type=="krw") {
        $result = $thb / 0.0293;
    } elseif ($type=="gbp") {
        $result = $thb / 43.392;
    } elseif ($type=="eru") {
        $result = $thb / 38.2737;
    }
    // pattern 1
    // รับค่ามาส่งค่าเป็น POST
    // $thb = $_POST['attribute_name'];
    require 'connect.php';

    $sql = "INSERT INTO exchange585_history(thb, calculated, currency) VALUES($thb, $result, '$type')";

    $sql_exe = $conn -> query($sql);

    // pattern 2
    // if ($type=="usd") {
    //     $rate = 31.2273;
    // } elseif ($type=="jyp") {
    //     $rate = 28.9814;
    // } elseif ($type=="krw") {
    //     $rate = 0.0293;
    // } elseif ($type=="gbp") {
    //     $rate = 43.392;
    // } elseif ($type=="eru") {
    //     $rate = 38.2737;
    // }
    // echo "Result=".thb*rate;

    // // pattern 3
    // switch ($type) {
    //     case 'usd':
    //         $rate = 0.31;
    //         break;
    //     case 'jyp':
    //         $rate = 0.21;
    //         break;
    //     case 'krw':
    //         $rate = 0.11;
    //         break;
    //     case 'gbp':
    //         $rate = 0.50;
    //         break;
    //     case 'eru':
    //         $rate = 0.40;
    //         break;
    //     default:
    //         $rate = 0;
    //         break;
    // }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-4">
            <h1 style="font-weight:bold;">จำนวนเงินในการแลกเปลี่ยน</h1>
                <form action="calculate-result.php" method="post" class="form-control mt-4">
                <?php 
                    echo "จำนวนเงินที่แลก : ".$thb." บาท";
                    echo "<br>";
                    echo "สกุลเงินที่ต้องการแลก ".$type;
                    echo "<br>";
                    echo "จำนวนเงินที่จะได้ = ".number_format((float)$result ,2,'.','')." ".$type;
                    echo "<br>";
                ?>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="mx-auto mt-4">
                <div class="col-md-12">
                    <form class="form-control">
                        <?php
                            $sql = "SELECT * FROM exchange585_history ORDER BY dateRecord DESC";
                            
                            $sql_exe = $conn->query($sql);

                            while ($row = mysqli_fetch_assoc($sql_exe)) {
                                echo $row['thb']." exchange to".$row['currency']." = ".$row['calculated']." ".$row['dateRecord'];
                        ?>
                                <a href="delete.php?id=<?php echo $row['recordID']; ?> &thb=<?php echo $row['thb']?>">Delete</a>
                               
                    </form>
                    <?php
                            $conn->close();
                            echo "<br>";
                                // $array['key/field name']
                            }
                            
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="js.bootstrap.min.js"></script>

</html>