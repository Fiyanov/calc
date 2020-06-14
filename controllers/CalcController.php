<?php


namespace app\controllers;

use app\services\CalcService;
use yii\web\Controller;
use app\models\Credits;
use app\models\Plans;

class CalcController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->request->getIsPost()) {
            $p = (new CalcService())->calc(\Yii::$app->request->post());
        }

        return $this->render('index', [
            'model' => new Credits()
        ]);
    }
}
