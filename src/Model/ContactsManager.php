<?php


declare(strict_types=1);
require_once 'Manager.php';

class ContactsManager extends Manager 
{
    public function getAllContacts() 
    {
            $db = $this->connectDb();
            $contacts = $db->query("SELECT * FROM people JOIN companies ON company_id = id_comp ");
            $result = $contacts->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }
}