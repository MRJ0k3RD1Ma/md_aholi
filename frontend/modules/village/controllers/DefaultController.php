<?php

namespace frontend\modules\village\controllers;

use ChrisKonnertz\StringCalc\StringCalc;
use common\models\Codes;
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
    public function actionIndex($code = 10)
    {
        $soato = Yii::$app->user->identity->soato_id;
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
        return $this->render('index',[
            'model'=>$model
        ]);
    }
    public function actionChange($code = 10){
        $soato = Yii::$app->user->identity->soato_id;
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
        if($post = $this->request->post()){
            foreach ($post['Stat'] as $key=>$item){
                $st = Stat::findOne(['soato_id'=>$soato,'code'=>$key]);
                $type = $st->code0->type_id;
                if($type == 2){
                    $st->value = strval($item['num']);
                }elseif($type == 3){
                    $st->value = $item['date'];
                }elseif($type == 4 or $type == 6){
                    $st->value = $item['str'];
                }elseif($type == 5){
                    if($st->file = UploadedFile::getInstance($st,'['.$key.']file')){
                        $name = microtime(true).'.'.$st->file->extension;
                        $st->file->saveAs(Yii::$app->basePath.'/web/uploads/'.$name);
                        $st->file = null;
                        $st->value = $name;
                    }else{
                        $st->file = null;
                    }
                }
                $st->save();
            }
        }
        $changer = new Stat();

        return $this->render('change',[
            'model'=>$model,
            'changer'=>$changer,
        ]);
    }

    public function actionSlugg($code = 10){
        $soato = Yii::$app->user->identity->soato_id;
        if($code != null){
            $codes = Codes::find()->where('code like "'.$code.'%"')->all();
        }else{
            $codes = Codes::find()->all();
        }
        $model = ViewStat::find()->where(['soato_id'=>$soato])->andWhere('code like "'.$code.'%"')->orderBy(['code'=>SORT_ASC])->all();

        return $this->render('slugg',[
            'model'=>$model
        ]);

    }
}
