<?php
$show_debug = true;
Debug("POST DATA<pre>".print_r($_POST, true)."</pre>");

if (isset($_POST)) {

    require("/nas/wp/www/cluster-1475/odm/wp-content/plugins/infusionsoft/isdk.php"); 

    //build our application object 
    $app = new iSDK;
    //connect to the API
    if($app->cfgCon("odmconn")){
        Debug("app connected!"); 
    }    
    else {
        Debug("connection failed!"); 
    }
    
    // get event details that must be saved to contact
    $infusion_datefieldname = $_POST['infusion_datefieldname'];
    $infusion_locationfieldname = $_POST['infusion_locationfieldname'];
    $event_date_bits = explode('/', $_POST['Contact0_ODMEventDate']);
    $event_date_stamp = ($event_date_bits[2].'-'.$event_date_bits[1].'-'.$event_date_bits[0]);
    
    
    // get contact details into an array to make it easier to work with later
    $contacts_array = array();
    $attendee_count = $_POST['AttendeeCount'];
    // check if booker is attending
    if ($_POST['BookerAttending']=='yes') {
        $first_attendee_number = 2;
        $is_booker_attending = true;
    }
    else {
        $first_attendee_number = 1;
        $is_booker_attending = false;
    }

    $contacts_array['booker']['FirstName'] = $_POST['BookerFirstName'];
    $contacts_array['booker']['LastName'] = $_POST['BookerLastName'];
    $contacts_array['booker']['Email'] = $_POST['BookerEmail'];    
    $contacts_array['booker']['Phone2'] = $_POST['BookerPhone'];
    $contacts_array['booker']['Company'] = $_POST['BookerCompany'];
    $contacts_array['booker']['Website'] = $_POST['BookerWebsite'];
    $contacts_array['booker']['LeadSourceId'] = $_POST['Contact0LeadSourceId'];
    $contacts_array['booker']['_OtherLeadSource'] = $_POST['Contact0_OtherLeadSource'];
    $contacts_array['booker']['_ODMTipsRequested'] = $_POST['BookerTipsRequested'];
    $contacts_array['booker']['_EventTransactionID'] = $_POST['TransactionID'];
    
    if ($is_booker_attending) {
        $contacts_array['booker'][$infusion_locationfieldname] = $_POST['Contact0_ODMEventLocation'];
        $contacts_array['booker'][$infusion_datefieldname] = $app->infuDate($event_date_stamp);
    }
    
    
    for ($i = $first_attendee_number; $i <= $attendee_count; $i++) {
        $contacts_array[$i]['FirstName'] = $_POST['Contact'.$i.'FirstName'];
        $contacts_array[$i]['LastName'] = $_POST['Contact'.$i.'LastName'];
        $contacts_array[$i]['Email'] = $_POST['Contact'.$i.'Email'];    
        $contacts_array[$i]['Phone2'] = $_POST['Contact'.$i.'Phone'];
        $contacts_array[$i]['Company'] = $_POST['BookerCompany'];
        $contacts_array[$i]['Website'] = $_POST['BookerWebsite'];
        $contacts_array[$i]['LeadSourceId'] = $_POST['Contact0LeadSourceId'];
        $contacts_array[$i]['_OtherLeadSource'] = $_POST['Contact0_OtherLeadSource'];
        $contacts_array[$i]['_ODMTipsRequested'] = $_POST['BookerTipsRequested'];
        $contacts_array[$i]['_EventTransactionID'] = $_POST['TransactionID'];
        $contacts_array[$i][$infusion_locationfieldname] = $_POST['Contact0_ODMEventLocation'];
        $contacts_array[$i][$infusion_datefieldname] = $app->infuDate($event_date_stamp);
    }
    Debug("CONTACTS<pre>".print_r($contacts_array, true)."</pre>");
    
    // add/update contacts
    foreach ($contacts_array as $contact) {
        //check for existing contact;
        $returnFields = array('Id');
        $dups = $app->findByEmail($contact['Email'], $returnFields);

        if (!empty($dups)) {
            //update contact
            $app->updateCon($dups[0]['Id'], $contact);
            Debug("Updated contact: ".$contact['Email']);
            $contact_id = $dups[0]['Id'];
        } else {
            //Add new contact
            $contact_id = $app->addCon($contact);
            Debug("Added contact: ".$contact['Email']);
        }
        
        // add note
        $app->dsAdd('ContactAction',array(  
            'ContactId' => $contact_id,
            'ActionDescription' => 'Order Transaction Details',
            'CreationNotes' => "Booker: ".$contacts_array['booker']['FirstName']." ".$contacts_array['booker']['LastName']."\r\nTransaction ID: ".$_POST['TransactionID']."\r\nEvent Date: ".$_POST['Contact0_ODMEventDate']."\r\nEvent Location: ".$_POST['Contact0_ODMEventLocation'],
            'Priority' => 3,
            'Accepted' => 1,
            'UserID' => 1,
            'CreatedBy' => 1,
            'CreationDate' => date('Ymd/THis',strtotime('now')),
            'ActionDate' => date('Ymd/THis',strtotime('now')),
           ));
    }
       
    // Get product ID
    $product_id = $_POST['IS_productID'];
    
    Debug("Location: https://odm.infusionsoft.com/app/manageCart/addProduct?productId='.$product_id.'&quantity='.$attendee_count");
    
    // Now everything is saved let's sent them to the checkout
    header('Location: https://odm.infusionsoft.com/app/manageCart/addProduct?productId='.$product_id.'&quantity='.$attendee_count);
}
else {
    ?>
        <p>Sorry, an error has occurred, please go back using your browser's back button or <a href="/">click here to go to the home page</a></p>
    <?php
}
function Debug($debug_text) {
    global $show_debug;
    
    if ($show_debug) {
        echo "<p style=\"color: red;\">$debug_text</p>";
    }
}
  
?>