<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dektrium\rbac;

use dektrium\rbac\components\DbManager;
use dektrium\rbac\components\ManagerInterface;
use dektrium\user\Module as UserModule;
use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * Bootstrap class registers translations and needed application components.
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Bootstrap implements BootstrapInterface
{
    /** @inheritdoc */
    public function bootstrap($app)
    {
        // register translations
        $app->get('i18n')->translations['rbac*'] = [
            'class'    => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
            
        if ($this->checkRbacModuleInstalled($app)) {
            // register auth manager
            if (!$this->checkAuthManagerConfigured($app)) {
                $app->set('authManager', [
                    'class' => DbManager::className(),
                ]);
            }

            // if dektrium/user extension is installed, copy admin list from there
            if ($this->checkUserModuleInstalled($app)) {
                $app->getModule('rbac')->admins = $app->getModule('user')->admins;
            }   
        }
    }
}