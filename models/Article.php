<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $keywords
 * @property string $author
 * @property string $image
 * @property string $addtime
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'keywords', 'author','columnid'], 'required'],
            ['image','required','on'=>'create'],
            [['content'], 'string'],
            [['addtime','ishot','clicks'], 'safe'],
            [['title', 'keywords'], 'string', 'max' => 100],
            [['author'], 'string', 'max' => 50],
            [['image'], 'string', 'max' => 200]
        ];
    }
    /**
     * 这货直接在查询的时候把数据库里的addtime替换成 value！
     * touch方法也是会直接修改数据库！
     */
    /*public function behaviors() {
        return [
            [
                'class'=>  \yii\behaviors\TimestampBehavior::className(),
                'attributes'=>[
                    \yii\db\BaseActiveRecord::EVENT_AFTER_FIND=>'addtime',
                ],
                'value'=>function (){
                    return date('Y-m-d');
                },
            ],
        ];
    }*/
//    public function afterFind() {
//        return  11;
//    }
    /**
     * 关联查询
     * @return type
     */
    public function getColumns()
    {
        return $this->hasOne(Column::className(), ['id' => 'columnid']);
    }
    /**
     * Scopes
     * @return \app\models\Scopes
     */
    public static function find()
    {
//        return new Scopes(get_called_class()); 
        return new Scopes(new static); //new self   
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'columnid'=>'分类ID',
            'keywords' => '关键字',
            'author' => '作者',
            'image' => '图片',
            'ishot'=>'是否推荐',
            'addtime' => '添加时间',
        ];
    }
}
