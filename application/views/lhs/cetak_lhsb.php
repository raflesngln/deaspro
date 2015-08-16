
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
$section->addText('KEHILANGAN/KECELAKAAN KENDARAAN BERMOTOR', null, 'pStyle');
$section->addText($row->type_kendaraan.' '.$row->model_kendaraan. ' dengan NOPOL '.$row->no_polisi, null, 'pStyle');
$section->addText('___________________________________________________________________________', null, 'pStyle');
$section->addTextBreak();


$section->addText('I.   DASAR ', array('name'=>'Arial','size'=>'14'));

$numberStyleList = array('listType' => \PHPWord_Style_ListItem::TYPE_NUMBER);


$listStyle = array(         'spaceAfter'    =>  2,
                            'spaceBefore'   =>  2,
                            'spacing'       =>  2
							);
$section->addListItem('Surat Perintah Kerja Investigasi  No :'. $row->no_kuasa.' tanggal '.date("d M Y",strtotime($row->terima_kuasa)).' dari '.$row->nm_asuransi, 0, null, $numberStyleList);

$section->addListItem('Surat Tugas No :'. $row->id_surat_tugas.' tanggal '.date("d M Y",strtotime($row->tgl_surat_tugas)),0, null, $numberStyleList);


$table = $section->addTable(array('marginTop'=>2000));
$table->addRow();
$noSpace = array('spaceAfter' => 0,'spaceBefore' => 0,'spacing'=>0);
$cellStyle = array ('spaceAfter' =>0);

$fontStyle = array ('bold' => false);
$fontStyle2 = array ('bold' => true);
$paraStyle = array ('align' => 'both','lineHeight'=>2);
$table->addCell(800,$cellStyle)->addText('');
$table->addCell(2000,$cellStyle)->addText('Tertanggung ');
$table->addCell(200,$cellStyle)->addText(':');
$table->addCell(7500,$cellStyle)->addText($row->nm_tertanggung,$noSpace,array('bold'=>true));
$table->addRow();
$table->addCell(100,$cellStyle)->addText('');
$table->addCell(400,$cellStyle)->addText('Alamat');
$table->addCell(200,$cellStyle)->addText(':');
$table->addCell(900,$cellStyle)->addText($row->almt_tertanggung,$noSpace);
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(400)->addText('No Polis / Kontrak');
$table->addCell(200)->addText(':');
$table->addCell(900,$cellStyle)->addText($row->no_polis);
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(2000)->addText('Periode Polis:');
$table->addCell(200)->addText(':');
$table->addCell(900,$cellStyle)->addText(date("d M Y",strtotime($row->awal_polis)).'  s/d  '.date("d M Y",strtotime($row->akhir_polis)));
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(400)->addText('Surveyor:');
$table->addCell(200)->addText(':');
$table->addCell(3000,$cellStyle)->addText($row->nm_surveyor.'', array('name'=>'Arial'));
$section->addTextBreak(1);

$section->addText('II. URAIAN SINGKAT ', array('name'=>'Arial','size'=>'14'));
$table = $section->addTable();
$table->addRow();
$cellStyle = array ('valign' => 'left');
$fontStyle = array ('bold' => false);
$paraStyle = array ('align' => 'both','lineHeight'=>1);
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(9000,$cellStyle)->addText($row->uraian_singkat,$fontStyle,$paraStyle);

$section->addTextBreak(1);
$section->addText('III.  UPAYA YANG DILAKUKAN ', array('name'=>'Arial','size'=>'14'));
$table = $section->addTable();
$table->addRow();
$cellStyle = array ('valign' => 'left');
$fontStyle = array ('bold' => false);
$paraStyle = array ('align' => 'both','lineHeight'=>2);

$table->addCell(100)->addText('');
$table->addCell(400)->addText('1.',array('bold'=>true));
$table->addCell(8000,$cellStyle)->addText('olah tkp',array('bold'=>true));

$table = $section->addTable();
$table->addRow();
$table->addCell(600)->addText('');
$table->addCell(800)->addText('    '.'     a.');
$table->addCell(7000,$cellStyle)->addText('Lokasi Kejadian');
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(200)->addText('    '.'     b.');
$table->addCell(8000,$cellStyle)->addText('Diperoleh informasi tentang beberapa saksi');
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(200)->addText('    '.'     c.');
$table->addCell(8000,$cellStyle)->addText('Membuat Sketsa/Denah TKP');
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(200)->addText('    '.'     d.');
$table->addCell(8000,$cellStyle)->addText('Memotret TKP');

$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(200)->addText('2. ',array('bold'=>true));
$table->addCell(8000,$cellStyle)->addText('Interview Para Saksi',array('bold'=>true));

$table = $section->addTable();
$table->addRow();
$table->addCell(600)->addText(' ');
$table->addCell(800)->addText('    '.'     a.',array('bold'=>true));
$table->addCell(7000)->addText('Sdra/sdri : '.$row->saksi1,$fontStyle2,$paraStyle,array('bold'=>true));
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
$table->addCell(800)->addText('    '.'     b.');
$table->addCell(7000)->addText('Sdra/sdri : '.$row->saksi2,$fontStyle2,$paraStyle);
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
$table->addCell(800)->addText('    '.'     b.');
$table->addCell(7000)->addText('Sdra/sdri : '.$row->saksi2,$fontStyle2,$paraStyle);
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
$table->addCell(800)->addText('    '.'     b.');
$table->addCell(7000)->addText('Sdra/sdri : '.$row->saksi2,$fontStyle2,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(8000)->addText('Alamat	:'.$row->almt_saksi2,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_saksi2,$fontStyle,$paraStyle);

$section->addTextBreak();
$table = $section->addTable();
$table->addRow();
$table->addCell(600)->addText('');
$table->addCell(300)->addText('3. ',array('bold'=>true));
$table->addCell(8000,$cellStyle)->addText('Koordinasi dengan Penyidik Polri',array('bold'=>true));
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(2000)->addText('Nama		:'.$row->penyidik);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(2000)->addText('Alamat		:'.$row->almt_penyidik,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(200)->addText('');
$table->addCell(2000)->addText($row->ket_penyidik,$fontStyle,$paraStyle);

$table = $section->addTable();
$table->addRow();
$table->addCell(600)->addText('');
$table->addCell(200)->addText('4. ',array('bold'=>true));
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

$table = $section->addTable();
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(200)->addText('5. ',array('bold'=>true));
$table->addCell(8000,$cellStyle)->addText('Tindakan Lain-Lain',array('bold'=>true));
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('  a.');
$table->addCell(2000)->addText(' Nama		:'.$row->tindakan1,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText('Alamat		:'.$row->almt_tindakan1);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_tindakan1,$fontStyle,$paraStyle);

$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('  b.');
$table->addCell(2000)->addText(' Nama		:'.$row->tindakan2);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText('Alamat		:'.$row->almt_tindakan2);
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(300)->addText('');
$table->addCell(2000)->addText($row->ket_tindakan2,$fontStyle,$paraStyle);

$section->addTextBreak(1);
$section->addText('IV. ANALISA PEMBAHASAN ', array('name'=>'Arial','size'=>'14'));
$section->addText('       Dari fakta - fakta tersebut di atas, maka dapat dianalisa sebagai berikut :');
$section->addText('       1.	TKP',array('bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' a. ');
$table->addCell(8000)->addText(''.$row->analisa_tkp_a,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' b.	');
$table->addCell(8000)->addText(''.$row->analisa_tkp_b,$fontStyle,$paraStyle);
$section->addText('       2.	Keterangan Para Saksi',array('bold'=>true));
$table = $section->addTable();
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' a. ');
$table->addCell(8000)->addText($row->analisa_saksi_a,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' b.	');
$table->addCell(8000)->addText($row->analisa_saksi_b,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' c.	');
$table->addCell(8000)->addText($row->analisa_saksi_c,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(400)->addText('');
$table->addCell(400)->addText(' d.	');
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


$section->addTextBreak(1);
$section->addText('V. KESIMPULAN', array('name'=>'Arial','size'=>'14'));
$table = $section->addTable();
$table->addRow();
$cellStyle = array ('valign' => 'left');
$fontStyle = array ('bold' => false);
$paraStyle = array ('align' => 'both','lineHeight'=>1);
$table->addCell(100)->addText('');
$table->addCell(300)->addText(' ');
$table->addCell(8000,$cellStyle)->addText('Berdasarkan fakta-fakta dan analisa tersebut diatas, maka dapat disimpulkan sebagai berikut :',$fontStyle,$paraStyle);
$section->addTextBreak(array('lineHeight'=>20));
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(300)->addText('  '.' 1.');
$table->addCell(8000)->addText($row->kesimpulan1,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(300)->addText('  '.' 2.');
$table->addCell(8000)->addText($row->kesimpulan2,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(300)->addText('  '.' 3.');
$table->addCell(8000)->addText($row->kesimpulan3,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(300)->addText('  '.' 4.');
$table->addCell(8000)->addText($row->kesimpulan4,$fontStyle,$paraStyle);
$table->addRow();
$table->addCell(100)->addText('');
$table->addCell(300)->addText('  '.' 5.');
$table->addCell(8000)->addText($row->kesimpulan5,$fontStyle,$paraStyle);
$section->addTextBreak(1);

$section->addText('Demikian laporan hasil survey ini dibuat dengan sebenar - benarnya untuk digunakan seperlunya oleh '.$row->nm_asuransi);
$section->addTextBreak(1);

$table = $section->addTable();
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(9000)->addText('Mengetahui');
$table->addCell(6000)->addText('Jakarta, '.date('d-M-Y'));
$table->addRow();
$table->addCell(200)->addText('');
$table->addCell(9000)->addText(' Manager Operasional');
$table->addCell(6000)->addText('Surveyor');
$table->addRow(400);
$table->addCell(200)->addText('');
$table->addCell(9000)->addText('');
$table->addCell(6000)->addText('');
$table->addRow(400);
$table->addCell(200)->addText('');
$table->addCell(9000)->addText('Deni Ismunanto');
$table->addCell(6000)->addText($row->nm_surveyor);



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
