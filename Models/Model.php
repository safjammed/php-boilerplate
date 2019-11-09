<?php
namespace Models;
class Model
{
    public $db;
    public $table;

    public function __construct()
    {
        //class initiated
        $this->db = $GLOBALS['db'];
    }
}