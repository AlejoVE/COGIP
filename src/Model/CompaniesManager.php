<?php

declare(strict_types=1);

// namespace Becode\MVCBoilerplate\model;

require_once('Manager.php');

class CompaniesManager extends Manager
{

    private $name;

    // public function __construct(string $name)
    // {
    //     $this->name = $name;
    // }

    public function getCompanies($type) 
    {
        $db = $this->connectDb();

        $suppliers = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_type=$type");
        $result = $suppliers->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // public function getClients() {
    //     $db = $this->connectDb();

    //     $suppliers = $db->query("SELECT * FROM companies JOIN type_of_company ON id_type = typeId WHERE id_type=2 ");
    //     $result = $suppliers->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    //To display all the companies
    // public function getCompanies()
    // {
        
    //     $db = $this->connectDb();

    //     $req = $db->query('SELECT ... AS ... 
    //         FROM ... 
    //         ORDER BY ... 
    //         DESC');

    //     return $req->fetch(PDO::FETCH_ASSOC);
    // }

    //To display company by id
    public function getCompany(int $companyId)
    {

        $db = $this->connectDb();

        $req = $db->prepare('SELECT ... AS ... 
            FROM ... 
            WHERE id = ?');

        $req->bindParam(1, $this->companyId, PDO::PARAM_STR);
        $req->execute();
        $company = $req->fetch();

        return $company;
    }

}