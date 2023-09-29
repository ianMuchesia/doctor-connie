<section class="section-dashboard">
    <div class="head-title">
        <div class="left">
            <h1>Dashbard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="#">Home</a>
                </li>
            </ul>
        </div>
       
      
    </div>

    <ul class="box-info">
        <li>
            <em class=" fa fa-xl fa-users box-info-icons  "></em>
            <span class="text">
                <h3><?php echo $patients? $patients :null ?></h3>
                <p>Total patients</p>
            </span>
        </li>
        <li>
            <i class=" fa fa-xl fa-calendar box-info-icons"></i>
            <span class="text">
                <h3><?php echo $appointments? $appointments : null ?></h3>
                <p>Total Appointments</p>
            </span>
        </li>
       
        <li>
        <em class="fa fa-xl fa-bookmark box-info-icons " ></em>
            <span class="text">
            <h3><?php echo $messages? $messages : null ?></h3>
						<p>Total Messages</p>
            </span>
        </li>
      
    </ul>



</section>