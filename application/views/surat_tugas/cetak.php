
<?php
require_once 'PHPWord.php';

$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('Template ST.docx');


foreach($st as $row){
	$tgl=date('d-M-Y');
$id=$row->id_surat_tugas;
$nm_asuransi=$row->nm_asuransi;
$nokuasa=$row->no_kuasa;
$tglkuasa=date("d-M-Y",strtotime($row->terbit_kuasa));
$terimakuasa=date("d-M-Y",strtotime($row->terima_kuasa));
$surveyor=$row->nm_surveyor;
$level=$row->level;
$typekendaraan=$row->type_kendaraan;
$modelkendaraan=$row->model_kendaraan;
$warna=$row->warna;
$nopolisi=$row->no_polisi;
$norangka=$row->no_rangka;
$nomesin=$row->no_mesin;
$thnbuat=$row->thn_buat;
$nmstnk=$row->nm_stnk;
$almtstnk=$row->almt_stnk;
$nmtertanggung=$row->nm_tertanggung;
$almttertanggung=$row->almt_tertanggung;
$telptertanggung=$row->telp_tertanggung;
$hptertanggung=$row->hp_tertanggung;
$nopolis=$row->no_polis;
$tglberlaku=date("d-M-Y",strtotime($row->tgl_berlaku));
$tglkedaluwarsa=date("d-M-Y",strtotime($row->tgl_kedaluwarsa));

$document->setValue('st', $nokuasa);
$document->setValue('nost', $nokuasa);
$document->setValue('asuransi', $nm_asuransi);
$document->setValue('tglsurat', $tglkuasa);
$document->setValue('tglterima', $terimakuasa);
$document->setValue('surveyor', $surveyor);
$document->setValue('jabatan', $level);
$document->setValue('merek', $typekendaraan);
$document->setValue('model', $modelkendaraan);
$document->setValue('thnbuat', $thnbuat);
$document->setValue('warna', $warna);
$document->setValue('nopolisi', $nopolisi);
$document->setValue('nomorangka', $norangka);
$document->setValue('mesin', $nomesin);
$document->setValue('stnk', $nmstnk);
$document->setValue('almtstnk', $almtstnk);
$document->setValue('tertanggung', $nmtertanggung);
$document->setValue('almttertanggung', $almttertanggung);
$document->setValue('telpon', $telptertanggung);
$document->setValue('kantor', $hptertanggung);
$document->setValue('asuransi', $nm_asuransi);
$document->setValue('nopolis', $nopolis);
$document->setValue('tglberlaku', $tglberlaku);
$document->setValue('tglkedaluwarsa', $tglkedaluwarsa);
$document->setValue('tanggal', date('d M Y'));

$document->setValue('weekday','sekarang adalahhari jumat');
$document->setValue('time', date('H:i'));

// Save File
$namafile='Surat_Tugas'.'.docx';
$path=base_url().'asset/ST/';
$link=$path.$namafile;


$document->save('asset/ST/'.$namafile);

header("Location:$link");
}
?>
