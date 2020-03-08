<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property int $page_id
 * @property string $slug
 * @property string $title
 * @property string $subtitle
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'slug', 'title', 'subtitle'], 'required'],
            [['page_id'], 'integer'],
            [['slug', 'title', 'subtitle'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
        ];
    }
}
