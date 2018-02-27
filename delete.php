้<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete History Complete</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center">
                <form class="form-control">
                    <?php
                        $id = $_REQUEST['id'];
                        $thb = $_REQUEST['thb'];

                        require 'connect.php';

                        $sql = "DELETE FROM exchange585_history WHERE recordID = $id";

                        $sql_exe = $conn -> query($sql);

                        if ($sql_exe) {
                            echo "<h2>ลบประวัติการแลกเงินเรียบร้อย</h2>". "<br>" . "จำนวนเงินที่แลกตอนนั้น : " . $thb . " บาท"; 
                            header('Refresh:3; URL=index.html');
                            exit;
                        } else {
                            echo "Delete failed";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    
    
    <footer><div class="text-center mt-5"><p>Copyright 2018, Thanakorn Hongsa</p></div></footer>
</body>
<script src="js.bootstrap.min.js"></script>
</html>

