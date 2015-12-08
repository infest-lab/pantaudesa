<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $kode_kabupaten
 * @property string $nama_kabupaten
 * @property string $kode_provinsi
 *
 * @property Provinsi $kodeProvinsi
 * @property Kecamatan[] $kecamatans
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kabupaten', 'nama_kabupaten', 'kode_provinsi'], 'required'],
            [['kode_kabupaten', 'nama_kabupaten', 'kode_provinsi'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kabupaten' => 'Kode Kabupaten',
            'nama_kabupaten' => 'Nama Kabupaten',
            'kode_provinsi' => 'Kode Provinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['kode_provinsi' => 'kode_provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['kode_kabupaten' => 'kode_kabupaten']);
    }
}
