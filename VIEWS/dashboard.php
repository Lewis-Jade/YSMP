<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>YSMP Youth Dashboard</title>
  <link rel="stylesheet" href="../CSS/dashboard.css" />


  
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
        <div class="profile-box">
  <img src="../IMG/ngori.jpg" alt="Profile Picture" class="profile-image">
  <h4 class="profile-name">Lewis Mudaida</h4>
</div>

      <h2>YSMP</h2>
      <nav>
        <ul>
          <li><button onclick="showSection('profile')">Profile</button></li>
          <li><button onclick="showSection('jobs')">Jobs</button></li>
          <li><button onclick="showSection('applications')">Applications</button></li>
          <li><button onclick="showSection('earnings')">Earnings</button></li>
         <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>


        </ul>
      </nav>
    </aside>

    <main class="content">
   <section id="profile" class="dashboard-section active">
  <h2>Profile Info</h2>
  <div class="profile-info-container">
    <img src="../IMG/ngori.jpg" alt="Profile Picture" class="profile-image-large">
    <div class="profile-details">
      <p><strong>Name:</strong> Lewis Mudaida</p>
      <p><strong>Role:</strong> Youth</p>
      <p><strong>Email:</strong> lewis@example.com</p>
      <p><strong>Location:</strong> Nairobi, Kenya</p>
      <p><strong>Skills:</strong> Web Dev, UI Design, Amapiano Mixing</p>
      <p><strong>Joined:</strong> July 2025</p>
      <p><strong>Bio:</strong> Passionate about tech, design, and music. Always learning. Always building.</p>
    </div>
  </div>
</section>


  <section id="jobs" class="dashboard-section">
  <h2>Available Jobs</h2>

  <div class="job-card">
    <h3>🎨 Logo Design for a Startup</h3>
    <p>Budget: <strong>KES 3,000</strong></p>
    <p>Details: Looking for a modern logo for a fintech startup. Should be delivered in SVG & PNG formats.</p>
    <button class="apply-btn">Apply Now</button>
  </div>

  <div class="job-card">
    <h3>💻 Website Revamp</h3>
    <p>Budget: <strong>KES 10,000</strong></p>
    <p>Details: A local business wants a complete overhaul of their outdated website. WordPress or plain HTML/CSS allowed.</p>
    <button class="apply-btn">Apply Now</button>
  </div>

</section>


    <section id="applications" class="dashboard-section">
  <h2>Apply for Job</h2>

  <form action="submit_application.php" method="POST" enctype="multipart/form-data" class="application-form">
    
    <label for="cover_message">Cover Message</label>
    <textarea name="cover_message" id="cover_message" rows="4" required></textarea>

    <label for="id_card">Upload ID Card (PDF or Image)</label>
    <input type="file" name="id_card" id="id_card" accept=".jpg,.jpeg,.png,.pdf" required>

    <button type="submit" class="apply-btn">Submit Application</button>
  </form>
</section>


     <section id="earnings" class="dashboard-section">
  <h2>Earnings</h2>

  <div class="earnings-summary">
    <div class="earnings-card total">
      <h3>Total Earned</h3>
      <p>KES 18,000</p>
    </div>
    <div class="earnings-card paid">
      <h3>Paid</h3>
      <p>KES 15,000</p>
    </div>
    <div class="earnings-card pending">
      <h3>Pending</h3>
      <p>KES 3,000</p>
    </div>
  </div>

  <h3 style="margin-top: 20px;">Recent Payments</h3>
  <table class="earnings-table">
    <thead>
      <tr>
        <th>Job</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cleaning Service</td>
        <td>KES 3,000</td>
        <td><span class="paid-status">Paid</span></td>
        <td>28 Jul 2025</td>
      </tr>
      <tr>
        <td>Gardening Job</td>
        <td>KES 2,000</td>
        <td><span class="pending-status">Pending</span></td>
        <td>25 Jul 2025</td>
      </tr>
    </tbody>
  </table>
</section>

    </main>
    
  </div>


</body>

  <script>
    function showSection(sectionId) {
      const sections = document.querySelectorAll(".dashboard-section");
      sections.forEach((section) => {
        section.classList.remove("active");
      });
      document.getElementById(sectionId).classList.add("active");
    }
  </script>
</html>
