<?php 

    class MyPDO extends PDO{
        private $host = 'localhost',
                $user = 'root',
                $passwd = '',
                $dbname = 'entreprise',
                $sgdb = 'mysql';

        public function __construct(){
            parent::__construct($this->sgdb.':dbname='.$this->dbname.';host='.$this->host, $this->user, $this->passwd);
        }
    }
?>