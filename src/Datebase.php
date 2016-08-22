<?php

class Connect_db extends mysqli {
    
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $datebase;
    private $port=NULL;
    private $socket=NULL;
    private $connection;
    
    public function connect($dbhost, $dbuser, $dbpass, $datebase, $port, $socket) {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->datebase = $datebase;
        $this->port = $port;
        $this->socket = $socket;
        // tworzenie połączenia //
        $this->connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->datebase, $this->port, $this->socket);
        $this->connection->set_charset("utf8");
        // sprawdzenie czy się udało 
        $conn=$this->connection;
        if (!$this->connection) {
            die("Polaczenie nieudane. Blad: " . $conn->$this->error());
        } else {
            return $this->connection;
        }
    } 
    
    public function close() {
        $this->connection->close();
    }
    
}
