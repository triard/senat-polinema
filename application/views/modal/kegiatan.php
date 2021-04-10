<?php if($cek == 0) { ?>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Referensi Penjadwalan</label>
                    <select name="id_penjadwalan" class="custom-select form-control" id="penjadwalan" required>
                        <option disabled selected>Pilih Referensi</option>
                        <option value="0">Referensi Baru</option>
                        <?php foreach ($penjadwalan as $u): ?>
                        <option value="<?php echo $u->id_penjadwalan; ?>"><?php echo $u->agenda;?> -
                            <?php echo $u->pembahasan;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Notula</label><br>
                    <textarea class="form-control" id="summernote-notula" name="notula"></textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Tujuan</label><br>
                    <textarea id="summernote-tujuan" name="tujuan" required></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="set-penjadwalan">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Agenda</label><br>
                        <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..."
                            required>
                    </div>
                    <div class="form-group">
                        <label>Pembahasan</label><br>
                        <textarea id="summernote-simple" name="pembahasan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Waktu Mulai</label><br>
                        <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                            placeholder="Masukkan tanggal ..." required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Waktu Selesai</label><br>
                        <input class="form-control" name="waktu_selesai" type="time" placeholder="" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Jenis Rapat</label><br>
                        <select name="jenis_rapat" class="custom-select form-control" required>
                            <option disabled selected>Pilih Jenis Rapat</option>
                            <option disabled>------------------------------</option>
                            <option value="Luring">Luring</option>
                            <option value="Daring">Daring</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat</label><br>
                        <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..." required>
                    </div>
                    <div class="form-group">
                        <label>Link Ruangan Daring</label><br>
                        <textarea class="form-control" name="link"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password</label><br>
                        <input class="form-control" name="password" type="text" placeholder="Masukkan password..."
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Status Kegiatan</label><br>
                        <select name="status" class="custom-select form-control" required>
                            <option disabled selected>Pilih Status Kegiatan</option>
                            <option disabled>------------------------------</option>
                            <option value="Perlu Tindak Lanjut - Sidang Pleno">Perlu Tindak Lanjut - Sidang Pleno
                            </option>
                            <option value="Perlu Tindak Lanjut - Sidang Paripurna">Perlu Tindak Lanjut - Sidang
                                Paripurna</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php }else if($cek == 1) { ?>
<input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan;?>">
<input type="hidden" name="id_penjadwalan" value="<?php echo $kegiatan->id_penjadwalan;?>">
<?php if($kegiatan->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $kegiatan->id_user;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Agenda</label><br>
            <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..."
                value="<?php echo $kegiatan->agenda ?>" required>
        </div>

        <div class="form-group">
            <label>Waktu Mulai</label><br>
            <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                placeholder="Masukkan waktu mulai ..." value="<?php echo $kegiatan->waktu_mulai;?>" required
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>Waktu Selesai</label><br>
            <input class="form-control" name="waktu_selesai" type="time" placeholder=""
                value="<?php echo $kegiatan->waktu_selesai;?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Rapat</label><br>
            <select name="jenis_rapat" class="custom-select form-control" required>
                <option value="<?php echo $kegiatan->jenis_rapat;?>" selected>
                    <?php echo $kegiatan->jenis_rapat;?></option>
                <option disabled>Pilih Jenis Rapat</option>
                <option disabled>------------------------------</option>
                <option value="Luring">Luring</option>
                <option value="Daring">Daring</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat</label><br>
            <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..."
                value="<?php echo $kegiatan->tempat ?>" required>
        </div>
        <div class="form-group">
            <label>Link Ruangan Daring</label><br>
            <!-- <textarea class="form-control" name="link"><?php echo $kegiatan->link;?></textarea> -->
            <input class="form-control" name="link" type="text" value="<?php echo $kegiatan->link;?>"
                placeholder="Masukkan link ruangan daring..." autocomplete="off">
        </div>
        <div class="form-group">
            <label>Status Kegiatan</label><br>
            <select name="status" class="custom-select form-control" required>
                <option value="<?php echo $kegiatan->status;?>" selected>
                    <?php echo $kegiatan->status;?></option>
                <option disabled>Pilih Status Kegiatan</option>
                <option disabled>------------------------------</option>
                <option value="Perlu Tindak Lanjut - Sidang Pleno">Perlu Tindak Lanjut - Sidang Pleno</option>
                <option value="Perlu Tindak Lanjut - Sidang Paripurna">Perlu Tindak Lanjut - Sidang Paripurna</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Pembahasan</label><br>
            <textarea id="summernote-simple" name="pembahasan"><?php echo $kegiatan->pembahasan ?></textarea>
        </div>
        <div class="form-group">
            <label>Tujuan</label><br>
            <textarea class="form-control" id="summernote-tujuan" name="tujuan"
                required><?php echo $kegiatan->tujuan ?></textarea>
        </div>
        <div class="form-group">
            <label>Notula</label><br>
            <textarea class="form-control" id="summernote-notula" name="notula"
                required><?php echo $kegiatan->notula ?></textarea>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input class="form-control" name="password" type="text" value="<?php echo $kegiatan->password;?>"
                placeholder="Masukkan password..." autocomplete="off">
        </div>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php }else if($cek == 5){ ?>
<?php echo $absen->nama ?>
<input type="hidden" name="id_peserta" id="id_peserta" value="<?php echo $absen->id_peserta?>">
<div class="signature-pad" id="signature-pad">
    <div class="m-signature-pad">
            <canvas style="border:2px solid black !important;" width="700px" height="250"></canvas>
    </div>
    <div class="mt-4 mb-3 float-md-right">
    <button type="button" id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i>
        Save</button>
    <button type="button" data-action="clear" class="btn btn-danger"><i class="fa fa-trash-o"></i>
        Clear</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
    </div>
    
</div>
<!-- random id generated here  -->
<input type="hidden" value="<?php echo rand();?>" id="rowno">

<?php }else if($cek == 6){ ?>
<?php echo $voting->nama ?>
<input type="hidden" name="id_peserta" value="<?php echo $voting->id_peserta?>">
<div class="form-group">
    <select name="voting" class="custom-select form-control" required>
        <option disabled selected>Pilih Voting</option>
        <option disabled>------------------------------</option>
        <option value="Setuju">Setuju</option>
        <option value="Tidak Setuju">Tidak Setuju</option>
    </select>
</div>
<?php } else { ?>
<input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan->id_kegiatan;?>">
<input type="hidden" name="id_penjadwalan" value="<?php echo $kegiatan->id_penjadwalan;?>">
<?php if($kegiatan->id_user != null){ ?>
<input type="hidden" name="id_user" value="<?php echo $kegiatan->id_user;?>">
<?php } ?>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Referensi Penjadwalan</label>
            <select name="id_penjadwalan" class="custom-select form-control" id="penjadwalan" required>
                <option value="<?php echo $kegiatan->id_penjadwalan;?>" selected><?php echo $kegiatan->agenda;?> -
                    <?php echo $kegiatan->pembahasan;?></option>
                <option disabled>------------------------------</option>
                <option value="0">Referensi Baru</option>
                <?php foreach ($penjadwalan as $u): ?>
                <option value="<?php echo $u->id_penjadwalan; ?>"><?php echo $u->agenda;?> -
                    <?php echo $u->pembahasan;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tujuan</label><br>
            <textarea class="form-control" id="summernote-tujuan" name="tujuan"
                required><?php echo $kegiatan->tujuan ?></textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="set-penjadwalan">
            <div class="form-group">
                <label>Agenda</label><br>
                <input class="form-control" name="agenda" type="text" placeholder="Masukkan agenda Anda..."
                    value="<?php echo $kegiatan->agenda ?>" required>
            </div>
            <div class="form-group">
                <label>Pembahasan</label><br>
                <textarea class="form-control" name="pembahasan"><?php echo $kegiatan->pembahasan ?></textarea>
            </div>
            <div class="form-group">
                <label>Waktu Mulai</label><br>
                <input class="form-control" name="waktu_mulai" id="datetimepicker" type="text"
                    placeholder="Masukkan waktu mulai ..." value="<?php echo $kegiatan->waktu_mulai;?>" required
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Waktu Selesai</label><br>
                <input class="form-control" name="waktu_selesai" type="time" placeholder=""
                    value="<?php echo $kegiatan->waktu_selesai;?>" required>
            </div>
            <div class="form-group">
                <label>Tempat</label><br>
                <input class="form-control" name="tempat" type="text" placeholder="Masukkan tempat..."
                    value="<?php echo $kegiatan->tempat ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Rapat</label><br>
                <select name="jenis_rapat" class="custom-select form-control" required>
                    <option value="<?php echo $kegiatan->jenis_rapat;?>" selected>
                        <?php echo $kegiatan->jenis_rapat;?></option>
                    <option disabled>Pilih Jenis Rapat</option>
                    <option disabled>------------------------------</option>
                    <option value="Luring">Luring</option>
                    <option value="Daring">Daring</option>
                </select>
            </div>
            <div class="form-group">
                <label>Link Ruangan Daring</label><br>
                <textarea class="form-control" name="link"><?php echo $kegiatan->link;?></textarea>
            </div>
            <div class="form-group">
                <label>Status Kegiatan</label><br>
                <select name="status" class="custom-select form-control" required>
                    <option value="<?php echo $kegiatan->status;?>" selected>
                        <?php echo $kegiatan->status;?></option>
                    <option disabled>Pilih Status Kegiatan</option>
                    <option disabled>------------------------------</option>
                    <option value="Perlu Tindak Lanjut - Sidang Pleno">Perlu Tindak Lanjut - Sidang Pleno</option>
                    <option value="Perlu Tindak Lanjut - Sidang Paripurna">Perlu Tindak Lanjut - Sidang Paripurna
                    </option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <label>Password</label><br>
                <input class="form-control" name="password" type="text" value="<?php echo $kegiatan->password;?>"
                    placeholder="Masukkan password..." autocomplete="off">
            </div>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
    </div>
</div>
<?php } ?>
<script>
$("#penjadwalan").on("change keydown paste input", function() {
    var a = $("#penjadwalan").val();
    $.get("<?php echo base_url();?>Kegiatan/set_penjadwalan/" + a, function(b) {
        $(".set-penjadwalan").html(b);
        $('#datetimepicker').datetimepicker();
        $("#summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
        $("#summernote-tujuan").summernote({
            dialogsInBody: true,
            minHeight: 30,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    })
})
</script>
<script>
var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;


function resizeCanvas() {

    var ratio = window.devicePixelRatio || 1;
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
}
signaturePad = new SignaturePad(canvas);

clearButton.addEventListener("click", function(event) {
    signaturePad.clear();
});
saveButton.addEventListener("click", function(event) {

    if (signaturePad.isEmpty()) {
        $('#myModal1').modal('show');
    } else {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Kegiatan/updateAbsen",
            data: {
                'id_peserta': $('#id_peserta').val(),
                'image': signaturePad.toDataURL(),
                'rowno': $('#rowno').val()
            },
            success: function(datas1) {
                signaturePad.clear();
                $("#myModal").modal("hide");
                    swal("Sukses!", "", "success");
                    location.reload();
            },
            error: function(datas1) {
                    swal("Error", "", "error")
                }
        });
    }
});
</script>
<style>
.m-signature-pad-body {
    border: 1px dashed #ccc;
    border-radius: 5px;
    color: #bbbabb;
    height: 453px;
    width: 800px;
    text-align: center;
    vertical-align: middle;
}
</style>