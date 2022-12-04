<?php   
    function fixSqlInject($sql)
    {
        $sql = str_replace('\\','\\\\',$sql);
        $sql = str_replace('\'','\\\'',$sql);
        return $sql;
    }
?>