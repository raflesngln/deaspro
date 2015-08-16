
<?php
require_once 'PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection();

foreach($lhs as $row){
	$tgl=date('d-M-Y');
$id=$row->id_surat_tugas;

// Add text elements
$section->addText('LAPORAN HASIL SURVEY', 'rStyle', 'pStyle');
$section->addText('KEHILANGAN/KECELAKAAN KENDARAAN BERMOTOR', 'rStyle', 'pStyle');
$section->addText($row->type_kendaraan.' NO. POL  :   '.$row->no_polisi, 'rStyle', 'pStyle');
$section->addText('___________________________________________________________________________', null, 'pStyle');
$section->addTextBreak(0);


$section->addText('I.   DASAR ', array('name'=>'Arial','size'=>'14'));

$numberStyleList = array('listType' => \PHPWord_Style_ListItem::TYPE_NUMBER);


$listStyle = array(         'spaceAfter'    =>  2,
                            'spaceBefore'   =>  2,
                            'spacing'       =>  2
							);
$section->addListItem('Surat Perintah Kerja Investigasi  No :'. $row->no_kuasa.' tanggal '.date("d-M-Y",strtotime($row->terima_kuasa)).' dari '.$row->nm_asuransi, 0, null, $numberStyleList);

$section->addListItem('Surat Tugas No :'. $row->id_surat_tugas.' tanggal '.date("d-M-Y",strtotime($row->tgl_surat_tugas)).' tentang '.$row->uraian_st,0, null, $numberStyleList);


$table = $section->addTable(array('marginTop'=>2000));
$table->addRow();
$noSpace = array('spaceAfter' => 0,'spaceBefore' => 0,'spacing'=>0);
$cellStyle = array ('spaceAfter' =>0);

$fontStyle = array ('bold' => false);
$fontStyle2 = array ('bold' => true);
$paraStyle = array ('align' => 'both','lineHeight'=>2);
$table->addCell(800,$cellStyle)->addText('');
$table->addCell(200,$cellStyle)->addText('Tertanggung ');
$table->addCell(200,$cellStyle)->addText(':');
$table->addCell(8000,$cellStyle,$fontStyle2)->addText($row->nm_tertanggung,$noSpace);
$table->addRow();
$table->addCell(150,$cellStyle)->addText('');
$table->addCell(200,$cellStyle)->addText('Alamat');
$table->addCell(200,$cellStyle)->addText(':');
$table->addCell(8000,$cellStyle)->addText($row->almt_tertanggung,$noSpace);
$table->addRow();
$table->addCell(150)->addText('');
$table->addCell(200)->addText('No Polis');
$table->addCell(200)->addText(':');
$table->addCell(8000,$cellStyle)->addText($row->no_polis);
$table->addRow();
$table->addCell(150)->addText('');
$table->addCell(400)->addText('Tgl Berlaku:');
$table->addCell(200)->addText(':');
$table->addCell(8000,$cellStyle)->addText(date("d-M-Y",strtotime($row->tgl_berlaku)).'  s/d  '.date("d-M-Y",strtotime($row->kedaluwarsa)));
$table->addRow();
$table->addCell(150)->addText('');
$table->addCell(200)->addText('Surveyor:');
$table->addCell(200)->addText(':');
$table->addCell(8000,$cellStyle)->addText($row->nm_surveyor.'', array('name'=>'Arial'));

$section->addTextBreak(0);
$section->addText('II. URAIAN SINGKAT ', array('name'=>'Arial','size'=>'14'));
$table = $section->addTable();
$table->addRow();
$cellStyle = array ('valign' => 'left');
$fontStyle = array ('bold' => false);
$fontStyle2 = array ('bold' => true);
$paraStyle = array ('align' => 'both','lineHeight'=>1);
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(9000,$cellStyle)->addText($row->uraian_singkat,$fontStyle,$paraStyle);

$section->addTextBreak(0);
$section->addText('III. UPAYA YANG DILAKUKAN ', array('name'=>'Arial','size'=>'14'));
$section->addText('   '.'     1.   Olah TKP', array('name'=>'Arial','bold'=>true));
$table = $section->addTable();

$cellStyle = array ('valign' => 'left');
$fontStyle = array ('bold' => false);
$paraStyle = array ('align' => 'both','lineHeight'=>2);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(600)->addText('');
$table->addCell(8000,$cellStyle)->addText('a.  Mendatangi / Memeriksa TKP ( Lokasi Kejadian Perkara)');
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(8000,$cellStyle)->addText('b.  Mencari Informasi / Keterangan Saksi-Saksi');
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(8000,$cellStyle)->addText('c.  Membuat Sketsa/Denah TKP');
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(200)->addText('');
$table->addCell(8000,$cellStyle)->addText('d.  Memotret TKP');


$section->addText('   '.'     2.   Hasil Pelaksanaan Interview Para Saksi-Saksi', array('name'=>'Arial','bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(200)->addText(' ');
$table->addCell(600)->addText('  '.'  a.',array('bold'=>true));
$table->addCell(8000)->addText('Sdra / sdri : '.$row->saksi1,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_saksi1,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_saksi1,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(600)->addText(' ');
$table->addCell(300)->addText('  '.'  b.');
$table->addCell(8000)->addText('Sdra / sdri : '.$row->saksi2,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_saksi2,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_saksi2,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(600)->addText(' ');
$table->addCell(300)->addText('  '.'  c.');
$table->addCell(8000)->addText('Sdra / sdri : '.$row->saksi3,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_saksi3,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_saksi3,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(600)->addText(' ');
$table->addCell(300)->addText('  '.'  d.');
$table->addCell(8000)->addText('Sdra / sdri : '.$row->saksi4,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_saksi4,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_saksi4,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(600)->addText(' ');
$table->addCell(300)->addText('  '.'  e.');
$table->addCell(8000)->addText('Sdra / sdri : '.$row->saksi5,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_saksi5,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_saksi5,$fontStyle,$paraStyle);

$section->addText('   '.'     3.   Koordinasi dengan Penyidik Polri', array('name'=>'Arial','bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(100)->addText('');
$table->addCell(2000)->addText('Nama :'.$row->penyidik.'( '.$row->pangkat_penyidik.' )');
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(100)->addText('');
$table->addCell(2000)->addText('Alamat :'.$row->almt_penyidik,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(100)->addText('');
$table->addCell(2000)->addText($row->ket_penyidik,$fontStyle,$paraStyle);


$table = $section->addTable();
$table->addRow();
$table->addCell(450)->addText('');
$table->addCell(400)->addText('4. ',array('bold'=>true));
$table->addCell(8000,$cellStyle)->addText('Interview Tertanggung',array('bold'=>true));
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText('Nama		:'.$row->nm_tertanggung,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText('Alamat		:'.$row->almt_tertanggung,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_tertanggung,$fontStyle,$paraStyle);


$section->addText('   '.'     5.   Tindakan Lain-Lain', array('name'=>'Arial','bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(200)->addText(' ');
$table->addCell(600)->addText('  '.'  a.',array('bold'=>true));
$table->addCell(8000)->addText('Nama :'.$row->tindakan1,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_tindakan1,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_tindakan1,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(600)->addText(' ');
$table->addCell(300)->addText('  '.'  b.');
$table->addCell(8000)->addText('Nama :'.$row->tindakan2,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_tindakan2,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_tindakan2,$fontStyle,$paraStyle);




$section->addTextBreak(0);
$section->addText('IV.  ANALISA PEMBAHASAN ', array('name'=>'Arial','size'=>'14'));
$section->addText('       Dari fakta - fakta tersebut di atas, maka dapat dianalisa sebagai berikut :');

$section->addText('       1.	TKP',array('bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(600)->addText('');
$table->addCell(300)->addText(' a. ');
$table->addCell(8000)->addText($row->analisa_tkp_a,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(300)->addText(' b.	');
$table->addCell(8000)->addText($row->analisa_tkp_b,$fontStyle,$paraStyle);

$section->addText('       2.	Keterangan Para Saksi',array('bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(600)->addText('');
$table->addCell(300)->addText(' a. ');
$table->addCell(8000)->addText($row->analisa_saksi_a,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(300)->addText(' b.	');
$table->addCell(8000)->addText($row->analisa_saksi_b,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(300)->addText(' c.	');
$table->addCell(8000)->addText($row->analisa_saksi_c,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(300)->addText(' d.	');
$table->addCell(8000)->addText($row->analisa_saksi_d,$fontStyle,$paraStyle);

$section->addText('       3.	Tertanggung', array('name'=>'Arial','bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' ');
$table->addCell(8000)->addText('Kesaksian tertanggung/pelapor '.$row->nm_tertanggung);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText('');
$table->addCell(2000)->addText($row->analisa_tertanggung,$fontStyle,$paraStyle);

$section->addText('       4.	AlatBukti Lain',array('bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' ');
$table->addCell(8000)->addText('Alat bukti lain nya:');
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(400)->addText('');
$table->addCell(2000)->addText($row->alat_bukti_lain,$fontStyle,$paraStyle);


$section->addTextBreak(0);
$section->addText('V. KESIMPULAN', array('name'=>'Arial','size'=>'14'));
$section->addText('      Berdasarkan fakta-fakta dan analisa tersebut diatas, maka dapat disimpulkan sebagai berikut:', array('name'=>'Arial'));

$table = $section->addTable();
$cellStyle = array ('valign' => 'left');
$fontStyle = array ('bold' => false);
$paraStyle = array ('align' => 'both','lineHeight'=>1);
$section->addTextBreak(0);
$table = $section->addTable();

$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText(' 1.');
$table->addCell(8000)->addText($row->kesimpulan3,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText(' 2.');
$table->addCell(8000)->addText($row->kesimpulan4,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText(' 3.');
$table->addCell(8000)->addText($row->kesimpulan3,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText(' 4.');
$table->addCell(8000)->addText($row->kesimpulan4,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText(' 5.');
$table->addCell(8000)->addText($row->kesimpulan5,$fontStyle,$paraStyle);
$section->addTextBreak(0);

$section->addText('Demikian laporan hasil survey ini dibuat dengan sebenar - benarnya untuk digunakan seperlunya oleh '.$row->nm_asuransi);
$section->addTextBreak(2);

$table = $section->addTable();
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(11000)->addText('   Mengetahui ,');
$table->addCell(6000)->addText('Jakarta, '.date('d-M-Y'));
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(9000)->addText('MANAGER OPERASIONAL');
$table->addCell(6000)->addText('    SURVEYOR');
$table->addRow(600);
$table->addCell(200)->addText('');
$table->addCell(9000)->addText('');
$table->addCell(6000)->addText('');
$table->addRow(600);
$table->addCell(200)->addText('');
$table->addCell(9000)->addText('DENNY ISMUNANTO',array('underline'=>'thick','allCaps'=>'true'));
$table->addCell(6000)->addText($row->nm_surveyor,array('underline'=>'thick','allCaps'=>'true'));



$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>false, 'size'=>14));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>90));
// Save File
$namafile='LHS_'.$id.'.docx';
$path=base_url().'asset/LHS/';
$link=$path.$namafile;
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('asset/LHS/'.$namafile);
//echo '<meta http-equiv="Refresh" content="1; URL='.$link.'">';

header("Location:$link");
}
?>
