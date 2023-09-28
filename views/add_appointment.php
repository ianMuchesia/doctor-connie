


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
        <form id="book-appointment" class="form">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" placeholder="Enter Name" id="name" class="form-input">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" name="email" placeholder="Enter Email Address" id="email" class="form-input">
            </div>
            <div class="form-group">
                <label for="session" class="form-label">Session</label>
                <!-- <input type="text" name="session" placeholder="Enter Session" id="session" class="form-input"> -->
                <select name="session" id="session" class="form-input">
                <option value="">--please select--</option>
                    <option value="1">Morning</option>
                    <option value="2">Afternoon</option>
                    <option value="3">Evening</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" placeholder="Enter Phone Number" id="phone" class="form-input">
            </div>
            <div class="form-group">
             
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" placeholder="Enter Date" id="date" class="form-input">
            </div>
            <input type="submit" value="Add Appointment" class="btn btn-primary">
        </form>
    </div>

</section>
<script src="ajax/book.js"></script>