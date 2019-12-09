<?php

class Database
{
    private $host = "127.0.0.1";
    private $dbName = "restaurant02";
    private $user = "root";
    private $pass = "";
    private $charset = 'utf8';

    private $dbh;
    private $error;
    private $stmt;


    /**
     * Database constructor. Opstarten van een mogelijke verbinding tot de database
     *
     */
    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=" . $this->charset;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
             $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * Een query koppelen aan de statement
     * @param $query
     */
    public function insertUserValues($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    /**
     * Het koppelen van waardes in een statement
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Ophalen van één record vanuit een statement
     * @return mixed
     */
    public function SingleRow()
    {
        $this->run();
        return $this->stmt->fetch();
    }

    /**
     * Ophalen van alle records vanuit een statement
     * @return mixed
     */
    public function All()
    {
        $this->run();
        return $this->stmt->fetchAll();
    }

    /**
     * Het uitvoeren van de statement
     * @return mixed
     */
    public function run()
    {
        return $this->stmt->execute();
    }

    /**
     * Ophalen van de laastst toegevoegde id
     * @return string
     */
    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}

?>