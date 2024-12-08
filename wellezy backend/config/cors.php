<?php
return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],  // Esto debe ser un array
    'allowed_origins' => ['http://localhost:3000'],  // Asegúrate de que esto sea un array, especialmente si usas React en localhost:3000
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
