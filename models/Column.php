<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_column".
 *
 * @property integer $id
 * @property string $columnname
 * @property string $addtime
 */
class Column extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_column';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['columnname', 'addtime'], 'required'],
            [['addtime'], 'safe'],
            [['columnname'], 'string', 'max' => 50]
        ];
    }
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id'=>'columnid']);
    }
    public static function getcols()
    {
        $tmp = self::find()->select('id,columnname')->asArray()->all();
        return \yii\helpers\ArrayHelper::map($tmp, 'id', 'columnname');
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'columnname' => 'Columnname',
            'addtime' => 'Addtime',
        ];
    }
}
