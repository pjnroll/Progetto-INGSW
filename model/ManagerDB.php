<?php
class ManagerDB {
    protected $link;
    private $_db;
    static $_instance;


    private function __clone(){}

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function query($sql) {
        return query($this->_db,$sql);
    }

    public function __construct($server = "", $username = "", $password = "", $db = "") {
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Se son stati passi come parametri i dati del db, li uso per connettermi
        if ($server != "" && $username != "" && $username != "" && password != "" && $db != "") {
            $this->_db = new PDO('mysql:host='.$server.'; dbname='.$db, $username, $password);
        }
        else {
            // Altrimenti procedo di default con quelli locali.
            $this->_db = new PDO('mysql:host=127.0.0.1;dbname=iot', 'root', '');
        }
        $this->connect();
    }

}
?>