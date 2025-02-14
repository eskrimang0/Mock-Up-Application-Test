<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "biodata".
 *
 * @property int $id_pelamar
 * @property string $posisi_pelamar
 * @property string $nama_pelamar
 * @property string $ktp_pelamar
 * @property string $ttl_pelamar
 * @property string $jk_pelamar
 * @property string $agama_pelamar
 * @property string $goldar_pelamar
 * @property string $status_pelamar
 * @property string $alamat_ktp_pelamar
 * @property string $alamat_tinggal_pelamar
 * @property string $email_pelamar
 * @property string $tlp_pelamar
 * @property string $tlp2_pelamar
 * @property string $skill_pelamar
 * @property float $ekspektasi_salary_pelamar
 *
 * @property Pekerjaan[] $pekerjaans
 * @property Pelatihan[] $pelatihans
 * @property Pendidikan[] $pendidikans
 */
class Biodata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posisi_pelamar', 'nama_pelamar', 'ktp_pelamar', 'ttl_pelamar', 'jk_pelamar', 'agama_pelamar', 'goldar_pelamar', 'status_pelamar', 'alamat_ktp_pelamar', 'alamat_tinggal_pelamar', 'email_pelamar', 'tlp_pelamar', 'tlp2_pelamar', 'skill_pelamar'], 'required'],
            [['jk_pelamar', 'skill_pelamar'], 'string'],
            [['ekspektasi_salary_pelamar'], 'number'],
            [['posisi_pelamar', 'nama_pelamar', 'ttl_pelamar', 'agama_pelamar', 'status_pelamar', 'alamat_ktp_pelamar', 'alamat_tinggal_pelamar', 'email_pelamar'], 'string', 'max' => 50],
            [['ktp_pelamar'], 'string', 'max' => 16],
            [['goldar_pelamar'], 'string', 'max' => 3],
            [['tlp_pelamar', 'tlp2_pelamar'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelamar' => 'Id Pelamar',
            'posisi_pelamar' => 'Posisi',
            'nama_pelamar' => 'Nama',
            'ktp_pelamar' => 'Ktp Pelamar',
            'ttl_pelamar' => 'Tempat tgl. Lahir',
            'jk_pelamar' => 'Jk Pelamar',
            'agama_pelamar' => 'Agama Pelamar',
            'goldar_pelamar' => 'Goldar Pelamar',
            'status_pelamar' => 'Status Pelamar',
            'alamat_ktp_pelamar' => 'Alamat Ktp Pelamar',
            'alamat_tinggal_pelamar' => 'Alamat Tinggal Pelamar',
            'email_pelamar' => 'Email Pelamar',
            'tlp_pelamar' => 'Tlp Pelamar',
            'tlp2_pelamar' => 'Tlp2 Pelamar',
            'skill_pelamar' => 'Skill Pelamar',
            'ekspektasi_salary_pelamar' => 'Ekspektasi Salary Pelamar',
        ];
    }

    /**
     * Gets query for [[Pekerjaans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaans()
    {
        return $this->hasMany(Pekerjaan::class, ['id_pelamar' => 'id_pelamar']);
    }

    /**
     * Gets query for [[Pelatihans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihans()
    {
        return $this->hasMany(Pelatihan::class, ['id_pelamar' => 'id_pelamar']);
    }

    /**
     * Gets query for [[Pendidikans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikans()
    {
        return $this->hasMany(Pendidikan::class, ['id_pelamar' => 'id_pelamar']);
    }

    public function beforeSave($insert)
{
    if ($insert) {
        $exists = self::find()->where(['id_pelamar' => Yii::$app->user->identity->id])->exists();
        if ($exists) {
            Yii::$app->session->setFlash('error', 'Anda sudah mengisi biodata.');
            return false;
        }
    }
    return parent::beforeSave($insert);
}
}
