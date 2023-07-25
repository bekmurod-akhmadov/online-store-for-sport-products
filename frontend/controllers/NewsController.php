<?php

namespace frontend\controllers;

use common\components\Controller;
use common\models\Comment;
use common\models\News;
use common\models\NewsCategory;
use common\models\NewsLang;
use common\models\Languages;
use common\models\PostImage;
use common\models\Product;
use common\widgets\Alert;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class NewsController extends Controller {

    public function actionIndex(){
        $query = News::find()->where(['status'=>1]);
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize'=> 7,
            'pageSizeParam'=>false,
            'forcePageParam'=>false,

        ]);
        $models = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index',compact('models','pagination'));
    }

    public function actionView($id) {

        if (!empty($id)){
            $model = News::findOne($id);
            $newsItems = News::find()->where(['status'=>1])->andWhere(['not in','id',$id])->limit(3)->all();

            $model->seen_count++;
            $model->save();
            return $this->render('view',[
                'model'=>$model,
                'newsItems'=>$newsItems,
            ]);
        }else{
            return $this->redirect(['/site/error']);
        }


    }


}
