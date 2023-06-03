<?php
require_once(dirname(__DIR__) . "/config-require.php");
?>
<?php
abstract class TableMetaProperty {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    protected $dbPath;
    protected $tableName;
    protected $jsonArray = array();
    protected $insertSqlArray = array();
    //private $bnDboardMainMenu = new ExtendsBnDboardMainMenu();
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    function __construct() {
        $this->tableName = "db_table_meta_property";
    }

    //|----------------------|METHOD - RUN|----------------------|
    /* public function run($dbPath) {
        $this->dbPath = $dbPath;
    } */
    protected function setDbPath($dbPath) {
        $this->dbPath = $dbPath;
    }
}
?>
<?php
class DbTableMetaProperty extends TableMetaProperty {
    public function run($dbPath) {
        parent::setDbPath($dbPath);
        return $this->onGenerate();
    }
    private function onGenerate() {
        $SQLiteCon = new SQLiteConnection($this->dbPath);
        $sqlQuery = $this->getSelectSql();
        //echo $sqlQuery;
        //echo DbTableMetaPropertyModel::test;
        $resultArray = array();
        //
        $sqlResult = $SQLiteCon->query($sqlQuery);
        if($sqlResult != null) {
            $index = -1;
            foreach($sqlResult as $row) {
                $index++;
                $metaPropertyModel = new DbTableMetaPropertyModel();
                $metaPropertyModel->id = $row[DbTableMetaPropertyModel::constId];
                $metaPropertyModel->serial = $row[DbTableMetaPropertyModel::constSerial];
                $metaPropertyModel->metaData = $row[DbTableMetaPropertyModel::constMetaData];
                $metaPropertyModel->slug = $row[DbTableMetaPropertyModel::constSlug];
                $metaPropertyModel->isEnabled = $row[DbTableMetaPropertyModel::constIsEnabled];
                //
                $metaPropertyModel->createDate = $row[DbTableMetaPropertyModel::constCreateDate];
                $metaPropertyModel->modifiedDate = $row[DbTableMetaPropertyModel::constModifiedDate];
                //
                $resultArray[$metaPropertyModel->slug] = $metaPropertyModel;
                //sleep(0.5);
            }
        }
        return $resultArray;
    }
    private function getSelectSql() {
        $sqlQuery = ""
            . "SELECT * FROM $this->tableName"
            /* . " WHERE "
            . " slug = '$slug'" */
            . " ORDER BY"
            . " is_enabled DESC"
            . ", serial ASC"
            . "";
        return $sqlQuery;
    }
}
?>