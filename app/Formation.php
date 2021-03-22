<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    //
    protected $fillable = [
        'code','titre','langue','intitule_fr','intitule_ar',
    ];


    public function __toString(){
        return ( $this->id ) ? ( $this->titre ? : $this->intitule_ar ) : "";
    }

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('formation_edit',$this->id).'" target="_blank">'.$this->__toString().'</a>' : "";
    }

    //-------------------------

    public function getcode(){
    	return $this->code;
    }
    public function gettitre(){
    	return $this->titre;
    }
    public function getlangue(){
    	return $this->langue;
    }
    public function getintitule_fr(){
    	return $this->intitule_fr;
    }
	public function getintitule_ar(){
		return $this->intitule_ar;
	}

}