<?php


namespace app\controllers;

use app\services\CalcService;
use yii\web\Controller;
use app\models\Credits;
use app\models\Plans;
use yii\helpers\Url;

class CalcController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->request->getIsPost()) {
            if ($id = (new CalcService())->calc(\Yii::$app->request->post())) {
                $this->redirect(Url::to(['calc/show', 'id' => $id]));
            }
        }

        return $this->render('index', [
            'model' => new Credits()
        ]);
    }

    public function actionShow($id)
    {
        $plan = Plans::findAll(['credit_id' => $id]);

        return $this->render('show', [
            'plan' => $plan,
            'model' => new Credits()
        ]);
    }
}
