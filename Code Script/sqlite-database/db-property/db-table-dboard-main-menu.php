<?php
namespace DbTable\DashboardMainMenu {
?>
<?php
    interface DbTableProperty {
        public const tableName      = "bn_dashboard_main_menu";
        public const id             = "dashboard_menu_id";
        public const serial         = "serial";
        public const bnTitle        = "bn_title";
        public const enTitle        = "en_title";
        public const bnDescription  = "bn_description";
        public const enDescription  = "en_description";
        public const slug           = "slug";
        public const bnImagePath    = "bn_image_path";
        public const enImagePath    = "en_image_path";
        public const isEnabled      = "is_enabled";
        public const createDate     = "create_date";
        public const modifiedDate   = "modified_date";
    }
    interface TableClumnProperty extends DbTableProperty {
        public const tableRowProperty = array(
            self::id             => array("id", "BIGINT"),
            self::serial         => "INT",
            self::bnTitle        => "TEXT",
            self::enTitle        => "TEXT",
            self::bnDescription  => "TEXT",
            self::enDescription  => "TEXT",
            self::slug           => "VARCHAR(255)",
            self::bnImagePath    => "TEXT",
            self::enImagePath    => "TEXT",
            self::isEnabled      => "BOOLEAN",
            self::createDate     => "VARCHAR(64)",
            self::modifiedDate   => "VARCHAR(64)",
        );
        public const jsonArrayProperty = array(
            "bn_title"          => self::bnTitle,
            "en_title"          => self::enTitle,
            "bn_description"    => self::bnDescription,
            "en_description"    => self::enDescription,
            "slug"              => self::slug,
            "bn_image_path"     => self::bnImagePath,
            "en_image_path"     => self::enImagePath,
        );
    }
    abstract class BnDboardMainMenu implements TableClumnProperty {
        //echo "array indext 0 " . $bnDashboardMainMenu[array_keys($bnDashboardMainMenu)[0]];

        public $dropTable         = "DROP TABLE IF EXISTS " . self::tableName;
        public $createTable         = "CREATE TABLE IF NOT EXISTS " . self::tableName;
        public static $dashboardMenuId  = self::tableRowProperty[self::id][1];
        //public $dashboard_menu_id   = self::$dashboardMenuId;
        public $dashboard_menu_id   = self::tableRowProperty[self::id][1];
        public $serial              = self::tableRowProperty[self::serial];
        public $bn_title            = self::tableRowProperty[self::bnTitle];
        public $en_title            = self::tableRowProperty[self::enTitle];
        public $bn_description      = self::tableRowProperty[self::bnDescription];
        public $en_description      = self::tableRowProperty[self::enDescription];
        public $slug                = self::tableRowProperty[self::slug];
        public $bn_image_path       = self::tableRowProperty[self::bnImagePath];
        public $en_image_path       = self::tableRowProperty[self::enImagePath];
        public $is_enabled          = self::tableRowProperty[self::isEnabled];
        public $create_date         = self::tableRowProperty[self::createDate];
        public $modified_date       = self::tableRowProperty[self::modifiedDate];
        public $pkId                = "CONSTRAINT pk_"
            . self::tableName . "_" . self::id
            . " PRIMARY KEY (" . self::id . ")";
        //
        
        /* public const tableName      = "bn_dashboard_main_menu";
        public const id             = "dashboard_menu_id";
        public const serial         = "serial";
        public const bnTitle        = "bn_title";
        public const enTitle        = "en_title";
        public const bnDescription  = "bn_description";
        public const enDescription  = "en_description";
        public const slug           = "slug";
        public const bnImagePath    = "bn_image_path";
        public const enImagePath    = "en_image_path";
        public const isEnabled      = "is_enabled";
        public const createDate     = "create_date";
        public const modifiedDate   = "modified_date"; */
    }
?>
<?php
}
?>