<?php

namespace common\models;

use common\components\Model;
use Yii;
use yii\helpers\ArrayHelper;

class NewsCategory extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'order_by','parent'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'name' =>"Имя",
            'status' => 'Статус',
            'order_by' =>'Сортировать по',
            'parent'=>'Родитель',
        ];
    }

    public function getLang($column, $lang = null)
    {

        $lang = $lang ? $lang : Yii::$app->language ;
        if($lang == Yii::$app->params['main_language']) {
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().' where id=' . $this->id)->queryOne();
        } else {
            $id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('Select * from '.$this->tableName().'_lang where parent='. $this->id.' and lang='.$id)->queryOne();
        }
        return $model[$column];
    }

    public static function getModels($where = '1')
    {
        $models = [];
        foreach(NewsCategory::find()->where('status>-1 AND '.$where)->andWhere(['!=','parent',0])->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            $name = $model->name;
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->name];
        }

        return $models;
    }

    public static function getModelsCategory($where = '1')
    {
        $models = [];
        foreach(NewsCategory::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            $name = $model->name;
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->name];
        }

        return $models;
    }

    public function getCategoryNews(){
        $models = [];
        if($this->parent==0){
            $childCategoriesIds = ArrayHelper::map(self::find()->where(['status'=>1,'parent'=>$this->id])->all(),'id','id');
            $models = News::find()->where(['status'=>1,'category'=>$childCategoriesIds])->all();
        }else{
            $models = News::find()->where(['status'=>1,'category'=>$this->id])->all();
        }

        return $models;

    }
}
