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
            [['nama_satker'], 'required', 'message' => '{attribute} tidak boleh kosong saat melakukan pengisian'],
            [['nama_satker'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama_satker' => 'Nama Satker',
        ];
    }
}
