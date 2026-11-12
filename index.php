<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="assets/script.js" defer></script>
</head>
<body>
  <main class="page">
    <section class="form-card">
      <p class="eyebrow">ONLINE APPLICATION</p>
      <h1>Student Registration</h1>
      <p class="intro">Enter your details below and submit the form.</p>

      <form id="registrationForm" action="submit.php" method="POST" novalidate>
        <div class="field">
          <label for="full_name">Full name <span>*</span></label>
          <input type="text" id="full_name" name="full_name" maxlength="80" required>
          <small class="error" id="full_name_error"></small>
        </div>

        <div class="two-columns">
          <div class="field">
            <label for="usn">USN <span>*</span></label>
            <input type="text" id="usn" name="usn" maxlength="20" placeholder="e.g. 1RF24CS139" required>
            <small class="error" id="usn_error"></small>
          </div>
          <div class="field">
            <label for="email">Email address <span>*</span></label>
            <input type="email" id="email" name="email" maxlength="120" required>
            <small class="error" id="email_error"></small>
          </div>
        </div>

        <div class="two-columns">
          <div class="field">
            <label for="phone">Phone number <span>*</span></label>
            <input type="tel" id="phone" name="phone" inputmode="numeric" maxlength="10" placeholder="10-digit number" required>
            <small class="error" id="phone_error"></small>
          </div>
          <div class="field">
            <label for="dob">Date of birth <span>*</span></label>
            <input type="date" id="dob" name="dob" required>
            <small class="error" id="dob_error"></small>
          </div>
        </div>

        <div class="two-columns">
          <div class="field">
            <label for="branch">Department <span>*</span></label>
            <select id="branch" name="branch" required>
              <option value="">Select department</option>
              <option value="Computer Science and Engineering">Computer Science and Engineering</option>
              <option value="Information Science and Engineering">Information Science and Engineering</option>
              <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
              <option value="Artificial Intelligence and Machine Learning">Artificial Intelligence and Machine Learning</option>
              <option value="Other">Other</option>
            </select>
            <small class="error" id="branch_error"></small>
          </div>
          <div class="field">
            <label for="gender">Gender <span>*</span></label>
            <select id="gender" name="gender" required>
              <option value="">Select gender</option>
              <option value="Female">Female</option>
              <option value="Male">Male</option>
              <option value="Prefer not to say">Prefer not to say</option>
            </select>
            <small class="error" id="gender_error"></small>
          </div>
        </div>

        <div class="field">
          <label for="address">Address <span>*</span></label>
          <textarea id="address" name="address" rows="3" maxlength="300" required></textarea>
          <small class="error" id="address_error"></small>
        </div>

        <label class="consent">
          <input type="checkbox" id="consent" name="consent" value="yes">
          <span>I confirm that the information provided is accurate. <span>*</span></span>
        </label>
        <small class="error" id="consent_error"></small>

        <button type="submit">Submit application</button>
        <p class="form-note">Fields marked * are required.</p>
      </form>
    </section>
    <footer>Web Technology Assignment 2 · HTML · CSS · JavaScript · jQuery · PHP</footer>
  </main>
</body>
</html>
