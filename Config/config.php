<?php

return [
    'name' => '4Linux - Mail',
    'description' => 'Habilita suporte para integrações específicas para envio de e-mails.',
    'version' => '0.1.0',
    'author' => '4linux',
    'services' => [
        'events' => [
            'mautic.4linuxmail.events.bara' => [
                'class' => 'MauticPlugin\Mautic4LinuxMailBundle\EventListener\FaleConoscoSubscriber',
            ],
        ],
    ],
];
