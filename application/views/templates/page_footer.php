<style>
    .td-ismail {
        color: white;
    }

    .btn-dark {
        color: #fff;
        background-color: #e75ed0;
        border-color: #e75ed0
    }

    .btn-check:focus+.btn-dark,
    .btn-dark:focus,
    .btn-dark:hover {
        color: #fff;
        background-color: #a7178f;
        border-color: #a7178f
    }

    .btn-check:focus+.btn-info,
    .btn-info:focus,
    .btn-info:hover {
        color: #fff;
        background-color: #0a7388;
        border-color: #0a7388
    }

    .btn-amara {
        color: #353535;
        background-color: #bff52a;
        border-color: #bff52a
    }

    .btn-check:focus+.btn-amara,
    .btn-amara:focus,
    .btn-amara:hover {
        color: #000000;
        background-color: #94c709;
        border-color: #94c709
    }

    .btn-ryan {
        color: #ffffff;
        background-color: #e48315;
        border-color: #e48315
    }

    .btn-check:focus+.btn-ryan,
    .btn-ryan:focus,
    .btn-ryan:hover {
        color: #ffffff;
        background-color: #a15b0a;
        border-color: #a15b0a
    }
</style>


<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                    <i class="fa fa-fw fa-lg fa-times"></i>
                </button>
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    <img src="<?= base_url('assets/'); ?>images/logo/Sampang.png" alt="Trunojoyo" height="35">
                    Daftar Konsolidator SKPD Kab. Sampang
                </h5>
                <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                    <i class="fa fa-fw fa-lg fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- table hover -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr class="table-warning">
                                <th>NO.</th>
                                <th>NAMA SKPD</th>
                                <th>KONSOLIDATOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-ismail">1</td>
                                <td class="td-ismail">SEKRETARIAT DAERAH</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">2</td>
                                <td class="td-ismail">SEKRETARIAT DPRD</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">3</td>
                                <td class="td-ismail">INSPEKTORAT DAERAH</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6285721812815&text=Salam+Ibu+Amara.&app_absent=0" class="btn btn-amara" target=”_blank”>Amara Cahyaningtyas, A.Md.M.<br>NIP.
                                        20010529 202302 2 003</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">4</td>
                                <td class="td-ismail">DINAS PENDIDIKAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282331135333&text=Salam+Pak+Joni.&app_absent=0" class="btn btn-success" target=”_blank”>Joni Purna Irawan, S.E.,M.M.<br>NIP.
                                        19810807 201001 1 010</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">5</td>
                                <td class="td-ismail">DINAS PEMUDA, OLAH RAGA, KEBUDAYAAN DAN PARIWISATA</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">6</td>
                                <td class="td-ismail">DINAS KESEHATAN DAN KB</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282331135333&text=Salam+Pak+Joni.&app_absent=0" class="btn btn-success" target=”_blank”>Joni Purna Irawan, S.E.,M.M.<br>NIP.
                                        19810807 201001 1 010</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">7</td>
                                <td class="td-ismail">DINAS SOSIAL PPPA</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6285721812815&text=Salam+Ibu+Amara.&app_absent=0" class="btn btn-amara" target=”_blank”>Amara Cahyaningtyas, A.Md.M.<br>NIP.
                                        20010529 202302 2 003</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">8</td>
                                <td class="td-ismail">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6285721812815&text=Salam+Ibu+Amara.&app_absent=0" class="btn btn-amara" target=”_blank”>Amara Cahyaningtyas, A.Md.M.<br>NIP.
                                        20010529 202302 2 003</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">9</td>
                                <td class="td-ismail">DINAS PEMBERDAYAAN MASYARAKAT DAN DESA</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6285721812815&text=Salam+Ibu+Amara.&app_absent=0" class="btn btn-amara" target=”_blank”>Amara Cahyaningtyas, A.Md.M.<br>NIP.
                                        20010529 202302 2 003</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">10</td>
                                <td class="td-ismail">DINAS PU DAN PENATAAN RUANG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282331135333&text=Salam+Pak+Joni.&app_absent=0" class="btn btn-success" target=”_blank”>Joni Purna Irawan, S.E.,M.M.<br>NIP.
                                        19810807 201001 1 010</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">11</td>
                                <td class="td-ismail">DINAS PERHUBUNGAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6285721812815&text=Salam+Ibu+Amara.&app_absent=0" class="btn btn-amara" target=”_blank”>Amara Cahyaningtyas, A.Md.M.<br>NIP.
                                        20010529 202302 2 003</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">12</td>
                                <td class="td-ismail">SATUAN POLISI PAMONG PRAJA DAN PERLINDUNGAN MASYARAKAT</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">13</td>
                                <td class="td-ismail">DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">14</td>
                                <td class="td-ismail">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6289517147001&text=Salam+Pak+Ryan.&app_absent=0" class="btn btn-ryan" target=”_blank”>Ryan Presi H.L., A.Md.Pnl.<br>NIP. 20001127
                                        202302 1 002</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">15</td>
                                <td class="td-ismail">DINAS TENAGA KERJA</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6289517147001&text=Salam+Pak+Ryan.&app_absent=0" class="btn btn-ryan" target=”_blank”>Ryan Presi H.L., A.Md.Pnl.<br>NIP. 20001127
                                        202302 1 002</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">16</td>
                                <td class="td-ismail">DINAS KOPERASI, PERINDUSTRIAN DAN PERDAGANGAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">17</td>
                                <td class="td-ismail">DINAS KOMUNIKASI DAN INFORMATIKA</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">18</td>
                                <td class="td-ismail">DINAS PERTANIAN DAN KETAHANAN PANGAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">19</td>
                                <td class="td-ismail">DINAS PERIKANAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">20</td>
                                <td class="td-ismail">DINAS LINGKUNGAN HIDUP, PERUMAHAN RAKYAT DAN PERMUKIMAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">21</td>
                                <td class="td-ismail">DINAS KEARSIPAN DAN PERPUSTAKAAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">22</td>
                                <td class="td-ismail">BADAN PERENCANAAN PEMBANGUNAN, PENELITIAN DAN PEMBANGUNAN DAERAH
                                </td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6289517147001&text=Salam+Pak+Ryan.&app_absent=0" class="btn btn-ryan" target=”_blank”>Ryan Presi H.L., A.Md.Pnl.<br>NIP. 20001127
                                        202302 1 002</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">23</td>
                                <td class="td-ismail">BADAN PENDAPATAN, PENGELOLAAN KEUANGAN DAN ASET DAERAH</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282331135333&text=Salam+Pak+Joni.&app_absent=0" class="btn btn-success" target=”_blank”>Joni Purna Irawan, S.E.,M.M.<br>NIP.
                                        19810807 201001 1 010</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">24</td>
                                <td class="td-ismail">BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6289517147001&text=Salam+Pak+Ryan.&app_absent=0" class="btn btn-ryan" target=”_blank”>Ryan Presi H.L., A.Md.Pnl.<br>NIP. 20001127
                                        202302 1 002</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">25</td>
                                <td class="td-ismail">BADAN KESATUAN BANGSA DAN POLITIK</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6289517147001&text=Salam+Pak+Ryan.&app_absent=0" class="btn btn-ryan" target=”_blank”>Ryan Presi H.L., A.Md.Pnl.<br>NIP. 20001127
                                        202302 1 002</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">26</td>
                                <td class="td-ismail">BADAN PENANGGULANGAN BENCANA DAERAH</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">27</td>
                                <td class="td-ismail">RSUD MOH. ZYN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282331135333&text=Salam+Pak+Joni.&app_absent=0" class="btn btn-success" target=”_blank”>Joni Purna Irawan, S.E.,M.M.<br>NIP.
                                        19810807 201001 1 010</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">28</td>
                                <td class="td-ismail">RSD KETAPANG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282331135333&text=Salam+Pak+Joni.&app_absent=0" class="btn btn-success" target=”_blank”>Joni Purna Irawan, S.E.,M.M.<br>NIP.
                                        19810807 201001 1 010</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">29</td>
                                <td class="td-ismail">KECAMATAN SAMPANG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">30</td>
                                <td class="td-ismail">KECAMATAN OMBEN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">31</td>
                                <td class="td-ismail">KECAMATAN CAMPLONG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333555972&text=Salam+Ibu+Ima.&app_absent=0" class="btn btn-dark" target=”_blank”>Nur Imamatul Choir, S.A.<br>NIP. 19920810
                                        202012 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">32</td>
                                <td class="td-ismail">KECAMATAN TORJUN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">33</td>
                                <td class="td-ismail">KECAMATAN PANGARENGAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">34</td>
                                <td class="td-ismail">KECAMATAN JRENGIK</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">35</td>
                                <td class="td-ismail">KECAMATAN SRESEH</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">36</td>
                                <td class="td-ismail">KECAMATAN TAMBELANGAN</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">37</td>
                                <td class="td-ismail">KECAMATAN KEDUNGDUNG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">38</td>
                                <td class="td-ismail">KECAMATAN ROBATAL</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">39</td>
                                <td class="td-ismail">KECAMATAN KARANG PENANG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">40</td>
                                <td class="td-ismail">KECAMATAN KETAPANG</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">41</td>
                                <td class="td-ismail">KECAMATAN BANYUATES</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                            <tr>
                                <td class="td-ismail">42</td>
                                <td class="td-ismail">KECAMATAN SOKOBANAH</td>
                                <td class="td-ismail"><a href="https://api.whatsapp.com/send/?phone=6282333019099&text=Salam+Ibu+Linda.&app_absent=0" class="btn btn-info" target=”_blank”>Linda Yunitasari, S.E.<br>NIP. 19830606
                                        201101 2 006</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<br>
</div>
</div>
<footer style="background-color: #435ebe; padding: 25px; border-top: #f3bc24 solid 10px;">
    <div class="footer clearfix mb-0">
        <div class="row">
            <div class="col-md-4 col-sm-none">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15833.549192077351!2d113.2405406!3d-7.1965748!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd787014528a18f%3A0xb563f506b0793054!2sBPPKAD%20Kab%20Sampang!5e0!3m2!1sen!2sid!4v1652690344024!5m2!1sen!2sid" max-width="750" height="230" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="text-center"></iframe> -->
            </div>
            <div class="col-md-4">
                <h5 style="color: #f3bc24;">Links</h5>
                <div style="padding: 15px;">
                    <ul style="color: #f3bc24;">
                        <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable" style="color: white;">Daftar Konsolidator</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset&type=phone_number&app_absent=0" style="color: white;" target="_blank">Chat Developer</a>
                        </li>
                        <li>
                            <a href="<?= base_url('auth/') ?>" style="color: white;">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-3">
                    <h5 style="color: #f3bc24;">Contact Us</h5>
                </div>
                <div class="row">
                    <table>
                        <tr>
                            <td><i class="fa fa-fw fa-lg fa-building" style="color: #f3bc24;"></i></td>
                            <td>
                                <a style="color: white;" href="https://www.google.com/maps/place/BPPKAD+Kab+Sampang/@-7.19536,113.2448533,17z/data=!4m5!3m4!1s0x2dd787014528a18f:0xb563f506b0793054!8m2!3d-7.1958336!4d113.2446815" target="_blank">
                                    Rajawali 04, st.
                                </a>
                            </td>
                        </tr>
                        <tr style="margin-bottom: 5px;">
                            <td></td>
                            <td style="color: white;">Sampang, 69213</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-fw fa-lg fa-phone-square" style="color: #f3bc24;"></i></td>
                            <td>
                                <a style="color: white;" href="tel:0323321024" target="_blank"> (0323) 321024</a>
                            </td>
                        </tr>
                        <tr style="margin-bottom: 5px;">
                            <td></td>
                            <td style="color: white;"><i>(Mon to Fri 7:30am to 16:00pm)</i></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-fw fa-lg fa-envelope-open" style="color: #f3bc24;"></i></td>
                            <td>
                                <a style="color: white;" href="mailto:bppkad@sampangkab.go.id?subject=Tulis%20Judul%20Email%20Anda%20%di%20Sini%20default&body=Tulis%20Pesan%20Email%20Anda%20%di%20Sini." target="_blank">
                                    bppkad@sampangkab.go.id
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</footer>
<div style="justify-content: center; display: flex; padding-top: 10px; background-color: #3d54aa;">
    <p style="color: #fff;">
        Copyright &copy; <?= date('Y'); ?> | Made with &hearts; by <a style="color: #fff;" href="https://api.whatsapp.com/send/?phone=6281913333320&text=Halo%2C+Developer+Aset.&type=phone_number&app_absent=0" target="_blank">Aset BPPKAD</a>
    </p>
</div>
<script src="<?= base_url('assets/'); ?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jqueryyyy-3.6.0.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendors/apexcharts/apexcharts.js"></script>
<script src="<?= base_url('assets/'); ?>js/pages/dashboard.js"></script>

<script src="<?= base_url('assets/'); ?>js/extensions/sweetalert2.js"></script>
<script src="<?= base_url('assets/'); ?>vendors/sweetalert2/sweetalert2.all.min.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/wow/wow.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets/'); ?>lib/owlcarousel/owl.carousel.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendors/simple-datatables/simple-datatables.js"></script>

<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>jquery-ui.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>moment.min.js"></script>
<script src="<?= base_url('assets/assets-fullcalendar/') ?>fullcalendar.min.js"></script>



<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script src="<?= base_url('assets/'); ?>js/main.js"></script>
<script src="<?= base_url('assets/'); ?>js/pages/app.js"></script>

<!-- SweetAlert when Load page -->
<script src="<?= base_url('assets/'); ?>js/extensions/sweetalert.min.js"></script>

<!-- style transparent swal -->
<style>
    .swal2-modal {
        background-color: rgba(255, 255, 255, 0.02) !important;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.01);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    }

    .swal2-title {
        color: white;
    }

    .swal2-content {
        color: white;
    }
</style>
<!-- /style transparent swal -->
<script>
    // Wait for the page to fully load before showing the alert
    window.addEventListener('load', function() {
        // Swal.fire({
        //     title: "Welcome!",
        //     text: "This page has been reloaded.",
        //     icon: "success",
        //     showConfirmButton: false,
        //     timer: 1000,
        // });
    });
</script>
<!-- /SweetAlert when Load page -->




</body>

</html>