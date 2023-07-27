<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf as Dompdf;

class Extra extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Testi_model');
        $this->load->model('Lembaga_model');
        $this->load->model('Laporan_model');
        $this->load->model('Aspirasi_model');
        $this->load->helper(array('url','download'));	
    }

    public function exportTesti(){
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $style_col = [
        'font' => ['bold' => true], 
        'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 
          'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
        ],
        'borders' => [
          'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
          'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
          'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
          'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
        ]
      ];

      $style_row = [
        'alignment' => [
          'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
        ],
        'borders' => [
          'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
          'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
          'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
          'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
        ]
      ];
      $sheet->setCellValue('A1', "REPORT OF SERVICE RATING"); 
      $sheet->mergeCells('A1:F1'); 
      $sheet->getStyle('A1')->getFont()->setBold(true); 

      $sheet->setCellValue('A3', "No"); 
      $sheet->setCellValue('B3', "Name"); 
      $sheet->setCellValue('C3', "School"); 
      $sheet->setCellValue('D3', "Rate");
      $sheet->setCellValue('E3', "Message"); 
      $sheet->setCellValue('F3', "Created At"); 

      $sheet->getStyle('A3')->applyFromArray($style_col);
      $sheet->getStyle('B3')->applyFromArray($style_col);
      $sheet->getStyle('C3')->applyFromArray($style_col);
      $sheet->getStyle('D3')->applyFromArray($style_col);
      $sheet->getStyle('E3')->applyFromArray($style_col);
      $sheet->getStyle('F3')->applyFromArray($style_col);
     
      $testi = $this->Testi_model->getAllExcel();
      $no = 1; 
      $numrow = 4; 
      foreach($testi as $data){ 
        $sheet->setCellValue('A'.$numrow, $no);
        $sheet->setCellValue('B'.$numrow, $data->nama);
        $sheet->setCellValue('C'.$numrow, $data->lembaga);
        $sheet->setCellValue('D'.$numrow, $data->star.' out of 5');
        $sheet->setCellValue('E'.$numrow, $data->pesan);
        $sheet->setCellValue('F'.$numrow, $data->created_at);
        

        $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
        $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
        $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
        $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
        $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
        $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
        
        $no++; 
        $numrow++; 
      }

      $sheet->getColumnDimension('A')->setWidth(5); 
      $sheet->getColumnDimension('B')->setWidth(15); 
      $sheet->getColumnDimension('C')->setWidth(25); 
      $sheet->getColumnDimension('D')->setWidth(20); 
      $sheet->getColumnDimension('E')->setWidth(30); 
      $sheet->getColumnDimension('F')->setWidth(35); 

      $sheet->getDefaultRowDimension()->setRowHeight(-1);

      $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
      $sheet->setTitle("Report of Service Rating");

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="report of service rating.xlsx"'); 
      header('Cache-Control: max-age=0');
      $writer = new Xlsx($spreadsheet);
      $writer->save('php://output');
    }
  
    public function getTemplate(){
      force_download('./assets/addschool.xlsx',NULL);
    }
    
    public function loadfile()
    {
      $upload_file=$_FILES['myFile']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['myFile']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$nama=$sheetdata[$i][0];
				$alamat=$sheetdata[$i][1];
				$provinsi=$sheetdata[$i][2];
        $nohp=$sheetdata[$i][3];
        $status=$sheetdata[$i][4];
				$data[]=array(
					'nama'=>$nama,
					'alamat'=>$alamat,
					'provinsi'=>$provinsi,
          'nohp'=>$nohp,
          'status'=>$status,
				);
			}
			$inserdata=$this->Lembaga_model->insert_batch($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message', '<script type="text/javascript">swal("Good job!", "Success!", "success");</script>');
				redirect('Console/school');
			} else {
        $this->session->set_flashdata('message', '<script type="text/javascript">swal("Cannot add the data!", "Error!", "error");</script>');
				redirect('Console/school');
			}
		}
  }
  public function report($id)
  {
      $dompdf = new Dompdf(array('enable_remote' => true));
      $this->data['laporan'] =  $this->Laporan_model->getAllReport($id);
      $dompdf->setPaper('A4', 'Potrait');
      $html = $this->load->view('console/reportpdf', $this->data, true);
      $dompdf->load_html($html);
      $dompdf->render();
      ob_end_clean();
      $dompdf->stream('Report', array("Attachment" => false));
  }
  public function aspirasi($id)
  {
      $dompdf = new Dompdf(array('enable_remote' => true));
      $this->data['aspirasi'] =  $this->Aspirasi_model->getAllReport($id);
      $this->data['domain'] = $_SERVER['HTTP_HOST'];
      $dompdf->setPaper('A4', 'Potrait');
      $html = $this->load->view('console/aspirasipdf', $this->data, true);
      $dompdf->load_html($html);
      $dompdf->render();
      ob_end_clean();
      $dompdf->stream('Aspirastion', array("Attachment" => false));
  }

  public function exportAspirasi(){
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true], 
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
      ],
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
      ]
    ];

    $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
      ],
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
      ]
    ];
    $sheet->setCellValue('A1', "REPORT OF SERVICE RATING"); 
    $sheet->mergeCells('A1:F1'); 
    $sheet->getStyle('A1')->getFont()->setBold(true); 

    $sheet->setCellValue('A3', "Aspiration Report"); 
    $sheet->setCellValue('B3', "Name"); 
    $sheet->setCellValue('C3', "School"); 
    $sheet->setCellValue('D3', "Title");
    $sheet->setCellValue('E3', "Content"); 
    $sheet->setCellValue('F3', "Reporting Date"); 

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
   
    $testi = $this->Aspirasi_model->getAllExcel();
    $no = 1; 
    $numrow = 4; 
    foreach($testi as $data){ 
      $sheet->setCellValue('A'.$numrow, $data->no_aspirasi);
      $sheet->setCellValue('B'.$numrow, $data->nama);
      $sheet->setCellValue('C'.$numrow, $data->lembaga);
      $sheet->setCellValue('D'.$numrow, $data->judul);
      $sheet->setCellValue('E'.$numrow, $data->isi);
      $sheet->setCellValue('F'.$numrow, $data->created_at);
      

      $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
      
      $no++; 
      $numrow++; 
    }

    $sheet->getColumnDimension('A')->setWidth(25); 
    $sheet->getColumnDimension('B')->setWidth(15); 
    $sheet->getColumnDimension('C')->setWidth(25); 
    $sheet->getColumnDimension('D')->setWidth(20); 
    $sheet->getColumnDimension('E')->setWidth(30); 
    $sheet->getColumnDimension('F')->setWidth(35); 

    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->setTitle("Report of Aspiration");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Report of Aspiration.xlsx"'); 
    header('Cache-Control: max-age=0');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  public function exportReport(){
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true], 
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
      ],
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
      ]
    ];

    $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER 
      ],
      'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] 
      ]
    ];
    $sheet->setCellValue('A1', "REPORT OF SERVICE RATING"); 
    $sheet->mergeCells('A1:F1'); 
    $sheet->getStyle('A1')->getFont()->setBold(true); 

    $sheet->setCellValue('A3', "Case Report"); 
    $sheet->setCellValue('B3', "Reporting Date"); 
    $sheet->setCellValue('C3', "Incident Date"); 
    $sheet->setCellValue('D3', "Name");
    $sheet->setCellValue('E3', "School"); 
    $sheet->setCellValue('F3', "Category"); 
    $sheet->setCellValue('G3', "Title"); 
    $sheet->setCellValue('H3', "Content");
    $sheet->setCellValue('I3', "Message");
    $sheet->setCellValue('J3', "Status");

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
    $sheet->getStyle('G3')->applyFromArray($style_col);
    $sheet->getStyle('H3')->applyFromArray($style_col);
    $sheet->getStyle('I3')->applyFromArray($style_col);
    $sheet->getStyle('J3')->applyFromArray($style_col);
   
    $testi = $this->Laporan_model->getAllExcel();
    $no = 1; 
    $numrow = 4; 
    foreach($testi as $data){ 
      $sheet->setCellValue('A'.$numrow, $data->no_laporan);
      $sheet->setCellValue('B'.$numrow, $data->created_at);
      $sheet->setCellValue('C'.$numrow, $data->tanggal);
      $sheet->setCellValue('D'.$numrow, $data->nama);
      $sheet->setCellValue('E'.$numrow, $data->lembaga);
      $sheet->setCellValue('F'.$numrow, $data->kategori);
      $sheet->setCellValue('G'.$numrow, $data->judul);
      $sheet->setCellValue('H'.$numrow, $data->isi);
      $sheet->setCellValue('I'.$numrow, $data->pesan);
      $sheet->setCellValue('J'.$numrow, $data->status);


      $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);

      $no++; 
      $numrow++; 
    }

    $sheet->getColumnDimension('A')->setWidth(25); 
    $sheet->getColumnDimension('B')->setWidth(15); 
    $sheet->getColumnDimension('C')->setWidth(25); 
    $sheet->getColumnDimension('D')->setWidth(20); 
    $sheet->getColumnDimension('E')->setWidth(30); 
    $sheet->getColumnDimension('F')->setWidth(10);
    $sheet->getColumnDimension('G')->setWidth(35);
    $sheet->getColumnDimension('H')->setWidth(35);
    $sheet->getColumnDimension('I')->setWidth(35);
    $sheet->getColumnDimension('J')->setWidth(35);

    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->setTitle("Report");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Report.xlsx"'); 
    header('Cache-Control: max-age=0');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

}
            

    


