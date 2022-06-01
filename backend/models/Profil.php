<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profil".
 *
 * @property int $id
 * @property string|null $bio
 * @property string|null $photo_profil
 *
 * @property User $id0
 */
class Profil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $nama, $_photo;
    public static function tableName()
    {
        return 'profil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['bio'], 'string'],
            [['photo_profil', 'nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bio' => 'Bio',
            'photo_profil' => 'Photo Profil',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}