<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VoucherChartPayment extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->fill([
                'company_id' => 1,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        });
        static::updating(function ($model){
            $model->fill([
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
        });
    }

    public function voucher_account_chart(){
        return $this->belongsTo('App\VoucherAccountChart');
    }
}
