<?php
use \DbTable\DashboardMainMenu as NameSpaceDashboardMainMenu;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Rz Rasel - SQLite Database</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="HTML, Python, CSS, SQL, JavaScript, How to, PHP, Java, C, C++, C#, jQuery, Bootstrap, Colors, W3.CSS, XML, MySQL, Icons, NodeJS, React, Graphics, Angular, R, AI, Git, Data Science, Code Game, Tutorials, Programming, Web Development, Training, Learning, Quiz, Exercises, Courses, Lessons, References, Examples, Learn to code, Source code, Demos, Tips, Website">
<meta name="Description" content="Well organized and easy to understand Web building tutorials with lots of examples of how to use HTML, CSS, JavaScript, SQL, Python, PHP, Bootstrap, Java, XML and more.">
<meta property="og:image" content="rzrasel.png">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="436">
<meta property="og:image:height" content="228">
<meta property="og:description" content="W3Schools offers free online tutorials, references and exercises in all the major languages of the web. Covering popular subjects like HTML, CSS, JavaScript, Python, SQL, Java, and many, many more.">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
</body>
</html>
<?php
/*require_once("libs/config.php");
require_once("libs/sqlite-connection.php");
require_once("libs/array-to-sql.php");
//
require_once("template/human-body-part.php");
require_once("template/seven-day.php");*/
/*echo $_SERVER['DOCUMENT_ROOT'];
echo "<br />";
echo "<br />";
echo __DIR__;
echo "<br />";
echo "<br />";
echo dirname(__FILE__);*/
require_once(__DIR__ . "/config-require.php");
?>
<?php
DbTableCreateSqlMetaProperty::onCreateSql();
DbTableCreateSqlBnLesson::onCreateSql(EnumDbTableProperty::bnHumanBodyParts);
DbTableCreateSqlBnLesson::onCreateSql(EnumDbTableProperty::bnSevenDays);
if(!empty($_REQUEST)) {
    if(!empty($_REQUEST["request"])) {
        $dbTableMetaProperty = new DbTableMetaProperty();
        $tableMetaList = $dbTableMetaProperty->run(DbConfig::dbPath);
        /* echo count($tableMetaList);
        echo "<pre>";
        if(array_key_exists(BnTutorialList::fieldSevenDaysKey, $tableMetaList)) {
            print_r($tableMetaList[BnTutorialList::fieldSevenDaysKey]);
        }
        echo "</pre>"; */
        //
        $requestQuery = $_REQUEST["request"];
        if($requestQuery == UrlQuery::allData) {
            getAllOutputService();
        } else if($requestQuery == UrlQuery::dashboardMainMenu) {
            $serviceObject = new DashboardMainMenu();
            //$serviceObject->run(DbConfig::dbPath);
            getOutputService($serviceObject);
        } else if($requestQuery == UrlQuery::humanBodyPart) {
            $serviceObject = new HumanBodyPart();
            getOutputService($serviceObject);
        } else if($requestQuery == UrlQuery::sevenDay) {
            $serviceObject = new SevenDay();
            getOutputService($serviceObject);
        } else {
            echo "Request query not found";
        }
    }
} else {
    echo "Request data is empty";
}
echo "<br />";
echo "<br />";
echo "request=" . UrlQuery::allData;
echo "<br />";
echo "request=" . UrlQuery::dashboardMainMenu;
echo "<br />";
echo "request=" . UrlQuery::humanBodyPart;
echo "<br />";
echo "request=" . UrlQuery::sevenDay;
echo "<br />";
echo "<br />";
beautifiedGenerator();
echo "<br />";
echo "<br />";
?>
<?php
function getOutputService($serviceObject) {
    /*$humanBodyPart = new HumanBodyPart();
    $humanBodyPart->run(DbConfig::dbPath);
    echo "<br />";
    echo "<br />";
    echo $humanBodyPart->getInsertSql();
    echo "<br />";
    echo "<br />";
    echo $humanBodyPart->getJson();
    echo "<br />";
    echo "<br />";*/
    $serviceObject->run(DbConfig::dbPath);
    echo "<br />";
    echo "<br />";
    echo $serviceObject->getInsertSql();
    echo "<br />";
    echo "<br />";
    echo $serviceObject->getJson();
    echo "<br />";
    echo "<br />";
}
function getAllOutputService() {
    $humanBodyPart = new HumanBodyPart();
    $humanBodyPart->run(DbConfig::dbPath);
    $sevenDay = new SevenDay();
    $sevenDay->run(DbConfig::dbPath);
    echo "<br />";
    echo "<br />";
    echo $humanBodyPart->getInsertSql();
    echo "<br />";
    echo "<br />";
    echo $sevenDay->getInsertSql();
    echo "<br />";
    echo "<br />";
    $resultArray = array(
        "human_body_part" => $humanBodyPart->getJsonArray(),
        "seven_day" => $sevenDay->getJsonArray(),
    );
    echo json_encode($resultArray);
    echo "<br />";
    echo "<br />";
}
?>
<?php
echo "<br />";
echo "<br />";
$strValue = "DbTableBnDboardMainMenu";
$output = CharacterHelper::onReplaceUppercaseOnly($strValue, "-");
$output = strtolower($output);
echo $output;
echo "<br />";
echo "<br />";
?>
<?php
function beautifiedGenerator() {
    echo "<br />";
    echo "\n";
    echo "\n";
    $arrayData = array(
        "seven_day_id" => "BIGINT",
        "serial" => "INT",
        "bengali" => "TEXT",
        "english" => "TEXT",
        "slug" => "VARCHAR(255)",
        "big_image_path" => "TEXT",
        "small_image_path" => "TEXT",
        "audio_path" => "TEXT",
        "is_enabled" => "BOOLEAN",
        "create_date" => "VARCHAR(64)",
        "modified_date" => "VARCHAR(64)",
    );
    /* //$arrayData = DbTableRow::bnDashboardMainMenu;
    $arrayData = array();
    foreach(\DbTable\DashboardMainMenu\DbTableBnDboardMainMenu::tableRowProperty as $key => $value) {
        //$key = str_replace($key, "dashboard_menu_id", "id");
        $arrayData["public \$$key"] = $value;
    }
    $arrayBeautify = new CodeArrayBeautify();
    $arrayBeautify->runBeautify($arrayData, "=", ";", false);
    echo "\n";
    echo "\n";
    echo "<br />"; */
}
echo "<br />";
echo "<br />";
?>
<?php
class MyClass {
    public $prop1 = 'property 1';
    public $prop2 = 'property 2';
    public $prop3 = 'property 3';
    protected $prop4 = 'protected property';
    private $prop5 = 'private property';
}

$object = new MyClass();

foreach($object as $key => $value) {
    echo "$key => $value\n";
    echo "<br />";
}
echo "<br />";
echo "<br />";
echo "<br />";
?>
<?php
class child extends NameSpaceDashboardMainMenu\BnDboardMainMenu {
}

$object = new child();
echo "\n";
echo "\n";
echo "\n";
foreach($object as $key => $value) {
    echo "\"$key\" = \"$value\",";
    echo "\n";
}
echo "\n";
echo "\n";
echo "\n";
echo "<br />";
echo "<br />";
echo "<br />";
$dbTableMetaGenerator = new DbTableMetaGenerator();
$dbTableMetaGenerator->onPrint();
echo "dbTableMetaGenerator";
echo "<br />";
echo "<br />";
/* $abc = "Test Data For Print";
$variable = "abc";
echo $$variable;
onTestVariable("id");
function onTestVariable($strValue) {
    $id = "id tata print";
    echo $$strValue;
} */
//dbTableMetaProperty();
function dbTableMetaProperty() {
    $jsonData = array(
        "bn_dashboard_main_menu" => array(
            "dashboard_menu_id" => array("varId", "BIGINT"),
            "serial" => array("varSerial", "INT"),
            "bn_title" => array("varBnTitle", "TEXT", "bn_title"),
            "en_title" => array("varEnTitle", "TEXT", "en_title"),
            "bn_description" => array("varBnDescription", "TEXT", "bn_description"),
            //
            "en_description" => array("vrEnDescription", "TEXT", "en_description"),
            "slug" => array("varSlug", "VARCHAR(255)", "slug"),
            "bn_image_path" => array("varBnImagePath", "TEXT", "bn_image_path"),
            "en_image_path" => array("varEnImagePath", "TEXT", "en_image_path"),
            "is_enabled" => array("varIsEnabled", "BOOLEAN"),
            //
            "create_date" => array("varSlug", "VARCHAR(64)"),
            "modified_date" => array("varSlug", "VARCHAR(64)"),
        ),
    );
    $tableName = "db_table_meta_property";
    echo "<br />";
    echo "<br />";
    echo "DELETE FROM $tableName;";
    $insertPre = "INSERT INTO $tableName VALUES (";
    $insertPost = ");";
    $insertArray = array();
    $index = -1;
    foreach($jsonData as $key => $value) {
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
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "====";
    echo "<br />";
}
?>
<?php
/*
DROP TABLE IF EXISTS db_table_meta_property;
CREATE TABLE IF NOT EXISTS db_table_meta_property (
    meta_id         BIGINT,
    serial          INT,
    meta_data       TEXT,
    slug            VARCHAR(255),
    is_enabled      BOOLEAN,
    create_date     VARCHAR(64),
    modified_date   VARCHAR(64),
    CONSTRAINT pk_db_table_meta_property_meta_id PRIMARY KEY (meta_id)
);

DELETE FROM db_table_meta_property;

INSERT INTO db_table_meta_property VALUES ('16852020788854', '1', '{"dashboard_menu_id":["varId","BIGINT"],"serial":["varSerial","INT"],"bn_title":["varBnTitle","TEXT","bn_title"],"en_title":["varEnTitle","TEXT","en_title"],"bn_description":["varBnDescription","TEXT","bn_description"],"en_description":["vrEnDescription","TEXT","en_description"],"slug":["varSlug","VARCHAR(255)","slug"],"bn_image_path":["varBnImagePath","TEXT","bn_image_path"],"en_image_path":["varEnImagePath","TEXT","en_image_path"],"is_enabled":["varIsEnabled","BOOLEAN"],"create_date":["varSlug","VARCHAR(64)"],"modified_date":["varSlug","VARCHAR(64)"]}', 'bn_dashboard_main_menu', '1', '2023-05-27 15:41:18', '2023-05-27 15:41:18');
INSERT INTO db_table_meta_property VALUES ('16852020788453', '2', '{"body_part_id":["varId","BIGINT"],"serial":["varSerial","INT"],"bengali":["varBengali","TEXT","bengali"],"english":["varEnglish","TEXT","english"],"slug":["varSlug","VARCHAR(255)","slug"],"big_image_path":["varBigImagePath","TEXT","big_image_path"],"small_image_path":["varSmallImagePath","TEXT","small_image_path"],"audio_path":["varAudioPath","TEXT","audio_path"],"is_enabled":["varIsEnabled","BOOLEAN"],"create_date":["varSlug","VARCHAR(64)"],"modified_date":["varSlug","VARCHAR(64)"]}', 'bn_human_body_parts', '1', '2023-05-27 15:41:18', '2023-05-27 15:41:18');
INSERT INTO db_table_meta_property VALUES ('16852020785127', '3', '{"seven_day_id":["varId","BIGINT"],"serial":["varSerial","INT"],"bengali":["varBengali","TEXT","bengali"],"english":["varEnglish","TEXT","english"],"slug":["varSlug","VARCHAR(255)","slug"],"big_image_path":["varBigImagePath","TEXT","big_image_path"],"small_image_path":["varSmallImagePath","TEXT","small_image_path"],"audio_path":["varAudioPath","TEXT","audio_path"],"is_enabled":["varIsEnabled","BOOLEAN"],"create_date":["varSlug","VARCHAR(64)"],"modified_date":["varSlug","VARCHAR(64)"]}', 'bn_seven_days', '1', '2023-05-27 15:41:18', '2023-05-27 15:41:18');

*/
/*

*/
?>
<?php
/*

https://stackoverflow.com/questions/40475334/best-practice-for-android-mvvm-startactivity

DROP TABLE IF EXISTS bn_dashboard_main_menu;

CREATE TABLE IF NOT EXISTS bn_dashboard_main_menu (
    dashboard_menu_id   BIGINT,
    serial              INT,
    bn_title            TEXT,
    en_title            TEXT,
    bn_description      TEXT,
    en_description      TEXT,
    slug                VARCHAR(255),
    bn_image_path       TEXT,
    en_image_path       TEXT,
    is_enabled          BOOLEAN,
    create_date         VARCHAR(64),
    modified_date       VARCHAR(64),
    CONSTRAINT pk_bn_dashboard_main_menu_dashboard_menu_id PRIMARY KEY (dashboard_menu_id)
);

DELETE FROM bn_dashboard_main_menu;

INSERT INTO bn_dashboard_main_menu VALUES ('16850334994258', '1', 'সপ্তাহের সাত দিনের নাম', 'Days Of The Week', '', '', 'days_of_the_week', 'images/menu/bn-days_of_the_week.png', 'images/menu/bn-days_of_the_week.xml', '1', '2023-05-25 08:33:34', '2023-05-25 16:51:39');
INSERT INTO bn_dashboard_main_menu VALUES ('16850334993288', '2', 'ইংরেজি ১২ মাসের নাম', 'Months Of The Year', '', '', 'slug', 'image-path.png', 'en-image-path.png', '0', '2023-05-25 08:33:34', '2023-05-25 16:51:39');

DROP TABLE IF EXISTS bn_human_body_parts;

CREATE TABLE IF NOT EXISTS bn_human_body_parts (
    body_part_id        BIGINT,
    serial              INT,
    bengali             TEXT,
    english             TEXT,
    slug                VARCHAR(255),
    big_image_path      TEXT,
    small_image_path    TEXT,
    audio_path          TEXT,
    is_enabled          BOOLEAN,
    create_date         VARCHAR(64),
    modified_date       VARCHAR(64),
    CONSTRAINT pk_bn_human_body_parts_body_part_id PRIMARY KEY (body_part_id)
);

DELETE FROM bn_human_body_parts;

DELETE FROM bn_human_body_parts;

INSERT INTO bn_human_body_parts VALUES ('16850050724596', '1', 'কান', 'Ear', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721608', '2', 'কানের পর্দা', 'Ear-drum', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050724769', '3', 'ভ্রু', 'Eyebrow', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050728469', '4', 'চোখের পাতা', 'Eyelid', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722488', '5', 'চোখের পাপড়ি', 'Eyelash', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050724844', '6', 'চোখ', 'Eye', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721640', '7', 'চোখের পুতলি / চোখের তারা', 'Pupil', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050727730', '8', 'নাক', 'Nose', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721709', '9', 'নাকের ছিদ্র', 'Nostrils', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050723092', '10', 'গাল', 'Cheeks', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050723796', '11', 'চোয়াল', 'Jaw', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050723538', '12', 'থুতনি', 'Chin', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050727458', '13', 'মুখ', 'Mouth', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050726243', '14', 'ঠোঁট', 'Lip', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050727641', '15', 'দাঁত', 'Teeth', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050725426', '16', 'দাঁতের মাড়ি', 'Gums', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721687', '17', 'জিহবা', 'Tongue', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722079', '18', 'মুখমণ্ডল', 'Face', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721423', '19', 'গলা', 'Throat', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722147', '20', 'ঘাড়', 'Neck', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050724099', '21', 'কাঁধ', 'Shoulder', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050723339', '22', 'বুক', 'Chest', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050723829', '23', 'পেশী', 'Muscle', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050725641', '24', 'কনুই', 'Elbow', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050727613', '25', 'কব্জি', 'Wrist', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721523', '26', 'হাতের তালু', 'Palm', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050729397', '27', 'হাতের আঙ্গুল', 'Finger', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050728452', '28', 'নখ', 'Nails', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050725810', '29', 'হাত', 'Hand', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050729535', '30', 'নিতম্ব', 'Hip', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722025', '31', 'কোমর', 'Waist', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050727421', '32', 'পা', 'Leg', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050721647', '33', 'হাঁটু', 'Knee', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050724367', '34', 'গোড়ালি', 'Ankle', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050723736', '35', 'পায়ের গোড়ালি', 'Heal', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722565', '36', 'পা', 'Foot', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050724760', '37', 'পায়ের আঙ্গুল', 'Toe', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050729287', '38', 'পায়ের তলা / পায়ের তালু', 'Sole', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050726738', '39', 'পেট', 'Belly', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050725209', '40', 'নাভি', 'Navel', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050724520', '41', 'বুকের পাঁজর', 'Ribs', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050729789', '42', 'হৃদপিন্ড / হৃদযন্ত্র', 'Heart', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722157', '43', 'কলিজা / যকৃৎ', 'Liver', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050725627', '44', 'পাকস্থলী', 'Stomach', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050729201', '45', 'কিডনি / বৃক্ক', 'Kidney', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050727457', '46', 'রক্ত', 'Blood', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050722414', '47', 'ফুসফুস', 'Lungs', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');
INSERT INTO bn_human_body_parts VALUES ('16850050729378', '48', 'শিরা', 'Vein', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:24:38', '2023-05-25 08:57:52');



DROP TABLE IF EXISTS bn_seven_days;

CREATE TABLE IF NOT EXISTS bn_seven_days (
    seven_day_id        BIGINT,
    serial              INT,
    bengali             TEXT,
    english             TEXT,
    slug                VARCHAR(255),
    big_image_path      TEXT,
    small_image_path    TEXT,
    audio_path          TEXT,
    is_enabled          BOOLEAN,
    create_date         VARCHAR(64),
    modified_date       VARCHAR(64),
    CONSTRAINT pk_bn_seven_days_seven_day_id PRIMARY KEY (seven_day_id)
);

DELETE FROM bn_seven_days;

INSERT INTO bn_seven_days VALUES ('16850051925090', '1', 'শনিবার', 'Saturday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');
INSERT INTO bn_seven_days VALUES ('16850051927173', '2', 'রবিবার', 'Sunday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');
INSERT INTO bn_seven_days VALUES ('16850051925425', '3', 'সোমবার', 'Monday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');
INSERT INTO bn_seven_days VALUES ('16850051922324', '4', 'মঙ্গলবার', 'Tuesday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');
INSERT INTO bn_seven_days VALUES ('16850051924711', '5', 'বুধবার', 'Wednesday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');
INSERT INTO bn_seven_days VALUES ('16850051929292', '6', 'বৃহস্পতিবার', 'Thursday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');
INSERT INTO bn_seven_days VALUES ('16850051926231', '7', 'শুক্রবার', 'Friday', 'slug', 'big-image.png', 'small-image.png', 'audio.mp3', '1', '2023-05-24 21:23:18', '2023-05-25 08:59:52');


DROP TABLE IF EXISTS bn_seven_days;

CREATE TABLE IF NOT EXISTS bn_seven_days (
    lesson_id          BIGINT,
    serial             INT,
    bengali            TEXT,
    english            TEXT,
    slug               VARCHAR(255),
    big_image_path     TEXT,
    audio_path         TEXT,
    is_enabled         BOOLEAN,
    create_date        VARCHAR(64),
    modified_date      VARCHAR(64),
    CONSTRAINT pk_bn_seven_days_lesson_id PRIMARY KEY (lesson_id)
);



*/
?>
<?php
/*
Parts of the Body in English | Human Body Parts Names
https://youtu.be/aB7sIePM4rE
The human body parts in English and Bengali for kids
https://youtu.be/7blK9kP4NeE
শরীরের ৬২টি অংশের ইংরেজি নাম ও উচ্চারণ
https://youtu.be/JuePo9f9UvQ
চলো আজ শিখি Body parts name & Pronunciation | Kids vocabulary | English educational video
https://youtu.be/goQS58PPE0s


*/
?>

<?php
/*$SQLiteCon = new SQLiteConnection(DbConfig::dbPath);

$tableName = "human_body_parts";
$sqlQuery = ""
    . "SELECT * FROM $tableName"
    . " ORDER BY serial ASC"
    . "";
//echo $sqlQuery;
$sqlResult = $SQLiteCon->query($sqlQuery);
if($sqlResult != null) {
    $index = -1;
    $jsonArray = array();
    getTopData($tableName);
    foreach($sqlResult as $row) {
        $index++;
        //$resultArray = array();
        $idValue = time() . rand(1111, 9999);
        $rowArray = array(
            "id"            => $idValue,
            "serial"        => $index + 1,
            "bengali"       => $row["bengali"],
            "english"       => $row["english"],
            /=*"slug"          => $row["slug"],
            "image_path"    => $row["image_path"],
            "audio_path"    => $row["audio_path"],*=/
            "slug"          => "slug",
            "image_path"    => "image.png",
            "audio_path"    => "audio.mp3",
        );
        $rowArray = ArrayToSql::trimArray($rowArray);
        getInsertSql($rowArray, $tableName);
        //
        $jsonArray[] = getJsonArray($rowArray);
        //
        sleep(0.5);
    }
    $jsonArray = array(
        array(
            "meta_id"   => "meta_id",
            "data"      => $jsonArray,
        ),
    );
    echo getJsonString($jsonArray);
}*/
?>
<?php
/*function getJsonArray($arrayData) {
    return array(
        "bengali"       => $arrayData["bengali"],
        "english"       => $arrayData["english"],
        "slug"          => $arrayData["slug"],
        "image_path"    => $arrayData["image_path"],
        "audio_path"    => $arrayData["audio_path"],
    );
}*/
?>
<?php
/*function getTopData($tableName) {
    echo "<br />";
    echo "<br />";
    echo "DELETE FROM $tableName;";
    echo "<br />";
    echo "<br />";
}
function getInsertSql($arrayData, $tableName) {
    echo ArrayToSql::getInsertQuery($arrayData, $tableName);
    echo "<br />";
}
function getJsonString($arrayData) {
    echo "<br />";
    echo "<br />";
    echo json_encode($arrayData);
    echo "<br />";
    echo "<br />";
}*/
?>