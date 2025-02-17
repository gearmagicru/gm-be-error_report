<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\ErrorReport\Controller;

use Gm;
use Gm\Panel\Http\Response;
use Gm\Panel\Controller\BaseController;

/**
 * Контроллер формирования отчёта.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\ErrorReport\Controller
 * @since 1.0
 */
class Error extends BaseController
{
    /**
     * {@inheritdoc}
     */
    protected string $defaultModel = 'Report';

    /**
     * Действие "index" возвращает сообщение.
     * 
     * @return Response
     */
    public function indexAction(): Response
    {
        /** @var Response $response */
        $response = $this->getResponse();
        /** @var \Gm\Http\Request $request */
        $request  = Gm::$app->request;

        /** @var \Gm\Panel\Data\Model\FormModel $model модель данных */
        $model = $this->getModel($this->defaultModel);
        if ($model === false) {
            $response
                ->meta->error(Gm::t('app', 'Could not defined data model "{0}"', [$this->defaultModel]));
            return $response;
        }
        // загрузка атрибутов в модель из запроса
        if (!$model->load($request->getPost())) {
            $response
                ->meta->error(Gm::t(BACKEND, 'No data to perform action'));
            return $response;
        }
        // валидация атрибутов модели
        if (!$model->validate()) {
            $response
                ->meta->error(Gm::t(BACKEND, 'Error filling out form fields: {0}', [$model->getError()]));
            return $response;
        }
        // сохранение атрибутов модели
        if (!$model->save()) {
            $response
                ->meta->error(Gm::t(BACKEND, 'Could not save data'));
            return $response;
        }
        return $response;
    }
}
