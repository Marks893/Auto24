<?php 

class Category extends DatabaseQuery 
{ 
    public static $table_name = 'categories'; 
    public static $db_fields = [ 
        'ID', //> SERIAL 
        'name', //> VARCHAR 100 
        'parent', //> INT 
        'added', //> DATETIME 
        'status', //> INT 1 
    ]; 

    public $ID; 
    public $name; 
    public $parent; 
    public $added; 
    public $status; 

    public static function find_parent($ID) { 
        global $database; 

        $sql = "SELECT * FROM " 
            . PX . self::$table_name 
            . " WHERE parent=" . $database->escape_value($ID) . " LIMIT 1"; 

        $result = static::find_by_query($sql); 

        return !empty($result) ? array_shift($result) : false; 
    } 
}