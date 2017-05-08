<?php

class Database extends PDO
{

    /**
     * Database constructor.
     * Connect to the Database
     * The Database connect data change to in config.php
     */
    public function __construct()
    {
        parent::__construct(DB_TYPE . ':dbname=' . DB_NAME . ';host=' . DB_HOST,
            DB_USER,
            DB_PASS);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function SQLSelectToClass(
            $className,
            $table,
            array $columns = array(),
            $where = null,
            $join = null,
            $etc = null
        )
    {
        $col = "";
        if (count($columns) == 0) {
            $col .= "*";
        } else {
            foreach ($columns as $column) {
                if (strlen($col) > 0) {
                    $col .= ",";
                }
                $col .= $column;
            }
        }

        $sql = 'SELECT ' . $col . ' FROM ' . $table .  ($join != null ? ' ' .$join : ""). ($where != null ? " WHERE " . $where : "").($etc != null ? " " . $etc : "");
        try{
            //echo $sql;
            $sth = parent::prepare($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$className);
            $sth->execute();
            if ($sth->rowCount() > 0) {
                return $sth->fetchAll();

            } else {
                return null;
            }
        } catch (PDOException $e){
            return null;
        }
    }

    /**
     *
     * Database Select SQL generator and execute
     * @param $table string
     * @param $columns array
     * @param $where null|string
     * @param $join null|string
     * @param $etc null|string
     * @return array|null
     */
    public function SQLSelect(
            $table,
            array $columns = array(),
            $where = null,
            $join = null,
            $etc = null
        )
    {

        $col = "";
        if (count($columns) == 0) {
            $col .= "*";
        } else {
            foreach ($columns as $column) {
                if (strlen($col) > 0) {
                    $col .= ",";
                }
                $col .= $column;
            }
        }

        $sql = 'SELECT ' . $col . ' FROM ' . $table .  ($join != null ? ' ' .$join : ""). ($where != null ? " WHERE " . $where : "").($etc != null ? " " . $etc : "");
        try{
            //echo $sql;
            $sth = parent::prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            if ($sth->rowCount() > 0) {
                return $sth->fetchAll();

            } else {
                return null;
            }
        } catch (PDOException $e){
            return null;
        }

    }

    /**
     * Database Insert SQL generator and execute
     * @param string $table
     * @param array $values
     * @return bool
     */
    public function SQLInsertOneRow($table, array $values)
    {
        $col = "";
        $val = "";
        foreach ($values as $key => $value) {
            if (strlen($col) > 0) {
                $col .= ",";
            }
            $col .= $key;
            if (strlen($val) > 0) {
                $val .= ",";
            }
            $val .= $value;
        }
        $sql = "INSERT INTO " . $table . " (" . $col . ") VALUES (" . $val . ")";
        try{

            $sth = parent::prepare($sql);
            return $sth->execute();
        } catch (PDOException $e){
            return false;
        }
    }

    /**
     * Database Update SQL generator and execute
     * @param string $table
     * @param array $values
     * @param string $where
     * @return bool
     */
    public function SQLUpdate($table, array $values, $where)
    {
        $vals = "";
        foreach ($values as $key => $value) {
            if (strlen($vals) > 0) {
                $vals .= ",";
            }
            $vals .= $key . "=" . $value;
        }
        $sql = "UPDATE " . $table . " SET " . $vals . " WHERE " . $where;
        try {
            $sth = parent::prepare($sql);
            return $sth->execute();
        } catch (PDOException $e){
            return false;
        }
    }

    /**
     * Database Delete SQL generator and execute
     * @param string $table
     * @param string $where
     * @return bool
     */
    public function SQLDelete($table, $where)
    {
        $sql = "DELETE FROM " . $table . " WHERE " . $where;
        try {
            $sth = parent::prepare($sql);
            return $sth->execute();
        } catch (PDOException $e){
            return false;
        }
    }
}