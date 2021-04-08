<?php


declare(strict_types=1);
require_once 'Manager.php';

class AdministratorsManager extends Manager 
{
    public function getAllAdministrators() 
    {
            $db = $this->connectDb();
            $contacts = $db->query("SELECT * FROM administrators");
            $result = $contacts->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }
}
