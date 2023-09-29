<?php
require_once 'database.php';



function getAllPatientsAppointments()
{

    global $pdo;

    $sql = 'SELECT * FROM appointments';
    //    echo '<pre>'; print_r($_POST['appointment']); die('here');
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $appointments = $statement->fetchAll();
    $statement->closeCursor();
    return $appointments;
}






function cancelAppointment($appointment_id)
{

    global $pdo;

    $sql = 'UPDATE appointments SET status = "CANCELLED" WHERE appointment_id = :appointment_id';

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':appointment_id', $appointment_id);
    $statement->execute();
    $statement->closeCursor();
    return $statement;
}



function deleteAppointment($appointment_id)
{

    global $pdo;

    $sql = 'DELETE FROM appointments WHERE appointment_id = :appointment_id';

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':appointment_id', $appointment_id);
    $statement->execute();
    $statement->closeCursor();
    return $statement;
}



function getAllActivePatients()
{
    global $pdo;

    $sql = 'SELECT * FROM patients INNER JOIN appointments ON patients.patient_id = appointments.patient_id INNER JOIN sessions ON appointments.session_id = sessions.session_id WHERE appointments.status = "ACTIVE" ORDER BY appointments.date ASC';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $patients = $statement->fetchAll();
    $statement->closeCursor();
    return $patients;
}

function getAllPatients()
{
    global $pdo;

    $sql = 'SELECT * FROM patients INNER JOIN appointments ON patients.patient_id = appointments.patient_id INNER JOIN sessions ON appointments.session_id = sessions.session_id ORDER BY appointments.date ASC';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $patients = $statement->fetchAll();
    $statement->closeCursor();
    return $patients;
}

function deletePatient($patient_id)
{

    global $pdo;

    $sql = 'DELETE FROM patients WHERE patient_id = :patient_id';

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->execute();
    $statement->closeCursor();
    return $statement;
}


function bookAppointments($name, $email, $phone, $session, $date)
{
    global $pdo;

    $query = 'INSERT INTO patients (name , email , phone) VALUES(:name , :email  , :phone)';


    $statement = $pdo->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $statement->closeCursor();
    $patientId = $pdo->lastInsertId();


    $query = 'INSERT INTO appointments (patient_id , session_id , date) VALUES(:patient_id , :session  , :date)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':patient_id', $patientId);
    $statement->bindValue(':session', $session);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();

    $appointmentId = $pdo->lastInsertId();

    return $appointmentId;
}


function bookAppointmentOnly($patient_id, $date, $session)
{
    global $pdo;

    $query = 'INSERT INTO appointments (patient_id , session_id , date) VALUES(:patient_id , :session  , :date)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->bindValue(':session', $session);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
    $appointmentId = $pdo->lastInsertId();

    return $appointmentId;
}



function patientExists($email)
{

    global $pdo;

    $sql = 'SELECT * FROM patients WHERE email = :email';
    //    echo '<pre>'; print_r($_POST['appointment']); die('here');
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $patient = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if ($patient) {

        return $patient['patient_id'];
    } else {
        return false;
    }
}


function getSingleAppointmentWithPatientDetails($appointment_id)
{
    global $pdo;

    $sql = 'SELECT appointments.*, patients.name, patients.phone, patients.email 
            FROM appointments 
            INNER JOIN patients ON appointments.patient_id = patients.patient_id
            WHERE appointments.appointment_id = :appointment_id';

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':appointment_id', $appointment_id);
    $statement->execute();
    $appointment = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $appointment;
}



function getAllMessages()
{

    global $pdo;

    $sql = 'SELECT * FROM messages ORDER BY date DESC';

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $messages = $statement->fetchAll();
    $statement->closeCursor();
    return $messages;
}

function countTotalPatients()
{


    global $pdo;

    $sql = 'SELECT COUNT(*) FROM patients';

    $statement = $pdo->prepare($sql);

    $statement->execute();

    $totalPatients = $statement->fetch();

    $statement->closeCursor();
    return $totalPatients[0];
}


function countTotalActiveAppointments()
{
    global $pdo;

    $sql = 'SELECT COUNT(*) FROM appointments WHERE status = "ACTIVE"';

    $statement = $pdo->prepare($sql);

    $statement->execute();


    $totalActiveAppointments = $statement->fetch();

    $statement->closeCursor();
    return $totalActiveAppointments[0];
}



function countTotalMessages()
{

    global $pdo;

    $sql = 'SELECT COUNT(*) FROM messages';

    $statement = $pdo->prepare($sql);

    $statement->execute();

    $totalMessages = $statement->fetch();

    $statement->closeCursor();
    return $totalMessages[0];
}


function getAppointmentByDate($session,$date){

    global $pdo;



    $sql = 'SELECT appointment_id FROM appointments WHERE date = :date AND session_id = :session_id';


    $statement = $pdo->prepare($sql);

    $statement->bindValue(':date', $date);
    $statement->bindValue(':session_id', $session);

    $statement ->execute();

    $appointment = $statement->fetch(PDO::FETCH_ASSOC);

    $statement->closeCursor();

    return $appointment;

}