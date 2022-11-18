<?php

return [
    'Default' => [
        'route' => ':controller/:action',
    ],
    [
        'route' => '/',
        'defaults' => ['controller' => 'index', 'action' => 'view'],
    ],

];