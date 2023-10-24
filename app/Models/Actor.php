<?php

namespace App\Models;

use App\Models\Scopes\ActorActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'firstname', 'lastname', 'agentname', 'actorphonenumber', 'actortelephone', 'gmail', 'active'];

    // accessor
    public function getActiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setActiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['active'] = $activeVal;
    }

    protected static function booted()
    {
        static::addGlobalScope(new ActorActiveScope);
    }

    public function filmactor(){
        $this->hasMany(FilmActor::class);
    }
}
