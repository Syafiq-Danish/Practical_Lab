<?php
//$_POST tarik data direct dari form

$firstkwh = "";
$error = "";
$showBill = false;

if (isset($_POST['calculate'])) {
    //. (titik atau dot) untuk gabungkan string, dengan PHP dan HTML
    //echo (print output / paparkan data)
    //echo "<h1>The input for the first kwh is " . $_POST['first'] . "</h1>";
    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];

    //first validation
    if ($firstkwh == "") {
        $firstkwh = 0;
    }
    if ($secondkwh == "") {
        $secondkwh = 0;
    }
    if ($thirdkwh == "") {
        $thirdkwh = 0;
    }
    if ($fourthkwh == "") {
        $fourthkwh = 0;
    }
    if ($fifthkwh == "") {
        $fifthkwh = 0;
    }

    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "Please enter a valid value (0 or more)";
    }

    else if($firstkwh > 200) {
        $error = "Please enter a valid value (200 or less) for the first kWh";
    }
    else if($secondkwh > 100) {
        $error = "Please enter a valid value (100 or less) for the second kWh";
    }
    else if($thirdkwh > 300) {
        $error = "Please enter a valid value (300 or less) for the third kWh";
    }
    else if($fourthkwh > 400) {
        $error = "Please enter a valid value (400 or less) for the fourth kWh";
    }
    else if($fifthkwh > 500) {
        $error = "Please enter a valid value (500 or less) for the fifth kWh";
    }

    else if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
        $error = "Please enter a valid value (1500 or less) for the total kWh";
    } else {

    //$charge1 = $_POST['first'] * 0.218;
    $charge1 = $firstkwh * 0.218;
    $charge2 = $secondkwh * 0.344;
    $charge3 = $thirdkwh * 0.516;
    $charge4 = $fourthkwh * 0.546;
    $charge5 = $fifthkwh * 0.571;

    $totalKwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    $totalCharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

    if ($totalCharge < 3) {
        $totalCharge = 3;
    }

    if ($totalKwh > 600) {
        $totalSst = $totalCharge * 1.06;
        $totalCharge = $totalCharge + $totalSst;

        $totalCharge = $totalCharge * 1.06;
    }

    $showBill = true;

}   
}
?>