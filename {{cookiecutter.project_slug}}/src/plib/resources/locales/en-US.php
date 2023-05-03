<?php
// Copyright 1999-{{ year }}. Plesk International GmbH. All rights reserved.

declare(strict_types=1);

return [
    'app' => [
        'index' => [
            'title' => {{cookiecutter.extension_name|title|json_encode}},
        ],
    ]
];