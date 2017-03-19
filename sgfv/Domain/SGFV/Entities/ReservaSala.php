<?php namespace Domain\SGFV\Entities;

class ReservaSala extends BaseModel
{
    protected $primaryKey =  'reserva_id';

    protected $dates = ['dt_inicio', 'dt_fim'];

    //

    public function sala()
    {
        return $this->belongsTo( Sala::class, 'sala_id' );
    }
}