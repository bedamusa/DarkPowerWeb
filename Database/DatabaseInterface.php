<?php


namespace DarkPowerWeb\Database;


interface DatabaseInterface
{
    public static function getInstance($driver, $host, $username, $password, $dbName,
                                       $hostPort = 1433, $options = false);
    public function getConn();
    public function query($queryString, $statement = []);
    public  function fetch($queryString, $statement = []);
    public  function fetchOne($queryString, $statement = [], $column = 0);
    public  function fetchAll($queryString, $statement = []);
    public  function fetchNum($queryString, $statement = []);
    public  function numRows($queryString, $statement = []);
    public  function fetchAllNum($queryString, $statement = []);
    public  function fetchAllColumn($queryString, $statement = []);
    public  function insert($table,array $colAndValue, $where = false, $repOrIns = false);
    public  function delete($table,array $statement,$whatDelete, $where , $order = '');
}