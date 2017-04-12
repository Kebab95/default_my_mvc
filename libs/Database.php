<?php

class Database extends PDO
{

    /**
     * Database constructor.
     */
    public function __construct()
    {
        parent::__construct(DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST,
            DB_USER,
            DB_PASS);
        parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function SQLSelect($table, array $columns= array(), $where = null)
    {

        $col = "";
        if (count($columns)==0){
            $col.="*";
        }
        else {
            foreach ($columns as $column) {
                if (strlen($col)>0){
                    $col.=",";
                }
                $col.= $column;
            }
        }

        $sql = 'SELECT '.$col.' FROM '.$table.' '.($where!=null?"WHERE ".$where:"");
         //echo $sql;
        $sth = parent::prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        if ($sth->rowCount()>0){
            return $sth->fetchAll();

        }
        else {
            return null;
        }

    }

    public function SQLInsertOneRow($table, array $values)
    {
        $col = "";
        $val = "";
        foreach ($values as $key => $value) {
            if (strlen($col)>0){
                $col.=",";
            }
            $col.= $key;
            if (strlen($val)>0){
                $val.=",";
            }
            $val.= $value;
        }
        $sql = "INSERT INTO ".$table." (".$col.") VALUES (".$val.")";
        $sth = parent::prepare($sql);
        $sth->execute();
    }

    public function SQLUpdate($table, array $values,$where)
    {
        $vals = "";
        foreach ($values as $key => $value) {
            if (strlen($vals)>0){
                $vals.=",";
            }
            $vals.= $key."=".$value;
        }
        $sql ="UPDATE ".$table." SET ".$vals." WHERE ".$where;
        $sth = parent::prepare($sql);
        $sth->execute();
    }

    public function SQLDelete($table,$where)
    {
        $sql = "DELETE FROM ".$table." WHERE ".$where;
        $sth = parent::prepare($sql);
        $sth->execute();
    }
}