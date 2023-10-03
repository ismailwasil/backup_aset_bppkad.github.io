<style>
    .bg-rent {
        background-color: #00B98E !important
    }
</style>

<?= $this->session->flashdata('message'); ?>

<div class="page-title d-md-block d-lg-none">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <p>.</p>
        </div>
        <h3>Layanan Sewa</h3>
    </div>
</div>

<!-- Header Start -->
<div class="container-fluid">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h3 class="animated fadeIn mb-4">Find A <span style="color: #00B98E;">Perfect Asset</span> To Enjoy With Your Lovely Person</h3>
            <!-- <p class=" animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p> -->
            <a href="#listLayanan" class="btn btn-primary py-3 px-5 me-3 animated fadeIn"><i class="bi bi-chevron-double-down"></i> Jenis Layanan</a>
        </div>
        <div class="container-fluid col-md-6 animated fadeIn">
            <img src="<?= base_url('assets/'); ?>images/logo/Lasada BPPKAD.png" alt="Lasada BPPKAD" class="responsive" height="90"> <br>
        </div>
    </div>
    <!-- Header End -->


    <br>

    <!-- Property List Start -->
    <div id="listLayanan" class="card" style="padding: 15px;">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="text-center mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Jenis-Jenis Layanan</h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div id="sewa" class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="<?= base_url('lasada/bpu_spg') ?>" target="_blank">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front-1">
                                        <div class="texture1"></div>
                                        <div class="texture2"></div>
                                        <p class="heading_8264">KAB. SAMPANG</p>
                                        <svg class="logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                            <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                            <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                            <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                                        </svg>
                                        <img src="<?= base_url('assets/images/logo/chip.png') ?>" alt="Chip" class="chip">
                                        <img class="contactless" src="<?= base_url('assets/images/logo/Sampang.png') ?>" alt="" />
                                        <p class="title-flip-card">LAYANAN SEWA BMD</p>
                                        <p class="date_8264"><?php
                                                                date_default_timezone_set('Asia/Jakarta');
                                                                echo date('m / Y');
                                                                ?>
                                        </p>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="strip"></div>
                                        <div class="mstrip">
                                            <p class="mcode">Layanan Sewa</p>
                                        </div>
                                        <div class="sstrip">
                                            <p class="code">***</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="kendaraan" class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="<?= base_url('lasada/bpu_spg') ?>" target="_blank">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front-2">
                                        <p class="texture1"></p>
                                        <p class="texture2"></p>
                                        <p class="heading_8264">KAB. SAMPANG</p>
                                        <svg class="logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                            <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                            <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                            <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                                        </svg>
                                        <img src="<?= base_url('assets/images/logo/chip.png') ?>" alt="Chip" class="chip">
                                        <img class="contactless" src="<?= base_url('assets/images/logo/Sampang.png') ?>" alt="" />
                                        <p class="title-flip-card">DAFTAR BMD</p>
                                        <p class="date_8264"><?php
                                                                date_default_timezone_set('Asia/Jakarta');
                                                                echo date('m / Y');
                                                                ?>
                                        </p>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="strip"></div>
                                        <div class="mstrip">
                                            <p class="mcode">Daftar BMD</p>
                                        </div>
                                        <div class="sstrip">
                                            <p class="code">***</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="layananlain" class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                        <a href="<?= base_url('lasada/bpu_spg') ?>" target="_blank">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front-3">
                                        <p class="texture1"></p>
                                        <p class="texture2"></p>
                                        <p class="heading_8264">KAB. SAMPANG</p>
                                        <svg class="logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                            <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                            <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                            <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                                        </svg>
                                        <img src="<?= base_url('assets/images/logo/chip.png') ?>" alt="Chip" class="chip">
                                        <img class="contactless" src="<?= base_url('assets/images/logo/Sampang.png') ?>" alt="" />
                                        <p class="title-flip-card">LAYANAN LAINNYA</p>
                                        <p class="date_8264"><?php
                                                                date_default_timezone_set('Asia/Jakarta');
                                                                echo date('m / Y');
                                                                ?>
                                        </p>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="strip"></div>
                                        <div class="mstrip">
                                            <p class="mcode">Layanan Lainnya</p>
                                        </div>
                                        <div class="sstrip">
                                            <p class="code">***</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Property List End -->
    </div>