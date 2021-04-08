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

    public function getLastFive()
    {
        $db = $this->connectDb();
        $lastsContacts = $db->query("SELECT * FROM people JOIN companies 
        ON company_id = id_comp ORDER BY id_comp DESC  LIMIT 0,5 ");
        $result = $lastsContacts->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getContactsNameId()
    {
        $db = $this->connectDb();
        $ContactsNameId = $db->query("SELECT person_id,first_name, last_name FROM people");
        $result = $ContactsNameId->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addContact($first_name, $last_name, $email, $company_id, $phone)
    {
        $db = $this->connectDb();
        $db->query("INSERT INTO people (first_name,last_name,email,company_id,phone) VALUES ('$first_name', '$last_name', '$email', '$company_id', '$phone')"); 
    }

    public function deleteContact($contact_id)
    {
        $db = $this->connectDb();
        $req = $db->query("DELETE FROM people WHERE person_id = $contact_id");
        $req->bindParam(':person_id', $contact_id, PDO::PARAM_INT);
    }
}