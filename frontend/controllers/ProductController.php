<?php


namespace frontend\controllers;


use common\components\Controller;
use common\models\Brand;
use common\models\Cart;
use common\models\Color;
use common\models\Product;
use common\models\ProductCategory;
use common\models\ProductChar;
use common\models\ProductComment;
use common\models\ProductImage;
use Yii;
use yii\data\Pagination;

class ProductController extends Controller
{
    public function actionIndex(){
        $query = Product::find()->where(['status'=>1]);
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'=> 9,
            'pageSizeParam'=>false,
            'forcePageParam'=>false,

        ]);
        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index',compact('models','pagination'));
    }

    public function actionView($id){
        $model = Product::findOne($id);
        $productImages = ProductImage::find()->where(['product_id'=>$id])->all();
        $category = ProductCategory::findOne(['id'=>$model->product_id]);
        $chars = ProductChar::find()->where(['product_id'=>$id])->all();
        $comment = new ProductComment();
        $productComments = ProductComment::find()->where(['product_id'=>$id])->orderBy(['created_date' => SORT_DESC])->all();
        $productCommentsCount = ProductComment::find()->where(['product_id'=>$id])->count();
        $recomentProducts = Product::find()->where(['status'=>1,'brand_id'=>$model->brand_id])->andWhere(['not in','id',$id])->all();
        $saleProducts = Product::find()->where(['status'=>1,'brand_id'=>$model->brand_id , 'sale' => 1])->andWhere(['not in','id',$id])->all();
        $session = \Yii::$app->session;
        $session->open();
//        $qtyCount = $session['cart'][$model->id]['qty'];
        if ($comment->load(\Yii::$app->request->post())){
            $comment->product_id = $id;
            $comment->save();
            return $this->refresh();
        }

        return $this->render('view',[
            'model'=>$model,
            'productImages' => $productImages,
            'category'=>$category,
            'chars'=>$chars,
            'comment'=>$comment,
            'productComments' => $productComments,
            'productCommentsCount'=>$productCommentsCount,
            'recomentProducts' => $recomentProducts,
            'saleProducts' => $saleProducts,
//            'qtyCount' => $qtyCount,
        ]);
    }

    public function actionCategory($id){
        $query = Product::find()->where(['status'=>1,'product_id'=>$id]);
        $categories = ProductCategory::find()->where(['status'=>1])->all();
        $category = ProductCategory::findOne($id);
        $brands = Brand::find()->where(['status'=>1])->all();
        $colors = Color::find()->where(['status' => 1])->all();
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'=> 9,
            'pageSizeParam'=>false,
            'forcePageParam'=>false,

        ]);

        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        
        return $this->render('category',[
            'models'=>$models,
            'categories'=>$categories,
            'category'=>$category,
            'brands'=>$brands,
            'pagination' => $pagination,
            'colors' => $colors,
        ]);
    }

    public function actionSelect(){
        $min = \Yii::$app->request->get('min');
        $max = \Yii::$app->request->get('max');
        $query = Product::find()->where(['status'=>1])->andWhere(['>','new_price',$min])->andWhere(['<','new_price',$max]);
        $categories = ProductCategory::find()->where(['status'=>1])->all();
        $brands = Brand::find()->where(['status'=>1])->all();
        $colors = Color::find()->where(['status'=>1])->all();
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9,
            'pageSizeParam'=>false,
            'forcePageParam'=>false
        ]);

        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('select',[
            'min'=>$min,
            'models'=>$models,
            'max'=>$max,
            'pagination' => $pagination,
            'categories'=>$categories,
            'brands'=>$brands,
            'colors' => $colors

        ]);

    }

    public function actionBrand($id){
        $categories = ProductCategory::find()->where(['status'=>1])->all();
        $query = Product::find()->where(['brand_id'=>$id,'status'=>1]);
        $category = ProductCategory::findOne($id);
        $brands = Brand::find()->where(['status'=>1])->all();
        $brandItem = Brand::findOne(['id'=>$id]);
        $colors = Color::find()->where(['status'=>1])->all();
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'=> 9,
            'pageSizeParam'=>false,
            'forcePageParam'=>false,

        ]);

        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('brand',[
            'models'=>$models,
            'category'=>$category,
            'brands'=>$brands,
            'pagination' => $pagination,
            'brandItem'=>$brandItem,
            'categories' => $categories,
            'colors' => $colors
        ]);
    }

    public function actionColor($id){
        $query = Product::find()->where(['color_id'=>$id,'status'=>1]);
        $categories = ProductCategory::find()->where(['status'=>1])->all();
        $category = ProductCategory::findOne($id);
        $brands = Brand::find()->where(['status'=>1])->all();
        $colors = Color::find()->where(['status'=>1])->all();
        $colorItem = Color::findOne(['id'=>$id]);

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'=> 8,
            'pageSizeParam'=>false,
            'forcePageParam'=>false,

        ]);

        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('color',[
            'models'=>$models,
            'categories'=>$categories,
            'category'=>$category,
            'brands'=>$brands,
            'colors'=>$colors,
            'pagination' => $pagination,
            'colorItem'=>$colorItem,
        ]);
    }

    public function actionSearch(){
        $result = Yii::$app->request->get('main-search');
        $query = Product::find()->where(['like','name',$result]);
        $categories = ProductCategory::find()->where(['status'=>1])->all();
        $brands = Brand::find()->where(['status'=>1])->all();
        $colors = Color::find()->where(['status'=>1])->all();
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9,
            'pageSizeParam'=>false,
            'forcePageParam'=>false
        ]);

        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('search',[
            'models'=>$models,
            'categories'=>$categories,
            'brands'=>$brands,
            'colors'=>$colors,
            'pagination' => $pagination,
            'result'=>$result,
        ]);

    }


}