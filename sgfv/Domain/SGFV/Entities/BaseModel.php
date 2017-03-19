<?php namespace Domain\SGFV\Entities;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function createdBy()
    {
        return $this->belongsTo( User::class,'created_by');
    }
}
