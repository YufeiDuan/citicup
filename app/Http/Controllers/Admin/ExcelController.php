<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use App\Team;
use App\Document;
use App\Member;
use App\Teacher;
use App\Report;
use App\Univ;

class ExcelController extends Controller
{
    public function exportTeam(){

        Excel::create('Team_'.date('YmdHis',time()), function($excel) {

        // Set the title
        $excel->setTitle('CitiCup 2016 Team Information');

        // Chain the setters
        $excel->setCreator('Fay')
              ->setManager('Fay')
              ->setSubject('Citicup 2016')
              ->setCompany('CitiCup|XJTU 2016');

        // Call them separately
        //$excel->setDescription('A demonstration to change the file properties');

        $excel->sheet('Team', function($sheet){
            $teams = Team::where('id','>',1)->get();
            $sheet->setHeight(array(1=>40));
            $sheet->loadView('excel.team')->with(["teams" => $teams]);
            $sheet->setWidth(array(
                'A' => 5, 'B' => 13,  'C' => 21, 'D' => 10,
                'E' => 10,'F' => 11, 'G'=>5, 'H' => 13.75, 
                'I' => 20,'J' => 5,    'K' => 20, 'L' => 15,
                'M' => 20,'N' => 15,'O' => 10
            ));
        });    
        $lastrow= $excel->getActiveSheet()->getHighestRow();    
        $excel->getActiveSheet()->getStyle('A1:O'.$lastrow)->getAlignment()->setWrapText(true); 
        $height = array();
        for($i=2;$i<=$lastrow;$i++){
            $height = array_add($height, $i, 20);
        }
        $excel->getActiveSheet()->setHeight($height);

        $excel->getActiveSheet()->setBorder('A1:O'.$lastrow, 'thin');
        $excel->export('xlsx');
        });
    }
}