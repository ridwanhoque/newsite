<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class SaleQuotation extends Model
{
    protected $guarded = ['id'];

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $currentUser = Auth::user();

            $model->fill([
                'company_id' => $currentUser->company_id,
                'created_by' => $currentUser->id,
                'updated_by' => $currentUser->id
            ]);

        });

        static::updating(function($model){
            $currentUser = Auth::user();

            $model->fill([
                'company_id' => $currentUser->company_id,
                'updated_by' => $currentUser->id
            ]);
        });
    }


    public function scopeSaleQuotations($q){
        $currentUser = Auth::user();
        return $q->where('company_id', $currentUser->company_id);
    }

    public function party(){
        return $this->belongsTo('App\Party');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function sale_quotation_details(){
        return $this->hasMany('App\SaleQuotationDetail');
    }

}
