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

        $excel->sheet('Team',function($sheet){
            $cellHeader = ['序号','队名','项目名称','中期报告','最终作品',
                    '队员姓名','学校','学院','年级','身份证号码','手机','邮箱','证书邮寄地址','指导老师'];
            $sheet->appendRow($cellHeader);
            $sheet->row(1, function($row) {
                $row->setBackground('#333399');
                $row->setFontColor('#ffffff');
                $row->setFontWeight('bold');
                $row->setAlignment('center');
                $row->setValignment('center');
            });
            $sheet->setWidth(array(
                'A' => 4.13, 'B' => 13.5,  'C' => 21.13, 'D' => 11.25,
                'E' => 11.25,'F' => 10.05, 'G' => 13.75, 'H' => 13.75,
                'I' => 11,   'J' => 11.13, 'K' => 11,    'L' => 9.25,
                'M' => 12.13,'N' => 8.38
            ));
            //$sheet->setRowHeight(16.5);
            //$sheet->setBorder('A1:M1', 'thin');
            $sheet->setHeight(array(1=>45.75));
            $teams = Team::where('id','>',1)->get();
            $countLine = 1;
            $countInTeam = 0;
            foreach ($teams as $i => $team) {
                $members = $team->members;
                $teachers = $team->teachers;
                $line = array($i+1,$team->name,$team->title,'未提交','部分提交','','','','','','','',$team->addr,'');
                if($team->reportcount()){
                    $line[3]='已提交';
                }
                $doccount = $team->doccount()[7];
                if($doccount==7){
                    $line[4]='全部提交';
                }else if($doccount==0){
                    $line[4]='未提交';
                }
                
                $sheet->appendRow($line);
            }
            $sheet->setBorder('A1:M1000', 'thin');

        });

        })->export('xlsx');
    }
}