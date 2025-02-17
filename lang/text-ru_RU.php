<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * Пакет русской локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Отчёт об ошибке',
    '{description}' => 'Отправка отчёта об ошибке в техническую поддержку',
    '{permissions}' => [
        'any'    => ['Полный доступ', 'Отправка отчёта об ошибке в техническую поддержку'],
        'report' => ['Отправка отчёта', 'Отправка отчёта об ошибке в техническую поддержку'],
    ],

    // Report: сообщения
    'Report' => 'Отчёт',
    'Invalid parameter passed: "{0}"' => 'Неправильно передан параметр: "{0}"',
    'Unable to generate a report for technical support' => 'Невозможно сформировать отчет в техподдержку.',
    'Error report sent successfully' => 'Отчет об ошибке успешно отправлен в техподдержку.',
    'Unable to send error report' => 'Невозможно отправить отчет об ошибке в техподдержку.',
    'Error report has been successfully updated' => 'Отчет об ошибке успешно обновлен.',
    'Error report is not updated' => 'Отчет об ошибке не обновлен.',
    'Error report deleted successfully' => 'Отчет об ошибке успешно удалён.',
    'Unable to delete error report' => 'Невозможно удалить отчет об ошибке.',
    'Your error report was successfully sent to tech support under the number ticket {0}' 
        => 'Отчет о вашей ошибки успешно отправлен в техподдержку с тикетом №<strong>{0}</strong>.'
];
