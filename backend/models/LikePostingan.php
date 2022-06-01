<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "like_postingan".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_postingan
 * @property string $tanggal
 *
 * @property Postingan $postingan
 * @property User $user
 */
class LikePostingan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like_postingan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_postingan', 'tanggal'], 'required'],
            [['id_user', 'id_postingan'], 'integer'],
            [['tanggal'], 'safe'],
            [['id_postingan'], 'exist', 'skipOnError' => true, 'targetClass' => Postingan::className(), 'targetAttribute' => ['id_postingan' => 'id']],
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
            'id_postingan' => 'Id Postingan',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * Gets query for [[Postingan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostingan()
    {
        return $this->hasOne(Postingan::className(), ['id' => 'id_postingan']);
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
