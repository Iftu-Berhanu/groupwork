<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Borrowing</title>
</head>
<body>

<?php
// Initialize variables to hold form data and error messages
$firstName = $secondName = $id = $department = $gender = "";
$firstNameErr = $secondNameErr = $idErr = $departmentErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty($_POST["first_name"])) {
        $firstNameErr = "First name is required";
    } else {
        $firstName = clean_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            $firstNameErr = "Only letters and spaces are allowed";
        }
    }

    // Validate second name
    if (empty($_POST["second_name"])) {
        $secondNameErr = "Second name is required";
    } else {
        $secondName = clean_input($_POST["second_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $secondName)) {
            $secondNameErr = "Only letters and spaces are allowed";
        }
    }

    // Validate ID
    if (empty($_POST["id"])) {
        $idErr = "ID is required";
    } else {
        $id = clean_input($_POST["id"]);
        if (!is_numeric($id)) {
            $idErr = "ID must be numeric";
        }
    }

    // Validate department
    if (empty($_POST["department"])) {
        $departmentErr = "Department is required";
    } else {
        $department = clean_input($_POST["department"]);
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = clean_input($_POST["gender"]);
    }

    // If no errors, display a success message
    if (empty($firstNameErr) && empty($secondNameErr) && empty($idErr) && empty($departmentErr) && empty($genderErr)) {
        echo "<h3>Book Borrow Request Successful</h3>";
        echo "<p>Thank you, $firstName $secondName, for borrowing a book from the library.</p>";
        echo "<p>ID: $id</p>";
        echo "<p>Department: $department</p>";
        echo "<p>Gender: $gender</p>";
    }
}