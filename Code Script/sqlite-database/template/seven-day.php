<?php
require_once(dirname(__DIR__) . "/config-require.php");
?>
<?php
class SevenDay extends ItemTemplate {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    private $dbPath;
    private $tableName;
    private $jsonArray = array();
    private $insertSqlArray = array();
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    public function __construct() {
        $this->tableName = DbTable::sevenDay;
    }
    public function run($dbPath) {
        $this->dbPath = $dbPath;
        $this->onGenerate();
    }
    public function getJson() {
        /*$jsonArray = array(
            array(
                "meta_id"   => "meta_id",
                "data"      => $this->jsonArray,
            ),
        );*/
        return json_encode($this->getJsonArray());
    }
    public function getInsertSql() {
        if(empty($this->insertSqlArray)) {
            return "Empty data";
        }
        //return $this->insertSqlArray;
        return implode("<br />", $this->getInsertSqlArray());
    }
    public function getJsonArray() {
        /*$jsonArray = array(
            array(
                "meta_id"   => "meta_id",
                "data"      => $this->jsonArray,
            ),
        );*/
        return $this->jsonArray;
    }
    public function getInsertSqlArray() {
        /*if(empty($this->insertSqlArray)) {
            return "Empty data";
        }
        //return $this->insertSqlArray;
        return implode("<br />", $this->insertSqlArray);*/
        return $this->insertSqlArray;
    }
    private function onGenerate() {
        $SQLiteCon = new SQLiteConnection(DbConfig::dbPath);
        $sqlQuery = $this->getSelectSql();
        $sqlResult = $SQLiteCon->query($sqlQuery);
        if($sqlResult != null) {
            $this->jsonArray = array();
            $this->insertSqlArray = array();
            $index = -1;
            $this->insertSqlArray[] = "DELETE FROM $this->tableName;";
            $this->insertSqlArray[] = "";
            foreach($sqlResult as $row) {
                $index++;
                $rowArray = $this->getRawRowArray($row, $index);
                $this->generateInsertSql($rowArray, $this->tableName);
                if($rowArray["is_enabled"] == 1) {
                    $this->jsonArray[] = $this->generateJsonArray($rowArray);
                }
                sleep(0.5);
            }
        } else {
            $this->jsonArray[] = "Empty data set";
        }
    }
    private function getSelectSql() {
        $sqlQuery = ""
            . "SELECT * FROM $this->tableName"
            //. " WHERE is_enabled = 1"
            . " ORDER BY"
            . " is_enabled DESC"
            . ", serial ASC"
            . "";
        return $sqlQuery;
    }
    protected function getRawRowArray($arrayData, $index) {
        $this->idColumnName = DbTableRow::sevenDayId;
        return parent::getRawRowArray($arrayData, $index);
    }
    protected function generateJsonArray($arrayData) {
        return parent::generateJsonArray($arrayData);
    }
    private function generateInsertSql($arrayData, $tableName) {
        $this->insertSqlArray[] = ArrayToSql::getInsertQuery($arrayData, $tableName);
    }
}
?>