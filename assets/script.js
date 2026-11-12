$(function () {
  const fields = ["full_name", "usn", "email", "phone", "dob", "branch", "gender", "address"];

  function showError(id, message) {
    $("#" + id).addClass("invalid");
    $("#" + id + "_error").text(message);
  }

  function clearError(id) {
    $("#" + id).removeClass("invalid");
    $("#" + id + "_error").text("");
  }

  $("#registrationForm").on("submit", function (event) {
    let valid = true;
    fields.forEach(clearError);
    $("#consent_error").text("");

    const name = $("#full_name").val().trim();
    const usn = $("#usn").val().trim();
    const email = $("#email").val().trim();
    const phone = $("#phone").val().trim();
    const dob = $("#dob").val();
    const address = $("#address").val().trim();

    if (name.length < 2 || !/^[\p{L} .'-]+$/u.test(name)) {
      showError("full_name", "Enter a valid name (at least 2 characters)."); valid = false;
    }
    if (!/^[A-Za-z0-9-]{5,20}$/.test(usn)) {
      showError("usn", "Enter a valid USN (5–20 letters/numbers)."); valid = false;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError("email", "Enter a valid email address."); valid = false;
    }
    if (!/^[6-9]\d{9}$/.test(phone)) {
      showError("phone", "Enter a valid 10-digit Indian mobile number."); valid = false;
    }
    if (!dob || new Date(dob + "T00:00:00") >= new Date(new Date().toDateString())) {
      showError("dob", "Date of birth must be a past date."); valid = false;
    }
    if (!$("#branch").val()) { showError("branch", "Select your department."); valid = false; }
    if (!$("#gender").val()) { showError("gender", "Select an option."); valid = false; }
    if (address.length < 8) { showError("address", "Enter an address of at least 8 characters."); valid = false; }
    if (!$("#consent").is(":checked")) {
      $("#consent_error").text("Please confirm the information is accurate."); valid = false;
    }

    if (!valid) {
      event.preventDefault();
      $(".invalid").first().trigger("focus");
    }
  });

  fields.forEach(function (id) {
    $("#" + id).on("input change", function () { clearError(id); });
  });
  $("#consent").on("change", function () { $("#consent_error").text(""); });
});
