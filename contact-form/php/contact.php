<?php

function verifyInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function isPhone($var)
{
    // expression régulière
    return preg_match("/^[0-9 ]*$/", $var);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = true;
    $email = verifyInput($_POST['email']);
    $name = verifyInput($_POST['name']);
    $firstname = verifyInput($_POST['firstname']);
    $phone = verifyInput($_POST['phone']);
    $message = verifyInput($_POST['email']);

    if (empty($firstname)) {
        $success = false;
    }

    if (empty($name)) {
        $success = false;
    }

    if (!isEmail($email)) {
        $success = false;
    }

    if (!isPhone($phone)) {
        $success = false;
    }

    if (empty($message)) {
        $success = false;
    }

    if ($success) {
        $response = [
            'status' => 'success',
            'message' => 'Email Sent Successfully.!'
        ];
    } else {
        $response = ['status' => 'error', 'message' => 'All fields are mandatory!.'];
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
