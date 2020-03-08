<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string $icon
 * @property string $type
 * @property string $url
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon', 'type', 'url'], 'required'],
            [['icon', 'type'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'type' => 'Type',
            'url' => 'Url',
        ];
    }
}
