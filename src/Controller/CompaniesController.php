<?php
declare(strict_types = 1);


require_once './Model/CompaniesManager.php';


class CompaniesController extends CompaniesManager
{

    public function createCompany() 
    {
        $name_company = $_POST['name'];
        $tva_number = $_POST['tva_number'];
        // $phone = $_POST['phone'];
        $country = $_POST['country'];
        $company_type = $_POST['type_choice']; 

        $this->addCompany($name_company, $country, $tva_number, $company_type);
    }
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require './View/single-company.php';
    }
}