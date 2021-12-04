<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use Auth;

class Wastage extends Model
{
    protected $guarded = ['id'];

    public static function boot(){
        parent::boot();

        if(!App::runningInConsole()){
            static::creating(function($wastage){
                $currentUser = Auth::user();

                $wastage->fill([
                    'company_id' => $currentUser->company_id,
                    'created_by' => $currentUser->id,
                    'updated_by' => $currentUser->id
                ]);
            });
            
            
            static::updating(function($wastage){
                $currentUser = Auth::user();

                $wastage->fill([
                    'company_id' => $currentUser->company_id,
                    'updated_by' => $currentUser->id
                ]);
            });
        }
    }



}
