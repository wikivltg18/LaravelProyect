<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Sitemap;

class GenerateSiteMap extends Command
{
    /**
     * El nombre y la firma del comando de consola.
     * Se usa para ejecutarlo desde Artisan: php artisan sitemap:generate
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * Descripción del comando.
     * Aparece cuando ejecutas php artisan list
     * @var string
     */
    protected $description = 'Generate SiteMap';

    /**
     * Método principal que se ejecuta al correr el comando.
     * Genera automáticamente el archivo sitemap.xml en la carpeta public
     * usando la URL base del archivo .env (config('app.url')).
     */
    public function handle()
    {

        SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    }
}
