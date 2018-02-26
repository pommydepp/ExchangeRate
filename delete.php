<?php
    $id = $_REQUEST['id'];
    $thb = $_REQUEST['thb'];

    require 'connect.php';

    $sql = "DELETE FROM exchange585_history WHERE recordID = $id";

    $sql_exe = $conn -> query($sql);

    if ($sql_exe) {
        echo "<h2>Delete complete</h2>". "<br>" . "Values : " . $thb; 
        header('Refresh:3; URL=index.html');
        exit;
    } else {
        echo "Delete failed";
    }
?>