<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pelatihan".
 *
 * @property int $id_pelatihan
 * @property string $nama_pelatihan
 * @property string $sertifikat_pelatihan
 * @property string $tahun_pelatihan
 * @property int $id_pelamar
 *
 * @property Biodata $pelamar
 */
class Pelatihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelatihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pelatihan', 'sertifikat_pelatihan', 'tahun_pelatihan', 'id_pelamar'], 'required'],
            [['sertifikat_pelatihan'], 'string'],
            [['id_pelamar'], 'integer'],
            [['nama_pelatihan', 'tahun_pelatihan'], 'string', 'max' => 50],
            [['id_pelamar'], 'exist', 'skipOnError' => true, 'targetClass' => Biodata::class, 'targetAttribute' => ['id_pelamar' => 'id_pelamar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelatihan' => 'Id Pelatihan',
            'nama_pelatihan' => 'Nama Pelatihan',
            'sertifikat_pelatihan' => 'Sertifikat',
            'tahun_pelatihan' => 'Tahun',
            'id_pelamar' => 'Id Pelamar',
        ];
    }

    /**
     * Gets query for [[Pelamar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelamar()
    {
        return $this->hasOne(Biodata::class, ['id_pelamar' => 'id_pelamar']);
    }
}
