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

<?php
function luas($s)
{
    return $s * $s;
}
?>


<?php
if (isset($_POST['tekan'])) {
    $sisi = $_POST['sisi'];
    $hasil = luas($sisi);
    $waktu = date('l, d-m-Y  H:i:s');

    $mydata = [
        "Tipe" => "Persegi",
        "sisi" => $sisi,
        "hasil" => $hasil,
        "waktu" => $waktu

    ];
    array_push($dataALL, $mydata);
    array_multisort($dataALL, SORT_ASC);
    $dataJson = json_encode($dataALL, JSON_PRETTY_PRINT);
    file_put_contents($berkas, $dataJson);
}
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

    <div class="bg-gambar">
        <div style="display: flex;">
            <div class="container-fluid container-fluids bgcont">
                <h3 style="text-align: center;">Perhitungan Persegi</h3>
                <form class="form-horizontal" action="persegi.php" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="angka1">Sisi :</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="alas" placeholder="Masukkan Sisi Persegi" name="sisi" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Hasil :</label>
                        <div class="col-sm-10">
                            <input type="number" disabled class="form-control" id="hasil" placeholder="Hasil" name="hasil" value="<?php echo $hasil ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10" style="display: inline">
                            <button type="submit" class="btn btn-default" name="tekan" style="background-color: red;">
                                Hitung
                            </button>
                        </div>
                    </div>
                </form>
                <div style="color: rgb(197, 93, 13)">
                    <h1 id="output1"></h1>
                    <h1 id="output2"></h1>
                    <h1 id="output3"></h1>

                </div>
            </div>
            <div class="container-fluid container-fluids2 bgcont">
                <h3 style="text-align: center;">History Perhitungan</h3>
                <div>
                    <table class="table table-striped overflow-auto">
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>Hasil Perhitungan</th>
                        </tr>

                        <?php
                        $count = 1;
                        for ($i = 0; $i < count($json_data); $i++) {
                            if ($json_data[$i]["Tipe"] == "Persegi") {
                        ?>
                                <tr>
                                    <th><?php echo $count ?></th>
                                    <td><?php echo $json_data[$i]["waktu"] ?></td>
                                    <td><?php echo $json_data[$i]["hasil"] ?></td>
                                </tr>
                        <?php
                                $count++;
                            }
                        } ?>


                    </table>
                </div>
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