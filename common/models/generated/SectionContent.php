<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "section_content".
 *
 * @property int $id
 * @property int $page_id
 * @property string $slug
 * @property string $section_name
 * @property string $icon
 * @property string $title
 * @property string $subtitle
 * @property string $image
 * @property string $description
 */
class SectionContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'slug', 'section_name', 'icon', 'title', 'subtitle', 'image', 'description'], 'required'],
            [['page_id'], 'integer'],
            [['title', 'subtitle', 'description'], 'string'],
            [['slug', 'section_name'], 'string', 'max' => 100],
            [['icon'], 'string', 'max' => 40],
            [['image'], 'string', 'max' => 60],
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
            'section_name' => 'Section Name',
            'icon' => 'Icon',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }
}
