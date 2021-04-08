<?php
declare(strict_types = 1);

require_once './Model/ContactsManager.php';

class ContactsController extends ContactsManager
{
    public function createContact() 
    {
        $last_name = $_POST['lastName'];
        $first_name = $_POST['firstName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $company_id = intval($_POST['company_choice']);

        $this->addContact($first_name, $last_name, $email,  $company_id, $phone);
    }

    //render function with both $_GET and $_POST vars available if it would be needed.
    // public function render(array $GET, array $POST)
    // {
    //     //you should not echo anything inside your controller - only assign vars here
    //     // then the view will actually display them.

    //     //load the view
    //     require './View/single-company.php';
    // }
}