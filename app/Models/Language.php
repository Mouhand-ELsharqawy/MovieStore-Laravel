<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'name', 'artranslateactive', 'entranslateactive', 'frtranslateactive', 'chtranslateactive', 'grtranslateactive'];

    // accessor
    public function getArtranslateactiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setArtranslateactiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['artranslateactive'] = $activeVal;
    }

    // accessor
    public function getEntranslateactiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setEntranslateactiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['entranslateactive'] = $activeVal;
    }
    // accessor
    public function getFrtranslateactiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setFrtranslateactiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['frtranslateactive'] = $activeVal;
    }

    // accessor
    public function getChtranslateactiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setChtranslateactiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['chtranslateactive'] = $activeVal;
    }

    // accessor
    public function getGrtranslateactiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setGrtranslateactiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['grtranslateactive'] = $activeVal;
    }

    

    public function film(){
        $this->hasMany(Film::class);
    }
}
