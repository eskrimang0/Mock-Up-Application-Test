<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property int $id_pendidikan
 * @property string $pendidikan_riwayat
 * @property string $nama_pendidikan_riwayat
 * @property string $jurusan_pendidikan_riwayat
 * @property string $tahun_lulus_riwayat
 * @property string $ipk_riwayat
 * @property int $id_pelamar
 *
 * @property Biodata $pelamar
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pendidikan_riwayat', 'nama_pendidikan_riwayat', 'jurusan_pendidikan_riwayat', 'tahun_lulus_riwayat', 'ipk_riwayat'], 'required'],
            [['id_pelamar'], 'integer'],
            [['pendidikan_riwayat', 'nama_pendidikan_riwayat', 'jurusan_pendidikan_riwayat', 'tahun_lulus_riwayat', 'ipk_riwayat'], 'string', 'max' => 50],
            [['id_pelamar'], 'exist', 'skipOnError' => true, 'targetClass' => Biodata::class, 'targetAttribute' => ['id_pelamar' => 'id_pelamar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pendidikan' => 'Id Pendidikan',
            'pendidikan_riwayat' => 'Pendidikan',
            'nama_pendidikan_riwayat' => 'Nama Sekolah/Universitas',
            'jurusan_pendidikan_riwayat' => 'Jurusan',
            'tahun_lulus_riwayat' => 'Tahun Lulus',
            'ipk_riwayat' => 'Ipk',
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
