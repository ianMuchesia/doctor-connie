


<section class="section-dashboard">
    <div class="head-title">
        <div class="left">
            <h1>Upcoming Appointments</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="#">Appointments</a>
                </li>
            </ul>
        </div>
        <!-- <a href=".?action=route" class="btn-download">
            <i class='bx bxs-cloud-upload'></i>
            <span class="text">ADD ROUTE/BUS</span>
        </a> -->
    </div>

    <div class="">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Session</th>
                <th>Date</th>
                <th>Phone Number</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody id>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
                    <td><?php echo $appointment['name']; ?></td>
                    <td><?php echo $appointment['session']; ?></td>
                    <td><?php echo $appointment['date']; ?></td>

                    <td><?php echo $appointment['phone']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="cancel_appointment">
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                            <input type="submit" value="Cancel" class="btn btn-edit">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_appointment">
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                            <input type="submit" value="Remove" class="btn btn-delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

</section>
