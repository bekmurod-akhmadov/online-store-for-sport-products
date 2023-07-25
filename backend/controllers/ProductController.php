<?php



namespace backend\controllers;



use backend\models\CommonModels;
use common\components\StaticFunctions;
use common\models\ProductChar;
use common\models\ProductImage;
use Exception;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;


class ProductController extends Controller

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

                Product::findOne($items[$i])->delete();

            }

        }




        $searchModel = new ProductSearch();

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

        $model = new Product();
        $chars = [new ProductChar()];

        if ($model->load(Yii::$app->request->post())) {

            $chars = CommonModels::createMultiple(ProductChar::classname());
            CommonModels::loadMultiple($chars, Yii::$app->request->post());


            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($chars),
                    ActiveForm::validate($model)
                );
            }


            // validate all models
            $valid = $model->validate();
            $valid = CommonModels::validateMultiple($chars) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($chars as $char) {
                            $char->product_id = $model->id;
                            if (! ($flag = $char->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            $model->save();
            $image = UploadedFile::getInstance($model,'image');
            if($image){

                $model->image = StaticFunctions::saveImage($image,$model->id,'product');
                $model->save();
            }

            $galleryImages = UploadedFile::getInstances($model,'gallery');
            if(!empty($galleryImages)){
                foreach ($galleryImages as $galleryImage){
                    $fileName = StaticFunctions::saveImage($galleryImage , $model->id,'product');
                    $prodImage = new ProductImage();
                    $prodImage->product_id = $model->id;
                    $prodImage->image = $fileName;
                    $prodImage->save();

                }
            }

            if ($model->save()){

                return $this->redirect(['update', 'id' => $model->id]);
            }

        } else {

            return $this->render('create', [

                'model' => $model,
                'chars' => (empty($chars)) ? [new ProductChar()] : $chars,


            ]);

        }

    }

    public function actionUpdate($id){

        $model = $this->findModel($id);
        $chars = ProductChar::find()->where(['product_id'=>$id])->all();
        $oldImage = $model->image;
        $prImages = ProductImage::find()->where(['product_id'=>$model->id])->all();
        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($chars, 'id', 'id');
            $chars = CommonModels::createMultiple(ProductChar::classname(), $chars);
            CommonModels::loadMultiple($chars, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($chars, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($chars),
                    ActiveForm::validate($model)
                );
            }
            // validate all models
            $valid = $model->validate();
            $valid = CommonModels::validateMultiple($chars) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            ProductChar::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($chars as $char) {
                            $char->product_id = $model->id;
                            if (! ($flag = $char->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            #Upload image
            $image = UploadedFile::getInstance($model,'image');
            if($image){
                $model->image = StaticFunctions::saveImage($image,$model->id,'product');
                StaticFunctions::deleteImage($oldImage,$model->id,'product');
            }else{
                $model->image = $oldImage;
            }

            $galleryImages = UploadedFile::getInstances($model,'gallery');
            if(!empty($galleryImages)){
                foreach ($galleryImages as $galleryImage){
                    $fileName = StaticFunctions::saveImage($galleryImage , $model->id,'product');
                    $prodImage = new ProductImage();
                    $prodImage->product_id = $model->id;
                    $prodImage->image = $fileName;
                    $prodImage->save();

                }
            }

            if ($model->save()){
                return $this->redirect(['update', 'id' => $model->id]);
            }

        } else {

            return $this->render('update', [

                'model' => $model,
                'chars' => (empty($chars)) ? [new ProductChar()] : $chars,
                'prImages' => $prImages,

            ]);

        }

    }



    public function actionDelete($id){

        $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }

    public function actionDelItem($id){
        $model = ProductImage::findOne($id);
        $productId = $model->product_id;
        StaticFunctions::deleteImage($model->image,$productId,'product');
        $model->delete();
        return $this->redirect(['update','id'=>$productId]);
    }


    protected function findModel($id){


        if (($model = Product::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

