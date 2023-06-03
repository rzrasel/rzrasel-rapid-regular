<?php
require_once(dirname(__DIR__) . "/config-require.php");
?>
<?php
abstract class BnDashboardMainMenuList {
    public const fieldKey = "bn_dashboard_main_menu";
    public const fieldList = array(
        "dashboard_menu_id" => array("varId", "BIGINT"),
        "serial"            => array("varSerial", "INT"),
        "bn_title"          => array("varBnTitle", "TEXT", "bn_title"),
        "en_title"          => array("varEnTitle", "TEXT", "en_title"),
        "bn_description"    => array("varBnDescription", "TEXT", "bn_description"),
        //
        "en_description"    => array("vrEnDescription", "TEXT", "en_description"),
        "slug"              => array("varSlug", "VARCHAR(255)", "slug"),
        "bn_image_path"     => array("varBnImagePath", "TEXT", "bn_image_path"),
        "en_image_path"     => array("varEnImagePath", "TEXT", "en_image_path"),
        "is_enabled"        => array("varIsEnabled", "BOOLEAN"),
        //
        "create_date"       => array("varSlug", "VARCHAR(64)"),
        "modified_date"     => array("varSlug", "VARCHAR(64)"),
    );
}
?>
<?php
abstract class BnTutorialList {
    public const fieldHumanBodyPartsKey = "bn_human_body_parts";
    public const fieldSevenDaysKey = "bn_seven_days";

    //
    public const commonFieldList = array (
        "serial"            => array("varSerial", "INT"),
        "bengali"           => array("varBengali", "TEXT", "bengali"),
        "english"           => array("varEnglish", "TEXT", "english"),
        "slug"              => array("varSlug", "VARCHAR(255)", "slug"),
        "big_image_path"    => array("varBigImagePath", "TEXT", "big_image_path"),
        //
        "small_image_path"  => array("varSmallImagePath", "TEXT", "small_image_path"),
        "audio_path"        => array("varAudioPath", "TEXT", "audio_path"),
        "is_enabled"        => array("varIsEnabled", "BOOLEAN"),
        "create_date"       => array("varSlug", "VARCHAR(64)"),
        "modified_date"     => array("varSlug", "VARCHAR(64)"),
    );
    /* public static function getHumanBodyParts() {
        return self::commonFieldList;
    }
    public const fieldHumanBodyPartsList = self::getHumanBodyParts(); */
    /* public const fieldHumanBodyPartsList = array_merge(
        array(
            "body_part_id" => array("varId", "BIGINT"),
        ),
        BnTutorialList::commonFieldList
    ); */
    /* public const fieldSevenDaysList = array_merge(
        array(
            "seven_day_id" => array("varId", "BIGINT"),
        ),
        BnTutorialList::commonFieldList
    ); */
}
/*
*/
?>
<?php
abstract class DbTableMetaGeneratorHelper {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    protected $jsonArrayList = array();
    /* protected $jsonArrayList = array(
        BnDashboardMainMenuList::fieldKey       => BnDashboardMainMenuList::fieldList,
        BnTutorialList::fieldHumanBodyPartsKey  => BnTutorialList::fieldHumanBodyPartsList,
        //BnTutorialList::fieldSevenDaysKey       => BnTutorialList::fieldSevenDaysKey,
    ); */
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    function __construct() {
    }
    protected function getJsonArrayList() {
        $humanBodyPartsList = array_merge(
            array(
                "body_part_id" => array("varId", "BIGINT"),
            ),
            BnTutorialList::commonFieldList
        );
        $sevenDaysList = array_merge(
            array(
                "seven_day_id" => array("varId", "BIGINT"),
            ),
            BnTutorialList::commonFieldList
        );
        $this->jsonArrayList = array(
            BnDashboardMainMenuList::fieldKey       => BnDashboardMainMenuList::fieldList,
            BnTutorialList::fieldHumanBodyPartsKey  => $humanBodyPartsList,
            BnTutorialList::fieldSevenDaysKey       => $sevenDaysList,
        );
        return $this->jsonArrayList;
    }
}
?>
<?php
class DbTableMetaGenerator extends DbTableMetaGeneratorHelper {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    function __construct() {
    }
    public function onPrint() {
        /* echo "---------------->";
        echo json_encode(parent::getJsonArrayList());
        echo "<----------------"; */
        $jsonDataList = parent::getJsonArrayList();
        $tableName = "db_table_meta_property";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "================>";
        echo "DELETE FROM $tableName;";
        echo "<br />";
        $insertPre = "INSERT INTO $tableName VALUES (";
        $insertPost = ");";
        $insertArray = array();
        $index = -1;
        foreach($jsonDataList as $key => $value) {
            $index++;
            $randId = time() . rand(1111, 9999);
            $isEnabled = true;
            $toDate = gmdate("Y-m-d H:i:s", time());
            $createDate = $toDate;
            $modifiedDate = $toDate;
            //
            $insertSql = ""
                . $insertPre
                . "'" . $randId . "'"
                . ", '" . ($index + 1) . "'"
                . ", '" . json_encode($value) . "'"
                . ", '" . $key . "'"
                . ", '" . $isEnabled . "'"
                . ", '" . $createDate . "'"
                . ", '" . $modifiedDate . "'"
                . $insertPost
                . "";
            //
            $insertArray[] = $insertSql;
            sleep(0.5);
        }
        echo "<br />";
        echo implode("<br />", $insertArray);
        echo "<================";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
    }
}
?>
<?php
abstract class DbTableMetaGeneratorHelperOld01 {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    protected $dbPath;
    protected $tableName;
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    function __construct($dbPath) {
        $this->dbPath = $dbPath;
        $this->tableName = DbTable::dbTableMetaProperty;
    }
}
?>