<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <style type="text/css">
    body {
        font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
    }

    /* Table */
    table {
        font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
        font-size: 14px;

    }

    .demo-table {
        border-collapse: collapse;
        font-size: 14px;
    }

    /* .demo-table th,
    .demo-table td {
        border-bottom: 1px solid #e1edff;
        border-left: 1px solid #e1edff;
        padding: 5px 10px;
    }

    .demo-table th,
    .demo-table td:last-child {
        border-right: 1px solid #e1edff;
    }

    .demo-table td:first-child {
        border-top: 1px solid #e1edff;
    }

    .demo-table td:last-child {
        border-bottom: 0;
    } */
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    caption {
        caption-side: top;
        margin-bottom: 10px;
    }

    /* Table Header */
    .demo-table thead th {
        background-color: #508abb;
        color: #FFFFFF;
        border-color: #6ea1cc !important;
        text-transform: uppercase;
    }

    .kop-surat a {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 50%;
        font-size: 15px;
    }

    .ttd {
        font-size: 15px;
        float: right;
        text-align: center;
    }
    .ttd p{
        margin-right: 300px;
    }
    /* Table Body */
    </style>
</head>

<body>
    <table class="center">
        <tr>
            <td>
                <img style="width: 70px; height: 70px;" src="<?php echo base_url('assets/img/logo.png') ?>" alt="logo">
            </td>
            <td>
                <div class="kop-surat">
                    <center>
                        <a>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</a><br>
                        <a><b>POLITEKNIK NEGERI MALANG</b></a><br>
                        <a style="font-size: 8;">Jl. Soekarno Hatta No.9 Malang 65141 </a><br>
                        <a style="font-size: 8;">Telp (0341) 404424 – 404425 Fax (0341) 404420 </a><br>
                        <a style="font-size: 8;">Laman://www.polinema.ac.id Email:cs@polinema.ac.id</a><br>

                    </center>
                </div>
            </td>
            <td>
                <img style="width: 70px; height: 70px;" src="<?php echo base_url('assets/img/logo-kan.png') ?>"
                    alt="logo">
            </td>
        </tr>
    </table>
    <hr>
    <center>
        <h4>NOTULA RAPAT</h4>
        <h4><?php echo $kegiatan->agenda ?></h4>
    </center>
    <br>
    <table style="margin-left: 50px; margin-right: 20px;">
        <tr>
            <td style="width: 150px;">Tanggal</td>
            <td style="width: 30px;">:</td>
            <td><?php echo date('d-m-Y', strtotime($kegiatan->waktu_mulai)); ?>
            </td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td><?php echo date('H:i', strtotime($kegiatan->waktu_mulai)); ?>
                -
                <?php echo date('H:i', strtotime($kegiatan->waktu_selesai)); ?>
                WIB</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td><?php echo $kegiatan->tempat ?></td>
        </tr>
        <tr>
            <td>Tujuan Pembahasan</td>
            <td>:</td>
            <td><?php echo $kegiatan->tujuan ?></td>
        </tr>
        <tr class="table-active">
            <td>Pembahasan</td>
            <td>:</td>
            <td><?php echo $kegiatan->pembahasan ?></td>
        </tr>
        <tr>
            <td>Hasil Keputusan</td>
            <td>:</td>
            <td><?php echo $kegiatan->notula ?></td>
        </tr>
        <tr class="table-active">
            <td>Notulis</td>
            <td>:</td>
            <td><?php echo $kegiatan->nama ?></td>
        </tr>
    </table>
    <?php
	function hari_ini(){
	    $hari = date ("D");					 
		switch($hari){
		case 'Sun':
		    $hari_ini = "Minggu";
		break;
		case 'Mon':			
			$hari_ini = "Senin";
		break;
		case 'Tue':
			$hari_ini = "Selasa";
		break;
		case 'Wed':
			$hari_ini = "Rabu";
		break;
	    case 'Thu':
			$hari_ini = "Kamis";
		break;
		case 'Fri':
			$hari_ini = "Jumat";
		break;
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
		}
		return "" . $hari_ini . "";
		}
		function tgl_indo($tanggal){
			$bulan = array (
			1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli',
            'Agustus','September','Oktober','November','Desember'
			);
			$pecahkan = explode('-', $tanggal); 
			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}
        ?>
    <div class="ttd">
        <a><?php echo hari_ini().', ';
		echo  tgl_indo(date('Y-m-d'));date('l'); ?></a><br>
        <a>Mengetahui</a><br>
        <br><br><br><br>
        <a style="text-decoration: underline;"><?php echo $koresponden; ?></a><br>
        <a><?php echo $nip; ?></a>
    </div>
</body>

</html>