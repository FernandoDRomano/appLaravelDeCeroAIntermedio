<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{

    use SoftDeletes;

    /* 
        SI EL NOMBRE DE LA TABLA DE LA BD NO COINCIDE CON LA CONVENCIÓN DE LARAVEL, PODEMOS INDICARLE CON QUE 
        TABLA DEBE TRABAJAR 

            protected $table = 'tablaDeLaBD';
    */

    /* PARA EVITAR LA ASIGNACIÓN MASIVA DEBO UTILIZAR LA PROPIEDAD fillable ASIGNANDOLE LOS CAMPOS QUE SI SE PODRAN
        INSERTAR DE MANERA MASIVA 
    */

    protected $fillable = ['nombre', 'descripcion', 'slug', 'created_at', 'updated_at', 'category_id'];

    public function crearSlug(){
        $this->slug = strtolower(str_replace([' ', '#'], '-', $this->nombre));
    }

    /* 
        RELACIONES ENTRE MODELOS
    */
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    /* 
        EL METODO getRouteKeyName() LO SOBRE ESCRIBO PARA QUE ME DEVUELVE LA RUTA CON EL slug DEL PROYECTO 
        EN VEZ DEL ID, DE ESTA MANERA BUSCARA EL PROYECTO POR EL slug EN VEZ DEL id
    */
    public function getRouteKeyName(){
        return 'slug';
    }
}
