// Can contain styling JS or other AJAX requests
$(document).ready(function () {
  // Validate sign up form
  if (window.location.href.includes("sign_up.php")) {
    let valid_email = false;
    let valid_username = false;
    let valid_password = false;
    $("#create_email").keyup(function (e) {
      valid_email =
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(
          $("#create_email").val()
        ) && $("#create_email").val();
      if (!valid_email) {
        $("#create_email").css("border", "2px solid red");
        $("#create_email").css("box-shadow", "0 0 5px red");
      } else {
        $("#create_email").css("border", "2px solid #2ecf0e");
        $("#create_email").css("box-shadow", "0 0 5px #2ecf0e");
      }
    });

    // Validate username
    $("#create_username").keyup(function (e) {
      valid_username =
        /^[a-zA-Z0-9]{3,}$/.test($("#create_username").val()) &&
        $("#create_username").val();
      if (!valid_username) {
        $("#create_username").css("border", "2px solid red");
        $("#create_username").css("box-shadow", "0 0 5px red");
      } else {
        $("#create_username").css("border", "2px solid #2ecf0e");
        $("#create_username").css("box-shadow", "0 0 5px #2ecf0e");
      }
    });

    // Validate password
    $("#create_pass").focus(function (e) {
      $("#pass_validation").css("display", "flex");
    });
    $("#create_pass").blur(() => {
      $("#pass_validation").css("display", "none");
    });

    $("#create_pass").keyup(function () {
      let lowerCaseLetters = /[a-z]/g;
      let upperCaseLetters = /[A-Z]/g;
      let numbers = /[0-9]/g;
      let valid_length = 8;

      if ($(this).val().match(lowerCaseLetters)) {
        $("#letter").removeClass("text-red");
        $("#letter").addClass("text-green");
      } else {
        $("#letter").removeClass("text-green");
        $("#letter").addClass("text-red");
      }

      if ($(this).val().match(upperCaseLetters)) {
        $("#capital").removeClass("text-red");
        $("#capital").addClass("text-green");
      } else {
        $("#capital").removeClass("text-green");
        $("#capital").addClass("text-red");
      }

      if ($(this).val().match(numbers)) {
        $("#number").removeClass("text-red");
        $("#number").addClass("text-green");
      } else {
        $("#number").removeClass("text-green");
        $("#number").addClass("text-red");
      }

      if ($(this).val().length >= valid_length) {
        $("#length").removeClass("text-red");
        $("#length").addClass("text-green");
      } else {
        $("#length").removeClass("text-green");
        $("#length").addClass("text-red");
      }

      if (
        $(this).val().length >= valid_length &&
        $(this).val().match(numbers) &&
        $(this).val().match(upperCaseLetters) &&
        $(this).val().match(lowerCaseLetters)
      ) {
        $("#create_pass").css("border", "2px solid #2ecf0e");
        $("#create_pass").css("box-shadow", "0 0 5px #2ecf0e");
        valid_password = true;
      } else {
        $("#create_pass").css("border", "2px solid red");
        $("#create_pass").css("box-shadow", "0 0 5px red");
        valid_password = false;
      }
    });
    $("#sign_up_submit").click(function (e) {
      e.preventDefault();
      if (valid_email && valid_username && valid_password) {
        $("#sign_up_form").submit();
      } else {
        alert("Please fill all the fields correctly");
      }
    });
  }
});
