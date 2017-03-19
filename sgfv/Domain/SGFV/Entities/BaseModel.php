<?php namespace Domain\SGFV\Entities;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    // Relations

    public function createdBy()
    {
        return $this->belongsTo( User::class,'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo( User::class,'updated_by');
    }

    // Observer

    public static function boot()
    {
        parent::boot();

        static::updating(function( $model ){
            
            $model->updated_at = date('Y-m-d H:i:s');
            $model->updated_by = \Auth::user()->id;
        });
    }
}
