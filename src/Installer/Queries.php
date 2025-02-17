<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации Карты SQL-запросов.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'drop'   => ['{{error_report}}'],
    'create' => [
        '{{error_report}}' => function () {
            return "CREATE TABLE `{{error_report}}` (
                `ticket` int(11) NOT NULL AUTO_INCREMENT,
                `user_id` int(11) unsigned DEFAULT NULL,
                `user_details` varchar(255) DEFAULT NULL,
                `error` text DEFAULT NULL,
                `details` text DEFAULT NULL,
                `read` tinyint(1) unsigned DEFAULT 0,
                `date` datetime DEFAULT NULL,
                PRIMARY KEY (`ticket`)
            ) ENGINE={engine} 
            DEFAULT CHARSET={charset} COLLATE {collate}";
        }
    ],

    'run' => [
        'install'   => ['drop', 'create'],
        'uninstall' => ['drop']
    ]
];