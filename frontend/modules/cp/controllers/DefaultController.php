<?php

namespace frontend\modules\cp\controllers;

use common\models\Codes;
use common\models\ImportForm;
use common\models\Soato;
use common\models\Stat;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use yii\web\Controller;
use yii\web\UploadedFile;
use  Yii;


/**
 * Default controller for the `cp` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new ImportForm();
        if($model->load($this->request->post())){
            if($model->file = UploadedFile::getInstance($model,'file')){
                // load with phpspreadsheet
                $name = 'import.'.$model->file->extension;
                $model->file->saveAs(Yii::$app->basePath.'/web/'.$name);
                $model->file = $name;


                    $reader = IOFactory::createReader('Xlsx');
                    $reader->setReadDataOnly(true);
                    $sheet = $reader->load(Yii::$app->basePath.'/web/'.$model->file);
                    $worksheet = $sheet->getActiveSheet();


                    foreach ($worksheet->getRowIterator() as $row) {
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                        //    even if a cell value is not set.
                        // By default, only cells that have a value
                        //    set will be iterated.
                        foreach ($cellIterator as $cell) {

                            $rw = $cell->getRow();
                            $cl = $cell->getColumn();
                            if($rw == 1 or $cl == 'A'){
                                continue;
                            }
                            $soato = $sheet->getActiveSheet()->getCell($cl.'1')->getValue();
                            $code = $sheet->getActiveSheet()->getCell('A'.$rw)->getValue();
                            $val = $cell->getValue();

                            if($cd = Codes::findOne($code) and $st = Soato::findOne($soato)){
                                if($cd->params==0 or $val==null){
                                    continue;
                                }
                            }else{
                                continue;
                            }
                            if($stat = Stat::findOne(['code'=>$code,'soato_id'=>$soato])){
                                $stat->value = $val;
                                $stat->save();
                            }else{
                                $stat = new Stat();
                                $stat->value = "$val";
                                $stat->soato_id = $soato;
                                $stat->code = "$code";
                                $stat->status = 1;
                                $stat->save();
                            }
                        }

                    }
                $this->refresh();
            }
        }
        return $this->render('index',[
            'model'=>$model
        ]);
    }
}
