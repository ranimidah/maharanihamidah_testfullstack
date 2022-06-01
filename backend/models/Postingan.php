<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "postingan".
 *
 * @property int $id
 * @property int $id_user
 * @property string|null $caption
 * @property string $photo
 * @property int|null $count_like
 * @property string $tanggal_posting
 * @property int $status
 *
 * @property User $user
 */
class Postingan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $_photo;
    public static function tableName()
    {
        return 'postingan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'photo', 'tanggal_posting', 'status'], 'required'],
            [['id_user', 'count_like', 'status'], 'integer'],
            [['caption'], 'string'],
            [['tanggal_posting'], 'safe'],
            [['photo'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'caption' => 'Caption',
            'photo' => 'Photo',
            'count_like' => 'Count Like',
            'tanggal_posting' => 'Tanggal Posting',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}