<?php
abstract class HorizontalScrolBnLessonConstant {
    public const constId                = "lesson_id";
    public const constSerial            = "serial";
    public const constBengali           = "bengali";
    public const constEnglish           = "english";
    public const constSlug              = "slug";
    public const constBigImagePath      = "big_image_path";
    public const constSmallImagePath    = "small_image_path";
    public const constAudioPath         = "audio_path";
    public const constIsEnabled         = "is_enabled";
    //
    public const constCreateDate        = "create_date";
    public const constModifiedDate      = "modified_date";
}
?>
<?php
class HorizontalScrolBnLessonCommonField extends HorizontalScrolBnLessonConstant {
    public $id              = array(parent::constId, "BIGINT");
    public $serial          = array(parent::constSerial, "INT");
    public $bengali         = array(parent::constBengali, "TEXT");
    public $english         = array(parent::constEnglish, "TEXT");
    public $slug            = array(parent::constSlug, "VARCHAR(255)");
    public $bigImagePath    = array(parent::constBigImagePath, "TEXT");
    public $smallImagePath  = array(parent::constBigImagePath, "TEXT");
    public $audioPath       = array(parent::constAudioPath, "TEXT");
    public $isEnabled       = array(parent::constIsEnabled, "BOOLEAN");
    public $createDate      = array(parent::constCreateDate, "VARCHAR(64)");
    public $modifiedDate    = array(parent::constModifiedDate, "VARCHAR(64)");
}
?>
<?php
class LessonBnHumanBodyPartsModel extends HorizontalScrolBnLessonCommonField {
    public const constTableName         = "bn_human_body_parts";
}
?>
<?php
class LessonBnSevenDaysModel extends HorizontalScrolBnLessonCommonField {
    public const constTableName         = "bn_seven_days";
}
?>
<?php
abstract class DbTableCreateSqlBnLesson {
    public static function onCreateSql($enumDbTableProperty) {
        $modelObject = new LessonBnHumanBodyPartsModel();
        $tableName = EnumDbTableProperty::bnHumanBodyParts;
        $tableId = EnumDbTableProperty::bnHumanBodyPartsId;
        if($enumDbTableProperty == EnumDbTableProperty::bnSevenDays) {
            $modelObject = new LessonBnSevenDaysModel();
            $tableName = EnumDbTableProperty::bnSevenDays;
            $tableId = EnumDbTableProperty::bnSevenDaysId;
        }
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
        echo "DROP TABLE IF EXISTS " . $tableName . ";";
        echo "\n";
        echo "\n";
        echo "CREATE TABLE IF NOT EXISTS " . $tableName . " (";
        echo "\n";
        $arrayBeautify->runBeautify($arrayData, "", ",", false, false);
        echo "\n";
        echo "CONSTRAINT pk_"
            . $tableName
            . "_" . $tableId . " PRIMARY KEY (" . $tableId . ")";
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