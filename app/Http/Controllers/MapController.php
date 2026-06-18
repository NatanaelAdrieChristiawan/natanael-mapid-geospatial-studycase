<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MapController extends Controller
{
    public function index(): View
    {
        $seo = [
            'title' => 'Live Map Explorer | Visualisasi Data Spasial MAPID',
            'description' => 'Peta interaktif geospatial resolusi tinggi menggunakan MapLibre GL JS, visualisasi data titik/marker, rute, dan area wilayah.',
            'keywords' => 'MapLibre GL JS, OpenStreetMap, CARTO Voyager, GIS Bandung, Visualisasi Data Spasial, MAPID',
            'url' => url('/map')
        ];

        // Data Spasial Terintegrasi (Bandung Metropolitan) - In-Memory Array
        $mapData = [
            'center' => [107.6191, -6.9175], // Pusat Kota Bandung
            'zoom' => 12.5,
            'markers' => [
                [
                    'id' => 1,
                    'lng' => 107.6191,
                    'lat' => -6.9175,
                    'title' => 'Pusat Kota Bandung (KM 0)',
                    'desc' => 'Titik koordinat historis Kota Bandung, dikelilingi bangunan bersejarah era kolonial.',
                    'category' => 'Heritage Site'
                ],
                [
                    'id' => 2,
                    'lng' => 107.6350,
                    'lat' => -6.9050,
                    'title' => 'Kawasan Kreatif Dago',
                    'desc' => 'Hub industri kreatif digital, pusat cafe, dan pengembangan riset teknologi informasi.',
                    'category' => 'Technology Hub'
                ],
                [
                    'id' => 3,
                    'lng' => 107.6080,
                    'lat' => -6.9300,
                    'title' => 'Koridor Bisnis Buah Batu',
                    'desc' => 'Pusat komersial padat di bagian selatan Bandung yang menghubungkan sentra bisnis regional.',
                    'category' => 'Commercial'
                ],
                [
                    'id' => 4,
                    'lng' => 107.5950,
                    'lat' => -6.9100,
                    'title' => 'Pusat Komersial Pasir Kaliki',
                    'desc' => 'Sentra transportasi utama dekat stasiun kereta api dan pusat gaya hidup urban.',
                    'category' => 'Transit Area'
                ],
                [
                    'id' => 5,
                    'lng' => 107.6450,
                    'lat' => -6.9400,
                    'title' => 'Kawasan Residensial Arcamanik',
                    'desc' => 'Area pengembangan hijau dengan fasilitas sarana olahraga regional berstandar tinggi.',
                    'category' => 'Residential'
                ],
            ],
            'lineString' => [
                [107.5950, -6.9100], // Pasir Kaliki
                [107.6080, -6.9300], // Buah Batu
                [107.6191, -6.9175], // KM 0
                [107.6350, -6.9050], // Dago
                [107.6450, -6.9400]  // Arcamanik
            ],
            'polygon' => [
                [107.5900, -6.9000],
                [107.6300, -6.8900],
                [107.6400, -6.9200],
                [107.6100, -6.9300],
                [107.5900, -6.9000]  //Ditutup dengan koordinat pertama
            ],
        ];

        return view('map.index', compact('seo', 'mapData'));
    }
}
