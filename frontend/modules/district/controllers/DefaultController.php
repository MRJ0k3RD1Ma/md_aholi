<?php

namespace frontend\modules\district\controllers;

use ChrisKonnertz\StringCalc\StringCalc;
use common\models\Codes;
use common\models\MahallaView;
use common\models\Stat;
use common\models\ViewStat;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

/**
 * Default controller for the `village` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        $model = MahallaView::find()->where('id like "%'.Yii::$app->user->identity->soato_id.'%"')->all();

        return $this->render('index',['model'=>$model]);
    }

    public function actionList($soato,$code = 10)
    {
        if($code != null){
            $codes = Codes::find()->where('code like "'.$code.'%"')->all();
        }else{
            $codes = Codes::find()->all();
        }
        foreach ($codes as $item){
            if(!($stat = Stat::findOne(['soato_id'=>$soato,'code'=>$item->code]))){
                $stat = new Stat();
                $stat->code = $item->code;
                $stat->soato_id = $soato;
                $stat->save();
            }
        }
        $model = ViewStat::find()->where(['soato_id'=>$soato])->andWhere('code like "'.$code.'%"')->orderBy(['code'=>SORT_ASC])->all();

        return $this->render('list',[
            'model'=>$model,
            'soato_id'=>$soato
        ]);
    }

    public function actionSlugg(){
        $model = MahallaView::find()->where('id like "%'.Yii::$app->user->identity->soato_id.'%"')->all();

        return $this->render('slugg',['model'=>$model]);
    }
    public function actionViewslugg(){
        $model = MahallaView::find()->where('id like "%'.Yii::$app->user->identity->soato_id.'%"')->all();

        return $this->render('slugg',['model'=>$model]);
    }
}
