<?php
require_once 'PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection(array('orientation'=>'landscape','marginLeft'=>600, 'marginRight'=>600, 'marginTop'=>200, 'marginBottom'=>200));

// Define table style arrays
$styleTable = array('borderSize'=>1, 'borderColor'=>'black', 'cellMargin'=>5);
$styleFirstRow = array('borderBottomSize'=>5, 'borderBottomColor'=>'0000FF', 'bgColor'=>'lavender');

// Define cell style arrays
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'right', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>false, 'align'=>'right','size'=>7);

// Add table style
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

$section->addText('LAPORAN KWITANSI', 'rStyle', 'pStyle');
$section->addText(' '.$periode.'', array('name'=>'Arial'),'pStyle');

// Add table
$table = $section->addTable('myOwnTableStyle');


// Add row
$table->addRow(900);

// Add cells
$table->addCell(300, $styleCell)->addText('No', array('align'=>'center'));
$table->addCell(1900, $styleCell)->addText('No KW', $fontStyle);
$table->addCell(1600, $styleCell)->addText('Tgl KW', $fontStyle);
$table->addCell(1600, $styleCell)->addText('No.Kontrak', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Asuransi', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Tertanggung', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Surveyor', $fontStyle);
$table->addCell(1800, $styleCell)->addText('B.Survey', $fontStyle);
$table->addCell(1800, $styleCell)->addText('B.Operasional', $fontStyle);
$table->addCell(1800, $styleCell)->addText('B.Klaim', $fontStyle);
$table->addCell(1800, $styleCell)->addText('Sisa', $fontStyle);
$table->addCell(1800, $styleCell)->addText('Total', $fontStyle);

// Add more rows / cells
$no=1;
foreach($list as $row){
$survey=$row->status_survey;
$operasional=$row->status_operasional;
$klaim=$row->status_klaim;

if($survey=='0'){$harga1=$row->survey; $survey='X';} else{$harga1=0;$survey='v';}
if($klaim=='0'){$harga2=$row->klaim; $klaim='X';} else{$harga2=0;$klaim='v';}
if($operasional=='0'){$harga3=$row->operasional;$operasional='X';} else{$harga3=0;$operasional='v';}

$total=$row->total;
$b_sur=$row->uang_surveyor;
$b_opr=$row->uang_operasional;
$b_klm=$row->uang_klaim;
$t_bayar=$b_sur+$b_opr+$b_klm;

$sisa=$total-$t_bayar;

$grand+=$total;
$grands+=$sisa;
$totsurvey+=$row->survey;
$totoperasional+=$row->operasional;
$totklaim+=$row->klaim;

$persen=$grands/$grand;
	
	$table->addRow();
	$table->addCell(300)->addText($no, array('align'=>'center'));
	$table->addCell(1900)->addText($row->id_surat_tugas, $fontStyle);
	$table->addCell(1600)->addText(date("d-m-Y",strtotime($row->tgl_kwitansi)), $fontStyle);
	$table->addCell(1600)->addText($row->no_kontrak, $fontStyle);
	$table->addCell(2000)->addText($row->nm_asuransi, $fontStyle);
	$table->addCell(2000)->addText($row->nm_tertanggung, $fontStyle);
	$table->addCell(2000)->addText($row->nm_surveyor, $fontStyle);
	$table->addCell(1800)->addText(number_format($row->survey,0,'.','.'), $fontStyle);
	$table->addCell(1800)->addText(number_format($row->operasional,0,'.','.'), $fontStyle);
	$table->addCell(1800)->addText(number_format($row->klaim,0,'.','.'), $fontStyle);
	$table->addCell(1800)->addText(number_format($sisa,0,'.','.'), $fontStyle);
	$table->addCell(1800)->addText(number_format($row->total,0,'.','.'), $fontStyle);

$no++;
 }
 
 foreach($sub as $dt)
			{
				$jumlah3=$dt->jumlah3;
				
	$table->addRow();
	$table->addCell(300)->addText('');
	$table->addCell(1900)->addText('');
	$table->addCell(1600)->addText('');
	$table->addCell(1600)->addText('');
	$table->addCell(2000)->addText('');
	$table->addCell(2000)->addText('');
	$table->addCell(2000)->addText('');
	$table->addCell(1800)->addText(number_format($dt->jumlah1,0,'.','.'),array('bold'=>true, 'align'=>'center','size'=>9));
	$table->addCell(1800)->addText(number_format($dt->jumlah2,0,'.','.'),array('bold'=>true, 'align'=>'center','size'=>9));
	$table->addCell(1800)->addText(number_format($dt->jumlah3,0,'.','.'),array('bold'=>true, 'align'=>'center','size'=>9));
	$table->addCell(1800)->addText(number_format($grands,0,'.','.'),array('bold'=>true, 'align'=>'center','size'=>9));
	$table->addCell(1800)->addText(number_format($grand,0,'.','.'),array('bold'=>true, 'align'=>'center','size'=>9));


	}
	$section->addTextBreak();
	
	$section->addText('Prod  			 : '.'Rp. '.number_format($grand,0,'.','.'));
	$section->addText('Rek. Koran 		 : '.'Rp. '.number_format($row->total,0,'.','.'));
	$section->addText('OS 			 : '.'Rp. '.number_format($grands,0,'.','.'));
	$section->addText('% 			: '.' R : P x 100% '.'='.number_format($grands,0,'.','.').' / '.number_format($grand,0,'.','.').' x '.' 100% '.' = '.substr($persen,0,4).' % ');
	
	$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>false, 'size'=>14));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>90));

// Save File
//$id='-laporan';
$namafile='Laporan Kwitansi_'.'.docx';
$path=base_url().'asset/ST/';
$link=$path.$namafile;

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('asset/ST/'.$namafile);
//echo '<meta http-equiv="Refresh" content="1; URL='.$link.'">';

header("Location:$link");

?>