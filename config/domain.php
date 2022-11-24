<?php

return [
    [
        'domains'=> ['demo.hyperlocal.kl-youniverse.com', 'demo.local.newshub.id', 'cnergy-fe.test', 'localhost', 'english-mm.kl-youniverse.com'],
        'token'=> env('NEWSHUB_TOKEN', ''),
        'namespace'=> 'DefaultSite'
    ],
    [
        'domains' => ['www.trstd.ly', 'trstd.ly', 'www.staging.trstd.ly', 'staging.trstd.ly', 'trstdly.com', 'www.trstdly.com', 'staging.trstdly.com', 'www.staging.trstdly.com'],
        'token' => env('NEWSHUB_TOKEN_TRSTDLY', ''),
        'namespace' => 'DefaultSite'
    ]
];
