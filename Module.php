<?php

namespace wh\rbac;

use Yii;
use yii\base\Module as BaseModule;
use yii\filters\AccessControl;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Module extends BaseModule
{
    /** @var bool Whether to show flash messages */
    public $enableFlashMessages = true;

    /** @var string */
    public $defaultRoute = 'role/index';
    
    /** @var array */
    public $admins = [];
    
    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return in_array(Yii::$app->user->identity->username, $this->admins);
                        },
                    ]
                ],
            ],
        ];
    }
}