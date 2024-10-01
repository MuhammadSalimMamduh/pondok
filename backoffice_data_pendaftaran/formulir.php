<?php
require_once '../database/config.php';
require_once '../assets_adminlte/dist/fpdf/fpdf.php';
session_start();
class PDF extends FPDF
{
// Page header
function Header()
{
   
   
    // Logo
    $this->Image('../img/image.png',10,4,25);
    // Arial bold 15
    $this->SetFont('Times','B',16);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,5,'RUBATH AL MUSYARRAF',0,1,'C');
    $this->SetFont('Times','B',12);
    $this->Cell(80);
    $this->Cell(30,5,'PENGGGARUTAN-BUMIAYU-BREBES 52273',0,1,'C');
     $this->SetFont('Times','I',11);
      $this->Cell(80);
        $this->Cell(30,5,'EMAIL : r.almusyarraf@gmail.com No.Telp : 087716836831',0,1,'C');
    // Line break
    $this->SetLineWidth(1);
    $this->line(10,27,200,27);
    $this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

    $id = @$_GET['nik'];
    $qrambil = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE nik='$id'") or die (mysqli_error($koneksi));
    $arrambil = mysqli_fetch_assoc($qrambil);
    $nis = $arrambil['nis'];
    $nik = $arrambil['nik'];
    $nama_lengkap = $arrambil['nama_lengkap'];
    $tmp_lahir = $arrambil['tempat_lahir'];
    $tgl_lahir = $arrambil['tgl_lahir'];
    $alamat = $arrambil['alamat'];
    $asal_sekolah = $arrambil['asal_sekolah'];
    $ayah = $arrambil['ayah'];
    $ibu = $arrambil['ibu'];
    $nama_wali = $arrambil['wali'];
    $kontak = $arrambil['no_orangtua'];
    $tgl_daftar = $arrambil['tgl_daftar'];
    $penyakit = $arrambil['riwayat_penyakit'];
    $kelamin = $arrambil['kelamin'];
    $jurusan = $arrambil['id_jurusan'];

    $sqljurusan = mysqli_query($koneksi,"SELECT nama_jurusan FROM tbl_jurusan WHERE id_jurusan='$jurusan'") or die (mysqli_error($koneksi));
    $dt_jurusan = mysqli_fetch_assoc($sqljurusan);
    $namajurusan = $dt_jurusan ['nama_jurusan'];
  
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
// $pdf->Cell(140);
// $pdf->Cell(30,6,'Kualalumpur,'.date("d F Y"),0,1,'C');

$pdf->Cell(80);
$pdf->Cell(30,6,'FORMULIR PENDAFTARAN SANTRI BARU MUKIM PUTRA',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,6,'TAHUN AJARAN 1445-1446 H / 2024-2025 M',0,1,'C');



$pdf->SetFont('Times','',12);
$pdf->Ln(5);
$pdf->Cell(8,6,'1.',0,0,'L');
$pdf->Cell(45,6,'No. Induk Santri',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(50,6,$nis,0,1,'L');

$pdf->Cell(8,6,'2.',0,0,'L');
$pdf->Cell(45,6,'NIK',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$nik,0,1,'L');

$pdf->Cell(8,6,'3.',0,0,'L');
$pdf->Cell(45,6,'Nama Lengkap',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$nama_lengkap,0,1,'L');

$pdf->Cell(8,6,'4.',0,0,'L');
$pdf->Cell(45,6,'Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$tmp_lahir,0,1,'L');

$pdf->Cell(8,6,'5.',0,0,'L');
$pdf->Cell(45,6,'Alamat Lengkap',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$alamat,0,1,'L');

$pdf->Cell(8,6,'6.',0,0,'L');
$pdf->Cell(45,6,'Jurusan',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$namajurusan,0,1,'L');

$pdf->Cell(8,6,'7.',0,0,'L');
$pdf->Cell(45,6,'Asal Sekolah Formal',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$asal_sekolah,0,1,'L');

$pdf->Cell(8,6,'8.',0,0,'L');
$pdf->Cell(45,6,'Nama Ayah',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$ayah,0,1,'L');

$pdf->Cell(8,6,'9.',0,0,'L');
$pdf->Cell(45,6,'Nama Ibu',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$ibu,0,1,'L');

$pdf->Cell(8,6,'10.',0,0,'L');
$pdf->Cell(45,6,'Nama Wali',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$nama_wali,0,1,'L');

$pdf->Cell(8,6,'11.',0,0,'L');
$pdf->Cell(45,6,'No. Whatsapp',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$kontak,0,1,'L');

$pdf->Cell(8,6,'12.',0,0,'L');
$pdf->Cell(45,6,'Mendaftar pada',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$tgl_daftar,0,1,'L');

$pdf->Cell(8,6,'13.',0,0,'L');
$pdf->Cell(45,6,'Riwayat Penyakit',0,0,'L');
$pdf->Cell(3 ,6,':',0,0,'L');
$pdf->Cell(50,6,$penyakit,0,1,'L');

$pdf->Ln(50);
$pdf->Cell(134);
$pdf->Cell(30,6,'Penggarutan,'.date("d F Y"),0,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->Ln(5);
$pdf->Cell(30);
$pdf->Cell(30,6,'Wali Santri',0,0,'C');
$pdf->Cell(70);
$pdf->Cell(30,6,'Santri',0,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Ln(15);
$pdf->Cell(30);
$pdf->Cell(30,6,$ayah,0,0,'C');

$pdf->Cell(70);
$pdf->Cell(30,6,$nama_lengkap,0,1,'C');

$pdf->SetFont('Times','B',12);
$pdf->Ln(5);
$pdf->Cell(80);
$pdf->Cell(30,6,'Panitia Pendaftaran',0,1,'C');

$pdf->SetFont('Times','',12);
$pdf->Ln(15);
$pdf->Cell(80);
$pdf->Cell(30,6,'..................................',0,1,'C');




$pdf->Output();
?>