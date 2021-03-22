<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $fillable = [
        'code','titre','semester','formation_id'
    ];


    public function __toString(){
        return ( $this->id ) ? $this->titre : "";
    }

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('module_edit',$this->id).'" target="_blank">'.$this->__toString().'</a>' : "";
    }

    //-------------------------

    public function formation(){
        return $this->belongsTo('App\Formation');
    }

    public function getcode(){
    	return $this->code;
    }
    public function gettitre(){
    	return $this->titre;
    }
    public function getsemester(){
        return $this->semester ? semesters($this->semester) : '';
    }
    public function getformation_id(){
        return $this->formation;
    }
    public function getfull(){
        return $this->formation ? $this->formation->code . " - " . $this->titre : '';
    }
}