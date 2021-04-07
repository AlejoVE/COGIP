<?php


declare(strict_types=1);
require_once 'Manager.php';

class InvoiceManager extends Manager 
{
    public function getAllInvoices () 
    {
            $db = $this->connectDb();
            $invoices = $db->query("SELECT * FROM invoices JOIN companies ON company_id = id_comp JOIN type_of_company ON id_type = typeId ");
            $result = $invoices->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }
}