<!-- <?php
        $spmMasuk = "SELECT id FROM spm_masuk
            WHERE id_status!=3";
        $jumlah = $this->db->query($spmMasuk)->num_rows();
        ?> -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Verifikasi SPM</h3>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="col-12">
        <div class="card"></div>

        <div class="card" style="padding: 15px;">
            <h3 class="text-center">SPM Masuk</h3>
            <?php
            $queryJumlahSPMmasuk = "SELECT * FROM spm_masuk WHERE id_status=?";

            $proses = $this->db->query($queryJumlahSPMmasuk, array(1))->num_rows();
            $tolak = $this->db->query($queryJumlahSPMmasuk, array(2))->num_rows();
            $verified = $this->db->query($queryJumlahSPMmasuk, array(3))->num_rows();
            ?>
            <div class="row">
                <div class="col-md-6 center-display">
                    <a href="" data-bs-toggle="modal" data-bs-target="#lihatSPMproses">
                        <div class="card-is bg-light-warning-ismail">
                            <div class="card-body px-1 py-1-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon bg-white" style="box-shadow: inset 5px -5px 2px #e0e0e0, inset -5px 5px 2px #fcfcfc;">
                                            <!-- <i class="iconly-boldShow"></i> -->
                                            <span>
                                                <i class="fa fa-fw fa-lg fa-pencil-square-o" style="color: rebeccapurple;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Proses</h6>
                                        <h4 class="font-extrabold mb-0"><strong><?= $proses ?></strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#lihatSPMtolak">
                        <div class="card-is bg-light-danger">
                            <div class="card-body px-1 py-1-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon bg-white" style="box-shadow: inset 5px -5px 2px #e0e0e0, inset -5px 5px 2px #fcfcfc;">
                                            <span>
                                                <i class="fa fa-fw fa-lg fa-ban" style="color: rebeccapurple;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Ditolak</h6>
                                        <h4 class="font-extrabold mb-0"><strong><?= $tolak ?></strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#SPM_verified">
                        <div class="card-is bg-light-success-ismail">
                            <div class="card-body px-1 py-1-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon bg-white" style="box-shadow: inset 5px -5px 2px #e0e0e0, inset -5px 5px 2px #fcfcfc;">
                                            <span>
                                                <i class="fa fa-fw fa-lg fa-check-square-o" style="color: rebeccapurple;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Verified</h6>
                                        <h4 class="font-extrabold mb-0"><strong><?= $verified ?></strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 center-display">
                    <script src="<?= base_url('assets/') ?>js/chartV2.9.4.js"></script>
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                    <script>
                        const xValues = ["Proses", "Ditolak", "Verified"];
                        const yValues = [<?= $proses ?>, <?= $tolak ?>, <?= $verified ?>];
                        const barColors = ["#faf25f", "#ffcdcd", "#75ffb8"];

                        new Chart("myChart", {
                            type: "doughnut",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                cutoutPercentage: 50,
                                responsive: true,
                                legend: {
                                    position: 'bottom'
                                },
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="card">
            <!-- Groups section start -->
            <section id="groups">

                <div class="col-12">
                    <div id="SPM_verified" class="card" style="padding: 15px;">
                        <div class="card-content">
                            <!-- <a href="#" class="code_view BtnSlideIs" data-bs-toggle="modal" data-bs-target="#lihatSPM">
                                <?php if ($jumlah == 0) : ?>
                                    <span class="txtIs"><i class="bi bi-eye"></i></span>
                                <?php else : ?>
                                    <span class="txtIs"><i class="bi bi-eye"></i> <strong style="color: yellow;"><?= $jumlah ?></strong></span>
                                <?php endif; ?>
                                <span class="txtIs_slide">SPM Masuk</span>
                                <span class="btn_icoIs">
                                    <span>
                                        <img src="<?= base_url('assets/images/favicon/') ?>ico_play_2.png" alt="icon play" />
                                    </span>
                                </span>
                            </a> -->
                            <h4 class="text-center">Data SPM Terverifikasi</h4>
                            <!-- table hover -->
                            <div class="table-responsive">

                                <table class="table table-hover mb-0" id="table1">
                                    <thead class=" thead-ismail">
                                        <tr>
                                            <th class="text-center">WAKTU</th>
                                            <th class="text-center">REG.</th>
                                            <th class="text-center">NAMA SKPD</th>
                                            <th class="text-center">NO. SPM</th>
                                            <th class="text-center">BUKTI</th>
                                            <th class="text-center">DOCUMENT</th>
                                            <th class="text-center">VERIFIKATOR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">
                                        <?php
                                        $i = 1;
                                        // $IdUser = $user['id_status'];
                                        $spmQuery = "SELECT *, spm_masuk.id AS id_masuk_spm FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id_status=3
                                                            ORDER BY spm_masuk.tgl_verif DESC
                                                            ";
                                        $spm_masuk = $this->db->query($spmQuery)->result_array();
                                        ?>
                                        <?php foreach ($spm_masuk as $mspm) : ?>
                                            <tr>
                                                <td class="text-center"><?= $mspm['tgl_verif'] ?></td>
                                                <td class="text-center"><?= $mspm['reg'] ?></td>
                                                <td><?= $mspm['name'] ?></td>
                                                <td class="text-center"><?= $mspm['no_spm'] ?></td>
                                                <td class="text-center"><?= $mspm['jenis'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('assets/doc/') ?>DOK-SPM.pdf" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspm['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                        <i class="bi bi-file-earmark-text"></i>
                                                    </a>
                                                    <?php
                                                    $idSPM = $mspm['id_masuk_spm'];
                                                    ?>
                                                    <a href="<?= base_url('spm/index/' . $idSPM) ?>" class="badge bg-success" target="_blank">
                                                        <i class="bi bi-printer"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center"><?= $mspm['verifikator'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Groups section start -->
        </div>
    </div>
    <!-- Hoverable rows end -->

    <!-- SPM MASUK Proses ######################## -->
    <div class=" modal fade text-left" id="lihatSPMproses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light-info">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <i class="fa fa-fw fa-lg fa-times"></i>
                    </button>
                    <h4 class="modal-title" id="myModalLabel33"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35"> Daftar
                        SPM Masuk</h4>
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <i class="fa fa-fw fa-lg fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <style>
                            .ismailText {
                                color: aliceblue;
                            }
                        </style>
                        <table class="table table-hover mb-0" id="table1">
                            <thead class=" thead-ismail ismailText">
                                <tr>
                                    <th class="text-center">WAKTU</th>
                                    <th class="text-center">NO.</th>
                                    <th class="text-center">NAMA SKPD</th>
                                    <th class="text-center">NO. SPM</th>
                                    <th class="text-center">JENIS</th>
                                    <th class="text-center">DOCUMENT</th>
                                    <th class="text-center">ACTION</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                <?php
                                $i = 1;
                                // $IdUser = $user['id_status'];
                                $spmProsesQuery = "SELECT *, spm_masuk.id AS id_masukP FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id_status=1
                                                            ORDER BY spm_masuk.tgl_aju DESC
                                                            ";
                                $spm_masuk_proses = $this->db->query($spmProsesQuery)->result_array();
                                ?>
                                <?php foreach ($spm_masuk_proses as $mspmP) : ?>
                                    <tr>
                                        <td class="text-center ismailText"><?= $mspmP['tgl_aju'] ?></td>
                                        <td class="text-center ismailText"><?= $i ?></td>
                                        <td class="ismailText"><?= $mspmP['name'] ?></td>
                                        <td class="text-center ismailText"><?= $mspmP['no_spm'] ?></td>
                                        <td class="text-center ismailText"><?= $mspmP['jenis'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('assets/doc/SPMDOC/') . $mspmP['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspmP['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="badge btn-success" id="verif<?= $mspmP['id_masukP'] ?>"><i class="bi bi-check-circle"></i></button>
                                            <button class="badge btn-edit-ismail" data-bs-toggle="modal" data-bs-target="#editSPM<?= $mspmP['id_masukP'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="badge btn-danger" data-bs-toggle="modal" data-bs-target="#tolakSPM<?= $mspmP['id_masukP'] ?>"><i class="bi bi-x-circle"></i></button>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($mspmP['id_status'] == 2) : ?>
                                                <span class="badge <?= $mspmP['kelas'] ?>"><?= $mspmP['status'] ?></span> <br>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewCatatan<?= $mspmP['id_masukP']; ?>" class="badge bg-danger"><i class="bi bi-eye"></i></a>
                                                <!-- Lihat Catatan Modal -->
                                                <div class="modal-info me-1 mb-1 d-inline-block">
                                                    <!--info theme Modal -->
                                                    <div class="modal fade text-left" id="viewCatatan<?= $mspmP['id_masukP']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                        <span class="">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle">
                                                                        Catatan <?= $mspmP['id_masukP']; ?>
                                                                    </h4>
                                                                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                        <span class="">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-8 col-12 offset-md-2">
                                                                        <img class="img-error" src="<?= base_url('assets/') ?>images/samples/reject-animate.png" alt="Tolak" width="300">
                                                                        <div class="text-center">
                                                                            <h1 class="error-title">Ditolak</h1>
                                                                            <p class="fs-5" style="color: yellow;">
                                                                                <?= $mspmP['catatan']; ?></p>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Lihat Catatan Modal -->
                                            <?php elseif ($mspmP['id_status'] == 1) : ?>
                                                <small style="color: yellow;">Menunggu diverifikasi</small>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Back End -->
                                        <!-- Modal Edit -->
                                        <div class="modal-info me-1 mb-1 d-inline-block">
                                            <!--info theme Modal -->
                                            <div class="modal fade text-left" id="editSPM<?= $mspmP['id_masukP'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-edit-ismail">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                Edit SPM No ID <?= $mspmP['id_masukP'] ?>
                                                            </h4>
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $id = $mspmP['id_masukP'] ?>
                                                            <form id="edit<?= $mspmP['id_masukP'] ?>" action="<?= base_url('admin/edit_spm/' . $id) ?>" method="post">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="no_spm">
                                                                            <h6><i class="bi bi-bar-chart-line-fill"></i>
                                                                                No. SPM <span style="color: red;"><strong>*</strong></span>
                                                                            </h6>
                                                                        </label>
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control" value="<?= $mspmP['no_spm'] ?>" id="no_spm" name="no_spm" required>
                                                                            <?= form_error('no_spm', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis">
                                                                            <h6><i class="bi bi-bookmark-check"></i> Jenis
                                                                                <span style="color: red;"><strong>*</strong></span>
                                                                            </h6>
                                                                        </label>
                                                                        <div class="position-relative">
                                                                            <select class="form-select" id="jenis" name="jenis" required>
                                                                                <option disabled value="">--Pilih Jenis
                                                                                    SPM--</option>
                                                                                <option <?= $mspmP['jenis'] == "BELANJA MODAL SEMESTER I/II" ? "selected" : null ?> value="BELANJA MODAL SEMESTER I/II">
                                                                                    BELANJA MODAL SEMESTER I/II</option>
                                                                                <option <?= $mspmP['jenis'] == "BUKU PERSEDIAAN" ? "selected" : null ?> value="BUKU PERSEDIAAN">BUKU PERSEDIAAN
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-edit-ismail ml-1">
                                                                        <i class="bx bx-check"></i>
                                                                        <span><i class="fa fa-fw fa-level-up"></i>
                                                                            Update</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById("edit<?= $mspmP['id_masukP'] ?>").addEventListener("submit",
                                                function(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        icon: "question",
                                                        title: "Anda Yakin Mengedit SPM ini?",
                                                        showCancelButton: true,
                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                        reverseButtons: false,
                                                        cancelButtonColor: '#DD6B55',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById("edit<?= $mspmP['id_masukP'] ?>")
                                                                .submit();
                                                        } else {
                                                            Swal.fire({
                                                                title: "Dibatalkan!",
                                                                text: "SPM batal diedit",
                                                                icon: "error",
                                                                showConfirmButton: false,
                                                                timer: 1300
                                                            })
                                                        }
                                                    })
                                                })
                                        </script>
                                        <!-- /Modal Edit -->
                                        <!-- Modal tolak -->
                                        <div class="modal-info me-1 mb-1 d-inline-block">
                                            <!--info theme Modal -->
                                            <div class="modal fade text-left" id="tolakSPM<?= $mspmP['id_masukP'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                Catatan Penolakan SPM No ID <?= $mspmP['id_masukP'] ?>
                                                            </h4>
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $id = $mspmP['id_masukP'] ?>
                                                            <form id="tolak<?= $mspmP['id_masukP'] ?>" action="<?= base_url('admin/tolak/' . $id) ?>" method="post">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="catatan">
                                                                            <h6><i class="bi bi-pencil-square"></i> Catatan
                                                                            </h6>
                                                                        </label>
                                                                        <div class="position-relative">
                                                                            <textarea class="form-control" name="catatan" id="catatan" row="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger ml-1">
                                                                        <i class="bx bx-check"></i>
                                                                        <span><i class="bi bi-backspace"></i> Tolak</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById("tolak<?= $mspmP['id_masukP'] ?>").addEventListener("submit",
                                                function(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        icon: "question",
                                                        title: "Anda Yakin Menolak SPM ini?",
                                                        showCancelButton: true,
                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                        reverseButtons: false,
                                                        cancelButtonColor: '#DD6B55',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById("tolak<?= $mspmP['id_masukP'] ?>")
                                                                .submit();
                                                        } else {
                                                            Swal.fire({
                                                                title: "Dibatalkan!",
                                                                text: "Data batal ditolak",
                                                                icon: "error",
                                                                showConfirmButton: false,
                                                                timer: 1300
                                                            })
                                                        }
                                                    })
                                                })
                                        </script>
                                        <!-- /Modal tolak -->

                                        <script>
                                            document.getElementById('verif<?= $mspmP['id_masukP'] ?>').addEventListener('click', (
                                                e) => {
                                                Swal.fire({
                                                    icon: "question",
                                                    title: "Anda Yakin Memverifikasi?",
                                                    showCancelButton: true,
                                                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                    reverseButtons: false,
                                                    cancelButtonColor: '#DD6B55',
                                                }).then(function(result) {
                                                    if (result.value) {
                                                        Swal.fire({
                                                            icon: "question",
                                                            title: "Beneran Nih?",
                                                            text: "Gak Bisa Dibatalin Loh",
                                                            showCancelButton: true,
                                                            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                            reverseButtons: false,
                                                            cancelButtonColor: '#DD6B55',
                                                        }).then(function(result) {
                                                            if (result.value) {
                                                                <?php
                                                                $id = $mspmP['id_masukP'];
                                                                ?>
                                                                window.location.href =
                                                                    "<?= base_url('admin/verif/' . $id); ?>";
                                                            } else if (result.dismiss === "cancel") {
                                                                Swal.fire({
                                                                    title: "Becanda Deng...",
                                                                    text: "Bisa dibatalin Kok",
                                                                    icon: "error",
                                                                    showConfirmButton: false,
                                                                    timer: 1500
                                                                })
                                                            }
                                                        })
                                                    } else if (result.dismiss === "cancel") {
                                                        Swal.fire({
                                                            title: "Dibatalkan!",
                                                            text: "Data belum diverifikasi",
                                                            icon: "error",
                                                            showConfirmButton: false,
                                                            timer: 1300
                                                        })
                                                    }
                                                })
                                            })
                                        </script>
                                        <!-- /Back End -->
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <span class="">
                            <i class="fa fa-fw fa-lg fa-times"></i> Close
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /SPM MASUK Proses ######################## -->

    <!-- SPM MASUK Ditolak ######################## -->
    <div class=" modal fade text-left" id="lihatSPMtolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light-info">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <i class="fa fa-fw fa-lg fa-times"></i>
                    </button>
                    <h4 class="modal-title" id="myModalLabel33"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35"> Daftar
                        SPM Masuk</h4>
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <i class="fa fa-fw fa-lg fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <style>
                            .ismailText {
                                color: aliceblue;
                            }
                        </style>
                        <table class="table table-hover mb-0" id="table1">
                            <thead class=" thead-ismail ismailText">
                                <tr>
                                    <th class="text-center">WAKTU</th>
                                    <th class="text-center">NO.</th>
                                    <th class="text-center">NAMA SKPD</th>
                                    <th class="text-center">NO. SPM</th>
                                    <th class="text-center">JENIS</th>
                                    <th class="text-center">DOCUMENT</th>
                                    <th class="text-center">ACTION</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                <?php
                                $i = 1;
                                // $IdUser = $user['id_status'];
                                $spmTolakQuery = "SELECT *, spm_masuk.id AS id_masukT FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id_status=2
                                                            ORDER BY spm_masuk.tgl_aju DESC
                                                            ";
                                $spm_masuk_tolak = $this->db->query($spmTolakQuery)->result_array();
                                ?>
                                <?php foreach ($spm_masuk_tolak as $mspmT) : ?>
                                    <tr>
                                        <td class="text-center ismailText"><?= $mspmT['tgl_aju'] ?></td>
                                        <td class="text-center ismailText"><?= $i ?></td>
                                        <td class="ismailText"><?= $mspmT['name'] ?></td>
                                        <td class="text-center ismailText"><?= $mspmT['no_spm'] ?></td>
                                        <td class="text-center ismailText"><?= $mspmT['jenis'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('assets/doc/SPMDOC/') . $mspmT['dokumen']; ?>" class="badge bg-info" target="popup" onclick="window.open('<?= base_url('assets/doc/SPMDOC/') . $mspmT['dokumen']; ?>','popup','width=600,height=600'); return false;">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="badge btn-success" id="verif<?= $mspmT['id_masukT'] ?>"><i class="bi bi-check-circle"></i></button>
                                            <button class="badge btn-edit-ismail" data-bs-toggle="modal" data-bs-target="#editSPM<?= $mspmT['id_masukT'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="badge btn-danger" data-bs-toggle="modal" data-bs-target="#tolakSPM<?= $mspmT['id_masukT'] ?>"><i class="bi bi-x-circle"></i></button>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($mspmT['id_status'] == 2) : ?>
                                                <span class="badge <?= $mspmT['kelas'] ?>"><?= $mspmT['status'] ?></span> <br>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewCatatan<?= $mspmT['id_masukT']; ?>" class="badge bg-danger"><i class="bi bi-eye"></i></a>
                                                <!-- Lihat Catatan Modal -->
                                                <div class="modal-info me-1 mb-1 d-inline-block">
                                                    <!--info theme Modal -->
                                                    <div class="modal fade text-left" id="viewCatatan<?= $mspmT['id_masukT']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                        <span class="">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle">
                                                                        Catatan <?= $mspmT['id_masukT'] ?>
                                                                    </h4>
                                                                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                                                                        <span class="">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-md-8 col-12 offset-md-2">
                                                                        <img class="img-error" src="<?= base_url('assets/') ?>images/samples/reject-animate.png" alt="Tolak" width="300">
                                                                        <div class="text-center">
                                                                            <h1 class="error-title">Ditolak</h1>
                                                                            <p class="fs-5" style="color: yellow;">
                                                                                <?= $mspmT['catatan']; ?></p>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Lihat Catatan Modal -->
                                            <?php elseif ($mspmT['id_status'] == 1) : ?>
                                                <small style="color: yellow;">Menunggu diverifikasi</small>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Back End -->
                                        <!-- Modal Edit -->
                                        <div class="modal-info me-1 mb-1 d-inline-block">
                                            <!--info theme Modal -->
                                            <div class="modal fade text-left" id="editSPM<?= $mspmT['id_masukT'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-edit-ismail">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                Edit SPM No Reg <?= $mspmT['id_masukT'] ?>
                                                            </h4>
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $id = $mspmT['id_masukT'] ?>
                                                            <form id="edit<?= $mspmT['id_masukT'] ?>" action="<?= base_url('admin/edit_spm/') . $id ?>" method="post">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="no_spm">
                                                                            <h6><i class="bi bi-bar-chart-line-fill"></i>
                                                                                No. SPM <span style="color: red;"><strong>*</strong></span>
                                                                            </h6>
                                                                        </label>
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control" value="<?= $mspmT['no_spm'] ?>" id="no_spm" name="no_spm" required>
                                                                            <?= form_error('no_spm', '<small class="text-danger">', '</small>') ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis">
                                                                            <h6><i class="bi bi-bookmark-check"></i> Jenis
                                                                                <span style="color: red;"><strong>*</strong></span>
                                                                            </h6>
                                                                        </label>
                                                                        <div class="position-relative">
                                                                            <select class="form-select" id="jenis" name="jenis" required>
                                                                                <option disabled value="">--Pilih Jenis
                                                                                    SPM--</option>
                                                                                <option <?= $mspmT['jenis'] == "BELANJA MODAL SEMESTER I/II" ? "selected" : null ?> value="BELANJA MODAL SEMESTER I/II">
                                                                                    BELANJA MODAL SEMESTER I/II</option>
                                                                                <option <?= $mspmT['jenis'] == "BUKU PERSEDIAAN" ? "selected" : null ?> value="BUKU PERSEDIAAN">BUKU PERSEDIAAN
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-edit-ismail ml-1">
                                                                        <i class="bx bx-check"></i>
                                                                        <span><i class="fa fa-fw fa-level-up"></i>
                                                                            Update</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById("edit<?= $mspmT['id_masukT'] ?>").addEventListener("submit",
                                                function(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        icon: "question",
                                                        title: "Anda Yakin Mengedit SPM ini?",
                                                        showCancelButton: true,
                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                        reverseButtons: false,
                                                        cancelButtonColor: '#DD6B55',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById("edit<?= $mspmT['id_masukT'] ?>")
                                                                .submit();
                                                        } else {
                                                            Swal.fire({
                                                                title: "Dibatalkan!",
                                                                text: "SPM batal diedit",
                                                                icon: "error",
                                                                showConfirmButton: false,
                                                                timer: 1300
                                                            })
                                                        }
                                                    })
                                                })
                                        </script>
                                        <!-- /Modal Edit -->
                                        <!-- Modal tolak -->
                                        <div class="modal-info me-1 mb-1 d-inline-block">
                                            <!--info theme Modal -->
                                            <div class="modal fade text-left" id="tolakSPM<?= $mspmT['id_masukT'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                            <h4 class="modal-title text-center text-label-header" id="ajukanSPMTitle"><img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                                                                Catatan Penolakan SPM ID <?= $mspmT['id_masukT'] ?>
                                                            </h4>
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="fa-fw fa-lg fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="tolak<?= $mspmT['id'] ?>" action="<?= base_url('admin/tolak/' . $mspmT['id_masukT']) ?>" method="post">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="catatan">
                                                                            <h6><i class="bi bi-pencil-square"></i> Catatan
                                                                            </h6>
                                                                        </label>
                                                                        <div class="position-relative">
                                                                            <textarea class="form-control" name="catatan" id="catatan" row="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger ml-1">
                                                                        <i class="bx bx-check"></i>
                                                                        <span><i class="bi bi-backspace"></i> Tolak</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById("tolak<?= $mspmT['id_masukT'] ?>").addEventListener("submit",
                                                function(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        icon: "question",
                                                        title: "Anda Yakin Menolak SPM ini?",
                                                        showCancelButton: true,
                                                        confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                        cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                        reverseButtons: false,
                                                        cancelButtonColor: '#DD6B55',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById("tolak<?= $mspmT['id_masukT'] ?>")
                                                                .submit();
                                                        } else {
                                                            Swal.fire({
                                                                title: "Dibatalkan!",
                                                                text: "Data batal ditolak",
                                                                icon: "error",
                                                                showConfirmButton: false,
                                                                timer: 1300
                                                            })
                                                        }
                                                    })
                                                })
                                        </script>
                                        <!-- /Modal tolak -->

                                        <script>
                                            document.getElementById('verif<?= $mspmT['id_masukT'] ?>').addEventListener('click', (
                                                e) => {
                                                Swal.fire({
                                                    icon: "question",
                                                    title: "Anda Yakin Memverifikasi?",
                                                    showCancelButton: true,
                                                    confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                    cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                    reverseButtons: false,
                                                    cancelButtonColor: '#DD6B55',
                                                }).then(function(result) {
                                                    if (result.value) {
                                                        Swal.fire({
                                                            icon: "question",
                                                            title: "Beneran Nih?",
                                                            text: "Gak Bisa Dibatalin Loh",
                                                            showCancelButton: true,
                                                            confirmButtonText: "<i class='bi bi-check-square-fill'></i> YA",
                                                            cancelButtonText: "<i class='bi bi-x-square-fill'></i> Batal",
                                                            reverseButtons: false,
                                                            cancelButtonColor: '#DD6B55',
                                                        }).then(function(result) {
                                                            if (result.value) {
                                                                <?php
                                                                $id = $mspmT['id_masukT'];
                                                                ?>
                                                                window.location.href =
                                                                    "<?= base_url('admin/verif/' . $id); ?>";
                                                            } else if (result.dismiss === "cancel") {
                                                                Swal.fire({
                                                                    title: "Becanda Deng...",
                                                                    text: "Bisa dibatalin Kok",
                                                                    icon: "error",
                                                                    showConfirmButton: false,
                                                                    timer: 1500
                                                                })
                                                            }
                                                        })
                                                    } else if (result.dismiss === "cancel") {
                                                        Swal.fire({
                                                            title: "Dibatalkan!",
                                                            text: "Data belum diverifikasi",
                                                            icon: "error",
                                                            showConfirmButton: false,
                                                            timer: 1300
                                                        })
                                                    }
                                                })
                                            })
                                        </script>
                                        <!-- /Back End -->
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <span class="">
                            <i class="fa fa-fw fa-lg fa-times"></i> Close
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /SPM MASUK Ditolak ######################## -->
</div>