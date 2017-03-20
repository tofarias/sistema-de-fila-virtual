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

    // Observers

    public static function boot()
    {
        parent::boot();

        static::saving(function( $model ){
            
            $model->created_at = date('Y-m-d H:i:s');
            $model->created_by = \Auth::user()->id;

            $total = self::where(function($query) use ($model) {
                            $query->where('dt_fim', '>=', $model->dt_inicio)
                                  ->where('dt_fim', '<=', $model->dt_fim);
                        })->where( 'sala_id', '=', $model->sala_id)
                          ->orWhere(function( $query ) use($model){
                              $query->where('created_by', '=', $model->created_by)
                                    ->where('sala_id', '!=', $model->sala_id);
                          })
                          ->count();

            if( $total > 0 )
            {
                throw new \DomainException('Já existe reserva para este horário');
            }
        });
    }
}