// Can contain styling JS or other AJAX requests
$(document).ready(function () {
  // Validate sign up form
  if (window.location.href.includes("sign_up.php")) {
    $("#create_email").keyup(function (e) {
      let valid_email =
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
      let valid_username =
        /^[a-zA-Z0-9]{5,}$/.test($("#create_username").val()) &&
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

      let validness = 0; // Measure of how many requirements are met
      console.log("hello");
      if ($(this).val().match(lowerCaseLetters)) {
        $("#letter").removeClass("text-red");
        $("#letter").addClass("text-green");
        validness++;
      } else {
        $("#letter").removeClass("text-green");
        $("#letter").addClass("text-red");
        validness--;
      }

      if ($(this).val().match(upperCaseLetters)) {
        $("#capital").removeClass("text-red");
        $("#capital").addClass("text-green");
        validness++;
      } else {
        $("#capital").removeClass("text-green");
        $("#capital").addClass("text-red");
        validness--;
      }

      if ($(this).val().match(numbers)) {
        $("#number").removeClass("text-red");
        $("#number").addClass("text-green");
        validness++;
      } else {
        $("#number").removeClass("text-green");
        $("#number").addClass("text-red");
        validness--;
      }

      if ($(this).val().length >= valid_length) {
        $("#length").removeClass("text-red");
        $("#length").addClass("text-green");
        validness++;
      } else {
        $("#length").removeClass("text-green");
        $("#length").addClass("text-red");
        validness--;
      }

      if (validness === 4) {
        $("#create_pass").css("border", "2px solid #2ecf0e");
        $("#create_pass").css("box-shadow", "0 0 5px #2ecf0e");
      } else {
        $("#create_pass").css("border", "2px solid red");
        $("#create_pass").css("box-shadow", "0 0 5px red");
      }
    });
  }
});
