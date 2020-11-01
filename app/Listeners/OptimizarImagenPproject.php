<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class OptimizarImagenPproject implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event)
    {
        //throw new \Exception('Ocurrio un error al procesar la imagen', 1);

        /* 
            UTILIZO LA LIBREBRIA Image Invertion PARA REDUCIR EL TAMAÑO DE LA IMAGEN EN EL SERVIDOR  
            Image::make(Storage::get($project->imagen)) //OBTENGO LA IMAGEN PARA TRABAJARLA
                    ->widen(800) //REDIMEENSIONA LA IMAGEN CON EL ANCHO QUE LE PASAMOS
                    ->limitColors(255) // PODRIAMOS REDUCIR LA CANTIDAD DE COLORES DE LA IMAGEN PARA REDUCIR EL PESO, PERO YA NOTO QUE PIERDE CALIDAD
                    ->encode(); //LA VOLVEMOS A CODIFICAR
        */
        $imagen = Image::make(Storage::get($event->project->imagen))
                    ->widen(800)
                    ->encode();

        /* ACTUALIZO LA IMAGEN QUE SE ALMACENA EN EL SERVIDOR, POR LA IMAGEN OPTIMIZADA */
        Storage::put($event->project->imagen, (string) $imagen);

    }
}
