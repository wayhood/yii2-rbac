<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\rbac;

use Yii;
use yii\base\BootstrapInterface;

/**
 * Class Module
 * @package wh\rbac
 * @author Song Yeung <netyum@163.com>
 * @date 12/20/14
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public function bootstrap($app)
    {
        /*if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                $this->id => $this->id . '/default/index',
                $this->id . '/<id:\w+>' => $this->id . '/default/view',
                $this->id . '/<controller:[\w\-]+>/<action:[\w\-]+>' => $this->id . '/<controller>/<action>',
            ], false);
        } elseif ($app instanceof \yii\console\Application) {
            $app->controllerMap[$this->id] = [
                'class' => 'wh\asynctask\console\AsyncTaskController',
                'module' => $this,
            ];
        }*/
    }
}
