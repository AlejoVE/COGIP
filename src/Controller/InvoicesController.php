<?php
declare(strict_types = 1);

require_once './Model/InvoicesManager.php';

class InvoicesController extends InvoicesManager
{
    public function createInvoice() 
    {
        $company = intval($_POST['company_choice']);
        $contact_id = intval($_POST['contact_choice']);
        $date=date_create($_POST['date_invoice']);
        $date = date_format($date,"Ymd");

        $this->addInvoice($company, $contact_id, $date);
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