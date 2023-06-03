<?php
//|-----------------|CLASS - SQLITE CONNECTION|------------------|
class SQLiteConnection {
    //|---------------|CLASS VARIABLE SCOPE START|---------------|
    private $pdo;
    private $sqliteFile = "sqlite-dtabase.sqlite3";
    //|----------------|CLASS VARIABLE SCOPE END|----------------|

    //|-------------------|CLASS CONSTRUCTOR|--------------------|
    public function __construct($dbPath) {
        $this->sqliteFile = $dbPath;
        $this->connect($this->sqliteFile);
    }

    //|-------------------|SQLITE CONNECTION|--------------------|
    public function connect($dbPath) {
        $this->sqliteFile = $dbPath;
        //|SQLite PDO Connection|--------------------------------|
        if ($this->pdo == null) {
            $this->pdo = new PDO("sqlite:" . $this->sqliteFile);
        }
        /*if($this->pdo == null) {
            $this->pdo = new SQLite3('sqlite3db.db');
        }*/
        return $this->pdo;
    }

    //|-----------------------|SQL QUERY|------------------------|
    public function query($sqlQuery) {
        if ($this->pdo != null) {
            return $this->pdo->query($sqlQuery);
        }
        return null;
    }
}
?>
<?php
/*class SQLiteConnection {
    private $pdo;
    private $sqliteFile = "bangla-to-engilsh-word.sqlite3";
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new PDO("sqlite:" . $this->sqliteFile);
        }
        /-*if($this->pdo == null) {
            $this->pdo = new SQLite3('sqlite3db.db');
        }*-/
        return $this->pdo;
    }
}*/
?>