<?php
/*
*
* @author M.Fadli Prathama (09081003031)
* email : m.fadliprathama@gmail.com
*
*/
/* setting zona waktu */
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("P","cm","A4");
// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(1,1,1);
/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->fpdf->AliasNbPages();
// AddPage merupakan fungsi untuk membuat halaman baru
$this->fpdf->AddPage();
// Setting Font : String Family, String Style, Font size
$this->fpdf->SetFont("Times","B",12);
/* Kita akan membuat header dari halaman pdf yang kita buat
————– Header Halaman dimulai dari baris ini —————————–
*/
$this->fpdf->Cell(19,0.7,"Judul",0,0,"C");
// fungsi Ln untuk membuat baris baru
$this->fpdf->Ln();
$this->fpdf->Ln();
/* Setting ulang Font : String Family, String Style, Font size
kenapa disetting ulang ???
jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
maka kita harus mensetting ulang Font nya.
jika diatas settingannya : helvetica, ‘B’, ’12’
khusus untuk penulisan alamat, kita setting : helvetica, ”, 10
yang artinya string stylenya normal / tidak Bold dan ukurannya 10
*/
$this->fpdf->SetFont("helvetica",'',10);
$this->fpdf->Cell(19,0.5,"Sub Judul",0,0,"C");
$this->fpdf->Ln();
$this->fpdf->Cell(19,0.5,"Subtitle",0,0,"C");
/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(1,3.5,20,3.5);
$this->fpdf->Line(1,3.55,20,3.55);


$this->fpdf->Output("laporan_seleksi_calok_atm.pdf","I");
?>