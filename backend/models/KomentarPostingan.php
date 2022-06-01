<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "komentar_postingan".
 *
 * @property int $id
 * @property string|null $komentar
 * @property int $id_postingan
 * @property int $id_user
 * @property int $status
 * @property string $tanggal
 *
 * @property Postingan $postingan
 * @property User $user
 */
class KomentarPostingan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'komentar_postingan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_postingan', 'id_user', 'status'], 'required'],
            [['id_postingan', 'id_user', 'status'], 'integer'],
            [['tanggal'], 'safe'],
            [['komentar'], 'string', 'max' => 255],
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
            'komentar' => 'Komentar',
            'id_postingan' => 'Id Postingan',
            'id_user' => 'Id User',
            'status' => 'Status',
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
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}