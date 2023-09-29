
<?php

require_once "models/database.php";
require_once "models/appointments.php";
include_once "views/header.php";
include_once "views/sidebar.php";




session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $userQuery = "SELECT * FROM doctors WHERE doctor_id = :id";
    $stmt = $pdo->prepare($userQuery);
    $stmt->bindValue('id', $user_id);
    $stmt->execute();


    $user = $stmt->fetch();
    $stmt->closeCursor();
    if (!$user) {
        header('Location: views/login.php');
        exit;
    }
} else {
    header('Location: views/login.php');
    exit;
}





$action =  filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$action) {
    $action =  filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!$action) {
        $action = 'list_assignments';
    }
}


switch ($action) {
    case "dashboard":
       $patients = countTotalPatients();
       $messages = countTotalMessages();
       $appointments = countTotalActiveAppointments();
        include "views/dashboard.php";
        break;
    case "appointments":
        include "views/appointments.php";
        break;
    case "edit_appointment":
        $appointments = getAllActivePatients();
        include "views/edit_appointment.php";
        break;
    case "add_appointment":
        include "views/add_appointment.php";
        break;
    case "messages":
        $messages = getAllMessages();
        include "views/messages.php";
        break;
    case "logout":
        include_once "views/logout.php";
        break;
    case "single_patient":
       
        include "views/single_patient.php";
        break;

    case "cancel_appointment":
        $appointment_id = filter_input(INPUT_POST, 'appointment_id', FILTER_VALIDATE_INT);
        
        if (!$appointment_id) {
            header('Location: .?action=edit_appointment');
            exit;
        }
        cancelAppointment($appointment_id);
        header('Location: .?action=edit_appointment');
        break;
    case "delete_appointment":
        $appointment_id = filter_input(INPUT_POST, 'appointment_id', FILTER_VALIDATE_INT);

        if (!$appointment_id) {
            header('Location: .?action=edit_appointment');
            exit;
        }
        deleteAppointment($appointment_id);
        header('Location: .?action=edit_appointment');
        break;


    default:
    $patients = countTotalPatients();
    $messages = countTotalMessages();
    $appointments = countTotalActiveAppointments();
        include "views/dashboard.php";
        break;
}

include_once "views/footer.php";
