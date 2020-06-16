<?php
	require_once "./PHPExcel.php"; // PHPExcel.php을 불러옴.
	$objPHPExcel = new PHPExcel();
	require_once "./IOFactory.php"; // IOFactory.php을 불러옴.

	$filename = './국민안심병원_운영기관_현황.xlsx'; // 읽어들일 엑셀 파일의 경로와 파일명을 지정한다.

	try {

		// 업로드 된 엑셀 형식에 맞는 Reader객체를 만든다.
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);

		// 읽기전용으로 설정
		$objReader->setReadDataOnly(true);

		// 엑셀파일을 읽는다
		$objExcel = $objReader->load($filename);

		// 첫번째 시트를 선택
		$objExcel->setActiveSheetIndex(0);
		$objWorksheet = $objExcel->getActiveSheet();
		$rowIterator = $objWorksheet->getRowIterator();

		foreach ($rowIterator as $row) { // 모든 행에 대해서

			$cellIterator = $row->getCellIterator();

			$cellIterator->setIterateOnlyExistingCells(false); 

		}

		$maxRow = $objWorksheet->getHighestRow();

		
        /*
		for ($i = 0 ; $i <= $maxRow ; $i++) {



			$dataA = $objWorksheet->getCell('A' . $i)->getValue(); // A열

			$dataB = $objWorksheet->getCell('B' . $i)->getValue(); // B열


 
			$dataC = $objWorksheet->getCell('C' . $i)->getValue(); // C열

			$dataD = $objWorksheet->getCell('D' . $i)->getValue(); // D열

			$dataE = $objWorksheet->getCell('E' . $i)->getValue(); // E열

			$dataF = $objWorksheet->getCell('F' . $i)->getValue(); // F열



                   // 날짜 형태의 셀을 읽을때는 toFormattedString를 사용

			$dataF = PHPExcel_Style_NumberFormat::toFormattedString($dataF, 'YYYY-MM-DD'); 



		  }
    */


	} catch (exception $e) {

		echo '엑셀파일을 읽는도중 오류가 발생하였습니다.<br/>';		

	}

	

​?>