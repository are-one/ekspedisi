<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "satker".
 *
 * @property int $id_satker
 * @property string $nama_satker
 */
class Satker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'satker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_satker', 'nama_satker'], 'required'],
            [['id_satker'], 'integer'],
            [['nama_satker'], 'string', 'max' => 40],
            [['id_satker'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_satker' => 'Id Satker',
            'nama_satker' => 'Nama Satker',
        ];
    }
}
