<?php

namespace Database\Seeders;

use App\Models\AcabadosContenido;
use App\Models\Banner;
use App\Models\Calidad;
use App\Models\Contacto;
use App\Models\Contenido;
use App\Models\Internacional;
use App\Models\Logo;
use App\Models\Metadato;
use App\Models\Nosotros;
use App\Models\Tarjeta;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios
        User::create([
            'name' => 'Pablo',
            'email' => 'pablo@osole.com',
            'password' => Hash::make('pablopablo'),
            'role' => 'admin',
        ]);


        // Crear logos para las secciones
        $logoSecciones = ['login', 'dashboard', 'footer', 'navbar', 'home'];
        foreach ($logoSecciones as $seccion) {
            Logo::create([
                'path' => "logos/{$seccion}-logo.png",
                'seccion' => $seccion,
            ]);
        }

        // Crear metadatos para las secciones
        $metadatos = [
            [
                'seccion' => 'home',
                'keyword' => 'cecconi, inicio, productos plásticos',
                'descripcion' => 'Página principal de cecconi - Empresa líder en productos plásticos de alta calidad'
            ],
            [
                'seccion' => 'nosotros',
                'keyword' => 'empresa, historia, cecconi, quienes somos',
                'descripcion' => 'Conoce más sobre cecconi, nuestra historia y compromiso con la calidad'
            ],
            [
                'seccion' => 'productos',
                'keyword' => 'productos plásticos, catálogo, cecconi',
                'descripcion' => 'Catálogo completo de productos plásticos de alta calidad de cecconi'
            ],
            [
                'seccion' => 'accesorios',
                'keyword' => 'accesorios, soluciones, cecconi',
                'descripcion' => 'Conoce los accesorios que cecconi ofrece para satisfacer tus necesidades en productos plásticos.'
            ],
            [
                'seccion' => 'novedades',
                'keyword' => 'novedades, noticias, cecconi',
                'descripcion' => 'Mantente informado sobre las últimas novedades y noticias de cecconi.'
            ],
            [
                'seccion' => 'clientes',
                'keyword' => 'clientes, testimonios, cecconi',
                'descripcion' => 'Descubre quiénes son nuestros clientes y lo que opinan sobre cecconi.'
            ],
            [
                'seccion' => 'contacto',
                'keyword' => 'contacto, ubicación, teléfono, email cecconi',
                'descripcion' => 'Información de contacto y ubicación de cecconi'
            ]
        ];
        foreach ($metadatos as $metadato) {
            Metadato::create($metadato);
        }

        // Crear datos de ejemplo para nosotros
        Nosotros::create([
            'path' => 'images/nosotros-banner.jpg',
            'titulo' => 'Sobre cecconi',
            'descripcion' => 'Somos una empresa líder en la fabricación de productos plásticos de alta calidad, comprometidos con la innovación y la excelencia.',
            'video' => 'images/nosotros-video.mp4'
        ]);
        // Crear tarjetas de ejemplo
        $tarjetas = [
            [
                'icono' => 'images/mision.png',
                'titulo' => 'Misión',
                'descripcion' => 'Nuestra misión es ofrecer productos plásticos de alta calidad que superen las expectativas de nuestros clientes.',
            ],
            [
                'icono' => 'images/vision.png',
                'titulo' => 'Visión',
                'descripcion' => 'Ser líderes en innovación y excelencia en la industria de productos plásticos.',
            ],
            [
                'icono' => 'images/calidad.png',
                'titulo' => 'Calidad',
                'descripcion' => 'Comprometidos con la mejora continua y la satisfacción total de nuestros clientes.',
            ],
        ];                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
        foreach ($tarjetas as $tarjeta) {
            Tarjeta::create($tarjeta);
        }

        // Crear contenido de ejemplo
        Contenido::create([
            'path' => 'images/contenido-home-banner.jpg',
            'titulo' => 'Bienvenidos a cecconi',
            'descripcion' => 'Tu socio confiable en soluciones plásticas de alta calidad para todas las industrias.'
        ]);
    }
}
