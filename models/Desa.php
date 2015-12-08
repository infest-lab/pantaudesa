<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desa".
 *
 * @property string $kode_desa
 * @property string $nama_desa
 * @property integer $is_kelurahan
 * @property string $kode_kecamatan
 *
 * @property Kecamatan $kodeKecamatan
 */
class Desa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_desa', 'nama_desa', 'kode_kecamatan'], 'required'],
            [['is_kelurahan'], 'integer'],
            [['kode_desa', 'nama_desa', 'kode_kecamatan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_desa' => 'Kode Desa',
            'nama_desa' => 'Nama Desa',
            'is_kelurahan' => 'Is Kelurahan',
            'kode_kecamatan' => 'Kode Kecamatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['kode_kecamatan' => 'kode_kecamatan']);
    }
}
