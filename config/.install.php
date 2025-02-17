<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации установки модуля.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'use'         => BACKEND,
    'id'          => 'gm.be.error_report',
    'name'        => 'Error report',
    'description' => 'Send error report to technical support',
    'namespace'   => 'Gm\Backend\ErrorReport',
    'path'        => '/gm/gm.be.error_report',
    'route'       => 'reporting',
    'routes'      => [
        [
            'type'    => 'crudSegments',
            'options' => [
                'module' => 'gm.be.error_report',
                'route'  => 'reporting',
                'prefix' => BACKEND
            ]
        ]
    ],
    'locales'     => ['ru_RU', 'en_GB'],
    'permissions' => ['any', 'settings', 'info'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM MS'],
        ['app', 'code' => 'GM CMS'],
        ['app', 'code' => 'GM CRM'],
    ]
];
