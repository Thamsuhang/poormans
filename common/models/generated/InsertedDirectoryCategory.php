<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "inserted_directory_category".
 *
 * @property int $id
 * @property int $directory_id
 * @property int $category_id
 *
 * @property DirectoryCategories $category
 * @property Directory $directory
 */
class InsertedDirectoryCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inserted_directory_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['directory_id', 'category_id'], 'required'],
            [['directory_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => DirectoryCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['directory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Directory::className(), 'targetAttribute' => ['directory_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'directory_id' => 'Directory ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(DirectoryCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectory()
    {
        return $this->hasOne(Directory::className(), ['id' => 'directory_id']);
    }
}
