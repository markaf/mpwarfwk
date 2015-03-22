<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/02/2015
 * Time: 19:22
 */

namespace Mpwarfwk\Component\Database;

class MysqlProfilerStorage extends PdoProfilerStorage {

    protected function initDb()
    {
        if (null === $this->db) {
            if (0 !== strpos($this->dsn, 'mysql')) {
                throw new \RuntimeException(sprintf('Please check your configuration. You are trying to use Mysql with an invalid dsn "%s". The expected format is "mysql:dbname=database_name;host=host_name".', $this->dsn));
            }

            if (!class_exists('PDO') || !in_array('mysql', \PDO::getAvailableDrivers(), true)) {
                throw new \RuntimeException('You need to enable PDO_Mysql extension for the profiler to run properly.');
            }

            try {
                $db = new \PDO($this->dsn, $this->username, $this->password);
            }
            catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            $db->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC );
            $this->db = $db;
        }

        return $this->db;
    }


} 