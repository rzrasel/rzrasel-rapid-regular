<?php
require_once(dirname(__DIR__) . "/config-require.php");
?>
<?php
use \DbTable\DashboardMainMenu as NameSpaceDashboardMainMenu;
?>
<?php
interface DbJsonHelper {
    public function run($dbPath);
}
?>
<?php
interface DbJsonAbstractHelper {
    public function run($dbPath);
    //public function getJson();
}
?>
<?php
class ExtendsBnDboardMainMenu extends NameSpaceDashboardMainMenu\BnDboardMainMenu {}
//|--------|ABSTRACT CLASS - DASHBOARD MAIN MENU HELPER|---------|
abstract class DashboardMainMenuHelper implements DbJsonAbstractHelper {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    protected $dbPath;
    protected $tableName;
    protected $jsonArray = array();
    protected $insertSqlArray = array();
    //private $bnDboardMainMenu = new ExtendsBnDboardMainMenu();
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    function __construct() {
        $this->tableName = DbTable::dashboardMainMenu;
    }

    //|----------------------|METHOD - RUN|----------------------|
    public function run($dbPath) {
        $this->dbPath = $dbPath;
    }

    //|---------------|METHOD - GET RAW ROW ARRAY|---------------|
    protected function getRawRowArray($arrayData, $index) {
        $refinedRowData = $this->onRefinedRowData($arrayData, $index);
        $sqlArray = array(
            //"id"                => $arrayData[$this->idColumnName],
            "id"                => $refinedRowData[NameSpaceDashboardMainMenu\BnDboardMainMenu::id],
            "serial"            => $index + 1,
            "bn_title"          => $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::bnTitle],
            "en_title"          => $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::enTitle],
            "bn_description"    => $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::bnDescription],
            "en_description"    => $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::enDescription],
            "slug"              => $refinedRowData[NameSpaceDashboardMainMenu\BnDboardMainMenu::slug],
            "bn_image_path"     => $refinedRowData[NameSpaceDashboardMainMenu\BnDboardMainMenu::bnImagePath],
            "en_image_path"     => $refinedRowData[NameSpaceDashboardMainMenu\BnDboardMainMenu::enImagePath],
            "is_enabled"        => $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::isEnabled],
            "create_date"       => $refinedRowData[NameSpaceDashboardMainMenu\BnDboardMainMenu::createDate],
            "modified_date"     => $refinedRowData[NameSpaceDashboardMainMenu\BnDboardMainMenu::modifiedDate],
        );
        $sqlArray = ArrayToSql::trimArray($sqlArray);
        return $sqlArray;
    }

    //|--------------|METHOD - ON REFINED ROW DATA|--------------|
    private function onRefinedRowData($arrayData, $index) {
        //|------------|METHOD VARIABLE SCOPE START|-------------|
        //echo $this->idColumnName;
        //|Random ID|--------------------------------------------|
        $randId = time() . rand(1111, 9999);
        //|Slug|-------------------------------------------------|
        $slug = "slug";
        //|Image Path|-------------------------------------------|
        $bnImagePath = "bn-image-path.png";
        $enImagePath = "en-image-path.png";
        //|To Date Time|-----------------------------------------|
        //$toDate = date("Y-m-d H:i:s", time());
        $toDate = gmdate("Y-m-d H:i:s", time());
        $createDate = $toDate;
        $modifiedDate = $toDate;
        //|-------------|METHOD VARIABLE SCOPE END|--------------|
        //
        //|CHECK SLUG|-------------------------------------------|
        if(!empty($arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::slug])) {
            $slug = $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::slug];
        }
        //|CHECK IMAGE PATH|-------------------------------------|
        if(!empty($arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::bnImagePath])) {
            $bnImagePath = $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::bnImagePath];
        }
        if(!empty($arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::enImagePath])) {
            $enImagePath = $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::enImagePath];
        }
        //|CHECK CREATE DATE|------------------------------------|
        if(!empty($arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::createDate])) {
            $createDate = $arrayData[NameSpaceDashboardMainMenu\BnDboardMainMenu::createDate];
        }
        //|CHECK MODIFIED DATE|----------------------------------|
        /* if(!empty($arrayData["modified_date"])) {
            $modifiedDate = $arrayData["modified_date"];
        } */
        return array(
            NameSpaceDashboardMainMenu\BnDboardMainMenu::id             => $randId,
            NameSpaceDashboardMainMenu\BnDboardMainMenu::serial         => $index + 1,
            NameSpaceDashboardMainMenu\BnDboardMainMenu::slug           => $slug,
            NameSpaceDashboardMainMenu\BnDboardMainMenu::bnImagePath    => $bnImagePath,
            NameSpaceDashboardMainMenu\BnDboardMainMenu::enImagePath    => $enImagePath,
            NameSpaceDashboardMainMenu\BnDboardMainMenu::createDate     => $createDate,
            NameSpaceDashboardMainMenu\BnDboardMainMenu::modifiedDate   => $modifiedDate,
        );
    }

    //|--------------|METHOD - GENERATE JSON ARRAY|--------------|
    protected function generateJsonArray($arrayData) {
        $jsonArray = array();
        foreach(NameSpaceDashboardMainMenu\BnDboardMainMenu::jsonArrayProperty as $key => $value) {
            $jsonArray[$key] = $arrayData[$value];
        }
        return $jsonArray;
    }
}
?>
<?php
class DashboardMainMenu extends DashboardMainMenuHelper implements DbJsonHelper {
    public function run($dbPath) {
        parent::run($dbPath);
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
        //echo $sqlQuery;
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
                //print_r($rowArray);
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
    private function generateInsertSql($arrayData, $tableName) {
        $this->insertSqlArray[] = ArrayToSql::getInsertQuery($arrayData, $tableName);
    }
}
?>