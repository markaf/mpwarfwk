<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/02/2015
 * Time: 18:59
 */
namespace Mpwarfwk\Component\Database;


abstract class PdoProfilerStorage implements StorageInterface {
    protected $dsn;
    protected $username;
    protected $password;
    protected $db;
    const FIRST = 1;
    const SECOND = 2;
    /* catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }*/

    public function __construct($dsn, $username = '', $password = '')
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }


    abstract protected function initDb();

    /*public function exists(User $user){
        $db = $this->initDb();
        $query = "select email from users where email = ? limit 0,1";
        $stmt = $db->prepare( $query );
        $email = $user->Email();
        // this will represent the first question mark
        $stmt->bindParam(self::FIRST, $email );
        // execute our query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num !== 1){
            return false;
        }
        return true;
    }*/

    public function persist($table,$setParams){
        $db = $this->initDb();
        $query = 'INSERT INTO '.$table.' SET ';
        $cont = 0;
        foreach($setParams as $key => $currentParam){
            if($cont != 0) $query = $query.", ";
            $query = $query.' '.$key.' = ?';
            $cont++;
        }
        $stmt = $db->prepare($query);
        $cont = 1;
        foreach($setParams as $key => $currentParam){
            $stmt->bindValue($cont, $currentParam, \PDO::PARAM_STR);
            $cont++;
        }
        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function query($query,array $params){

        $db = $this->initDb();
        $stmt 		= $db->prepare($query);
        $cont = 1;
        foreach($params as $currentParams) {
            $stmt->bindValue($cont, $currentParams, \PDO::PARAM_STR);
            $cont++;
        }
        $stmt->execute();
        $result	= $stmt->fetchAll(); // porque puede haber mas de un usuario antiguo con el mismo correo...
        return $result;
    }
} 