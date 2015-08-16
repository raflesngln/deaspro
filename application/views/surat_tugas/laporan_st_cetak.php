<?php
require_once 'PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection();

// Define table style arrays
$styleTable = array('borderSize'=>2, 'borderColor'=>'006699', 'cellMargin'=>90);
$styleFirstRow = array('borderBottomSize'=>8, 'borderBottomColor'=>'0000FF', 'bgColor'=>'E2E2E2');

// Define cell style arrays
$styleCell = array('valign'=>'left');
$styleCellBTLR = array('valign'=>'left', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'left');

// Add table style
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

$section->addText('LAPORAN SURAT TUGAS', 'rStyle', 'pStyle');
$section->addText('Periode	: '.$periode.'', array('name'=>'Arial'),'pStyle');

// Add table
$table = $section->addTable('myOwnTableStyle');


// Add row
$table->addRow(900);

// Add cells
$table->addCell(300, $styleCell)->addText('No', $fontStyle);
$table->addCell(1900, $styleCell)->addText('No Surat', $fontStyle);
$table->addCell(1500, $styleCell)->addText('Tgl ST', $fontStyle);
$table->addCell(2500, $styleCell)->addText('Nama Asuransi', $fontStyle);
$table->addCell(2500, $styleCell)->addText('Nama Tertanggung', $fontStyle);
$table->addCell(2500, $styleCell)->addText('Nama Surveyor', $fontStyle);
// Add more rows / cells
$no=1;
foreach($list as $row){
	
	$table->addRow();
	$table->addCell(300)->addText($no);
	$table->addCell(1900)->addText($row->id_surat_tugas);
	$table->addCell(1500)->addText(date("d-m-Y",strtotime($row->tgl_surat_tugas)));
	$table->addCell(2500)->addText($row->nm_asuransi);
	$table->addCell(2500)->addText($row->nm_tertanggung);
	$table->addCell(2500)->addText($row->nm_surveyor);
$no++;
 }


$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>false, 'size'=>14));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>90));

// Save File
//$id='-laporan';
$namafile='Laporan Surat_Tugas_'.'.docx';
$path=base_url().'asset/ST/';
$link=$path.$namafile;

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('asset/ST/'.$namafile);
//echo '<meta http-equiv="Refresh" content="1; URL='.$link.'">';

header("Location:$link");

?>