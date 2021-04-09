<?php
require_once 'includes/header.php';
require_once 'includes/footer.php';
require_once 'Controller/InvoicesController.php';
require_once 'Controller/ContactsController.php';
require_once 'Controller/CompaniesController.php';

$new_invoice =  new InvoicesController();
$db = $new_invoice->connectDb();

$new_contact = new ContactsController();

$new_company = new CompaniesController();

if (isset($_POST['addInvoice'])) {
    $new_invoice->createInvoice();
    echo "<p>Success!! <br> The invoice has been sended</p>";
    echo "<a href='index.php'>Back</a>";
};

if (isset($_POST['addContact'])) {
    $new_contact->createContact();
    echo "<p>Success!! <br> The contact has been sended</p>";
    echo "<a href='index.php'>Back</a>";
};

if (isset($_POST['addCompany'])) {
    $new_company->createCompany();
    echo "<p>Success!! <br> The company has been sended</p>";
    echo "<a href='index.php'>Back</a>";
};


$companiesNameId = $new_company->getCompaniesNameID();
$type_choice = $new_company->getTypeOfCompany();


$contactsNameId = $new_contact->getContactsNameId();


?>

<?php if (isset($_GET['New_Invoice'])) {  ?>
    <form action="#" name="myForm" method="post">
        <h4>Create a new invoice : </h4>
        <div>
            <label>Company Name : </label>
            <select name="company_choice">
                <?php foreach ($companiesNameId as $company) {  ?>
                    <option value="<?= $company['id_comp'] ?>"><?php echo $company['name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label>Contact Name : </label>
                <select name="contact_choice">
                <?php foreach($contactsNameId as $key => $name){  ?>
                    <option value="<?= $name['person_id'] ?>"><?php echo $name['first_name']." ".$name['last_name'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label for="date">Date invoice:</label>
                <input type="date" id="date" name="date_invoice">
            </div>
            <div class="button">
                <button type="submit" name='addInvoice'>Send</button>
            </div>
        </form>
    <?php } ?>
    
    <?php if(isset($_GET['New_Contact'])){?>
        <form action="formAdd.php" method="post">
            <h4>Create a new contact : </h4>
            <div>
                <label for="lastName">Name :</label>
                <input type="text" id="lastName" name="lastName">
            </div>
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName">
            </div>
            <div>
                <label for="phone">Phone :</label>
                <input type="text" id="phone" name="phone" placeholder="xxx-xxxx">
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <label>Company Name : </label>
                <select name="company_choice">
                <?php foreach($companiesNameId as $key => $name){  ?>
                <option value="<?= $name['id_comp'] ?>"><?php echo $name['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="button">
            <button type="submit" name='addContact'>Send</button>
        </div>
    </form>
<?php } ?>
<?php if (isset($_GET['New_Company'])) { ?>
    <form action="formAdd.php" method="post">
        <h4>Create a new company : </h4>
        <div>
            <label for="name">Company Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="tva_number">TVA Number:</label>
            <input type="text" id="tva_number" name="tva_number">
        </div>
        <div>
            <label for="country">Country :</label>
            <input type="text" id="country" name="country">
        </div>
        <div>
            <div>
                <label for="phone">Phone :</label>
                <input type="text" id="phone" name="phone" placeholder="xxx-xxxx">
            </div>
            <div>
                <label>Company Type : </label>
                <select name="type_choice">
                    <option value="1">Client</option>
                    <option value="2">Provider</option>
                </select>
            </div>
            <div class="button">
                <button type="submit" name='addCompany'>Send</button>
            </div>
    </form>
<?php } ?>