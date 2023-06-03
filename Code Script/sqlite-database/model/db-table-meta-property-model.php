<?php
class DbTableMetaPropertyConstant {
    public const constTableName     = "db_table_meta_property";
    public const constId            = "meta_id";
    public const constSerial        = "serial";
    public const constMetaData      = "meta_data";
    public const constSlug          = "slug";
    public const constIsEnabled     = "is_enabled";
    public const constCreateDate    = "create_date";
    public const constModifiedDate  = "modified_date";
}
?>
<?php
class DbTableMetaPropertyModel extends DbTableMetaPropertyConstant {
    public $id              = array(parent::constId, "BIGINT");
    public $serial          = array(parent::constSerial, "INT");
    public $metaData        = array(parent::constMetaData, "TEXT");
    public $slug            = array(parent::constSlug, "VARCHAR(255)");
    public $isEnabled       = array(parent::constIsEnabled, "BOOLEAN");
    public $createDate      = array(parent::constCreateDate, "VARCHAR(64)");
    public $modifiedDate    = array(parent::constModifiedDate, "VARCHAR(64)");
}
?>
<?php
abstract class DbTableCreateSqlMetaProperty {
    public static function onCreateSql() {
        $modelObject = new DbTableMetaPropertyModel();
        $arrayData = array();
        foreach($modelObject as $key => $value) {
            /* echo "$value[0] => $value[1]\n";
            echo "<br />"; */
            $arrayData[$value[0]] = $value[1];
        }
        $arrayBeautify = new CodeArrayBeautify();
        echo "<br />";
        echo "<br />";
        echo "\n";
        echo "\n";
        echo "\n";
        echo "\n";
        echo "DROP TABLE IF EXISTS " . DbTableMetaPropertyModel::constTableName . ";";
        echo "\n";
        echo "\n";
        echo "CREATE TABLE IF NOT EXISTS " . DbTableMetaPropertyModel::constTableName . " (";
        echo "\n";
        $arrayBeautify->runBeautify($arrayData, "", ",", false, false);
        echo "\n";
        echo "CONSTRAINT pk_"
            . DbTableMetaPropertyModel::constTableName
            . "_" . DbTableMetaPropertyModel::constId . " PRIMARY KEY (" . DbTableMetaPropertyModel::constId . ")";
        echo "\n";
        echo ");";
        echo "\n";
        echo "\n";
        echo "\n";
        echo "\n";
        echo "<br />";
        echo "<br />";
    }
}
?>
<?php
/* DROP TABLE IF EXISTS db_table_meta_property;
CREATE TABLE IF NOT EXISTS db_table_meta_property (
    meta_id         BIGINT,
    serial          INT,
    meta_data       TEXT,
    slug            VARCHAR(255),
    is_enabled      BOOLEAN,
    create_date     VARCHAR(64),
    modified_date   VARCHAR(64),
    CONSTRAINT pk_db_table_meta_property_meta_id PRIMARY KEY (meta_id)
); */
?>