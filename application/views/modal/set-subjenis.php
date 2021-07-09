<?php if(isset($jenis)) { ?>
	<?php if($jenis == "Pertimbangan"){ ?>
		<div class="form-group row mb-4">
	        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub-Jenis</label>
	        <div class="col-sm-12 col-md-7">
	            <select name="sub_jenis" class="form-control selectric" required>
	                <option selected disabled>---- Pilih Sub Jenis - Usulan Pertimbangan ----</option>
	                <option value="Bidang Akademik, Penelitian dan Pengabdian pada Masyarakat">Bidang Akademik, Penelitian dan Pengabdian pada Masyarakat</option>
	                <option value="Bidang Administrasi, Keuangan dan Kepegawaian">Bidang Administrasi, Keuangan dan Kepegawaian</option>
	                <option value="Bidang Kemahasiswaan">Bidang Kemahasiswaan</option>
	                <option value="Bidang Kerjasama">Bidang Kerjasama</option>
	            </select>
	        </div>
    	</div>
	<?php }  else { ?>
		<div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub-Jenis</label>
            <div class="col-sm-12 col-md-7">
                <select name="sub_jenis" class="form-control selectric" required>
                    <option selected disabled>---- Pilih Sub Jenis - Usulan Pengawasan ----</option>
                    <option value="Penerapan norma akademik dan kode etik sivitas akademika">Penerapan norma akademik dan kode etik sivitas akademika</option>
                    <option value="Kebijakan dan pelaksanaan kebijakan akademik direktur">Kebijakan dan pelaksanaan kebijakan akademik direktur</option>
                    <option value="Pelaksanaan kebebasan akademik, kebebasan mimbar akademik, dan otonomi keilmuan">Pelaksanaan kebebasan akademik, kebebasan mimbar akademik, dan otonomi keilmuan</option>
                    <option value="Pelaksanaan tata tertib akademik">Pelaksanaan tata tertib akademik</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
	<?php
	}
} ?>