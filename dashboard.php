<?php

$berkas = "data.json";
$dataJson = file_get_contents($berkas);
$dataALL = json_decode($dataJson, true);
date_default_timezone_set('Asia/Jakarta');
?>

<?php

$json = file_get_contents('data.json');
$json_data = json_decode($json, true);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <title>test</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h3 class="navbar-brand navbar-right"><a href="lingkaran.php">Lingkaran</a></h3>
                    <h3 class="navbar-brand navbar-right"><a href="persegi.php">Persegi</a></h3>
                    <h3 class="navbar-brand navbar-right"><a href="index.php">Segitiga</a></h3>
                    <h3 class="navbar-brand navbar-right"><a href="dashboard.php">Dashboard</a></h3>
                </div>
            </div>
        </nav>
    </header>

    <?php
    $lingkarani = 0;
    $persegii = 0;
    $segitigai = 0;
    $iter = 1;
    //digunakan untuk menghitung banyak data berdasarkan tipe
    for ($i = 0; $i < count($json_data); $i++) {
        if ($json_data[$i]["Tipe"] == "Lingkaran") {
            $lingkarani++;
        }
        if ($json_data[$i]["Tipe"] == "Persegi") {
            $persegii++;
        }
        if ($json_data[$i]["Tipe"] == "Segitiga") {
            $segitigai++;
        }
        $iter = $i + 1;
    }

    ?>

    <div class="bg-gambar">
        <div style="display: flex;">
            <div class="container-fluid container-fluids2 bgcont">
                <h3 style="text-align: center;">Segitiga</h3>
                <h3 style="text-align: center;">Banyak Perhitungan : <?php echo $segitigai ?></h3>
                <h1><?php echo $segitigai / $iter * 100 ?> %</h1>
            </div>
            <div class="container-fluid container-fluids2 bgcont">
                <h3 style="text-align: center;">Persegi</h3>
                <h3 style="text-align: center;">Banyak Perhitungan : <?php echo $persegii ?></h3>
                <h1><?php echo $persegii / $iter * 100 ?> %</h1>
            </div>
            <div class="container-fluid container-fluids2 bgcont">
                <h3 style="text-align: center;">Lingkaran</h3>
                <h3 style="text-align: center;">Banyak Perhitungan : <?php echo $lingkarani ?></h3>
                <h1><?php echo $lingkarani / $iter * 100 ?> %</h1>
            </div>
        </div>
    </div>
</body>


<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>