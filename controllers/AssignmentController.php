<?php

namespace wh\rbac\controllers;

use wh\rbac\models\Assignment;
use Yii;
use yii\web\Controller;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class AssignmentController extends Controller
{
    /**
     * Show form with auth items for user.
     * 
     * @param int $id
     */
    public function actionAssign($id)
    {
        $model = Yii::createObject([
            'class'   => Assignment::className(),
            'user_id' => $id,
        ]);
        
        if ($model->load(\Yii::$app->request->post()) && $model->updateAssignments()) {
        }

        return \dektrium\rbac\widgets\Assignments::widget([
            'model' => $model,
        ]);
        /*$model = Yii::createObject([
            'class'   => Assignment::className(),
            'user_id' => $id,
        ]);
        
        if ($model->load(Yii::$app->request->post()) && $model->updateAssignments()) {
            
        }
        
        return $this->render('assign', [
            'model' => $model,
        ]);*/
    }
}