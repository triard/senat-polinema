<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content" style="font-size: 1rem;">
    <section class="section">
        <div class="section-header">
            <h1>Komisi Senat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('Homepage/home') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Komisi Senat</div>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                        aria-controls="home" aria-selected="true">Komisi I</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                        aria-controls="profile" aria-selected="false">Komisi
                                        II</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                        aria-controls="contact" aria-selected="false">Komisi
                                        III</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#komisid" role="tab"
                                        aria-controls="contact" aria-selected="false">Komisi
                                        IV</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                    aria-labelledby="home-tab4">
                                    <h4>Komisi I</h4>
                                    <hr style="border: 3px solid #EE5A24; border-radius: 5px;">
                                    <p>Bidang Akademik, Penelitian dan Pengabdian pada Masyarakat
                                        mempunyai tugas sebagai berikut:</p>
                                    <ol style="text-align: justify;">
                                        <li>
                                            Memberi persetujuan kelayakan akademik
                                            atas usul pembukaan, penggabungan, dan/atau penutupan Program
                                            Studi;
                                        </li>
                                        <li>
                                            Mengesahkan gelar dan memberi pertimbangan atas usul
                                            peraturan–peraturan akademik;
                                        </li>
                                        <li>
                                            Merumuskan tata tertib kehidupan kampus
                                            dan etika penyelenggaraan pendidikan;
                                        </li>
                                        <li>
                                            Merumuskan prinsip-prinsip dasar
                                            kebebasan akademik, kebebasan mimbar akademik, dan otonomi
                                            keilmuan;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam peningkatan mutu akademik dan
                                            sistem penjaminan mutu pendidikan;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam
                                            merumuskan etika pembelajaran dan kegiatan kemahasiswaan;
                                        </li>
                                        <li>
                                            Memberikan
                                            pertimbangan dalam menetapkan unggulan penelitian dan pengabdian
                                            kepada
                                            masyarakat;
                                        </li>
                                        <li>
                                            Merumuskan etika institusional untuk pelaksanaan penelitian
                                            dan
                                            pengabdian kepada masyarakat;
                                        </li>
                                        <li>
                                            Merumuskan kebijakan dalam peningkatan
                                            mutu dan etika penelitian dan pengabdian kepada masyarakat;
                                        </li>
                                        <li>
                                            Memberikan
                                            pertimbangan dalam pengembangan tata kelola penelitian dan
                                            pengabdian
                                            kepada masyarakat;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam pendirian pusat
                                            kemitraan dalam penelitian dan pengabdian kepada masyarakat;
                                        </li>
                                        <li>
                                            Memberikan
                                            pertimbangan dalam merumuskan kebijakan monitoring dan evaluasi
                                            untuk
                                            menjamin pelaksanaan penelitian dan pengabdian kepada
                                            masyarakat;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam menetapkan kebijakan
                                            monitoring dan evaluasi untuk menjamin pelaksanaan kurikulum dan
                                            pembelajaran dan kebijakan penelitian dan pengabdian kepada
                                            masyarakat.
                                        </li>
                                    </ol>


                                </div>
                                <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <h4>Komisi II</h4>
                                    <hr style="border: 3px solid #EE5A24; border-radius: 5px;">
                                    <p>Bidang Administrasi, Keuangan dan Kepegawaian mempunyai tugas
                                        sebagai berikut:</p>
                                    <ol style="text-align: justify;">
                                        <li>
                                            Merumuskan kebijakan umum dan strategis bidang
                                            perencanaan dan pengelolaan Administrasi, Keuangan dan
                                            Kepegawaian;
                                        </li>
                                        <li>
                                            Memberi masukan dan pertimbangan dalam perencanaan dan
                                            pengelolaan Administrasi, Keuangan dan Kepegawaian;
                                        </li>
                                        <li>
                                            Memberikan
                                            pertimbangan dalam menyusun sistem monitoring dan evaluasi
                                            pelaksanaan
                                            kebijakan Administrasi, Keuangan dan Kepegawaian;
                                        </li>
                                        <li>
                                            Mengevaluasi
                                            pelaksanaan kebijakan strategis di bidang perencanaan dan
                                            pengelolaanAdministrasi, Keuangan dan Kepegawaian;
                                        </li>
                                        <li>
                                            Memberikan
                                            pertimbangan dalam merumuskan etika dosen dan tenaga
                                            kependidikan.
                                        </li>
                                    </ol>

                                </div>
                                <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                    <h4>Komisi III</h4>
                                    <hr style="border: 3px solid #EE5A24; border-radius: 5px;">
                                    <p>Bidang Kemahasiswaan mempunyai tugas sebagai berikut:</p>
                                    <ol style="text-align: justify;">
                                        <li>
                                            Merumuskan rancangan kebijakan pembentukan karakter mahasiswa;
                                        </li>
                                        <li>
                                            Merumuskan rancangan kebijakan layanan mahasiswa di bidang
                                            penalaran, bakat, minat, dan kesejahteraan mahasiswa;
                                        </li>
                                        <li>
                                            Mengkaji kebijakan layanan kemahasiswaan dan alumi;
                                        </li>
                                        <li>
                                            Merumuskan rancangan kebijakan pemberian
                                            penghargaan kepada mahasiswa yang berprestasi di bidang
                                            non-akademik;
                                        </li>
                                        <li>
                                            Merumuskan rancangan kebijakan hubungan kerjasama antara
                                            almamater dangan alumi;
                                        </li>
                                        <li>
                                            Mengkaji program kegiatan kemahasiswaan, program kreativitas
                                            dan kewirausahaan;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam merumuskan etika mahasiswa.
                                        </li>
                                    </ol>


                                </div>
                                <div class="tab-pane fade" id="komisid" role="tabpanel" aria-labelledby="contact-tab4">
                                    <h4>Komisi IV</h4>
                                    <hr style="border: 3px solid #EE5A24; border-radius: 5px;">
                                    <p>Bidang Kerjasama mempunyai tugas sebagai berikut:</p>
                                    <ol style="text-align: justify;">
                                        <li>
                                            Memberikan pertimbangan dalam merumuskan kebijakan bidang kerja sama dengan
                                            berbagai mitra strategis;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam mengembangkan jejaring kemitraan dan kerja
                                            sama nasional dan internasional;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam menetapkan tata kelola kerja sama dan
                                            pengembangan usaha;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam menyusun sistem promosi produk riset untuk
                                            pengembangan usaha unggul dan strategis;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam menyusun sistem promosi produk riset untuk
                                            pengembangan usaha unggul dan strategis;
                                        </li>
                                        <li>
                                            Memberikan pertimbangan dalam merumuskan etika kerja sama kemitraan dan
                                            kelembagaan
                                        </li>
                                        <li>
                                            Memberikan masukan dalam menyusun kebijakan monitoring dan evaluasi untuk
                                            menjamin pelaksanaan kerja sama yang transparan dan akuntabel.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<?php $this->load->view('homepage/_partials/scrolltop'); ?>
<?php $this->load->view('homepage/_partials/loader'); ?>
</div>
<?php $this->load->view('homepage/_partials/footer'); ?>