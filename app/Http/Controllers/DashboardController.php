<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Teacher;
use App\Grade;
use Excel;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function teacher()
    {
        return view('dashboard.teacher');
    }

    public function criteria()
    {
        return view('dashboard.criteria');
    }

    public function grade()
    {
        $criterias = Criteria::get();
      
        return view('dashboard.grade')
          ->with('criterias', $criterias);
    }

    public function fungsiRangking(){
      // get all teachers data
        $teachers = Teacher::get();

        // bobot kriteria
        $criterias = Criteria::get();
        $sum = 0;
        foreach ($criterias as $criteria) {
          $sum = $sum + $criteria->grade;
        }

        // count weight
        $weight = [];
        // mengakses ulang bobot kriteria
        //$sum = jumlah keseluruhan bobot kriteria
        foreach ($criterias as $criteria) {
          $weight[] = $criteria->grade / $sum;
        }

        // initiate S vector as an array
        $S = array();

        foreach ($teachers as $teacher) {
          //mengambil data nilai guru berdasarkan id dr tabel teacher
          $grade = Grade::where('teacher_id', '=', $teacher->id)
          ->first();
          //pow (pangkat)
          $S_result = pow($grade->c1, $weight[0]) *
                      pow($grade->c2, $weight[1]) *
                      pow($grade->c3, $weight[2]) *
                      pow($grade->c4, $weight[3]) *
                      pow($grade->c5, $weight[4]) *
                      pow($grade->c6, $weight[5]) *
                      pow($grade->c7, $weight[6]) *
                      pow($grade->c8, $weight[7]) *
                      pow($grade->c9, $weight[8]) *
                      pow($grade->c10, $weight[9]) *
                      pow($grade->c11, $weight[10]) *
                      pow($grade->c12, $weight[11]) *
                      pow($grade->c13, $weight[12]) *
                      pow($grade->c14, $weight[13]);


          array_push($S, [$teacher->id, $teacher->nip, $teacher->nama,  $S_result]);
        }

        $V_sum = 0;
        $V = [];

        foreach ($S as $key => $value) {
          // array_push($V,$value[3]);
          $V_sum = $V_sum + $value[3];
        }

        foreach ($S as $key => $value) {
          array_push($V, [$value[0], $value[1], $value[2], $value[3]/$V_sum ]);
        }

        $size = count($V) - 1;

        // bubble sort
        for ($i = 0; $i < $size; $i++) {
          for ($j = 0; $j < $size - $i; $j++) {
            $k = $j + 1;
            if ($V[$k][3] > $V[$j][3]) {
              // swap element at indices $j, $k
              list($V[$j], $V[$k]) = array($V[$k], $V[$j]);
            }
          }
        }
        return $V;
    }

    public function ranking()
    {
      
        $V=$this->fungsiRangking();  
        return view('dashboard.ranking')
          ->with('V', $V);
    }

    public function exportRangking(Request $request) { 
      $grades =$this->fungsiRangking();
      
      Excel::create('Ranking Data Guru', function($excel) use ($grades) { 
      // Set property 
      $excel->setTitle('Rangking Data Guru');
      $excel->sheet('Rangking Data Guru', function($sheet) use ($grades) 
      { 
        $row = 1; $sheet->row($row, [ 
          'Peringkat',
          'NIP', 
          'Nama Guru', 
          'Vektor'
        ]);
        foreach ($grades as $grade) {
        $peringkat = $row;
          $sheet->row(++$row, [ 
            $peringkat,
            $grade[1], 
            $grade[2], 
            $grade[3] 
          ]);
          }
        });
      })->export('xls'); 
    }
}
