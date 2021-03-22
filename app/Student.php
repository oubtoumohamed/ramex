<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'cne','num_ins','cin','nom_fr','prenom_fr','nom_ar','prenom_ar','statut','date_de_naissance','lieu_naissance_fr','lieu_naissance_ar','sexe','serie_bac','annee_bac','mention_bac','licence','annee_licence','code_diplome','annee_ins',
    ];


    public function __toString(){
        return ( $this->id ) ? $this->nom_ar .' '. $this->prenom_ar : "";
    }

    public function __toHtml(){
        return ( $this->id ) ? '<a href="'.route('student_edit',$this->id).'" target="_blank">'.$this->__toString().'</a>' : "";
    }

    public function student_formations(){
        return $this->hasMany('App\Student_formation');
    }

    public function formations(){
        return $this->belongsToMany('App\Formation','student_formations');
    }

    public function formation__s(){
        return $this->formations()->orderBy('year','desc')->take(1);
    }

    public function formation(){
        return $this->formation__s->first();
    }

    /*--*/

    public function modules_ids(){
        $ids = [];

        if( $this->formation() ){
            foreach( Module::where('formation_id', $this->formation()->id)->get() as $mdl ){
                $ids[$mdl->id] = $mdl->id;
            }
        }

        foreach( $this->modules as $mdle ){
            $ids[$mdle->id] = $mdle->id;
        }

        return $ids;
    }
        
    public function student_modules(){
        return $this->hasMany('App\Student_module');
    }

    public function modules(){
        return $this->belongsToMany('App\Module','student_modules');
    }



    //-------------------------
    

	public function getcne(){
		return $this->cne;
	}
	public function getnum_ins(){
		return $this->num_ins;
	}
	public function getcin(){
		return $this->cin;
	}
	public function getnom_fr(){
		return $this->nom_fr;
	}
	public function getprenom_fr(){
		return $this->prenom_fr;
	}
	public function getnom_ar(){
		return $this->nom_ar;
	}
	public function getprenom_ar(){
		return $this->prenom_ar;
	}
	public function getstatut(){
		return $this->statut;
	}
	public function getdate_de_naissance(){
		return $this->date_de_naissance;
	}
	public function getlieu_naissance_fr(){
		return $this->lieu_naissance_fr;
	}
	public function getlieu_naissance_ar(){
		return $this->lieu_naissance_ar;
	}
	public function getsexe(){
		return $this->sexe;
	}
	public function getserie_bac(){
		return $this->serie_bac;
	}
	public function getannee_bac(){
		return $this->annee_bac;
	}
	public function getmention_bac(){
		return $this->mention_bac;
	}
	public function getlicence(){
		return $this->licence;
	}
	public function getannee_licence(){
		return $this->annee_licence;
	}
	public function getcode_diplome(){
		return $this->code_diplome;
	}
	public function getannee_ins(){
		return $this->annee_ins;
	}

}