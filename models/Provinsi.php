<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $kode_provinsi
 * @property string $nama_provinsi
 *
 * @property Kabupaten[] $kabupatens
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_provinsi', 'nama_provinsi'], 'required'],
            [['kode_provinsi', 'nama_provinsi'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_provinsi' => 'Kode Provinsi',
            'nama_provinsi' => 'Nama Provinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['kode_provinsi' => 'kode_provinsi']);
    }
}
