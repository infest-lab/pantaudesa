<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "pantau".
 *
 * @property \MongoId|string $_id
 * @property mixed $provinsi
 * @property mixed $kode_provinsi
 * @property mixed $kode_kabupaten
 * @property mixed $kabupaten
 * @property mixed $kode_kecamatan
 * @property mixed $kecamatan
 * @property mixed $kode_desa
 * @property mixed $desa
 * @property mixed $is_kelurahan
 * @property mixed $periode
 * @property mixed $tahun
 * @property mixed $type
 * @property mixed $content
 */
class Pantau extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['pantau', 'pantau'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'provinsi',
            'kode_provinsi',
            'kode_kabupaten',
            'kabupaten',
            'kode_kecamatan',
            'kecamatan',
            'kode_desa',
            'desa',
            'is_kelurahan',
            'periode',
            'tahun',
            'type',
            'content',
            'alamat'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi', 'kode_provinsi', 'kode_kabupaten', 'kabupaten', 'kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', 'is_kelurahan', 'periode', 'tahun', 'type', 'content', 'alamat'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'provinsi' => 'Provinsi',
            'kode_provinsi' => 'Kode Provinsi',
            'kode_kabupaten' => 'Kode Kabupaten',
            'kabupaten' => 'Kabupaten',
            'kode_kecamatan' => 'Kode Kecamatan',
            'kecamatan' => 'Kecamatan',
            'kode_desa' => 'Kode Desa',
            'desa' => 'Desa',
            'is_kelurahan' => 'Is Kelurahan',
            'periode' => 'Periode',
            'tahun' => 'Tahun',
            'type' => 'Type',
            'alamat'=> 'Alamat',
            'content' => 'Content',
        ];
    }
}
