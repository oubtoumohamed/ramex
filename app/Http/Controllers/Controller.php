<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Formation;
use App\Module;
use App\Student;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    /*============================================*/

    public function regions(){

    	$regions = Formation::all();
    	return $regions;
    }

    public function villes(Request $rqst){

    	$region = $rqst->param_region;
    	$semester = $rqst->param_semester;
    	$semester_1 = $rqst->param_semester_start;
    	$semester_2 = $rqst->param_semester_end;

    	$villes = Module::where('formation_id', $region)->whereBetween('semester', [ $semester_1 , $semester_2 ])->get();

    	/*$villes = Module::where([
    		['formation_id', $region],
    		['semester', $semester]
    	])->get();*/

    	return $villes;
    }


    /*-----------------------------*/


    public function students(){
    	$students = Student::all();
    	return $students;
    }






}
