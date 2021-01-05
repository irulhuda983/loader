<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AgamaPeer;
use DataDikdas\Model\BankPeer;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\JenisPtkPeer;
use DataDikdas\Model\KeahlianLaboratoriumPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\LargeObjectPeer;
use DataDikdas\Model\LembagaPengangkatPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\NegaraPeer;
use DataDikdas\Model\PangkatGolonganPeer;
use DataDikdas\Model\PekerjaanPeer;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\StatusKeaktifanPegawaiPeer;
use DataDikdas\Model\StatusKepegawaianPeer;
use DataDikdas\Model\SumberGajiPeer;
use DataDikdas\Model\map\PtkTableMap;

/**
 * Base static class for performing query and update operations on the 'ptk' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ptk';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Ptk';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PtkTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 63;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 63;

    /** the column name for the ptk_id field */
    const PTK_ID = 'ptk.ptk_id';

    /** the column name for the nama field */
    const NAMA = 'ptk.nama';

    /** the column name for the nip field */
    const NIP = 'ptk.nip';

    /** the column name for the jenis_kelamin field */
    const JENIS_KELAMIN = 'ptk.jenis_kelamin';

    /** the column name for the tempat_lahir field */
    const TEMPAT_LAHIR = 'ptk.tempat_lahir';

    /** the column name for the tanggal_lahir field */
    const TANGGAL_LAHIR = 'ptk.tanggal_lahir';

    /** the column name for the nik field */
    const NIK = 'ptk.nik';

    /** the column name for the no_kk field */
    const NO_KK = 'ptk.no_kk';

    /** the column name for the niy_nigk field */
    const NIY_NIGK = 'ptk.niy_nigk';

    /** the column name for the nuptk field */
    const NUPTK = 'ptk.nuptk';

    /** the column name for the nuks field */
    const NUKS = 'ptk.nuks';

    /** the column name for the status_kepegawaian_id field */
    const STATUS_KEPEGAWAIAN_ID = 'ptk.status_kepegawaian_id';

    /** the column name for the jenis_ptk_id field */
    const JENIS_PTK_ID = 'ptk.jenis_ptk_id';

    /** the column name for the pengawas_bidang_studi_id field */
    const PENGAWAS_BIDANG_STUDI_ID = 'ptk.pengawas_bidang_studi_id';

    /** the column name for the agama_id field */
    const AGAMA_ID = 'ptk.agama_id';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'ptk.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'ptk.rt';

    /** the column name for the rw field */
    const RW = 'ptk.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'ptk.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'ptk.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'ptk.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'ptk.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'ptk.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'ptk.bujur';

    /** the column name for the no_telepon_rumah field */
    const NO_TELEPON_RUMAH = 'ptk.no_telepon_rumah';

    /** the column name for the no_hp field */
    const NO_HP = 'ptk.no_hp';

    /** the column name for the email field */
    const EMAIL = 'ptk.email';

    /** the column name for the status_keaktifan_id field */
    const STATUS_KEAKTIFAN_ID = 'ptk.status_keaktifan_id';

    /** the column name for the sk_cpns field */
    const SK_CPNS = 'ptk.sk_cpns';

    /** the column name for the tgl_cpns field */
    const TGL_CPNS = 'ptk.tgl_cpns';

    /** the column name for the sk_pengangkatan field */
    const SK_PENGANGKATAN = 'ptk.sk_pengangkatan';

    /** the column name for the tmt_pengangkatan field */
    const TMT_PENGANGKATAN = 'ptk.tmt_pengangkatan';

    /** the column name for the lembaga_pengangkat_id field */
    const LEMBAGA_PENGANGKAT_ID = 'ptk.lembaga_pengangkat_id';

    /** the column name for the pangkat_golongan_id field */
    const PANGKAT_GOLONGAN_ID = 'ptk.pangkat_golongan_id';

    /** the column name for the keahlian_laboratorium_id field */
    const KEAHLIAN_LABORATORIUM_ID = 'ptk.keahlian_laboratorium_id';

    /** the column name for the sumber_gaji_id field */
    const SUMBER_GAJI_ID = 'ptk.sumber_gaji_id';

    /** the column name for the nama_ibu_kandung field */
    const NAMA_IBU_KANDUNG = 'ptk.nama_ibu_kandung';

    /** the column name for the status_perkawinan field */
    const STATUS_PERKAWINAN = 'ptk.status_perkawinan';

    /** the column name for the nama_suami_istri field */
    const NAMA_SUAMI_ISTRI = 'ptk.nama_suami_istri';

    /** the column name for the nip_suami_istri field */
    const NIP_SUAMI_ISTRI = 'ptk.nip_suami_istri';

    /** the column name for the pekerjaan_suami_istri field */
    const PEKERJAAN_SUAMI_ISTRI = 'ptk.pekerjaan_suami_istri';

    /** the column name for the tmt_pns field */
    const TMT_PNS = 'ptk.tmt_pns';

    /** the column name for the sudah_lisensi_kepala_sekolah field */
    const SUDAH_LISENSI_KEPALA_SEKOLAH = 'ptk.sudah_lisensi_kepala_sekolah';

    /** the column name for the jumlah_sekolah_binaan field */
    const JUMLAH_SEKOLAH_BINAAN = 'ptk.jumlah_sekolah_binaan';

    /** the column name for the pernah_diklat_kepengawasan field */
    const PERNAH_DIKLAT_KEPENGAWASAN = 'ptk.pernah_diklat_kepengawasan';

    /** the column name for the nm_wp field */
    const NM_WP = 'ptk.nm_wp';

    /** the column name for the status_data field */
    const STATUS_DATA = 'ptk.status_data';

    /** the column name for the karpeg field */
    const KARPEG = 'ptk.karpeg';

    /** the column name for the karpas field */
    const KARPAS = 'ptk.karpas';

    /** the column name for the mampu_handle_kk field */
    const MAMPU_HANDLE_KK = 'ptk.mampu_handle_kk';

    /** the column name for the keahlian_braille field */
    const KEAHLIAN_BRAILLE = 'ptk.keahlian_braille';

    /** the column name for the keahlian_bhs_isyarat field */
    const KEAHLIAN_BHS_ISYARAT = 'ptk.keahlian_bhs_isyarat';

    /** the column name for the npwp field */
    const NPWP = 'ptk.npwp';

    /** the column name for the kewarganegaraan field */
    const KEWARGANEGARAAN = 'ptk.kewarganegaraan';

    /** the column name for the id_bank field */
    const ID_BANK = 'ptk.id_bank';

    /** the column name for the rekening_bank field */
    const REKENING_BANK = 'ptk.rekening_bank';

    /** the column name for the rekening_atas_nama field */
    const REKENING_ATAS_NAMA = 'ptk.rekening_atas_nama';

    /** the column name for the blob_id field */
    const BLOB_ID = 'ptk.blob_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ptk.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ptk.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'ptk.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ptk.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'ptk.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Ptk objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Ptk[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PtkPeer::$fieldNames[PtkPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PtkId', 'Nama', 'Nip', 'JenisKelamin', 'TempatLahir', 'TanggalLahir', 'Nik', 'NoKk', 'NiyNigk', 'Nuptk', 'Nuks', 'StatusKepegawaianId', 'JenisPtkId', 'PengawasBidangStudiId', 'AgamaId', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'NoTeleponRumah', 'NoHp', 'Email', 'StatusKeaktifanId', 'SkCpns', 'TglCpns', 'SkPengangkatan', 'TmtPengangkatan', 'LembagaPengangkatId', 'PangkatGolonganId', 'KeahlianLaboratoriumId', 'SumberGajiId', 'NamaIbuKandung', 'StatusPerkawinan', 'NamaSuamiIstri', 'NipSuamiIstri', 'PekerjaanSuamiIstri', 'TmtPns', 'SudahLisensiKepalaSekolah', 'JumlahSekolahBinaan', 'PernahDiklatKepengawasan', 'NmWp', 'StatusData', 'Karpeg', 'Karpas', 'MampuHandleKk', 'KeahlianBraille', 'KeahlianBhsIsyarat', 'Npwp', 'Kewarganegaraan', 'IdBank', 'RekeningBank', 'RekeningAtasNama', 'BlobId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkId', 'nama', 'nip', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'nik', 'noKk', 'niyNigk', 'nuptk', 'nuks', 'statusKepegawaianId', 'jenisPtkId', 'pengawasBidangStudiId', 'agamaId', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'noTeleponRumah', 'noHp', 'email', 'statusKeaktifanId', 'skCpns', 'tglCpns', 'skPengangkatan', 'tmtPengangkatan', 'lembagaPengangkatId', 'pangkatGolonganId', 'keahlianLaboratoriumId', 'sumberGajiId', 'namaIbuKandung', 'statusPerkawinan', 'namaSuamiIstri', 'nipSuamiIstri', 'pekerjaanSuamiIstri', 'tmtPns', 'sudahLisensiKepalaSekolah', 'jumlahSekolahBinaan', 'pernahDiklatKepengawasan', 'nmWp', 'statusData', 'karpeg', 'karpas', 'mampuHandleKk', 'keahlianBraille', 'keahlianBhsIsyarat', 'npwp', 'kewarganegaraan', 'idBank', 'rekeningBank', 'rekeningAtasNama', 'blobId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PtkPeer::PTK_ID, PtkPeer::NAMA, PtkPeer::NIP, PtkPeer::JENIS_KELAMIN, PtkPeer::TEMPAT_LAHIR, PtkPeer::TANGGAL_LAHIR, PtkPeer::NIK, PtkPeer::NO_KK, PtkPeer::NIY_NIGK, PtkPeer::NUPTK, PtkPeer::NUKS, PtkPeer::STATUS_KEPEGAWAIAN_ID, PtkPeer::JENIS_PTK_ID, PtkPeer::PENGAWAS_BIDANG_STUDI_ID, PtkPeer::AGAMA_ID, PtkPeer::ALAMAT_JALAN, PtkPeer::RT, PtkPeer::RW, PtkPeer::NAMA_DUSUN, PtkPeer::DESA_KELURAHAN, PtkPeer::KODE_WILAYAH, PtkPeer::KODE_POS, PtkPeer::LINTANG, PtkPeer::BUJUR, PtkPeer::NO_TELEPON_RUMAH, PtkPeer::NO_HP, PtkPeer::EMAIL, PtkPeer::STATUS_KEAKTIFAN_ID, PtkPeer::SK_CPNS, PtkPeer::TGL_CPNS, PtkPeer::SK_PENGANGKATAN, PtkPeer::TMT_PENGANGKATAN, PtkPeer::LEMBAGA_PENGANGKAT_ID, PtkPeer::PANGKAT_GOLONGAN_ID, PtkPeer::KEAHLIAN_LABORATORIUM_ID, PtkPeer::SUMBER_GAJI_ID, PtkPeer::NAMA_IBU_KANDUNG, PtkPeer::STATUS_PERKAWINAN, PtkPeer::NAMA_SUAMI_ISTRI, PtkPeer::NIP_SUAMI_ISTRI, PtkPeer::PEKERJAAN_SUAMI_ISTRI, PtkPeer::TMT_PNS, PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH, PtkPeer::JUMLAH_SEKOLAH_BINAAN, PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN, PtkPeer::NM_WP, PtkPeer::STATUS_DATA, PtkPeer::KARPEG, PtkPeer::KARPAS, PtkPeer::MAMPU_HANDLE_KK, PtkPeer::KEAHLIAN_BRAILLE, PtkPeer::KEAHLIAN_BHS_ISYARAT, PtkPeer::NPWP, PtkPeer::KEWARGANEGARAAN, PtkPeer::ID_BANK, PtkPeer::REKENING_BANK, PtkPeer::REKENING_ATAS_NAMA, PtkPeer::BLOB_ID, PtkPeer::CREATE_DATE, PtkPeer::LAST_UPDATE, PtkPeer::SOFT_DELETE, PtkPeer::LAST_SYNC, PtkPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_ID', 'NAMA', 'NIP', 'JENIS_KELAMIN', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'NIK', 'NO_KK', 'NIY_NIGK', 'NUPTK', 'NUKS', 'STATUS_KEPEGAWAIAN_ID', 'JENIS_PTK_ID', 'PENGAWAS_BIDANG_STUDI_ID', 'AGAMA_ID', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'NO_TELEPON_RUMAH', 'NO_HP', 'EMAIL', 'STATUS_KEAKTIFAN_ID', 'SK_CPNS', 'TGL_CPNS', 'SK_PENGANGKATAN', 'TMT_PENGANGKATAN', 'LEMBAGA_PENGANGKAT_ID', 'PANGKAT_GOLONGAN_ID', 'KEAHLIAN_LABORATORIUM_ID', 'SUMBER_GAJI_ID', 'NAMA_IBU_KANDUNG', 'STATUS_PERKAWINAN', 'NAMA_SUAMI_ISTRI', 'NIP_SUAMI_ISTRI', 'PEKERJAAN_SUAMI_ISTRI', 'TMT_PNS', 'SUDAH_LISENSI_KEPALA_SEKOLAH', 'JUMLAH_SEKOLAH_BINAAN', 'PERNAH_DIKLAT_KEPENGAWASAN', 'NM_WP', 'STATUS_DATA', 'KARPEG', 'KARPAS', 'MAMPU_HANDLE_KK', 'KEAHLIAN_BRAILLE', 'KEAHLIAN_BHS_ISYARAT', 'NPWP', 'KEWARGANEGARAAN', 'ID_BANK', 'REKENING_BANK', 'REKENING_ATAS_NAMA', 'BLOB_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_id', 'nama', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nik', 'no_kk', 'niy_nigk', 'nuptk', 'nuks', 'status_kepegawaian_id', 'jenis_ptk_id', 'pengawas_bidang_studi_id', 'agama_id', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'no_telepon_rumah', 'no_hp', 'email', 'status_keaktifan_id', 'sk_cpns', 'tgl_cpns', 'sk_pengangkatan', 'tmt_pengangkatan', 'lembaga_pengangkat_id', 'pangkat_golongan_id', 'keahlian_laboratorium_id', 'sumber_gaji_id', 'nama_ibu_kandung', 'status_perkawinan', 'nama_suami_istri', 'nip_suami_istri', 'pekerjaan_suami_istri', 'tmt_pns', 'sudah_lisensi_kepala_sekolah', 'jumlah_sekolah_binaan', 'pernah_diklat_kepengawasan', 'nm_wp', 'status_data', 'karpeg', 'karpas', 'mampu_handle_kk', 'keahlian_braille', 'keahlian_bhs_isyarat', 'npwp', 'kewarganegaraan', 'id_bank', 'rekening_bank', 'rekening_atas_nama', 'blob_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PtkPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PtkId' => 0, 'Nama' => 1, 'Nip' => 2, 'JenisKelamin' => 3, 'TempatLahir' => 4, 'TanggalLahir' => 5, 'Nik' => 6, 'NoKk' => 7, 'NiyNigk' => 8, 'Nuptk' => 9, 'Nuks' => 10, 'StatusKepegawaianId' => 11, 'JenisPtkId' => 12, 'PengawasBidangStudiId' => 13, 'AgamaId' => 14, 'AlamatJalan' => 15, 'Rt' => 16, 'Rw' => 17, 'NamaDusun' => 18, 'DesaKelurahan' => 19, 'KodeWilayah' => 20, 'KodePos' => 21, 'Lintang' => 22, 'Bujur' => 23, 'NoTeleponRumah' => 24, 'NoHp' => 25, 'Email' => 26, 'StatusKeaktifanId' => 27, 'SkCpns' => 28, 'TglCpns' => 29, 'SkPengangkatan' => 30, 'TmtPengangkatan' => 31, 'LembagaPengangkatId' => 32, 'PangkatGolonganId' => 33, 'KeahlianLaboratoriumId' => 34, 'SumberGajiId' => 35, 'NamaIbuKandung' => 36, 'StatusPerkawinan' => 37, 'NamaSuamiIstri' => 38, 'NipSuamiIstri' => 39, 'PekerjaanSuamiIstri' => 40, 'TmtPns' => 41, 'SudahLisensiKepalaSekolah' => 42, 'JumlahSekolahBinaan' => 43, 'PernahDiklatKepengawasan' => 44, 'NmWp' => 45, 'StatusData' => 46, 'Karpeg' => 47, 'Karpas' => 48, 'MampuHandleKk' => 49, 'KeahlianBraille' => 50, 'KeahlianBhsIsyarat' => 51, 'Npwp' => 52, 'Kewarganegaraan' => 53, 'IdBank' => 54, 'RekeningBank' => 55, 'RekeningAtasNama' => 56, 'BlobId' => 57, 'CreateDate' => 58, 'LastUpdate' => 59, 'SoftDelete' => 60, 'LastSync' => 61, 'UpdaterId' => 62, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkId' => 0, 'nama' => 1, 'nip' => 2, 'jenisKelamin' => 3, 'tempatLahir' => 4, 'tanggalLahir' => 5, 'nik' => 6, 'noKk' => 7, 'niyNigk' => 8, 'nuptk' => 9, 'nuks' => 10, 'statusKepegawaianId' => 11, 'jenisPtkId' => 12, 'pengawasBidangStudiId' => 13, 'agamaId' => 14, 'alamatJalan' => 15, 'rt' => 16, 'rw' => 17, 'namaDusun' => 18, 'desaKelurahan' => 19, 'kodeWilayah' => 20, 'kodePos' => 21, 'lintang' => 22, 'bujur' => 23, 'noTeleponRumah' => 24, 'noHp' => 25, 'email' => 26, 'statusKeaktifanId' => 27, 'skCpns' => 28, 'tglCpns' => 29, 'skPengangkatan' => 30, 'tmtPengangkatan' => 31, 'lembagaPengangkatId' => 32, 'pangkatGolonganId' => 33, 'keahlianLaboratoriumId' => 34, 'sumberGajiId' => 35, 'namaIbuKandung' => 36, 'statusPerkawinan' => 37, 'namaSuamiIstri' => 38, 'nipSuamiIstri' => 39, 'pekerjaanSuamiIstri' => 40, 'tmtPns' => 41, 'sudahLisensiKepalaSekolah' => 42, 'jumlahSekolahBinaan' => 43, 'pernahDiklatKepengawasan' => 44, 'nmWp' => 45, 'statusData' => 46, 'karpeg' => 47, 'karpas' => 48, 'mampuHandleKk' => 49, 'keahlianBraille' => 50, 'keahlianBhsIsyarat' => 51, 'npwp' => 52, 'kewarganegaraan' => 53, 'idBank' => 54, 'rekeningBank' => 55, 'rekeningAtasNama' => 56, 'blobId' => 57, 'createDate' => 58, 'lastUpdate' => 59, 'softDelete' => 60, 'lastSync' => 61, 'updaterId' => 62, ),
        BasePeer::TYPE_COLNAME => array (PtkPeer::PTK_ID => 0, PtkPeer::NAMA => 1, PtkPeer::NIP => 2, PtkPeer::JENIS_KELAMIN => 3, PtkPeer::TEMPAT_LAHIR => 4, PtkPeer::TANGGAL_LAHIR => 5, PtkPeer::NIK => 6, PtkPeer::NO_KK => 7, PtkPeer::NIY_NIGK => 8, PtkPeer::NUPTK => 9, PtkPeer::NUKS => 10, PtkPeer::STATUS_KEPEGAWAIAN_ID => 11, PtkPeer::JENIS_PTK_ID => 12, PtkPeer::PENGAWAS_BIDANG_STUDI_ID => 13, PtkPeer::AGAMA_ID => 14, PtkPeer::ALAMAT_JALAN => 15, PtkPeer::RT => 16, PtkPeer::RW => 17, PtkPeer::NAMA_DUSUN => 18, PtkPeer::DESA_KELURAHAN => 19, PtkPeer::KODE_WILAYAH => 20, PtkPeer::KODE_POS => 21, PtkPeer::LINTANG => 22, PtkPeer::BUJUR => 23, PtkPeer::NO_TELEPON_RUMAH => 24, PtkPeer::NO_HP => 25, PtkPeer::EMAIL => 26, PtkPeer::STATUS_KEAKTIFAN_ID => 27, PtkPeer::SK_CPNS => 28, PtkPeer::TGL_CPNS => 29, PtkPeer::SK_PENGANGKATAN => 30, PtkPeer::TMT_PENGANGKATAN => 31, PtkPeer::LEMBAGA_PENGANGKAT_ID => 32, PtkPeer::PANGKAT_GOLONGAN_ID => 33, PtkPeer::KEAHLIAN_LABORATORIUM_ID => 34, PtkPeer::SUMBER_GAJI_ID => 35, PtkPeer::NAMA_IBU_KANDUNG => 36, PtkPeer::STATUS_PERKAWINAN => 37, PtkPeer::NAMA_SUAMI_ISTRI => 38, PtkPeer::NIP_SUAMI_ISTRI => 39, PtkPeer::PEKERJAAN_SUAMI_ISTRI => 40, PtkPeer::TMT_PNS => 41, PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH => 42, PtkPeer::JUMLAH_SEKOLAH_BINAAN => 43, PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN => 44, PtkPeer::NM_WP => 45, PtkPeer::STATUS_DATA => 46, PtkPeer::KARPEG => 47, PtkPeer::KARPAS => 48, PtkPeer::MAMPU_HANDLE_KK => 49, PtkPeer::KEAHLIAN_BRAILLE => 50, PtkPeer::KEAHLIAN_BHS_ISYARAT => 51, PtkPeer::NPWP => 52, PtkPeer::KEWARGANEGARAAN => 53, PtkPeer::ID_BANK => 54, PtkPeer::REKENING_BANK => 55, PtkPeer::REKENING_ATAS_NAMA => 56, PtkPeer::BLOB_ID => 57, PtkPeer::CREATE_DATE => 58, PtkPeer::LAST_UPDATE => 59, PtkPeer::SOFT_DELETE => 60, PtkPeer::LAST_SYNC => 61, PtkPeer::UPDATER_ID => 62, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_ID' => 0, 'NAMA' => 1, 'NIP' => 2, 'JENIS_KELAMIN' => 3, 'TEMPAT_LAHIR' => 4, 'TANGGAL_LAHIR' => 5, 'NIK' => 6, 'NO_KK' => 7, 'NIY_NIGK' => 8, 'NUPTK' => 9, 'NUKS' => 10, 'STATUS_KEPEGAWAIAN_ID' => 11, 'JENIS_PTK_ID' => 12, 'PENGAWAS_BIDANG_STUDI_ID' => 13, 'AGAMA_ID' => 14, 'ALAMAT_JALAN' => 15, 'RT' => 16, 'RW' => 17, 'NAMA_DUSUN' => 18, 'DESA_KELURAHAN' => 19, 'KODE_WILAYAH' => 20, 'KODE_POS' => 21, 'LINTANG' => 22, 'BUJUR' => 23, 'NO_TELEPON_RUMAH' => 24, 'NO_HP' => 25, 'EMAIL' => 26, 'STATUS_KEAKTIFAN_ID' => 27, 'SK_CPNS' => 28, 'TGL_CPNS' => 29, 'SK_PENGANGKATAN' => 30, 'TMT_PENGANGKATAN' => 31, 'LEMBAGA_PENGANGKAT_ID' => 32, 'PANGKAT_GOLONGAN_ID' => 33, 'KEAHLIAN_LABORATORIUM_ID' => 34, 'SUMBER_GAJI_ID' => 35, 'NAMA_IBU_KANDUNG' => 36, 'STATUS_PERKAWINAN' => 37, 'NAMA_SUAMI_ISTRI' => 38, 'NIP_SUAMI_ISTRI' => 39, 'PEKERJAAN_SUAMI_ISTRI' => 40, 'TMT_PNS' => 41, 'SUDAH_LISENSI_KEPALA_SEKOLAH' => 42, 'JUMLAH_SEKOLAH_BINAAN' => 43, 'PERNAH_DIKLAT_KEPENGAWASAN' => 44, 'NM_WP' => 45, 'STATUS_DATA' => 46, 'KARPEG' => 47, 'KARPAS' => 48, 'MAMPU_HANDLE_KK' => 49, 'KEAHLIAN_BRAILLE' => 50, 'KEAHLIAN_BHS_ISYARAT' => 51, 'NPWP' => 52, 'KEWARGANEGARAAN' => 53, 'ID_BANK' => 54, 'REKENING_BANK' => 55, 'REKENING_ATAS_NAMA' => 56, 'BLOB_ID' => 57, 'CREATE_DATE' => 58, 'LAST_UPDATE' => 59, 'SOFT_DELETE' => 60, 'LAST_SYNC' => 61, 'UPDATER_ID' => 62, ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_id' => 0, 'nama' => 1, 'nip' => 2, 'jenis_kelamin' => 3, 'tempat_lahir' => 4, 'tanggal_lahir' => 5, 'nik' => 6, 'no_kk' => 7, 'niy_nigk' => 8, 'nuptk' => 9, 'nuks' => 10, 'status_kepegawaian_id' => 11, 'jenis_ptk_id' => 12, 'pengawas_bidang_studi_id' => 13, 'agama_id' => 14, 'alamat_jalan' => 15, 'rt' => 16, 'rw' => 17, 'nama_dusun' => 18, 'desa_kelurahan' => 19, 'kode_wilayah' => 20, 'kode_pos' => 21, 'lintang' => 22, 'bujur' => 23, 'no_telepon_rumah' => 24, 'no_hp' => 25, 'email' => 26, 'status_keaktifan_id' => 27, 'sk_cpns' => 28, 'tgl_cpns' => 29, 'sk_pengangkatan' => 30, 'tmt_pengangkatan' => 31, 'lembaga_pengangkat_id' => 32, 'pangkat_golongan_id' => 33, 'keahlian_laboratorium_id' => 34, 'sumber_gaji_id' => 35, 'nama_ibu_kandung' => 36, 'status_perkawinan' => 37, 'nama_suami_istri' => 38, 'nip_suami_istri' => 39, 'pekerjaan_suami_istri' => 40, 'tmt_pns' => 41, 'sudah_lisensi_kepala_sekolah' => 42, 'jumlah_sekolah_binaan' => 43, 'pernah_diklat_kepengawasan' => 44, 'nm_wp' => 45, 'status_data' => 46, 'karpeg' => 47, 'karpas' => 48, 'mampu_handle_kk' => 49, 'keahlian_braille' => 50, 'keahlian_bhs_isyarat' => 51, 'npwp' => 52, 'kewarganegaraan' => 53, 'id_bank' => 54, 'rekening_bank' => 55, 'rekening_atas_nama' => 56, 'blob_id' => 57, 'create_date' => 58, 'last_update' => 59, 'soft_delete' => 60, 'last_sync' => 61, 'updater_id' => 62, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = PtkPeer::getFieldNames($toType);
        $key = isset(PtkPeer::$fieldKeys[$fromType][$name]) ? PtkPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PtkPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, PtkPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PtkPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. PtkPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PtkPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PtkPeer::PTK_ID);
            $criteria->addSelectColumn(PtkPeer::NAMA);
            $criteria->addSelectColumn(PtkPeer::NIP);
            $criteria->addSelectColumn(PtkPeer::JENIS_KELAMIN);
            $criteria->addSelectColumn(PtkPeer::TEMPAT_LAHIR);
            $criteria->addSelectColumn(PtkPeer::TANGGAL_LAHIR);
            $criteria->addSelectColumn(PtkPeer::NIK);
            $criteria->addSelectColumn(PtkPeer::NO_KK);
            $criteria->addSelectColumn(PtkPeer::NIY_NIGK);
            $criteria->addSelectColumn(PtkPeer::NUPTK);
            $criteria->addSelectColumn(PtkPeer::NUKS);
            $criteria->addSelectColumn(PtkPeer::STATUS_KEPEGAWAIAN_ID);
            $criteria->addSelectColumn(PtkPeer::JENIS_PTK_ID);
            $criteria->addSelectColumn(PtkPeer::PENGAWAS_BIDANG_STUDI_ID);
            $criteria->addSelectColumn(PtkPeer::AGAMA_ID);
            $criteria->addSelectColumn(PtkPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(PtkPeer::RT);
            $criteria->addSelectColumn(PtkPeer::RW);
            $criteria->addSelectColumn(PtkPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(PtkPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(PtkPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(PtkPeer::KODE_POS);
            $criteria->addSelectColumn(PtkPeer::LINTANG);
            $criteria->addSelectColumn(PtkPeer::BUJUR);
            $criteria->addSelectColumn(PtkPeer::NO_TELEPON_RUMAH);
            $criteria->addSelectColumn(PtkPeer::NO_HP);
            $criteria->addSelectColumn(PtkPeer::EMAIL);
            $criteria->addSelectColumn(PtkPeer::STATUS_KEAKTIFAN_ID);
            $criteria->addSelectColumn(PtkPeer::SK_CPNS);
            $criteria->addSelectColumn(PtkPeer::TGL_CPNS);
            $criteria->addSelectColumn(PtkPeer::SK_PENGANGKATAN);
            $criteria->addSelectColumn(PtkPeer::TMT_PENGANGKATAN);
            $criteria->addSelectColumn(PtkPeer::LEMBAGA_PENGANGKAT_ID);
            $criteria->addSelectColumn(PtkPeer::PANGKAT_GOLONGAN_ID);
            $criteria->addSelectColumn(PtkPeer::KEAHLIAN_LABORATORIUM_ID);
            $criteria->addSelectColumn(PtkPeer::SUMBER_GAJI_ID);
            $criteria->addSelectColumn(PtkPeer::NAMA_IBU_KANDUNG);
            $criteria->addSelectColumn(PtkPeer::STATUS_PERKAWINAN);
            $criteria->addSelectColumn(PtkPeer::NAMA_SUAMI_ISTRI);
            $criteria->addSelectColumn(PtkPeer::NIP_SUAMI_ISTRI);
            $criteria->addSelectColumn(PtkPeer::PEKERJAAN_SUAMI_ISTRI);
            $criteria->addSelectColumn(PtkPeer::TMT_PNS);
            $criteria->addSelectColumn(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH);
            $criteria->addSelectColumn(PtkPeer::JUMLAH_SEKOLAH_BINAAN);
            $criteria->addSelectColumn(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN);
            $criteria->addSelectColumn(PtkPeer::NM_WP);
            $criteria->addSelectColumn(PtkPeer::STATUS_DATA);
            $criteria->addSelectColumn(PtkPeer::KARPEG);
            $criteria->addSelectColumn(PtkPeer::KARPAS);
            $criteria->addSelectColumn(PtkPeer::MAMPU_HANDLE_KK);
            $criteria->addSelectColumn(PtkPeer::KEAHLIAN_BRAILLE);
            $criteria->addSelectColumn(PtkPeer::KEAHLIAN_BHS_ISYARAT);
            $criteria->addSelectColumn(PtkPeer::NPWP);
            $criteria->addSelectColumn(PtkPeer::KEWARGANEGARAAN);
            $criteria->addSelectColumn(PtkPeer::ID_BANK);
            $criteria->addSelectColumn(PtkPeer::REKENING_BANK);
            $criteria->addSelectColumn(PtkPeer::REKENING_ATAS_NAMA);
            $criteria->addSelectColumn(PtkPeer::BLOB_ID);
            $criteria->addSelectColumn(PtkPeer::CREATE_DATE);
            $criteria->addSelectColumn(PtkPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PtkPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PtkPeer::LAST_SYNC);
            $criteria->addSelectColumn(PtkPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.nip');
            $criteria->addSelectColumn($alias . '.jenis_kelamin');
            $criteria->addSelectColumn($alias . '.tempat_lahir');
            $criteria->addSelectColumn($alias . '.tanggal_lahir');
            $criteria->addSelectColumn($alias . '.nik');
            $criteria->addSelectColumn($alias . '.no_kk');
            $criteria->addSelectColumn($alias . '.niy_nigk');
            $criteria->addSelectColumn($alias . '.nuptk');
            $criteria->addSelectColumn($alias . '.nuks');
            $criteria->addSelectColumn($alias . '.status_kepegawaian_id');
            $criteria->addSelectColumn($alias . '.jenis_ptk_id');
            $criteria->addSelectColumn($alias . '.pengawas_bidang_studi_id');
            $criteria->addSelectColumn($alias . '.agama_id');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.no_telepon_rumah');
            $criteria->addSelectColumn($alias . '.no_hp');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.status_keaktifan_id');
            $criteria->addSelectColumn($alias . '.sk_cpns');
            $criteria->addSelectColumn($alias . '.tgl_cpns');
            $criteria->addSelectColumn($alias . '.sk_pengangkatan');
            $criteria->addSelectColumn($alias . '.tmt_pengangkatan');
            $criteria->addSelectColumn($alias . '.lembaga_pengangkat_id');
            $criteria->addSelectColumn($alias . '.pangkat_golongan_id');
            $criteria->addSelectColumn($alias . '.keahlian_laboratorium_id');
            $criteria->addSelectColumn($alias . '.sumber_gaji_id');
            $criteria->addSelectColumn($alias . '.nama_ibu_kandung');
            $criteria->addSelectColumn($alias . '.status_perkawinan');
            $criteria->addSelectColumn($alias . '.nama_suami_istri');
            $criteria->addSelectColumn($alias . '.nip_suami_istri');
            $criteria->addSelectColumn($alias . '.pekerjaan_suami_istri');
            $criteria->addSelectColumn($alias . '.tmt_pns');
            $criteria->addSelectColumn($alias . '.sudah_lisensi_kepala_sekolah');
            $criteria->addSelectColumn($alias . '.jumlah_sekolah_binaan');
            $criteria->addSelectColumn($alias . '.pernah_diklat_kepengawasan');
            $criteria->addSelectColumn($alias . '.nm_wp');
            $criteria->addSelectColumn($alias . '.status_data');
            $criteria->addSelectColumn($alias . '.karpeg');
            $criteria->addSelectColumn($alias . '.karpas');
            $criteria->addSelectColumn($alias . '.mampu_handle_kk');
            $criteria->addSelectColumn($alias . '.keahlian_braille');
            $criteria->addSelectColumn($alias . '.keahlian_bhs_isyarat');
            $criteria->addSelectColumn($alias . '.npwp');
            $criteria->addSelectColumn($alias . '.kewarganegaraan');
            $criteria->addSelectColumn($alias . '.id_bank');
            $criteria->addSelectColumn($alias . '.rekening_bank');
            $criteria->addSelectColumn($alias . '.rekening_atas_nama');
            $criteria->addSelectColumn($alias . '.blob_id');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.soft_delete');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.updater_id');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PtkPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Ptk
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PtkPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return PtkPeer::populateObjects(PtkPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PtkPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Ptk $obj A Ptk object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPtkId();
            } // if key === null
            PtkPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Ptk object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Ptk) {
                $key = (string) $value->getPtkId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Ptk object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PtkPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Ptk Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PtkPeer::$instances[$key])) {
                return PtkPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (PtkPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PtkPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ptk
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (string) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = PtkPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PtkPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PtkPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Ptk object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PtkPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PtkPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PtkPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PtkPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Bank table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBank(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LargeObject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLargeObject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisPtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LembagaPengangkat table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembagaPengangkat(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related StatusKeaktifanPegawai table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStatusKeaktifanPegawai(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SumberGaji table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberGaji(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PangkatGolongan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPangkatGolongan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KeahlianLaboratorium table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKeahlianLaboratorium(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pekerjaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPekerjaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Agama table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAgama(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related StatusKepegawaian table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStatusKepegawaian(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their Negara objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        NegaraPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = NegaraPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their Bank objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBank(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        BankPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BankPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BankPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BankPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (Bank)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their LargeObject objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLargeObject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        LargeObjectPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (LargeObject)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their JenisPtk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        JenisPtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (JenisPtk)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (MstWilayah)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (KebutuhanKhusus)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their LembagaPengangkat objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembagaPengangkat(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        LembagaPengangkatPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembagaPengangkatPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaPengangkatPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembagaPengangkatPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (LembagaPengangkat)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their StatusKeaktifanPegawai objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKeaktifanPegawai(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (StatusKeaktifanPegawai)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their SumberGaji objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberGaji(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        SumberGajiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberGajiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberGajiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberGajiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (SumberGaji)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their PangkatGolongan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPangkatGolongan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        PangkatGolonganPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PangkatGolonganPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PangkatGolonganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PangkatGolonganPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (PangkatGolongan)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their BidangStudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        BidangStudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (BidangStudi)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their KeahlianLaboratorium objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKeahlianLaboratorium(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        KeahlianLaboratoriumPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KeahlianLaboratoriumPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (KeahlianLaboratorium)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their Pekerjaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPekerjaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        PekerjaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PekerjaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PekerjaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (Pekerjaan)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their Agama objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAgama(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        AgamaPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AgamaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AgamaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AgamaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (Agama)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with their StatusKepegawaian objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepegawaian(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol = PtkPeer::NUM_HYDRATE_COLUMNS;
        StatusKepegawaianPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StatusKepegawaianPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StatusKepegawaianPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StatusKepegawaianPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ptk) to $obj2 (StatusKepegawaian)
                $obj2->addPtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Ptk objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Negara rows

            $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = NegaraPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined Bank rows

            $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = BankPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined LargeObject rows

            $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined JenisPtk rows

            $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined MstWilayah rows

            $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined KebutuhanKhusus rows

            $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined LembagaPengangkat rows

            $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined StatusKeaktifanPegawai rows

            $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined SumberGaji rows

            $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
            if ($key10 !== null) {
                $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                if (!$obj10) {

                    $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if obj10 loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined PangkatGolongan rows

            $key11 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol11);
            if ($key11 !== null) {
                $obj11 = PangkatGolonganPeer::getInstanceFromPool($key11);
                if (!$obj11) {

                    $cls = PangkatGolonganPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PangkatGolonganPeer::addInstanceToPool($obj11, $key11);
                } // if obj11 loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (PangkatGolongan)
                $obj11->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined BidangStudi rows

            $key12 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
            if ($key12 !== null) {
                $obj12 = BidangStudiPeer::getInstanceFromPool($key12);
                if (!$obj12) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    BidangStudiPeer::addInstanceToPool($obj12, $key12);
                } // if obj12 loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (BidangStudi)
                $obj12->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined KeahlianLaboratorium rows

            $key13 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol13);
            if ($key13 !== null) {
                $obj13 = KeahlianLaboratoriumPeer::getInstanceFromPool($key13);
                if (!$obj13) {

                    $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj13, $key13);
                } // if obj13 loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (KeahlianLaboratorium)
                $obj13->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined Pekerjaan rows

            $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
            if ($key14 !== null) {
                $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                if (!$obj14) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if obj14 loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Pekerjaan)
                $obj14->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined Agama rows

            $key15 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol15);
            if ($key15 !== null) {
                $obj15 = AgamaPeer::getInstanceFromPool($key15);
                if (!$obj15) {

                    $cls = AgamaPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    AgamaPeer::addInstanceToPool($obj15, $key15);
                } // if obj15 loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (Agama)
                $obj15->addPtk($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepegawaian rows

            $key16 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol16);
            if ($key16 !== null) {
                $obj16 = StatusKepegawaianPeer::getInstanceFromPool($key16);
                if (!$obj16) {

                    $cls = StatusKepegawaianPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    StatusKepegawaianPeer::addInstanceToPool($obj16, $key16);
                } // if obj16 loaded

                // Add the $obj1 (Ptk) to the collection in $obj16 (StatusKepegawaian)
                $obj16->addPtk($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Bank table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBank(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LargeObject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLargeObject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisPtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LembagaPengangkat table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembagaPengangkat(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related StatusKeaktifanPegawai table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStatusKeaktifanPegawai(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SumberGaji table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberGaji(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PangkatGolongan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPangkatGolongan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KeahlianLaboratorium table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKeahlianLaboratorium(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Pekerjaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPekerjaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Agama table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAgama(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related StatusKepegawaian table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStatusKepegawaian(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except Negara.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Bank rows

                $key2 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BankPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BankPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BankPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Bank)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key3 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LargeObjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LargeObjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (LargeObject)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key4 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPtkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPtkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (JenisPtk)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (MstWilayah)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key6 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = KebutuhanKhususPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    KebutuhanKhususPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (KebutuhanKhusus)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key7 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = LembagaPengangkatPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    LembagaPengangkatPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (LembagaPengangkat)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except Bank.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBank(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key3 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LargeObjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LargeObjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (LargeObject)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key4 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPtkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPtkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (JenisPtk)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (MstWilayah)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key6 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = KebutuhanKhususPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    KebutuhanKhususPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (KebutuhanKhusus)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key7 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = LembagaPengangkatPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    LembagaPengangkatPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (LembagaPengangkat)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except LargeObject.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLargeObject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key4 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPtkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPtkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (JenisPtk)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (MstWilayah)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key6 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = KebutuhanKhususPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    KebutuhanKhususPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (KebutuhanKhusus)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key7 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = LembagaPengangkatPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    LembagaPengangkatPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (LembagaPengangkat)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except JenisPtk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (MstWilayah)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key6 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = KebutuhanKhususPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    KebutuhanKhususPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (KebutuhanKhusus)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key7 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = LembagaPengangkatPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    LembagaPengangkatPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (LembagaPengangkat)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except MstWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key6 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = KebutuhanKhususPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    KebutuhanKhususPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (KebutuhanKhusus)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key7 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = LembagaPengangkatPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    LembagaPengangkatPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (LembagaPengangkat)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except KebutuhanKhusus.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key7 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = LembagaPengangkatPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    LembagaPengangkatPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (LembagaPengangkat)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except LembagaPengangkat.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembagaPengangkat(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key8 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (StatusKeaktifanPegawai)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except StatusKeaktifanPegawai.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStatusKeaktifanPegawai(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key9 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = SumberGajiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SumberGajiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (SumberGaji)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except SumberGaji.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberGaji(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key10 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PangkatGolonganPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PangkatGolonganPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (PangkatGolongan)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except PangkatGolongan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPangkatGolongan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key11 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = BidangStudiPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    BidangStudiPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (BidangStudi)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except BidangStudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key11 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PangkatGolonganPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PangkatGolonganPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (PangkatGolongan)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key12 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = KeahlianLaboratoriumPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (KeahlianLaboratorium)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except KeahlianLaboratorium.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKeahlianLaboratorium(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key11 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PangkatGolonganPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PangkatGolonganPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (PangkatGolongan)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key12 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = BidangStudiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    BidangStudiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (BidangStudi)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (Pekerjaan)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except Pekerjaan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPekerjaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key11 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PangkatGolonganPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PangkatGolonganPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (PangkatGolongan)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key12 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = BidangStudiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    BidangStudiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (BidangStudi)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key13 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = KeahlianLaboratoriumPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (KeahlianLaboratorium)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key14 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = AgamaPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    AgamaPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Agama)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except Agama.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAgama(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key11 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PangkatGolonganPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PangkatGolonganPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (PangkatGolongan)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key12 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = BidangStudiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    BidangStudiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (BidangStudi)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key13 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = KeahlianLaboratoriumPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (KeahlianLaboratorium)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Pekerjaan)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key15 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = StatusKepegawaianPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    StatusKepegawaianPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (StatusKepegawaian)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ptk objects pre-filled with all related objects except StatusKepegawaian.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ptk objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStatusKepegawaian(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkPeer::DATABASE_NAME);
        }

        PtkPeer::addSelectColumns($criteria);
        $startcol2 = PtkPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        StatusKeaktifanPegawaiPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + StatusKeaktifanPegawaiPeer::NUM_HYDRATE_COLUMNS;

        SumberGajiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SumberGajiPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        KeahlianLaboratoriumPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + KeahlianLaboratoriumPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PtkPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PtkPeer::MAMPU_HANDLE_KK, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::STATUS_KEAKTIFAN_ID, StatusKeaktifanPegawaiPeer::STATUS_KEAKTIFAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::SUMBER_GAJI_ID, SumberGajiPeer::SUMBER_GAJI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::KEAHLIAN_LABORATORIUM_ID, KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::PEKERJAAN_SUAMI_ISTRI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PtkPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj2 (Negara)
                $obj2->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key3 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BankPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BankPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj3 (Bank)
                $obj3->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key4 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LargeObjectPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LargeObjectPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj4 (LargeObject)
                $obj4->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key5 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj5 (JenisPtk)
                $obj5->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj6 (MstWilayah)
                $obj6->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key8 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = LembagaPengangkatPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    LembagaPengangkatPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj8 (LembagaPengangkat)
                $obj8->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKeaktifanPegawai rows

                $key9 = StatusKeaktifanPegawaiPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = StatusKeaktifanPegawaiPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = StatusKeaktifanPegawaiPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    StatusKeaktifanPegawaiPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj9 (StatusKeaktifanPegawai)
                $obj9->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined SumberGaji rows

                $key10 = SumberGajiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SumberGajiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SumberGajiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SumberGajiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj10 (SumberGaji)
                $obj10->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined PangkatGolongan rows

                $key11 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PangkatGolonganPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PangkatGolonganPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj11 (PangkatGolongan)
                $obj11->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key12 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = BidangStudiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    BidangStudiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj12 (BidangStudi)
                $obj12->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined KeahlianLaboratorium rows

                $key13 = KeahlianLaboratoriumPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = KeahlianLaboratoriumPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = KeahlianLaboratoriumPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    KeahlianLaboratoriumPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj13 (KeahlianLaboratorium)
                $obj13->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj14 (Pekerjaan)
                $obj14->addPtk($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key15 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = AgamaPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    AgamaPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Ptk) to the collection in $obj15 (Agama)
                $obj15->addPtk($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(PtkPeer::DATABASE_NAME)->getTable(PtkPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePtkPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePtkPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PtkTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return PtkPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Ptk or Criteria object.
     *
     * @param      mixed $values Criteria or Ptk object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Ptk object
        }


        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Ptk or Criteria object.
     *
     * @param      mixed $values Criteria or Ptk object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PtkPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PtkPeer::PTK_ID);
            $value = $criteria->remove(PtkPeer::PTK_ID);
            if ($value) {
                $selectCriteria->add(PtkPeer::PTK_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PtkPeer::TABLE_NAME);
            }

        } else { // $values is Ptk object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ptk table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PtkPeer::TABLE_NAME, $con, PtkPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PtkPeer::clearInstancePool();
            PtkPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Ptk or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Ptk object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PtkPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Ptk) { // it's a model object
            // invalidate the cache for this single object
            PtkPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PtkPeer::DATABASE_NAME);
            $criteria->add(PtkPeer::PTK_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PtkPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PtkPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PtkPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Ptk object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Ptk $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PtkPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PtkPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(PtkPeer::DATABASE_NAME, PtkPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Ptk
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PtkPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PtkPeer::DATABASE_NAME);
        $criteria->add(PtkPeer::PTK_ID, $pk);

        $v = PtkPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Ptk[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PtkPeer::DATABASE_NAME);
            $criteria->add(PtkPeer::PTK_ID, $pks, Criteria::IN);
            $objs = PtkPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePtkPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePtkPeer::buildTableMap();

