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
        'literales'=> [
            '113' => 'AVISO ALARMA MOVIMIENTO DETECTADO EN PORCHE',
            '114' => 'AVISO ALARMA MOVIMIENTO DETECTADO EN COCHERA',
            '115' => 'AVISO ALARMA MOVIMIENTO DETECTADO EN ALAMCEN',
            '116' => 'AVISO ALARMA PUERTA COCHERA ABIERTA',
            '117' => 'ALARMA REACTIVADA CON EXITO',
            '118' => 'MOVIMIENTO DETECTADO Y SABOTAJE EN LA ALIMENTACION',
            '119' => 'FALLO EN LA ALIMENTACION PRINCIPAL',
            '120' => 'BATERIA DE EMERGENCIA DESACTIVADA'
        ],
        'tlf' => [
            '0' => '+34******038',
            '1' => '+34******389',
            '2' => '+34******032',
        ],
    ],

    'packages' => [
        'filters'=> [
            'implantado' => ['all' => 'Implantacion (Todos)', 'ok' => 'Instalados', 'ko' => 'No instalados'],
            'contenido' => ['all' => 'Contenido (Todos)', 'full' => 'Paquetes con contenido', 'empty' => 'Paquetes vacios'],
        ],
    ],

    'sensor' => [
        'literales'=> [ '102' => 'MG (Puerta)',
                        '103' => 'PIR 1',
                        '104' => 'PIR 2',
                        '105' => 'PIR 3',
        ],
    ],

    'logs' => [
      'literales' => [
          '121' => 'ALARMA INICIADA',
          '122' => 'INTENTOS SMS DIARIOS RECUPERADOS',
          '123' => 'SENSOR DE PUERTA DESCONECTADO',
          '124' => 'BATERIA DE EMERGENCIA ACTIVADA',
          '125' => 'BATERIA DE EMERGENCIA DESACTIVADA',
          '126' => 'INTENTOS SMS REALIZADOS:',
          '127' => 'INTENTOS SMS DIARIOS ACABADOS',
          '128' => 'ALARMA ESTABLECIDA EN MODO DEFAULT',
          '129' => 'ALARMA ESTABLECIDA EN MODO PRUEBA',
          '130' => 'LLAMANDO A MOVIL',
          '131' => 'RESET AUTOMATICO',
          '132' => 'RESET MANUAL',
          '133' => 'FALLO EN ALIMENTACION',
          '134' => 'FALLO EN SENSOR'
      ],
    ],

    'applogs' => [
        'filters'=> [
            'tipo' => ['all' => 'Tipo (Todos)', 'api' => 'Api request', 'alarm' => 'Job alarmado'],
            'err' => ['all' => 'Error (Todos)', 'ok' => 'Registros OK', 'err' => 'Registros de error'],
        ],
    ],


];
