<?php 

class ProductLanguage extends DatabaseQuery 
{ 
    public static $table_name = 'products_lang'; 
    public static $db_fields = [ 
        'ID', //> SERIAL 
        'product_id', //> INT 
        'table_column', //> VARCHAR 255 
        'column_value', //> TEXT 
        'language', //> VARCHAR 2 
        'added', //> DATETIME 
        'added_by', //> INT 
        'edited_by', //> INT 
        'status' //> INT 1 
    ]; 

    public $ID; 
    public $product_id; 
    public $table_column; 
    public $column_value; 
    public $language; 
    public $added; 
    public $added_by; 
    public $edited_by; 
    public $status; 

}