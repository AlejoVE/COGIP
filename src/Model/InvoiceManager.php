<?php


declare(strict_types=1);
require_once 'Manager.php';

class InvoicesManager extends Manager 
{
    public function getAllInvoices () 
    {
            $db = $this->connectDb();
            $invoices = $db->query("SELECT * FROM invoices JOIN companies ON company_id = id_comp JOIN type_of_company ON id_type = typeId ");
            $result = $invoices->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }

    public function getLastFive()
    {
        $db = $this->connectDb();
        $lastInvoices = $db->query("SELECT * FROM invoices JOIN companies 
        ON company_id = id_comp ORDER BY id_comp DESC LIMIT 0,5 ");
        $result = $lastInvoices->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}