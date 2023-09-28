function formatDateForMySQL(inputDate) {
    // Parse the input date string into a JavaScript Date object
    const dateParts = inputDate.split(" ");
    const monthNames = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ];
    const month = monthNames.indexOf(dateParts[1]) + 1;
    const day = parseInt(dateParts[2]);
    const year = parseInt(dateParts[3]);
  
    // Ensure leading zeros for month and day
    const formattedMonth = month < 10 ? `0${month}` : `${month}`;
    const formattedDay = day < 10 ? `0${day}` : `${day}`;
  
    // Create the MySQL-compatible date format (YYYY-MM-DD)
    const formattedDate = `${year}-${formattedMonth}-${formattedDay}`;
  
    return formattedDate;
  }
  
  
  
  function createDynamicSchedule(callback) {
    const xhr = new XMLHttpRequest();
  
    xhr.open("GET", "ajax/ajax.php?appointments", true);
  
    xhr.onload = function () {
      if (this.status === 200) {
        const response = JSON.parse(this.responseText);
  
        console.log(response)
        const daysOfWeek = [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ];
        const today = new Date();
        const currentDay = today.getDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday
        const tableBody = document.getElementById("schedule");
  
        tableBody.innerHTML = "";
  
        // Loop to create rows starting from the current day
        for (let i = currentDay; i < currentDay + 7; i++) {
          const dayIndex = i % 7; // Wrap around to the beginning of the week if needed
          const newRow = document.createElement("tr");
          const dayCell = document.createElement("td");
          const sessionCells = [];
  
          // Calculate the date of the current day
          const currentDate = new Date(today);
          currentDate.setDate(today.getDate() + (i - currentDay));
  
          dayCell.textContent = `${daysOfWeek[dayIndex]}`;
          dayCell.classList = "day";
  
          // Create cells for morning, afternoon, and evening sessions
          for (let session = 1; session <= 3; session++) {
            const sessionCell = document.createElement("td");
            sessionCell.textContent = `Session ${session}`;
            sessionCell.id = `${currentDate.toDateString()}, Session ${session}`;
  
            // Check if this session is booked in the response
            const isBooked = response.some((item) => {
              const sessionDate = new Date(item.date).toDateString();
              return sessionDate === currentDate.toDateString() && item.session_id === session;
            });
  
            // Set the cell content based on whether it's booked or open
            sessionCell.textContent = isBooked ? "Booked" : "Open";
            sessionCell.classList= isBooked?"booked":"open";
  
            sessionCells.push(sessionCell);
          }
  
          newRow.appendChild(dayCell); // Add day cell
          newRow.appendChild(sessionCells[0]); // Add morning session
          newRow.appendChild(sessionCells[1]); // Add afternoon session
          newRow.appendChild(sessionCells[2]); // Add evening session
  
          tableBody.appendChild(newRow);
        }
        callback()
      } else {
        console.error("Invalid response:", response);
      }
    };
  
    xhr.send();
  }
  
  
  
  function logTableCellTextContent() {
    console.log("logTableCellTextContent function called.");
    
    const tableCells = document.querySelectorAll("#schedule td");
  
    
    tableCells.forEach(function (td) {
      td.addEventListener("click", function () {
        if (this.classList.contains("day")) return;
        if(this.textContent === "Booked")return;
        console.log(this.classList)
       document.querySelector("#showdate").textContent = this.id
      });
    });
  }
  
  // Call the function after creating the dynamic schedule
  createDynamicSchedule(logTableCellTextContent);
  
  


  document.querySelector("#book-appointment").addEventListener("submit", function (e) {
    e.preventDefault();
  
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
  
    const phone = document.getElementById("phone").value;


    const session = document.getElementById("session").value;

    const date = document.getElementById('date').value;

  
    if (!name || !email || !phone || !session || !date) {
      alert("Please fill all the inputs");
      return;
    }
  
  
  
 
  
    const xhr = new XMLHttpRequest();
  
    const params = `name=${name}&email=${email}&phone=${phone}&session=${session}&date=${date}`;
  
    xhr.open("POST", "ajax/ajax.php", true);
  
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
    xhr.onload = function () {
      const response = JSON.parse(this.responseText);
  
      if (this.status === 200) {
        // window.location.href = `/doctor/appointment.php?data=${encodeURIComponent(
        //   JSON.stringify(response)
        // )}`;

        alert("Appointment booked successfully");
        window.location.href = "/doctor/views/appointments.php";
      } else {
        console.error("Invalid response:", response);
      }
    };
    xhr.send(params);
  });
  