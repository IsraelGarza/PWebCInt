<?php 
    class connect
    {
        public $host;
        public $db;
        public $user;
        public $password;
        public $charset;
        public $con;

        public function _construct()
        {
            $this->host = 'localhost';
            $this->db = 'comprasmx';
            $this->user = 'root';
            $this->password = '';
            $this->con = new mysqli($this->host, $this->user, $this->password, $this->db);

            if ($this->con->connect_errno)
            {
                echo "Fallo la conexion!";
            }
            else
            {
                echo "Conexion excitosa!";
            }
        }
    }

    $CONNECT = new connect ();
?>