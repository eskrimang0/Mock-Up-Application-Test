<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property int $id_pekerjaan
 * @property string $perusahaan_riwayat
 * @property string $posisi_riwayat
 * @property float $salary_riwayat
 * @property string $tahun_pekerjaan_riwayat
 * @property int $id_pelamar
 *
 * @property Biodata $pelamar
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perusahaan_riwayat', 'posisi_riwayat', 'tahun_pekerjaan_riwayat', 'id_pelamar'], 'required'],
            [['salary_riwayat'], 'required', 'message' => 'Gaji tidak boleh kosong.'], // ✅ Tambahkan required jika wajib
            [['salary_riwayat'], 'number', 'min' => 0, 'tooSmall' => 'Gaji tidak boleh negatif.'], // ✅ Pastikan salary tidak negatif
            [['id_pelamar'], 'integer'],
            [['perusahaan_riwayat', 'posisi_riwayat'], 'string', 'max' => 50],
            [['tahun_pekerjaan_riwayat'], 'match', 'pattern' => '/^\d{4}$/', 'message' => 'Format tahun harus YYYY.'], // ✅ Pastikan tahun hanya 4 digit
            [['id_pelamar'], 'exist', 'skipOnError' => true, 'targetClass' => Biodata::class, 'targetAttribute' => ['id_pelamar' => 'id_pelamar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pekerjaan' => 'ID Pekerjaan',
            'perusahaan_riwayat' => 'Nama Perusahaan',
            'posisi_riwayat' => 'Posisi/Jabatan',
            'salary_riwayat' => 'Gaji (Rp)',
            'tahun_pekerjaan_riwayat' => 'Tahun',
            'id_pelamar' => 'ID Pelamar',
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
