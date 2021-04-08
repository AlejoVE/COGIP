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

    public function getInvoice($code)
    {
        $db = $this->connectDb();
        try {
            $results = $db->prepare(
                "SELECT *
                FROM invoices
                 
                 # The question mark instead of the ID
                 WHERE invoice_id=?"
            );
            //To bind the id variable to the first question mark. 
            $results->bindParam(1, $code, PDO::PARAM_STR);
            //To execute the query set into results object
            $results->execute();
            $product = $results->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function addInvoice ($company, $contact_id, $date)
    {
        $db = $this->connectDb();
        $db->query("INSERT INTO invoices (company_id,personId,invoice_date) VALUES ($company,$contact_id,$date)");
    }

    public function deleteInvoice($invoice_id)
    {
        $db = $this->connectDb();
        $req = $db->query("DELETE FROM invoices WHERE invoice_id = $invoice_id");
        $req->bindParam(':invoice_id', $invoice_id, PDO::PARAM_INT);
    }
}