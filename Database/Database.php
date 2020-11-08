<?php


namespace DarkPowerWeb\Database;


class Database implements DatabaseInterface
{
    private static $instance = null;
    private static $conn;
    private static $driver;
    private static $host;
    private static $hostPort;
    private static $username;
    private static $password;
    private static $dbName;
    private static $options;

    /**
     * Database constructor.
     */
    public function __construct()
    {
    }


    public static function getInstance($driver, $host, $username, $password, $dbName, $hostPort = 1433, $options = false)
    {
        // TODO: Implement getInstance() method.
    }

    public function getConn()
    {
        // TODO: Implement getConn() method.
    }

    public function query($queryString, $statement = [])
    {
        // TODO: Implement query() method.
    }

    public function fetch($queryString, $statement = [])
    {
        // TODO: Implement fetch() method.
    }

    public function fetchOne($queryString, $statement = [], $column = 0)
    {
        // TODO: Implement fetchOne() method.
    }

    public function fetchAll($queryString, $statement = [])
    {
        // TODO: Implement fetchAll() method.
    }

    public function fetchNum($queryString, $statement = [])
    {
        // TODO: Implement fetchNum() method.
    }

    public function numRows($queryString, $statement = [])
    {
        // TODO: Implement numRows() method.
    }

    public function fetchAllNum($queryString, $statement = [])
    {
        // TODO: Implement fetchAllNum() method.
    }

    public function fetchAllColumn($queryString, $statement = [])
    {
        // TODO: Implement fetchAllColumn() method.
    }

    public function insert($table, array $colAndValue, $where = false, $repOrIns = false)
    {
        // TODO: Implement insert() method.
    }

    public function delete($table, array $statement, $whatDelete, $where, $order = '')
    {
        // TODO: Implement delete() method.
    }
}