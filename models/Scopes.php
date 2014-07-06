<?php
namespace app\models;
use yii\db\ActiveQuery;

class Scopes extends ActiveQuery
{
    /**
     * Article
     */
    public function hot($ishot=1)
    {
        $this->andWhere('ishot=:hot',[':hot'=>$ishot]);
        return $this;
    }
    /**
     * Column
     */
}
