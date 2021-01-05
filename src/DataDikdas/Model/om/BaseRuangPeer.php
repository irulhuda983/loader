<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\map\RuangTableMap;

/**
 * Base static class for performing query and update operations on the 'ruang' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRuangPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ruang';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Ruang';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RuangTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 33;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 33;

    /** the column name for the id_ruang field */
    const ID_RUANG = 'ruang.id_ruang';

    /** the column name for the jenis_prasarana_id field */
    const JENIS_PRASARANA_ID = 'ruang.jenis_prasarana_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'ruang.sekolah_id';

    /** the column name for the id_bangunan field */
    const ID_BANGUNAN = 'ruang.id_bangunan';

    /** the column name for the kd_ruang field */
    const KD_RUANG = 'ruang.kd_ruang';

    /** the column name for the nm_ruang field */
    const NM_RUANG = 'ruang.nm_ruang';

    /** the column name for the lantai field */
    const LANTAI = 'ruang.lantai';

    /** the column name for the panjang field */
    const PANJANG = 'ruang.panjang';

    /** the column name for the lebar field */
    const LEBAR = 'ruang.lebar';

    /** the column name for the reg_pras field */
    const REG_PRAS = 'ruang.reg_pras';

    /** the column name for the kapasitas field */
    const KAPASITAS = 'ruang.kapasitas';

    /** the column name for the luas_ruang field */
    const LUAS_RUANG = 'ruang.luas_ruang';

    /** the column name for the luas_plester_m2 field */
    const LUAS_PLESTER_M2 = 'ruang.luas_plester_m2';

    /** the column name for the luas_plafon_m2 field */
    const LUAS_PLAFON_M2 = 'ruang.luas_plafon_m2';

    /** the column name for the luas_dinding_m2 field */
    const LUAS_DINDING_M2 = 'ruang.luas_dinding_m2';

    /** the column name for the luas_daun_jendela_m2 field */
    const LUAS_DAUN_JENDELA_M2 = 'ruang.luas_daun_jendela_m2';

    /** the column name for the luas_daun_pintu_m2 field */
    const LUAS_DAUN_PINTU_M2 = 'ruang.luas_daun_pintu_m2';

    /** the column name for the panj_kusen_m field */
    const PANJ_KUSEN_M = 'ruang.panj_kusen_m';

    /** the column name for the luas_tutup_lantai_m2 field */
    const LUAS_TUTUP_LANTAI_M2 = 'ruang.luas_tutup_lantai_m2';

    /** the column name for the panj_inst_listrik_m field */
    const PANJ_INST_LISTRIK_M = 'ruang.panj_inst_listrik_m';

    /** the column name for the jml_inst_listrik field */
    const JML_INST_LISTRIK = 'ruang.jml_inst_listrik';

    /** the column name for the panj_inst_air_m field */
    const PANJ_INST_AIR_M = 'ruang.panj_inst_air_m';

    /** the column name for the jml_inst_air field */
    const JML_INST_AIR = 'ruang.jml_inst_air';

    /** the column name for the panj_drainase_m field */
    const PANJ_DRAINASE_M = 'ruang.panj_drainase_m';

    /** the column name for the luas_finish_struktur_m2 field */
    const LUAS_FINISH_STRUKTUR_M2 = 'ruang.luas_finish_struktur_m2';

    /** the column name for the luas_finish_plafon_m2 field */
    const LUAS_FINISH_PLAFON_M2 = 'ruang.luas_finish_plafon_m2';

    /** the column name for the luas_finish_dinding_m2 field */
    const LUAS_FINISH_DINDING_M2 = 'ruang.luas_finish_dinding_m2';

    /** the column name for the luas_finish_kpj_m2 field */
    const LUAS_FINISH_KPJ_M2 = 'ruang.luas_finish_kpj_m2';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ruang.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ruang.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'ruang.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ruang.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'ruang.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Ruang objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Ruang[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RuangPeer::$fieldNames[RuangPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdRuang', 'JenisPrasaranaId', 'SekolahId', 'IdBangunan', 'KdRuang', 'NmRuang', 'Lantai', 'Panjang', 'Lebar', 'RegPras', 'Kapasitas', 'LuasRuang', 'LuasPlesterM2', 'LuasPlafonM2', 'LuasDindingM2', 'LuasDaunJendelaM2', 'LuasDaunPintuM2', 'PanjKusenM', 'LuasTutupLantaiM2', 'PanjInstListrikM', 'JmlInstListrik', 'PanjInstAirM', 'JmlInstAir', 'PanjDrainaseM', 'LuasFinishStrukturM2', 'LuasFinishPlafonM2', 'LuasFinishDindingM2', 'LuasFinishKpjM2', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idRuang', 'jenisPrasaranaId', 'sekolahId', 'idBangunan', 'kdRuang', 'nmRuang', 'lantai', 'panjang', 'lebar', 'regPras', 'kapasitas', 'luasRuang', 'luasPlesterM2', 'luasPlafonM2', 'luasDindingM2', 'luasDaunJendelaM2', 'luasDaunPintuM2', 'panjKusenM', 'luasTutupLantaiM2', 'panjInstListrikM', 'jmlInstListrik', 'panjInstAirM', 'jmlInstAir', 'panjDrainaseM', 'luasFinishStrukturM2', 'luasFinishPlafonM2', 'luasFinishDindingM2', 'luasFinishKpjM2', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RuangPeer::ID_RUANG, RuangPeer::JENIS_PRASARANA_ID, RuangPeer::SEKOLAH_ID, RuangPeer::ID_BANGUNAN, RuangPeer::KD_RUANG, RuangPeer::NM_RUANG, RuangPeer::LANTAI, RuangPeer::PANJANG, RuangPeer::LEBAR, RuangPeer::REG_PRAS, RuangPeer::KAPASITAS, RuangPeer::LUAS_RUANG, RuangPeer::LUAS_PLESTER_M2, RuangPeer::LUAS_PLAFON_M2, RuangPeer::LUAS_DINDING_M2, RuangPeer::LUAS_DAUN_JENDELA_M2, RuangPeer::LUAS_DAUN_PINTU_M2, RuangPeer::PANJ_KUSEN_M, RuangPeer::LUAS_TUTUP_LANTAI_M2, RuangPeer::PANJ_INST_LISTRIK_M, RuangPeer::JML_INST_LISTRIK, RuangPeer::PANJ_INST_AIR_M, RuangPeer::JML_INST_AIR, RuangPeer::PANJ_DRAINASE_M, RuangPeer::LUAS_FINISH_STRUKTUR_M2, RuangPeer::LUAS_FINISH_PLAFON_M2, RuangPeer::LUAS_FINISH_DINDING_M2, RuangPeer::LUAS_FINISH_KPJ_M2, RuangPeer::CREATE_DATE, RuangPeer::LAST_UPDATE, RuangPeer::SOFT_DELETE, RuangPeer::LAST_SYNC, RuangPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_RUANG', 'JENIS_PRASARANA_ID', 'SEKOLAH_ID', 'ID_BANGUNAN', 'KD_RUANG', 'NM_RUANG', 'LANTAI', 'PANJANG', 'LEBAR', 'REG_PRAS', 'KAPASITAS', 'LUAS_RUANG', 'LUAS_PLESTER_M2', 'LUAS_PLAFON_M2', 'LUAS_DINDING_M2', 'LUAS_DAUN_JENDELA_M2', 'LUAS_DAUN_PINTU_M2', 'PANJ_KUSEN_M', 'LUAS_TUTUP_LANTAI_M2', 'PANJ_INST_LISTRIK_M', 'JML_INST_LISTRIK', 'PANJ_INST_AIR_M', 'JML_INST_AIR', 'PANJ_DRAINASE_M', 'LUAS_FINISH_STRUKTUR_M2', 'LUAS_FINISH_PLAFON_M2', 'LUAS_FINISH_DINDING_M2', 'LUAS_FINISH_KPJ_M2', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_ruang', 'jenis_prasarana_id', 'sekolah_id', 'id_bangunan', 'kd_ruang', 'nm_ruang', 'lantai', 'panjang', 'lebar', 'reg_pras', 'kapasitas', 'luas_ruang', 'luas_plester_m2', 'luas_plafon_m2', 'luas_dinding_m2', 'luas_daun_jendela_m2', 'luas_daun_pintu_m2', 'panj_kusen_m', 'luas_tutup_lantai_m2', 'panj_inst_listrik_m', 'jml_inst_listrik', 'panj_inst_air_m', 'jml_inst_air', 'panj_drainase_m', 'luas_finish_struktur_m2', 'luas_finish_plafon_m2', 'luas_finish_dinding_m2', 'luas_finish_kpj_m2', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RuangPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdRuang' => 0, 'JenisPrasaranaId' => 1, 'SekolahId' => 2, 'IdBangunan' => 3, 'KdRuang' => 4, 'NmRuang' => 5, 'Lantai' => 6, 'Panjang' => 7, 'Lebar' => 8, 'RegPras' => 9, 'Kapasitas' => 10, 'LuasRuang' => 11, 'LuasPlesterM2' => 12, 'LuasPlafonM2' => 13, 'LuasDindingM2' => 14, 'LuasDaunJendelaM2' => 15, 'LuasDaunPintuM2' => 16, 'PanjKusenM' => 17, 'LuasTutupLantaiM2' => 18, 'PanjInstListrikM' => 19, 'JmlInstListrik' => 20, 'PanjInstAirM' => 21, 'JmlInstAir' => 22, 'PanjDrainaseM' => 23, 'LuasFinishStrukturM2' => 24, 'LuasFinishPlafonM2' => 25, 'LuasFinishDindingM2' => 26, 'LuasFinishKpjM2' => 27, 'CreateDate' => 28, 'LastUpdate' => 29, 'SoftDelete' => 30, 'LastSync' => 31, 'UpdaterId' => 32, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idRuang' => 0, 'jenisPrasaranaId' => 1, 'sekolahId' => 2, 'idBangunan' => 3, 'kdRuang' => 4, 'nmRuang' => 5, 'lantai' => 6, 'panjang' => 7, 'lebar' => 8, 'regPras' => 9, 'kapasitas' => 10, 'luasRuang' => 11, 'luasPlesterM2' => 12, 'luasPlafonM2' => 13, 'luasDindingM2' => 14, 'luasDaunJendelaM2' => 15, 'luasDaunPintuM2' => 16, 'panjKusenM' => 17, 'luasTutupLantaiM2' => 18, 'panjInstListrikM' => 19, 'jmlInstListrik' => 20, 'panjInstAirM' => 21, 'jmlInstAir' => 22, 'panjDrainaseM' => 23, 'luasFinishStrukturM2' => 24, 'luasFinishPlafonM2' => 25, 'luasFinishDindingM2' => 26, 'luasFinishKpjM2' => 27, 'createDate' => 28, 'lastUpdate' => 29, 'softDelete' => 30, 'lastSync' => 31, 'updaterId' => 32, ),
        BasePeer::TYPE_COLNAME => array (RuangPeer::ID_RUANG => 0, RuangPeer::JENIS_PRASARANA_ID => 1, RuangPeer::SEKOLAH_ID => 2, RuangPeer::ID_BANGUNAN => 3, RuangPeer::KD_RUANG => 4, RuangPeer::NM_RUANG => 5, RuangPeer::LANTAI => 6, RuangPeer::PANJANG => 7, RuangPeer::LEBAR => 8, RuangPeer::REG_PRAS => 9, RuangPeer::KAPASITAS => 10, RuangPeer::LUAS_RUANG => 11, RuangPeer::LUAS_PLESTER_M2 => 12, RuangPeer::LUAS_PLAFON_M2 => 13, RuangPeer::LUAS_DINDING_M2 => 14, RuangPeer::LUAS_DAUN_JENDELA_M2 => 15, RuangPeer::LUAS_DAUN_PINTU_M2 => 16, RuangPeer::PANJ_KUSEN_M => 17, RuangPeer::LUAS_TUTUP_LANTAI_M2 => 18, RuangPeer::PANJ_INST_LISTRIK_M => 19, RuangPeer::JML_INST_LISTRIK => 20, RuangPeer::PANJ_INST_AIR_M => 21, RuangPeer::JML_INST_AIR => 22, RuangPeer::PANJ_DRAINASE_M => 23, RuangPeer::LUAS_FINISH_STRUKTUR_M2 => 24, RuangPeer::LUAS_FINISH_PLAFON_M2 => 25, RuangPeer::LUAS_FINISH_DINDING_M2 => 26, RuangPeer::LUAS_FINISH_KPJ_M2 => 27, RuangPeer::CREATE_DATE => 28, RuangPeer::LAST_UPDATE => 29, RuangPeer::SOFT_DELETE => 30, RuangPeer::LAST_SYNC => 31, RuangPeer::UPDATER_ID => 32, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_RUANG' => 0, 'JENIS_PRASARANA_ID' => 1, 'SEKOLAH_ID' => 2, 'ID_BANGUNAN' => 3, 'KD_RUANG' => 4, 'NM_RUANG' => 5, 'LANTAI' => 6, 'PANJANG' => 7, 'LEBAR' => 8, 'REG_PRAS' => 9, 'KAPASITAS' => 10, 'LUAS_RUANG' => 11, 'LUAS_PLESTER_M2' => 12, 'LUAS_PLAFON_M2' => 13, 'LUAS_DINDING_M2' => 14, 'LUAS_DAUN_JENDELA_M2' => 15, 'LUAS_DAUN_PINTU_M2' => 16, 'PANJ_KUSEN_M' => 17, 'LUAS_TUTUP_LANTAI_M2' => 18, 'PANJ_INST_LISTRIK_M' => 19, 'JML_INST_LISTRIK' => 20, 'PANJ_INST_AIR_M' => 21, 'JML_INST_AIR' => 22, 'PANJ_DRAINASE_M' => 23, 'LUAS_FINISH_STRUKTUR_M2' => 24, 'LUAS_FINISH_PLAFON_M2' => 25, 'LUAS_FINISH_DINDING_M2' => 26, 'LUAS_FINISH_KPJ_M2' => 27, 'CREATE_DATE' => 28, 'LAST_UPDATE' => 29, 'SOFT_DELETE' => 30, 'LAST_SYNC' => 31, 'UPDATER_ID' => 32, ),
        BasePeer::TYPE_FIELDNAME => array ('id_ruang' => 0, 'jenis_prasarana_id' => 1, 'sekolah_id' => 2, 'id_bangunan' => 3, 'kd_ruang' => 4, 'nm_ruang' => 5, 'lantai' => 6, 'panjang' => 7, 'lebar' => 8, 'reg_pras' => 9, 'kapasitas' => 10, 'luas_ruang' => 11, 'luas_plester_m2' => 12, 'luas_plafon_m2' => 13, 'luas_dinding_m2' => 14, 'luas_daun_jendela_m2' => 15, 'luas_daun_pintu_m2' => 16, 'panj_kusen_m' => 17, 'luas_tutup_lantai_m2' => 18, 'panj_inst_listrik_m' => 19, 'jml_inst_listrik' => 20, 'panj_inst_air_m' => 21, 'jml_inst_air' => 22, 'panj_drainase_m' => 23, 'luas_finish_struktur_m2' => 24, 'luas_finish_plafon_m2' => 25, 'luas_finish_dinding_m2' => 26, 'luas_finish_kpj_m2' => 27, 'create_date' => 28, 'last_update' => 29, 'soft_delete' => 30, 'last_sync' => 31, 'updater_id' => 32, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
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
        $toNames = RuangPeer::getFieldNames($toType);
        $key = isset(RuangPeer::$fieldKeys[$fromType][$name]) ? RuangPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RuangPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RuangPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RuangPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RuangPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RuangPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RuangPeer::ID_RUANG);
            $criteria->addSelectColumn(RuangPeer::JENIS_PRASARANA_ID);
            $criteria->addSelectColumn(RuangPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(RuangPeer::ID_BANGUNAN);
            $criteria->addSelectColumn(RuangPeer::KD_RUANG);
            $criteria->addSelectColumn(RuangPeer::NM_RUANG);
            $criteria->addSelectColumn(RuangPeer::LANTAI);
            $criteria->addSelectColumn(RuangPeer::PANJANG);
            $criteria->addSelectColumn(RuangPeer::LEBAR);
            $criteria->addSelectColumn(RuangPeer::REG_PRAS);
            $criteria->addSelectColumn(RuangPeer::KAPASITAS);
            $criteria->addSelectColumn(RuangPeer::LUAS_RUANG);
            $criteria->addSelectColumn(RuangPeer::LUAS_PLESTER_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_PLAFON_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_DINDING_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_DAUN_JENDELA_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_DAUN_PINTU_M2);
            $criteria->addSelectColumn(RuangPeer::PANJ_KUSEN_M);
            $criteria->addSelectColumn(RuangPeer::LUAS_TUTUP_LANTAI_M2);
            $criteria->addSelectColumn(RuangPeer::PANJ_INST_LISTRIK_M);
            $criteria->addSelectColumn(RuangPeer::JML_INST_LISTRIK);
            $criteria->addSelectColumn(RuangPeer::PANJ_INST_AIR_M);
            $criteria->addSelectColumn(RuangPeer::JML_INST_AIR);
            $criteria->addSelectColumn(RuangPeer::PANJ_DRAINASE_M);
            $criteria->addSelectColumn(RuangPeer::LUAS_FINISH_STRUKTUR_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_FINISH_PLAFON_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_FINISH_DINDING_M2);
            $criteria->addSelectColumn(RuangPeer::LUAS_FINISH_KPJ_M2);
            $criteria->addSelectColumn(RuangPeer::CREATE_DATE);
            $criteria->addSelectColumn(RuangPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RuangPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RuangPeer::LAST_SYNC);
            $criteria->addSelectColumn(RuangPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.jenis_prasarana_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.id_bangunan');
            $criteria->addSelectColumn($alias . '.kd_ruang');
            $criteria->addSelectColumn($alias . '.nm_ruang');
            $criteria->addSelectColumn($alias . '.lantai');
            $criteria->addSelectColumn($alias . '.panjang');
            $criteria->addSelectColumn($alias . '.lebar');
            $criteria->addSelectColumn($alias . '.reg_pras');
            $criteria->addSelectColumn($alias . '.kapasitas');
            $criteria->addSelectColumn($alias . '.luas_ruang');
            $criteria->addSelectColumn($alias . '.luas_plester_m2');
            $criteria->addSelectColumn($alias . '.luas_plafon_m2');
            $criteria->addSelectColumn($alias . '.luas_dinding_m2');
            $criteria->addSelectColumn($alias . '.luas_daun_jendela_m2');
            $criteria->addSelectColumn($alias . '.luas_daun_pintu_m2');
            $criteria->addSelectColumn($alias . '.panj_kusen_m');
            $criteria->addSelectColumn($alias . '.luas_tutup_lantai_m2');
            $criteria->addSelectColumn($alias . '.panj_inst_listrik_m');
            $criteria->addSelectColumn($alias . '.jml_inst_listrik');
            $criteria->addSelectColumn($alias . '.panj_inst_air_m');
            $criteria->addSelectColumn($alias . '.jml_inst_air');
            $criteria->addSelectColumn($alias . '.panj_drainase_m');
            $criteria->addSelectColumn($alias . '.luas_finish_struktur_m2');
            $criteria->addSelectColumn($alias . '.luas_finish_plafon_m2');
            $criteria->addSelectColumn($alias . '.luas_finish_dinding_m2');
            $criteria->addSelectColumn($alias . '.luas_finish_kpj_m2');
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
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RuangPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Ruang
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RuangPeer::doSelect($critcopy, $con);
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
        return RuangPeer::populateObjects(RuangPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RuangPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

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
     * @param      Ruang $obj A Ruang object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdRuang();
            } // if key === null
            RuangPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Ruang object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Ruang) {
                $key = (string) $value->getIdRuang();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Ruang object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RuangPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Ruang Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RuangPeer::$instances[$key])) {
                return RuangPeer::$instances[$key];
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
        foreach (RuangPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RuangPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ruang
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
        $cls = RuangPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RuangPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RuangPeer::addInstanceToPool($obj, $key);
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
     * @return array (Ruang object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RuangPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RuangPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RuangPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RuangPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Bangunan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBangunan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPrasarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPrasarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Ruang objects pre-filled with their Bangunan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBangunan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol = RuangPeer::NUM_HYDRATE_COLUMNS;
        BangunanPeer::addSelectColumns($criteria);

        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BangunanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BangunanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BangunanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ruang) to $obj2 (Bangunan)
                $obj2->addRuang($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ruang objects pre-filled with their JenisPrasarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol = RuangPeer::NUM_HYDRATE_COLUMNS;
        JenisPrasaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPrasaranaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPrasaranaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ruang) to $obj2 (JenisPrasarana)
                $obj2->addRuang($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ruang objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol = RuangPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Ruang) to $obj2 (Sekolah)
                $obj2->addRuang($obj1);

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
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Ruang objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol2 = RuangPeer::NUM_HYDRATE_COLUMNS;

        BangunanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BangunanPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Bangunan rows

            $key2 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = BangunanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BangunanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BangunanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Ruang) to the collection in $obj2 (Bangunan)
                $obj2->addRuang($obj1);
            } // if joined row not null

            // Add objects for joined JenisPrasarana rows

            $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Ruang) to the collection in $obj3 (JenisPrasarana)
                $obj3->addRuang($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SekolahPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Ruang) to the collection in $obj4 (Sekolah)
                $obj4->addRuang($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Bangunan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBangunan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPrasarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPrasarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

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
     * Selects a collection of Ruang objects pre-filled with all related objects except Bangunan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBangunan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol2 = RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisPrasarana rows

                $key2 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisPrasaranaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisPrasaranaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ruang) to the collection in $obj2 (JenisPrasarana)
                $obj2->addRuang($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ruang) to the collection in $obj3 (Sekolah)
                $obj3->addRuang($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ruang objects pre-filled with all related objects except JenisPrasarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol2 = RuangPeer::NUM_HYDRATE_COLUMNS;

        BangunanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BangunanPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $criteria->addJoin(RuangPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Bangunan rows

                $key2 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BangunanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BangunanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BangunanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ruang) to the collection in $obj2 (Bangunan)
                $obj2->addRuang($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ruang) to the collection in $obj3 (Sekolah)
                $obj3->addRuang($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Ruang objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Ruang objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangPeer::DATABASE_NAME);
        }

        RuangPeer::addSelectColumns($criteria);
        $startcol2 = RuangPeer::NUM_HYDRATE_COLUMNS;

        BangunanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BangunanPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $criteria->addJoin(RuangPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Bangunan rows

                $key2 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BangunanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BangunanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BangunanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Ruang) to the collection in $obj2 (Bangunan)
                $obj2->addRuang($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Ruang) to the collection in $obj3 (JenisPrasarana)
                $obj3->addRuang($obj1);

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
        return Propel::getDatabaseMap(RuangPeer::DATABASE_NAME)->getTable(RuangPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRuangPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRuangPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RuangTableMap());
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
        return RuangPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Ruang or Criteria object.
     *
     * @param      mixed $values Criteria or Ruang object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Ruang object
        }


        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Ruang or Criteria object.
     *
     * @param      mixed $values Criteria or Ruang object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RuangPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RuangPeer::ID_RUANG);
            $value = $criteria->remove(RuangPeer::ID_RUANG);
            if ($value) {
                $selectCriteria->add(RuangPeer::ID_RUANG, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RuangPeer::TABLE_NAME);
            }

        } else { // $values is Ruang object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ruang table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RuangPeer::TABLE_NAME, $con, RuangPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RuangPeer::clearInstancePool();
            RuangPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Ruang or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Ruang object or primary key or array of primary keys
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
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RuangPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Ruang) { // it's a model object
            // invalidate the cache for this single object
            RuangPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RuangPeer::DATABASE_NAME);
            $criteria->add(RuangPeer::ID_RUANG, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RuangPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RuangPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RuangPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Ruang object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Ruang $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RuangPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RuangPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RuangPeer::DATABASE_NAME, RuangPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Ruang
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RuangPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RuangPeer::DATABASE_NAME);
        $criteria->add(RuangPeer::ID_RUANG, $pk);

        $v = RuangPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Ruang[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RuangPeer::DATABASE_NAME);
            $criteria->add(RuangPeer::ID_RUANG, $pks, Criteria::IN);
            $objs = RuangPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRuangPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRuangPeer::buildTableMap();

