<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php"; ?>
    <style>
        label {
            color: royalblue;
            font-weight: 600;
        }
    </style>

    <?php
    // Fungsi untuk menghitung bobot gejala
    function hitungBobotGejala($nilaiInput, $bobotGejala)
    {
        return $nilaiInput * $bobotGejala;
    }

    // Fungsi untuk menghitung bobot tingkat depresi
    function hitungBobotTingkatDepresi($bobotGejalaUser)
    {
        $bobotTingkatDepresi = array_sum($bobotGejalaUser);
        return round($bobotTingkatDepresi, 2);
    }

    // Fungsi untuk menentukan tingkat depresi berdasarkan bobot tingkat depresi
    function tentukanTingkatDepresi($bobotTingkatDepresi)
    {
        if ($bobotTingkatDepresi >= 0 && $bobotTingkatDepresi <= 0.16) {
            return "Wajar";
        } elseif ($bobotTingkatDepresi >= 0.17 && $bobotTingkatDepresi <= 0.25) {
            return "Gangguan Mood";
        } elseif ($bobotTingkatDepresi >= 0.26 && $bobotTingkatDepresi <= 0.32) {
            return "Depresi Ringan";
        } elseif ($bobotTingkatDepresi >= 0.33 && $bobotTingkatDepresi <= 0.48) {
            return "Depresi Sedang";
        } elseif ($bobotTingkatDepresi >= 0.49 && $bobotTingkatDepresi <= 0.62) {
            return "Depresi Berat";
        } else {
            return "Depresi Ekstrem";
        }
    }

    // Query untuk mendapatkan data gejala dari tabel gejala
    $sqlGetDataGejala = "SELECT kode, gejala, bobot FROM gejala";
    $resultGetDataGejala = $conn->query($sqlGetDataGejala);

    // Array untuk menyimpan data gejala dari database
    $dataGejala = array();
    if ($resultGetDataGejala->num_rows > 0) {
        while ($row = $resultGetDataGejala->fetch_assoc()) {
            $dataGejala[] = $row;
        }
    }

    // Jika tombol submit ditekan
    if (isset($_POST['submit'])) {
        $bobotGejalaUser = array(); // Array untuk menyimpan bobot gejala yang diisi oleh user

        foreach ($dataGejala as $gejala) {
            $nilaiInput = isset($_POST[$gejala['kode']]) ? floatval($_POST[$gejala['kode']]) : 0; // Nilai input gejala (0, 0.33, 0.66, 1)
            $bobotGejala = $gejala['bobot']; // Bobot gejala dari database

            $bobotGejalaUser[] = hitungBobotGejala($nilaiInput, $bobotGejala);
        }

        $bobotTingkatDepresi = hitungBobotTingkatDepresi($bobotGejalaUser);
        $tingkatDepresi = tentukanTingkatDepresi($bobotTingkatDepresi);
    }
    ?>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-plus-square"></i> Isi Formulir Diagnosis
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <!-- Form Input -->
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <?php foreach ($dataGejala as $gejala) { ?>
                                        <div class="form-group">
                                            <label for="<?php echo $gejala['kode']; ?>"><?php echo $gejala['gejala']; ?></label>
                                            <select class="form-control" name="<?php echo $gejala['kode']; ?>">
                                                <option value="0">Tidak/Tidak Pernah</option>
                                                <option value="0.33">Kurang Yakin/Jarang</option>
                                                <option value="0.66">Yakin/Sering</option>
                                                <option value="1">Sangat Yakin/Sangat Sering</option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- Hasil Diagnosis -->
                    <?php if (isset($tingkatDepresi)) : ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Hasil Diagnosis</h6>
                            </div>
                            <div class="card-body">
                                <p>Kondisi anda: <?php echo $tingkatDepresi; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "plugin.php"; ?>

    <script>
        <?php if (isset($script)) {
            echo $script;
        } ?>
    </script>
</body>

</html>