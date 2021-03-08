<?php
require('fpdf.php');

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;
var $angle=0;
var $tracking_number;
var $report_header;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function SetIsfill($c)
{
	//Set the array of column widths
	$this->isfill=$c;
}

function Rotate($angle,$x=-1,$y=-1)
{
	if($x==-1)
		$x=$this->x;
	if($y==-1)
		$y=$this->y;
	if($this->angle!=0)
		$this->_out('Q');
	$this->angle=$angle;
	if($angle!=0)
	{
		$angle*=M_PI/180;
		$c=cos($angle);
		$s=sin($angle);
		$cx=$x*$this->k;
		$cy=($this->h-$y)*$this->k;
		$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
	}
}

function RotatedText($x,$y,$txt,$angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}

function Header() {
	switch ($this->report_header){
	
	case "general_header":
		$border =0;
		$with_border = 1;
		$month = strtoupper(date("F, Y"));
		$this->SetFont('Arial', '', 10);
		$this->Cell(259.4, 5, "Republic of the Philippines", $border, '', 'C');
		$this->Ln(5);
		$this->Cell(259.4, 5, "Department of Health", $border, '', 'C');
		$this->Ln(5);
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(259.4, 7, Configure::read('INSTITUTION_NAME'), $border, '', 'C');
		$this->Ln(7);
		$this->SetFont('Arial', '', 10);
		$this->Cell(259.4, 5, Configure::read('INSTITUTION_ADDRESS'), $border, '', 'C');

		$this->Image( Configure::read('INSTITUTION_LOGO'), 40 , 13 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 220 , 15 , 25 , 25 );

	break;
	case "general_header_landscape_with_tracking_number":
		$border =0;
		$with_border = 1;
		$month = strtoupper(date("F, Y"));
		$this->SetFont('COURIER', '', 10);
		$this->Cell(310, 15, "Republic of the Philippines", $border, '', 'C');
		$this->Ln(5);
		$this->Cell(310, 15, "Department of Health", $border, '', 'C');
		$this->Ln(5);
		$this->SetFont('COURIER', 'B', 12);
		$this->Cell(310, 15, "WESTERN VISAYAS MEDICAL CENTER", $border, '', 'C');
		$this->Ln(7);
		$this->SetFont('COURIER', '', 10);
		$this->Cell(310, 8, "Q. Abeto St., Mandurriao, Iloilo City 5000, Philippines", $border, '', 'C');

		$this->Image( WWW_ROOT ."/files/logo/wvmc_logo.jpg", 30 , 5 , 25 , 25 );
		$this->SetXY(250, 36);
		$this->MultiCell(100, 5, 'Tracking Number ' . $_SESSION['department_summary_general_payroll_report']['GeneratedPayroll']['tracking_number'], $border, 'L');
		$this->SetXY(250, 36);
		$this->MultiCell(100, 5, '                _______________', $border, 'L');

		$this->Image( WWW_ROOT ."/files/logo/doh.png", 280 , 5 , 25 , 25 );


	break;	
	
	
	case "header_with_tracking_number":
		$border =0;
		$with_border = 1;
		$month = strtoupper(date("F, Y"));
		$this->SetFont('COURIER', '', 10);
		$this->Cell(260, 5, "Republic of the Philippines", $border, '', 'C');
		$this->Ln(5);
		$this->Cell(260, 5, "Department of Health", $border, '', 'C');
		$this->Ln(5);
		$this->SetFont('COURIER', 'B', 12);
		$this->Cell(260, 7, "WESTERN VISAYAS MEDICAL CENTER", $border, '', 'C');
		$this->Ln(7);
		$this->SetFont('COURIER', '', 10);
		// $this->Cell(250, 5, "Q. Abeto St., Mandurriao, Iloilo City 5000, Philippines", $border, '', 'C');

		$this->Image( WWW_ROOT ."/files/logo/wvmc_logo.jpg", 10 , 5 , 25 , 25 );
		$this->SetXY(220, 36);
		$this->MultiCell(100, 5, 'Tracking Number ' . $this->tracking_number, $border, 'L');
		$this->SetXY(250, 36);
		$this->MultiCell(225, 5, '_________', $border, 'L');

		$this->Image( WWW_ROOT ."/files/logo/doh.png", 245 , 5 , 25 , 25 );


	break;	
	case "employee_time_card_header_landscape":
			$border =0;
			$with_border = 1;
			
			$month = strtoupper(date("F, Y"));
			$this->SetFont('Arial', '', 10);
			$this->Cell(310, 5, "Republic of the Philippines", $border, '', 'C');
			$this->Ln(5);
			$this->Cell(310, 5, "Department of Health", $border, '', 'C');
			$this->Ln(5);
			$this->SetFont('Arial', 'B', 12);
			$this->Cell(310, 7, Configure::read('INSTITUTION_NAME'), $border, '', 'C');
			$this->Ln(7);
			$this->SetFont('Arial', '', 10);
			$this->Cell(310, 5, Configure::read('INSTITUTION_ADDRESS'), $border, '', 'C');

			$this->Image( Configure::read('INSTITUTION_LOGO'), 30 , 5 , 25 , 25 );
			$this->Image( WWW_ROOT ."/files/logo/doh.png", 280 , 5 , 25 , 25 );
			
			$this->SetFont('Arial', 'B', 8);
			$this->setXY(10,30);
			
			
			$header_y = $this->getY();
			$header_y +=1;
			$header_x = $this->getX();
			$header_x +=0;
			
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(50, 6,"Name" ,$with_border, 'C');
			
			$header_x +=50;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(30,6,"Id No" ,$with_border, 'C');
			
			$body_x =$header_x;

			$header_x +=30;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Date" ,$with_border, 'C');
			
			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Day" ,$with_border, 'C');

			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Time In" ,$with_border, 'C');

			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Break Out" ,$with_border, 'L');

			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Break In" ,$with_border, 'C');

			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Time Out" ,$with_border, 'C');
			
			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Total Time" ,$with_border, 'C');
			
			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Late" ,$with_border, 'C');
			
			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(20,6,"Undertime" ,$with_border, 'C');
			
			$header_x +=20;
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(50,6,"Time Dispute Reason" ,$with_border, 'C');
	break ;	
	
	case "general_header_portrait":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(211, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(211, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(211, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(211, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 10 , 7.5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180, 7.5 , 25 , 25 );

	break ;	

	case "general_header_landscape":
		$border =0;
		$with_border = 1;
		$month = strtoupper(date("F, Y"));
		$this->SetFont('COURIER', '', 10);
		$this->Cell(310, 5, "Republic of the Philippines", $border, '', 'C');
		$this->Ln(5);
		$this->Cell(310, 5, "Department of Health", $border, '', 'C');
		$this->Ln(5);
		$this->SetFont('COURIER', 'B', 12);
		$this->Cell(310, 7, Configure::read('INSTITUTION_NAME'), $border, '', 'C');
		$this->Ln(7);
		$this->SetFont('COURIER', '', 10);
		$this->Cell(310, 5, Configure::read('INSTITUTION_ADDRESS'), $border, '', 'C');

		$this->Image( Configure::read('INSTITUTION_LOGO'), 30 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 280 , 5 , 25 , 25 );


	break;
	
	case "general_payroll_report_header":
		$border =0;
		$with_border = 1;
		$month = strtoupper(date("F, Y"));
		$this->SetFont('COURIER', '', 10);
		$this->setY(10);
		// $this->Cell(315, 5, "Republic of the Philippines", $border, '', 'C');
		$this->Ln(5);
		// $this->Cell(315, 5, "Department of Health", $border, '', 'C');
		$this->Ln(5);
		$this->SetFont('COURIER', 'B', 12);
		// $this->Cell(315, 7, Configure::read('INSTITUTION_NAME'), $border, '', 'C');
		$this->Ln(7);
		$this->SetFont('COURIER', '', 10);
		// $this->Cell(315, 5, Configure::read('INSTITUTION_ADDRESS'), $border, '', 'C');

		// $this->Image( Configure::read('INSTITUTION_LOGO'), 30 , 10 , 25 , 25 );
		// $this->Image( WWW_ROOT ."/files/logo/doh.png", 277	 , 13 , 25 , 25 );

		
		//debug($_SESSION['Auth']);exit();
		// debug($_SESSION['Auth']['GeneratedPayroll']['general_payroll_period_data']['GeneratedPayroll']['payroll_covered_period']);exit();

		// function general_payroll_report_header() {
		// $border =0;
		// $with_border = 1;
		
		$this->setXY(290,12);
		$this->SetFont('COURIER', '', 8);
		$this->MultiCell(30, 5, $this->PageNo() ,$border, 'L');
		
		$this->setXY(255,10);
		$this->MultiCell(85, 10,"Journal Voucher No. ________________" ,$border, 'L');

		$this->setXY(255,15);
		// $this->MultiCell(85, 10,"Tracking Number \t\t\t\t".$_SESSION['Auth']['GeneratedPayroll']['general_payroll_period_data']['GeneratedPayroll']['tracking_number'] ,$border, 'L');
		$this->MultiCell(85, 10,"Tracking Number.".$this->tracking_number ,$border, 'L');
		// debug($this->tracking_number);
		$this->setXY(255,15);
		$this->MultiCell(85, 10,"            \t\t\t\t____________________" ,$border, 'L');

		$payroll_covered_pariod = isset($_SESSION['Auth']['GeneratedPayroll']['general_payroll_period_data']['GeneratedPayroll']['payroll_covered_period']) ? $_SESSION['Auth']['GeneratedPayroll']['general_payroll_period_data']['GeneratedPayroll']['payroll_covered_period'] : 'N/A';
		
		$this->Ln(5);
		$this->setY(10);
		$this->SetFont('COURIER', 'B', 12);
		$this->MultiCell(310, 10,"GENERAL PAYROLL" ,$border, 'C');
	
		$header_y = $this->getY();
		$header_y += 5;
		$this->setXY(5,$header_y);
		$this->SetFont('COURIER', 'B', 8);
		$this->MultiCell(250, 5,"WE HEREBY ACKNOWLEDGE to have received from ". Configure::read('INSTITUTION_NAME') .", the sums therein specified opposite our perspective names, being in full compensation for our service for the period ". $payroll_covered_pariod .", except as noted otherwise in the Remarks column." ,$border, 'L');

		$header_y = $this->getY();
		$header_y += 1;
		$this->setXY(5,$header_y);
		$this->SetFont('COURIER', 'B', 7);
		$this->MultiCell(8, 30,"NO" ,$with_border, 'C');
		
		$header_x = $this->getX();
		$header_x += 3;
		
		$this->setXY($header_x,$header_y);
		$this->MultiCell(30, 30,"EMPLOYEE NAME" ,$with_border, 'C');
		
		$header_x += 30;
		$this->setXY($header_x,$header_y);
		$this->MultiCell(30,15,"DESIGNATION / SALARY" ,$with_border, 'C');

		$header_x += 30;
		$this->setXY($header_x,$header_y);
		$this->MultiCell(58,6,"S A L A R Y" ,$with_border, 'C');
			
		$income_y = $this->getY();
		$this->setXY($header_x,$income_y);
		$this->MultiCell(20,24,"Basic" ,$with_border, 'C');

		$header_x += 20;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(20,4.8,"SUBS / LAUNDRY / HAZARD / (Less Abs / Undertime)" ,$with_border, 'C');
		
		$header_x += 20;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(18,12,"GROSS INCOME" ,$with_border, 'C');
		
		$header_x += 18;
		$this->setXY($header_x,$header_y);
		$this->MultiCell(153,6,"DEDUCTIONS" ,$with_border, 'C');
		
		$income_y = $this->getY() ;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,12,"WTAX" ,$with_border, 'C');
		
		$income_y += 12;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,12,"MEDICARE" ,$with_border, 'C');
		
		$income_y -= 12;
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(69,8,"GSIS" ,$with_border, 'C');
		
		$header_x += 69;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(23,8,"PAG-IBIG" ,$with_border, 'C');
		
		$header_x += 23;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(46,8,"OTHERS" ,$with_border, 'C');
		
		$income_y += 8;
		$header_x -= 92;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(8,16,"COD" ,$with_border, 'C');
		
		$header_x += 8;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,16,"AMOUNT" ,$with_border, 'C');
		
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(8,16,"COD" ,$with_border, 'C');
		
		$header_x += 8;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,16,"AMOUNT" ,$with_border, 'C');
		
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(8,16,"COD" ,$with_border, 'C');
		
		$header_x += 8;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,16,"AMOUNT" ,$with_border, 'C');
		
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(8,16,"COD" ,$with_border, 'C');
		
		$header_x += 8;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,16,"AMOUNT" ,$with_border, 'C');
		
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(8,16,"COD" ,$with_border, 'C');
		
		$header_x += 8;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,16,"AMOUNT" ,$with_border, 'C');
		
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(8,16,"COD" ,$with_border, 'C');
		
		$header_x += 8;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,16,"AMOUNT" ,$with_border, 'C');
		
		$header_x += 15;
		$income_y -= 14;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,10,"TOTAL DEDUC TIONS" ,$with_border, 'C');
		
		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(15,10,"NET AMOUNT RECEIVED",$with_border,'C');

		$header_x += 15;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(6,10,"PE RI OD",$with_border,'C');
		
		$header_x += 6;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(20,30,"SIGNATURE",$with_border,'C');
		
		$header_x += 20;
		$this->setXY($header_x,$income_y);
		$this->MultiCell(20,30,"REMARKS",$with_border,'C');

	break;
	
	case "attendance_report":
	$this->SetFont('Arial', 'B', 15);
		$x=5;
		$y=10;
		$this->SetXY($x,$y);
		$this->MultiCell(287, 5, Configure::read('INSTITUTION_NAME'), 1, 'C');
		$this->SetFont('Arial', '', 10);
		$this->SetXY($x,$y+7);
		$this->MultiCell(287, 5, 'EMPLOYEE ATTENDANCE SUMMARY REPORT ', 1, 'C');
		$x=5;
		$y=15;
		$this->SetXY($x,$y+17);
		$this->MultiCell(30, 5, 'Emp No ', 1, 'C');
		
		$this->SetXY($x+30,$y+17);
		$this->MultiCell(70, 5, 'Employee Name ', 1, 'C');
		
		$this->SetXY($x+100,$y+17);
		$this->MultiCell(35, 5, 'Shift Time In ', 1, 'C');
		
		$this->SetXY($x+135,$y+17);
		$this->MultiCell(35, 5, 'Shift Time Out ', 1, 'C');
		
		$this->SetXY($x+170,$y+17);
		$this->MultiCell(40, 5, 'Employee Time In ', 1, 'C');
		
		$this->SetXY($x+210,$y+17);
		$this->MultiCell(40, 5, 'Employee Time Out ', 1, 'C');
		
		$this->SetXY($x+250,$y+17);
		$this->MultiCell(37, 5, 'Remarks ', 1, 'C');

	break;
	
	case "schedule_report":
		$this->SetFont('Arial', 'B', 15);
		$x=5;
		$y=10;
		$this->SetXY($x,$y);
		$this->MultiCell(205, 5, 'WESTERN VISAYAS MEDICAL CENTER', 0, 'C');
		$this->SetFont('Arial', 'B', 10);
		$this->SetXY($x,$y+7);
		$this->MultiCell(205, 5, 'EMPLOYEE SCHEDULE SUMMARY REPORT ', 0, 'C');
		$this->SetFont('Arial', '', 10);
		$x=5;
		$y=30;
		// $this->SetXY($x,$y);
		// $this->MultiCell(30, 5, 'Employee Name:', 1, 'L');
		
		// $this->SetXY($x+30,$y);
		// $this->MultiCell(90, 5, $this->employee_name, 1, 'L');
		// debug($this->employee_name);
		
		
		// $this->SetXY($x+130,$y);
		// $this->MultiCell(25, 5, 'Employee No. :', 1, 'L');
		
		// $this->SetXY($x+155,$y);
		// $this->MultiCell(50, 5, $over_time[0]['Employee']['employee_number'], 1, 'L');
		
		// $this->SetXY($x,$y+5);
		// $this->MultiCell(30, 5, 'Department:', 1, 'L');
		
		// $this->SetXY($x+30,$y+5);
		// $this->MultiCell(90, 5, 'Department:', 1, 'L');
		
		
		// $this->SetXY($x+130,$y+5);
		// $this->MultiCell(25, 5, 'Position :', 1, 'L');
		
		// $this->SetXY($x+155,$y+5);
		// $this->MultiCell(50, 5, 'Employee No. :', 1, 'L');
		
		// $x=5;
		// $y=45;
		
		// $this->SetXY($x,$y+5);
		// $this->MultiCell(102.50, 5, 'Date', 1, 'C');
		
		// $this->SetXY($x+102.50,$y+5);
		// $this->MultiCell(102.50, 5, 'Schedule :', 1, 'C');

		break;
		
	case "employee_birthday_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(205.5, 5, "EMPLOYEES BIRTHDAY REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(83, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+113,$y);
		$this->MultiCell(83, 5, 'Birthday ', 1, 'C');

	break ;	
	
	case "employee_blood_type":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(205.5, 5, "EMPLOYEES BLOOD TYPE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(83, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+113,$y);
		$this->MultiCell(83, 5, 'Blood Type ', 1, 'C');

	break ;	

	case "employee_disability_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(205.5, 5, "EMPLOYEES DISABILITY REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(83, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+113,$y);
		$this->MultiCell(83, 5, 'Disability ', 1, 'C');

	break ;	
		
		case "employee_indigenous_group_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(205.5, 5, "EMPLOYEES INDEGENOUS GROUP REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(83, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+113,$y);
		$this->MultiCell(83, 5, 'Indegenous Group', 1, 'C');

	break ;	
		
		case "employee_blood_type_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(205.5, 5, "EMPLOYEES BLOOD TYPE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(83, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+113,$y);
		$this->MultiCell(83, 5, 'Blood Type ', 1, 'C');

	break ;	
	
		case "employee_with_training_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(205.5, 5, "EMPLOYEES WITH TRAINING REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(50, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+80,$y);
		$this->MultiCell(50, 5, 'Activity ', 1, 'C');
		$this->SetXY($x+130,$y);
		$this->MultiCell(36, 5, 'Provider ', 1, 'C');
		$this->SetXY($x+166,$y);
		$this->MultiCell(30, 5, 'Date ', 1, 'C');


	break ;	
	
	case "employee_with_formal_charge_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES WITH FORMAL CHARGE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(55, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+85,$y);
		$this->MultiCell(55, 5, 'Formal Charge ', 1, 'C');
		$this->SetXY($x+140,$y);
		$this->MultiCell(55, 5, 'Charge Status ', 1, 'C');
		
	break ;	
	
	case "employee_service_record_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES SERVICE YEARS REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(55, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+85,$y);
		$this->MultiCell(55, 5, 'Date Hired ', 1, 'C');
		$this->SetXY($x+140,$y);
		$this->MultiCell(55, 5, 'Service Years ', 1, 'C');
		
	break ;	
	
	case "employee_new_hired_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES NEW HIRED REPORT AS OF " .strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(45, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+45,$y);
		$this->MultiCell(75, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+120,$y);
		$this->MultiCell(75, 5, 'Date Hired ', 1, 'C');
		
	break ;	
	
	case "employee_solo_parent_privilege_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEE SOLO PARENT PRIVILEGE REPORT AS OF " .strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(45, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+45,$y);
		$this->MultiCell(75, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+120,$y);
		$this->MultiCell(75, 5, 'Date Hired ', 1, 'C');
		
	break ;	
	
	case "employee_administrative_offense_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES WITH ADMINISTRATIVE OFFENSE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(25, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+25,$y);
		$this->MultiCell(40, 10, 'Employee Name ', 1, 'C');
		$this->SetXY($x+65,$y);
		$this->MultiCell(40, 10, 'Administrative Case', 1, 'C');
		$this->SetXY($x+105,$y);
		$this->MultiCell(30, 10, 'Number of Offense', 1, 'C');
		$this->SetXY($x+135,$y);
		$this->MultiCell(30, 10, 'Sanction ', 1, 'C');
		$this->SetXY($x+165,$y);
		$this->MultiCell(30, 10, 'Date ', 1, 'C');
		
	break ;	
	
	case "employee_address_contact_number_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES ADDRESS AND CONTACT NUMBER AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(50, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+80,$y);
		$this->MultiCell(45, 5, 'City Address', 1, 'C');
		$this->SetXY($x+125,$y);
		$this->MultiCell(35, 5, 'Mobile Number', 1, 'C');
		$this->SetXY($x+160,$y);
		$this->MultiCell(35, 5, 'Telephone Number ', 1, 'C');
		
	break ;	
	
	case "employee_civil_service_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES WITH CIVIL SERVICE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(60, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+90,$y);
		$this->MultiCell(60, 5, 'Title', 1, 'C');
		$this->SetXY($x+150,$y);
		$this->MultiCell(45, 5, 'Date Passed', 1, 'C');
		// $this->SetXY($x+135,$y);
		// $this->MultiCell(30, 10, 'Sanction ', 1, 'C');
		// $this->SetXY($x+165,$y);
		// $this->MultiCell(30, 10, 'Date ', 1, 'C');
		
	break ;	
	
		case "employee_family_member_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES CHILDREN AGE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(60, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+90,$y);
		$this->MultiCell(60, 5, 'Name', 1, 'C');
		$this->SetXY($x+150,$y);
		$this->MultiCell(45, 5, 'Age', 1, 'C');
		// $this->SetXY($x+135,$y);
		// $this->MultiCell(30, 10, 'Sanction ', 1, 'C');
		// $this->SetXY($x+165,$y);
		// $this->MultiCell(30, 10, 'Date ', 1, 'C');
		
	break ;	
	
	case "employee_relative_in_government_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(7);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES WITH CONSANGUINITY AND AFFINITY RELATIONSHIP REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(50, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+80,$y);
		$this->MultiCell(50, 5, 'Name', 1, 'C');
		$this->SetXY($x+130,$y);
		$this->MultiCell(35, 5, 'Relation', 1, 'C');
		$this->SetXY($x+165,$y);
		$this->MultiCell(30, 5, 'Age ', 1, 'C');
		// $this->SetXY($x+165,$y);
		// $this->MultiCell(30, 10, 'Date ', 1, 'C');
		
	break ;	
	
	case "employee_separated_from_government_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(7);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES PREVIOUSLY SEPAREDTED FROM GOVERNMENT SERVICE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(50, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+80,$y);
		$this->MultiCell(50, 5, 'Employers Name', 1, 'C');
		$this->SetXY($x+130,$y);
		$this->MultiCell(35, 5, 'Address', 1, 'C');
		$this->SetXY($x+165,$y);
		$this->MultiCell(30, 5, 'Service Years ', 1, 'C');
		
	break ;	
	
	case "employee_ran_for_public_office_reports":
		$this->SetFont('Arial', '', 9);
		$current_x_position = 0;
		$this->SetXY($current_x_position, 5);
		$this->MultiCell(216, 5, 'Republic of the Philippines', 0, 'C');
		$this->SetX($current_x_position);
		$this->MultiCell(216, 5, 'Department of Health', 0, 'C');
		
		$this->SetFont('Arial', 'B', 10);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_NAME'), 0, 'C');
		
		$this->SetFont('Arial', '', 9);
		$this->SetX(0);
		$this->MultiCell(216, 5, Configure::read('INSTITUTION_ADDRESS'), 0, 'C');	

		$this->Image( Configure::read('INSTITUTION_LOGO'), 15 , 5 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 180 , 5 , 25 , 25 );
		
		$this->Ln(5);
		$this->SetFont('Arial','B', 10);
		
		$this->MultiCell(196, 5, "EMPLOYEES WHO RAN FOR PUBLIC OFFICE REPORT AS OF ".strtoupper(date('F Y')), 0, 'C');
		$this->SetFont('Arial','B', 8);
		
		$x=10;
		$y=40;
		$this->SetXY($x,$y);
		$this->MultiCell(30, 5, 'Employee Number ', 1, 'C');
		$this->SetXY($x+30,$y);
		$this->MultiCell(60, 5, 'Employee Name ', 1, 'C');
		$this->SetXY($x+90,$y);
		$this->MultiCell(60, 5, 'Govern Official Position', 1, 'C');
		$this->SetXY($x+150,$y);
		$this->MultiCell(45, 5, 'Election Year', 1, 'C');
		
	break ;	
	
	case "monthly_attendance_report":
	$border =0;
	$with_border = 1;
	$month = strtoupper(date("F, Y"));
	$this->SetFont('Arial', '', 10);
	$this->Cell(310, 5, "Republic of the Philippines", $border, '', 'C');
	$this->Ln(5);
	$this->Cell(310, 5, "Department of Health", $border, '', 'C');
	$this->Ln(5);
	$this->SetFont('Arial', 'B', 12);
	$this->Cell(310, 7, Configure::read('INSTITUTION_NAME'), $border, '', 'C');
	$this->Ln(7);
	$this->SetFont('Arial', '', 10);
	$this->Cell(310, 5, Configure::read('INSTITUTION_ADDRESS'), $border, '', 'C');

	$this->Image( Configure::read('INSTITUTION_LOGO'), 40 , 13 , 25 , 25 );
	$this->Image( WWW_ROOT ."/files/logo/doh.png", 280 , 15 , 25 , 25 );
		
	$this->SetFont('Arial', 'B', 12);
	$this->SetXY(0,30);
	$this->MultiCell(330, 15, 'MONTHLY ATTENDANCE REPORT', "0", 'C');
	
	$this->SetXY(290, 10);
	// $this->Image('img/doh_logo.png', null, null, 20, 20);
	
	

	$this->SetFont('Arial', '', 9);
	$header_y=45;
	
	$this->SetXy(10,$header_y);
	$this->MultiCell(20, 20, 'NO', "1", 'C');
	$this->SetXy(30,$header_y);
	$this->MultiCell(40, 20, 'EMPLOYEE', "1", 'C');
	$this->SetXy(70,$header_y);
	$this->MultiCell(95, 5, 'TOTALS', "1", 'C');
	$this->SetXy(70,$header_y+5);
	$this->MultiCell(47.5, 5, 'ABSENCES IN DAYS', "BTL", 'C');
	$this->SetXy(117.5,$header_y+5);
	$this->MultiCell(47.5, 5, 'UNDERTIME', "BTR", 'C');
	$this->SetXy(70,$header_y+10);
	$this->MultiCell(15, 10, 'Sick', "1", 'C');
	$this->SetXy(85,$header_y+10);
	$this->MultiCell(15, 10, 'Vacation', "1", 'C');
	$this->SetXy(100,$header_y+10);
	$this->MultiCell(15, 10, 'Hours', "1", 'C');
	$this->SetXy(115,$header_y+10);
	$this->MultiCell(15, 10, 'Minutes', "1", 'C');
	$this->SetXy(130,$header_y+10);
	$this->MultiCell(17, 10, 'Undertime', "1", 'C');
	$this->SetXy(147,$header_y+10);
	$this->MultiCell(18, 5, 'Day Equivalent', "1", 'C');
	// $this->SetXy(147,50);
	// $this->MultiCell(18, 5, '', "0", 'C');
	
	$this->SetXy(165,$header_y);
	$this->MultiCell(55, 20, 'DATE', "1", 'C');
	
	$this->SetXy(220,$header_y);
	$this->MultiCell(100, 5, 'TOTALS', "1", 'C');
	$this->SetXy(220,$header_y+5);
	$this->MultiCell(50, 5, 'ABSENCES IN DAYS ', "BTL", 'C');
	$this->SetXy(270,$header_y+5);
	$this->MultiCell(50, 5, 'UNDERTIME', "BTR", 'C');
	$this->SetXy(220,$header_y+10);
	$this->MultiCell(15, 10, 'Sick', "1", 'C');
	$this->SetXy(235,$header_y+10);
	$this->MultiCell(15, 10, 'Vacation', "1", 'C');
	$this->SetXy(250,$header_y+10);
	$this->MultiCell(15, 10, 'Hours', "1", 'C');
	$this->SetXy(265,$header_y+10);
	$this->MultiCell(15, 10, 'Minutes', "1", 'C');
	$this->SetXy(280,$header_y+10);
	$this->MultiCell(17, 10, 'Undertime', "1", 'C');
	$this->SetXy(297,$header_y+10);
	$this->MultiCell(23, 10, 'Remarks', "1", 'C');
	
	break ;	
	case "off_duty_reports":
	$border =0;
	$with_border = 1;
	$month = strtoupper(date("F, Y"));
		$this->SetFont('Arial', '', 10);
		$this->Cell(310, 5, "Republic of the Philippines", $border, '', 'C');
		$this->Ln(5);
		$this->Cell(310, 5, "Department of Health", $border, '', 'C');
		$this->Ln(5);
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(310, 7, Configure::read('INSTITUTION_NAME'), $border, '', 'C');
		$this->Ln(7);
		$this->SetFont('Arial', '', 10);
		$this->Cell(310, 5, Configure::read('INSTITUTION_ADDRESS'), $border, '', 'C');

		$this->Image( Configure::read('INSTITUTION_LOGO'), 40 , 13 , 25 , 25 );
		$this->Image( WWW_ROOT ."/files/logo/doh.png", 280 , 15 , 25 , 25 );
	$this->Ln(10);
	$this->SetFont('Arial', 'B', 14);
	$this->MultiCell(310, 5,"OFF DUTY SCHEDULE" ,$border, 'C');

	$this->Ln(5);
	$this->SetFont('Arial', 'B', 12);
	// $this->MultiCell(259.4, 5,"For the month of ".$off_duty_schedule_data['OffDutyScheduleReport']['Month']. " ". $off_duty_schedule_data['OffDutyScheduleReport']['year'] ,$border, 'C');


	// $this->Ln(10);
	$this->SetFont('Arial', '', 9);
	// $this->Cell(40, 5,"CLINICAL AREA                : "  . $unit['Unit']['name'],$border, '' ,'L');
	$this->SetFont('Arial', '', 9);
	$this->Cell(30, 5,"" ,$border, '' ,'L');

	// $this->Ln(5);
	$this->SetFont('Arial', '', 9);
	// $this->Cell(40, 5,"SUPERVISING OFFICER : " ,$border, '' ,'L');
	$this->SetFont('Arial', '', 9);
	$this->Cell(30, 5,"" ,$border, '' ,'L');
	$header_y = $this->getY();
	$header_y +=10;
	$this->setXY(10,$header_y);
	$this->SetFont('Arial', '', 8);
	$this->MultiCell(90, 6,"Employee Name" ,$with_border, 'C');
	// foreach($employee_schedule as $employee_schedule_data)
	
	
	$header_x = $this->getX();
	$header_x +=90;
	
	
	$d = 1;
	do {
			$this->setXY($header_x,$header_y);
			$this->SetFont('Arial', 'B', 7);
			$this->MultiCell(7, 6, $d ,$with_border, 'C');
			$header_x +=7;

		$d +=1;
	} while ($d < 32);
	
		
	break ;	
	case "bir_alpha_list":
	$border =0;
	$with_border = 1;
	$this->SetFont('Arial', 'B', 14);
	$this->setXY(10,10);
	$this->Cell(310, 10,Configure::read('INSTITUTION_NAME') ,$border, '','C');

	$this->Ln(10);
	$this->SetFont('Arial', 'B', 12);
	$this->Cell(310, 10,"ALPHALIST " .$x  ,$border, '','C');

	$this->Ln(10);
	$this->SetFont('Arial', 'B', 9);
	$this->Cell(310, 5,"Printed on: " . date("Y-m-d h:m A") ,$border, '','R');

	$header_y = $this->getY();
	$header_y +=5;
	$header_x =10;
	
	$this->setXY($header_x,$header_y);

	$this->SetFont('Arial', '', 6);
	$this->MultiCell(35,12,"Employee Name - Employee No." ,$with_border, 'C');
	
	// $header_x +=20;
	// $this->setXY($header_x,$header_y);
	// $this->MultiCell(20,12,"Employee Name" ,$with_border, 'C');

	$header_x +=35;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(25,12,"TIN No." ,$with_border, 'C');

	$header_x +=25;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(15,12,"Gross" ,$with_border, 'C');

	$header_x +=15;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(50,5,"Less Non Tax" ,$with_border, 'C');

	$header_yy = $header_y;
	$header_yy +=5;
	$this->setXY($header_x,$header_yy);
	$this->MultiCell(15,3.5,"Non Tax 13th Month" ,$with_border, 'C');

	$header_x += 15;
	$this->setXY($header_x,$header_yy);
	$this->MultiCell(20,7,"GSIS/HDMF/PHIC" ,$with_border, 'C');

	$header_x += 20;
	$this->setXY($header_x,$header_yy);	
	$this->MultiCell(15,7,"Deminimis" ,$with_border, 'C');
	
	$header_x +=15;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(30,5,"Taxable" ,$with_border, 'C');


	$this->setXY($header_x,$header_yy);
	$this->MultiCell(15,3.5,"Taxable 13th Month" ,$with_border, 'C');

	$header_x += 15;
	$this->setXY($header_x,$header_yy);	
	$this->MultiCell(15,2.3,"Other Taxable Income" ,$with_border, 'C');

	$header_x +=15;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(20,12,"Net Compensation" ,$with_border, 'C');

	$header_x +=20;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(25,6,"Personal & Additional Exemption" ,$with_border, 'C');

	$header_x +=25;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(20,6,"Net Taxable Compensation" ,$with_border, 'C');

	$header_x +=20;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(20,6,"Income Tax Due Jan-Dec" ,$with_border, 'C');


	$header_x +=20;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(25,6,"Income Tax Withheld Jan Dec" ,$with_border, 'C');

	$header_x +=25;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(25,12,"Income Tax Payable" ,$with_border, 'C');

	$header_x +=25;
	$this->setXY($header_x,$header_y);
	$this->MultiCell(25,12,"Income Tax Refund" ,$with_border, 'C');
	
	break;



	}
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        // $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function RowWithBorder($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
		if(trim($data[$i]) != '') {
			$this->MultiCell($w,5,$data[$i],0,$a);
		}
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
function RowWithBorderForOffSet($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
		if(trim($data[$i]) == 0) {
			$this->SetFont('Arial','', 9);
			if(trim($data[$i]) != '') {
				$this->MultiCell($w,5,$data[$i],0,$a);
			}
		// }else{
				// $this->SetFont('ZapfDingbats','', 9);
			// if(trim($data[$i]) != '') {
				// $this->MultiCell($w,5,$data[$i],0,$a);
			// }
		}else{
			if($data[$i] == 1){
				$this->SetFont('ZapfDingbats','', 9);
				$data_col = 4;
				$this->MultiCell($w,5,$data_col,0,$a);
			}else{
				$this->MultiCell($w,5,"",0,$a);
			}
			// $this->SetFont('ZapfDingbats','', 9);
			// if(trim($data[$i]) != '') {
				
				// $this->MultiCell($w,5,$data[$i],0,$a);
			// }
		}
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
function GetRowWithBorderHeight($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    return $h;
}

function RowWithoutBorder($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        // $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}
?>