<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Project extends Model
{
    protected $fillable=[
        'NombreProyecto',
        'fuenteFondos',
        'MontoPlanificado',
        'MontoPatrocinado',
        'MontoFondosPropios'
    ];
    protected static function boot()
    {
    parent::boot();
    static::creating(function($project){
        $project->users_id = auth()->id();
    });
    }
    public function users():BelongTo
    {
    return $this->BelongTo(User::class);
    }
}
