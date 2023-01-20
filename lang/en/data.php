<?php

return [
    'entries' => [
        'title' => 'Gestión entradas',
        'search' => 'Buscar entrada',
        'nodata' => 'Sin entradas',
        'filters'=> [
            'modo' => ['all' => 'Modo de accion (Todos)', 'auto' => 'Automática', 'man' => 'Manual'],
            'tipo' => ['all' => 'Tipo de entrada (Todos)', 'on' => 'Activacion', 'off' => 'Desactivacion'],
            'estado' => ['all' => 'Estado (Todos)','original' => 'Sin cambios', 'restored' => 'Restaurada'],
        ],
    ],

    'detections' => [
        'filters'=> [
            'modo' => ['all' => 'Modo de captura (Todos)', 'norm' => 'Normal', 'phan' => 'Phantom'],
            'instrusismo' => ['all' => 'Tipo de deteccion (Todos)','simp' => 'Simples', 'deto' => 'Detonantes'],
            'estado' => ['all' => 'Estado de la deteccion (Todos)','original' => 'Sin cambios', 'restored' => 'Restaurada'],
        ],
    ],
    'notices' => [
        'filters'=> [
            'tipo' => ['all' => 'Avisos (Todos)', 'sms' => 'SMS', 'call' => 'Llamadas'],
       ],
    ],

    'packages' => [
        'filters'=> [
            'implantado' => ['all' => 'Implantacion (Todos)', 'ok' => 'Instalados', 'ko' => 'No instalados'],
        ],
    ],

    'sensor' => [
        'literales'=> ['102' => 'MG (Puerta)',
                        '103' => 'PIR 1',
                        '104' => 'PIR 2',
                        '105' => 'PIR 3',
        ],
    ],

];
