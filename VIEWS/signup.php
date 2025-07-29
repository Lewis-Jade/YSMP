<?php
$kenya_counties = [
    "Mombasa", "Kwale", "Kilifi", "Tana River", "Lamu", "Taita-Taveta",
    "Garissa", "Wajir", "Mandera", "Marsabit", "Isiolo", "Meru", "Tharaka-Nithi",
    "Embu", "Kitui", "Machakos", "Makueni", "Nyandarua", "Nyeri", "Kirinyaga",
    "Murang'a", "Kiambu", "Turkana", "West Pokot", "Samburu", "Trans Nzoia",
    "Uasin Gishu", "Elgeyo-Marakwet", "Nandi", "Baringo", "Laikipia", "Nakuru",
    "Narok", "Kajiado", "Kericho", "Bomet", "Kakamega", "Vihiga", "Bungoma",
    "Busia", "Siaya", "Kisumu", "Homa Bay","Vihiga" ,"Migori", "Kisii", "Nyamira", "Nairobi"
];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section>
        <h1>By youth for Youth</h1>
        <br>
        <h2>YSMP</h2>
         <p>Already have an Account?</p>
        <a href="login.php"><i class="fa-solid fa-arrow-left"></i> Login</a>
    </section>

   
    <form action="../INCLUDES/signup.inc.php" method="POST">

       <div class="inputBox">
  <h3>Sign up now!</h3>
     
                  <input type="text" id="fullName" name="fullName"  placeholder="Full Name" required>


           <input type="email" id="email" name="email" placeholder="email"required>

 
            <input type="tel" id="phone" name="phone"placeholder="Phone number" required>

      

  

                  
           <input type="password" id="password" name="password" placeholder="Password" required>


             <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
  
           </div>

           <div class="secondBox">
                  <label>Register As</label>
      <div class="role-group">
        <label><input type="radio" name="role" value="youth" required> Youth</label>
        <label><input type="radio" name="role" value="client"> Client</label>
      </div>

      <div id="youthFields" class="hidden">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob">

        <label for="gender">Gender</label>
        <select id="gender" name="gender">
          <option value="">--Select--</option>
          <option value="male">Male</option>
          <option value="female">Female</option>

        </select>

   
        <select name="county" id="county">
            <option value="">-- Select County --</option>
            <?php foreach ($kenya_counties as $county): ?>
                <option value="<?php echo htmlspecialchars($county); ?>">
                    <?php echo htmlspecialchars($county); ?>
                </option>
            <?php endforeach; ?>
        </select>

    
        <input type="text" id="idNumber" name="idNumber"  placeholder="National ID Number">

        
        <input type="text" id="skills" name="skills"  placeholder="Skill Tags (comma separated)">


        <textarea id="bio" name="bio" rows="3"   placeholder="Short Bio"></textarea>

        <label for="portfolio">Portfolio Upload (Image, PDF, Video)</label>
        <input type="file" id="portfolio" name="portfolio" multiple>
      </div>

      <div id="clientFields" class="hidden">
    
        <input type="text" id="clientName" name="clientName"  placeholder="Business/Individual Name">

        
        <input type="text" id="serviceCategory" name="serviceCategory"  placeholder="Service Category Needed">


        <input type="text" id="clientLocation" name="clientLocation" placeholder="Location">
      </div>

    

      <button type="submit">Register</button>
           </div>
    </form>
</body>

  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const youthFields = document.getElementById('youthFields');
    const clientFields = document.getElementById('clientFields');
    const roleRadios = document.querySelectorAll('input[name="role"]');

    roleRadios.forEach(radio => {
      radio.addEventListener('change', () => {
        if (radio.value === 'youth') {
          youthFields.classList.remove('hidden');
          clientFields.classList.add('hidden');
        } else if (radio.value === 'client') {
          clientFields.classList.remove('hidden');
          youthFields.classList.add('hidden');
        }
      });
    });
  });
</script>

</html>