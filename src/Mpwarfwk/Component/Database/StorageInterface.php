<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/02/2015
 * Time: 17:57
 */

namespace Mpwarfwk\Component\Database;


interface StorageInterface {
    public function query($query,array $params);
    public function persist($table,$setParams);
    //public function exists(User $user);
} 