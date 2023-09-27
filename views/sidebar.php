<?php   // $action =  filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<section id="sidebar">
    <a href="#" class="brand">
    <i class="fa fa-user-md" aria-hidden="true"></i>
        <span class="text">Doctor</span>
    </a>
    <ul class="side-menu top">
        <li class="<? echo $action === 'dashboard' ? 'active' : '' ?>">
            <a href=".?action=dashboard"><em class="fa fa-dashboard">&nbsp;</em>

                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="<? echo $action === 'appointments' ? 'active' : '' ?>">
            <a href=".?action=appointments"><em class="fa fa-calendar">&nbsp;</em>
                Appointments
            </a>
        </li>
        <li class="<? echo $action === 'edit_appointment' ? 'active' : '' ?>">
            <a href=".?action=edit_appointment"><em class="fa fa-pencil">&nbsp;</em>
            Edit/Cancel
            </a>
        </li>
        <li class="<? echo $action === 'add_appointment' ? 'active' : '' ?>">
            <a href=".?action=add_appointment"><em class="fa fa-plus">&nbsp;</em>
                Add Appointment
            </a>
        </li>
        <li class="<? echo $action === 'messages' ? 'active' : '' ?>">
            <a href=".?action=messages"><em class="fa fa-commenting-o">&nbsp;</em>
                Messages
            </a>
        </li>
        <li class="<? echo $action === 'logout' ? 'active' : '' ?>">
            <a href=".?action=logout"><em class="fa fa-user">&nbsp;</em>
                Logout
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <!-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li> -->
    </ul>
</section>
<!-- SIDEBAR -->