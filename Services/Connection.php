<?php
declare(strict_types = 1);
namespace Services;

use PDO;
use PDOException;

class Connection
{ 
    public $pdo = null;
    function __construct()
    {
        try {
            self::openDb();
        } catch ( PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    protected function openDb()
    {
        
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

		$dsn = DB_TYPE . ':host=' . DB_HOST . ';port ='. DB_PORT . ';dbname=' . DB_NAME;
        try{
          $this->pdo = new PDO($dsn , DB_USER, DB_PASS, $options);
        }catch (PDOException $e){
          echo '<div align="center"><b>Menssage: </b>'.$e->getMessage();
		  echo '<br><b>Code</b>: '.$e->getCode().'<br>';
		  echo '<b>File</b>: '.$e->getFile();
          echo '<br><b>Line: </b>'.$e->getLine();
          die('<br><br><hr><h3>Create the database<br>Import db.sql script from root directory<br>And try connect again<h3></div>');
        }
    }
}
