<?php



namespace backend\controllers;



use common\components\StaticFunctions;
use Yii;

use common\models\Banner;


use common\models\BannerSearch;


use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use common\components\Controller;
use yii\web\UploadedFile;


class BannerController extends Controller

{



    public function behaviors()

    {

        return [

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                    'delete' => ['POST'],

                ],

            ],

        ];

    }





    public function actionIndex()

    {

        if(Yii::$app->request->post()){

            $items = Yii::$app->request->post()['rm-input'];

            $items = explode(',', $items);

            for($i = 0; $i < count($items) - 1;$i++){

                if($items[$i] != null)

                Banner::findOne($items[$i])->delete();

            }

        }




        $searchModel = new BannerSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }





    public function actionView($id)

    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }





    public function actionCreate(){

        $model = new Banner();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstance($model,'image');
            if ($image){
                $model->image = StaticFunctions::saveImage($image,$model->id,'banner');
                $model->save();
            }
            if ($model->save()){
                return $this->redirect(['update', 'id' => $model->id]);
            }

        } else {

            return $this->render('create', [

                'model' => $model,

            ]);

        }

    }





    public function actionUpdate($id){

        $model = $this->findModel($id);
        $oldImage = $model->image;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $image = UploadedFile::getInstance($model,'image');
            if ($image){
                $model->image = StaticFunctions::saveImage($image,$model->id,'banner');
                StaticFunctions::deleteImage($oldImage,$model->id,'banner');
            }else{
                $model->image = $oldImage;
            }
            if ($model->save()){
                return $this->redirect(['update', 'id' => $model->id]);

            }

        } else {

            return $this->render('update', [

                'model' => $model,

            ]);

        }

    }





    public function actionDelete($id)

    {

        $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }





    protected function findModel($id)

    {


        if (($model = Banner::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

