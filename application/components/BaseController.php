<?php

namespace app\components;

use yii\web\Controller;

class BaseController extends Controller {

    public function init() {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}
