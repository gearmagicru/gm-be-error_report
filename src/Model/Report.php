<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\ErrorReport\Model;

use Gm;
use Gm\Panel\Data\Model\FormModel;

/**
 * Модель данных отчёта ошибок.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\ErrorReport\Model
 * @since 1.0
 */
class Report extends FormModel
{
    /**
     * {@inheritdoc}
     */
    public function getDataManagerConfig(): array
    {
        return [
            'useAudit'   => false,
            'tableName'  => '{{error_report}}',
            'primaryKey' => 'ticket',
            'fields'     => [
                ['ticket'],
                [ // ошибка
                    'error',
                    'label' => 'Error'
                ],
                [ // детали
                    'details',
                    'label' => 'Details'
                ],
                [ // прочитано
                    'read',
                    'label' => 'Read'
                ],
                [ // пользователь
                    'user_id',
                    'alias' => 'userId'
                ],
                [ // информация о пользователе
                    'user_details',
                    'alias' => 'userDetails',
                    'label' => 'User details'
                ]
            ],
            // правила форматирования полей
            'formatterRules' => [
                [['error', 'details'], 'safe']
            ],
            // правила валидации полей
            'validationRules' => [
                [['error'], 'notEmpty']
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this
            ->on(self::EVENT_BEFORE_SAVE, function ($isInsert) {
                if ($isInsert) {
                    $this->date   = gmdate('Y-m-d H:i:s');
                    $this->userId = Gm::userIdentity()->getId();
                }
            })
            ->on(self::EVENT_AFTER_SAVE, function ($isInsert, $columns, $result, $message) {
                if ($isInsert) {
                    if ($result)
                        $message['message'] = $this->module->t(
                            'Your error report was successfully sent to tech support under the number ticket {0}', 
                            [$result]
                        );
                }
                // всплывающие сообщение
                $this->response()
                    ->meta
                        ->cmdPopupMsg(
                            $message['message'], $message['title'], $message['type'], 
                            $this->module->getAssetsUrl() . '/images/icon-report.svg'
                        );
            });
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionMessages(): array
    {
        return [
            'titleAdd'           => $this->t('Report'),
            'titleUpdate'        => $this->t('Report'),
            'titleDelete'        => $this->t('Report'),
            'msgSuccessAdd'      => $this->t('Error report sent successfully'),
            'msgUnsuccessAdd'    => $this->t('Unable to send error report'),
            'msgSuccessUpdate'   => $this->t('Error report has been successfully updated'),
            'msgUnsuccessUpdate' => $this->t('Error report is not updated'),
            'msgSuccessDelete'   => $this->t('Error report deleted successfully'),
            'msgUnsuccessDelete' => $this->t('Unable to delete error report'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    /*public function afterValidate(bool $isValid): bool
    {
        if ($isValid) {
            $report = Gm::$app->report;
            $data = $report->decrypt($this->report);
            if ($data === false) {
                $this->addError($this->t('Unable to generate a report for technical support'));
                return false;
            }
            $this->attributes = $report->bindLogParams($data);
        }
        return $isValid;
    }*/
}
