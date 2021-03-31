<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('homepage/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <?php $this->load->view('homepage/_partials/breadcrumb'); ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab"
                                                    href="#home4" role="tab" aria-controls="home"
                                                    aria-selected="true">Hasil Rapat</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                                                    role="tab" aria-controls="profile" aria-selected="false">Peraturan
                                                    Senat</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4"
                                                    role="tab" aria-controls="contact" aria-selected="false">Refrensi
                                                    Senat</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#komisid"
                                                    role="tab" aria-controls="contact" aria-selected="false">Ketentuan
                                                    Lain</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#sambutan"
                                                    role="tab" aria-controls="contact" aria-selected="false">Sambutan
                                                    Pemimpin Senat</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                                aria-labelledby="home-tab4">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 50px;">No.</th>
                                                            <th>Nama File</th>
                                                            <th style="width: 200px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1;
                                                                 foreach ($laporan as $l) { ?>

                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $l->nama_laporan ?></td>
                                                            <td class="text-center">
                                                                <?php echo "<a class='btn btn-icon btn-success' target='_blank' href='".base_url()."Laporan/download_file/$l->file_laporan'><i class='fas fa-download'></i></a>";?>
                                                                <!-- <button class="btn btn-warning"
                                                                    onclick="lihatLaporan(<?php echo $l->id_laporan;?>)">
                                                                    <i class="fas fa-eye"></i>
                                                                </button> -->
                                                             
                                                            </td>
                                                        </tr>
                                                        <?php  $no++; }  ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="tab-pane fade" id="profile4" role="tabpanel"
                                                aria-labelledby="profile-tab4">
                                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac
                                                efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum
                                                justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula
                                                eros, pharetra consectetur dui. Aliquam convallis neque eget tellus
                                                efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec
                                                hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                                            </div>
                                            <div class="tab-pane fade" id="contact4" role="tabpanel"
                                                aria-labelledby="contact-tab4">
                                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus.
                                                Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris.
                                                Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius
                                                leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare
                                                vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum
                                                venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                                            </div>
                                            <div class="tab-pane fade" id="komisid" role="tabpanel"
                                                aria-labelledby="contact-tab4">
                                                wkwkVestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                maximus.
                                                Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris.
                                                Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius
                                                leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare
                                                vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum
                                                venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                                            </div>
                                            <div class="tab-pane fade" id="sambutan" role="tabpanel"
                                                aria-labelledby="contact-tab4">
                                                5wkwkVestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                maximus.
                                                Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris.
                                                Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius
                                                leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare
                                                vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum
                                                venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                                            </div>
                                        </div>
                                    </div>
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