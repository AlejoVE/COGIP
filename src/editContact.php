<?php 
require_once 'includes/header.php'; 
require_once "Model/ContactsManager.php";
require_once 'Controller/ContactsController.php';
require_once 'Model/CompaniesManager.php';


    if (isset($_POST['addContact'])) {
        $contactsController->createContact();
        echo "<p>Success!! <br> The contact has been saved</p>";
        echo "<a href='index.php'>Back</a>";

        //TODO:  create method UPDATEContact in ContactsModel to update a user
    };

    if(isset($_GET['id'])){
        $person_id = $_GET["id"];
        $person = $contactsModel->getPersonByIdWithCompany($person_id);
        $companiesNameId = $companiesModel-> getCompaniesNameID();
        if(!$person){
            echo 'There is no person with that ID';
        } else {
            
?>

        <form action="#" method="post">
                    <h4>Edit a new contact : </h4>
                    <div>
                        <label for="lastName">Last name :</label>
                        <input type="text" id="lastNamxe" name="lastName" value="<?php echo $person["last_name"] ?>">
                    </div>
                    <div>
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" value="<?php echo $person["first_name"] ?>">
                    </div>
                    <div>
                        <label for="phone">Phone :</label>
                        <input type="text" id="phone" name="phone" placeholder="xxx-xxxx" value="<?php echo $person["phone"] ?>">
                    </div>
                    <div>
                        <label for="email">Email :</label>
                        <input type="text" id="email" name="email" value="<?php echo $person["email"] ?>">
                    </div>
                    <div>
                        <label>Company Name : </label>
                        <select name="company_choice">
                        <?php foreach($companiesNameId as $company){  ?>
                        <option value="<?= $company['id_comp'] ?>" <?php if($company['name'] == $person['name']) echo 'selected' ?>>
                            <?php echo $company['name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="button">
                    <button type="submit" name='addContact'>Send</button>
                </div>
        </form>
    <?php } ?>
<?php } ?>

<?php require_once 'includes/footer.php'; ?>