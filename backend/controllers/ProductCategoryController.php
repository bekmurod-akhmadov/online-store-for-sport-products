<?php



namespace backend\controllers;



use common\components\StaticFunctions;
use Yii;

use common\models\ProductCategory;


use common\models\ProductCategorySearch;


use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use common\components\Controller;
use yii\web\UploadedFile;


class ProductCategoryController extends Controller

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

                ProductCategory::findOne($items[$i])->delete();

            }

        }




        $searchModel = new ProductCategorySearch();

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

        $model = new ProductCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $image = UploadedFile::getInstance($model,'image');
            if ($image){
                $model->image = StaticFunctions::saveImage($image,$model->id,'product-category');
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

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model,'image');
            if ($image){
                $model->image = StaticFunctions::saveImage($image,$model->id,'product-category');
                StaticFunctions::deleteImage($oldImage,$model->id,'product-category');
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


        if (($model = ProductCategory::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

