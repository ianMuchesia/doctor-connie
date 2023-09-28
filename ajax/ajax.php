

<?php
require_once "../models/database.php";
require_once "../models/appointments.php";

if (isset($_POST['login'])) {


    global $pdo;

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email && !$password) {
        header('Location:../views/login.php?empty');
    }else{
        $query = "SELECT * FROM doctors  WHERE email = :email AND password = :password";

        $stmt = $pdo->prepare($query);

        $stmt ->bindValue(':email', $email);
        
        $stmt ->bindValue(':password', $password);

        $stmt->execute();
        $user = $stmt->fetch();
        $stmt->closeCursor();


        // var_dump($user);

        if ($user) {
            session_start();
            $_SESSION['name'] = $user['username'];
            $_SESSION['user_id'] = $user['doctor_id'];

            header('Location: ../index.php');
            exit;
        }else{
            echo "<script>alert('something wrong')</script>";
            header('Location: ../views/login.php?loginE');
            exit();
        }
    }



}



if(isset($_GET['appointments'])){
    $appointments = getAllPatientsAppointments();
  
    $jsonAppointments = json_encode($appointments);
  
    echo $jsonAppointments;
  
  }
  



if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $session = $_POST['session'];
    $date = $_POST['date'];
  
  
    $patientExists = patientExists($email);
  
  
  
    if ($patientExists) {
      $appointmentId = bookAppointmentOnly($patientExists, $date, $session);
    } else {
      $appointmentId = bookAppointments($name, $email, $phone, $session, $date);
    }
  
  
  
    $appointment = getSingleAppointmentWithPatientDetails($appointmentId);
  
  
    $jsonAppointment = json_encode($appointment);
  
    echo $jsonAppointment;
  }
  