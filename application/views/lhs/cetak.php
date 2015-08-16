
<?php
require_once 'PHPWord.php';

$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('Template LHSS.docx');

foreach($lhs as $row){
$norangka=$row->no_rangka;
$nomesin=$row->no_mesin;
$thnbuat=$row->thn_buat;
$nmstnk=$row->nm_stnk;
$almtstnk=$row->almt_stnk;
$nmtertanggung=$row->nm_tertanggung;
$almttertanggung=$row->almt_tertanggung;
$telptertanggung=$row->telp_tertanggung;
$nopolis=$row->no_polis;
$tglberlaku=date("d-M-Y",strtotime($row->tgl_berlaku));
$tglkedaluwarsa=date("d-M-Y",strtotime($row->tgl_kedaluwarsa));

$document->setValue('st', $row->no_kuasa);
$document->setValue('nokuasa', $row->no_kuasa);
$document->setValue('asuransi', $row->nm_asuransi);
$document->setValue('tglsurat', date("d-M-Y",strtotime($row->terima_kuasa)));
$document->setValue('tglterima', date("d-M-Y",strtotime($row->terbit_kuasa)));
$document->setValue('surveyor', $row->nm_surveyor);
$document->setValue('jabatan', $row->level);
$document->setValue('merek', $row->model_kendaraan);
$document->setValue('model', $row->type_kendaraan);
$document->setValue('nopolisi', $row->no_polisi);
$document->setValue('thnbuat', $thnbuat);
$document->setValue('warna', $warna);
$document->setValue('nomorangka', $norangka);
$document->setValue('mesin', $nomesin);
$document->setValue('saksi1', $row->saksi1);
$document->setValue('saksi2', $row->saksi2);
$document->setValue('saksi3', $row->saksi3);
$document->setValue('saksi4', $row->saksi4);
$document->setValue('saksi5', $row->saksi5);
$document->setValue('saksi6', $row->saksi6);
$document->setValue('alamatsaksi1', $row->almt_saksi1);
$document->setValue('alamatsaksi2', $row->almt_saksi2);
$document->setValue('alamatsaksi3', $row->almt_saksi3);
$document->setValue('alamatsaksi4', $row->almt_saksi4);
$document->setValue('alamatsaksi5', $row->almt_saksi5);
$document->setValue('alamatsaksi6', $row->almt_saksi6);
$document->setValue('ketsaksi1', $row->ket_saksi1);
$document->setValue('ketsaksi2', $row->ket_saksi2);
$document->setValue('ketsaksi3', $row->ket_saksi3);
$document->setValue('ketsaksi4', $row->ket_saksi4);
$document->setValue('ketsaksi5', $row->ket_saksi5);
$document->setValue('ketsaksi6', $row->ket_saksi6);
$document->setValue('almtstnk', $almtstnk);
$document->setValue('tertanggung', $nmtertanggung);
$document->setValue('almttertanggung', $almttertanggung);
$document->setValue('telpon', $telptertanggung);
$document->setValue('kantor', $telptertanggung);
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
