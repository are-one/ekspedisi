<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat".
 *
 * @property int $id_surat
 * @property string $perihal
 * @property string $penerima
 * @property string $foto
 */
class Surat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perihal', 'penerima'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['perihal', 'penerima'], 'string', 'max' => 50],
            [['foto'], 'string'],
            [['id_surat'], 'unique'],
            [['id_satker'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perihal' => 'Perihal',
            'penerima' => 'Penerima',
            'foto' => 'Foto',
            'id_satker' => 'Satker',
        ];
    }
}
