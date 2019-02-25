<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'ranto.ralijaona77@gmail.com';

    $firstname = addslashes(trim($_POST['firstname']));
    $lastname = addslashes(trim($_POST['lastname']));
    $clientEmail = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $message = addslashes(trim($_POST['message']));

    $array = array('firstname' => '', 'lastname' => '', 'emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

    if($firstname == '') {
        $array['firstnameMessage'] = 'Empty first name!';
    }
    if($lastname == '') {
        $array['lastMessage'] = 'Empty last name!';
    }
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }

    if(isEmail($clientEmail) && $subject != '' && $message != '' && $firstname != '' && $lastname != '') {
        // Send email
		$headers = "From: " . $clientEmail;
		mail($emailTo, $subject . " (Site internet)", $message, $headers);
    }

    echo json_encode($array);

}

?>
