<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $kode_kecamatan
 * @property string $nama_kecamatan
 * @property string $kode_kabupaten
 *
 * @property Desa[] $desas
 * @property Kabupaten $kodeKabupaten
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kecamatan', 'nama_kecamatan', 'kode_kabupaten'], 'required'],
            [['kode_kecamatan', 'nama_kecamatan', 'kode_kabupaten'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kecamatan' => 'Kode Kecamatan',
            'nama_kecamatan' => 'Nama Kecamatan',
            'kode_kabupaten' => 'Kode Kabupaten',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesas()
    {
        return $this->hasMany(Desa::className(), ['kode_kecamatan' => 'kode_kecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['kode_kabupaten' => 'kode_kabupaten']);
    }
}
