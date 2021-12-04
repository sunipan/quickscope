$(document).ready(function () {
  // Validate sign up form
  if (window.location.href.includes("sign_up.php")) {
    let valid_email = false;
    let valid_username = false;
    let valid_password = false;
    let valid_confirm_password = false;
    $("#create_email").keyup(function (e) {
      valid_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(
        $("#create_email").val()
      );
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
      valid_username = /^[a-zA-Z0-9]{3,}$/.test($("#create_username").val());
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
      $("#pass_validation").slideDown();
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
        $("#pass_validation").slideDown();
        valid_password = false;
      }
    });

    // Validate confirm password
    $("#create_pass_confirm").keyup(function () {
      if ($(this).val() == $("#create_pass").val()) {
        $("#create_pass_confirm").css("border", "2px solid #2ecf0e");
        $("#create_pass_confirm").css("box-shadow", "0 0 5px #2ecf0e");
        $("#create_pass_confirm").removeClass("text-red");
        $("#create_pass_confirm").addClass("text-green");
        $("#pass_validation").slideUp();
        valid_confirm_password = true;
      } else {
        $("#create_pass_confirm").removeClass("text-green");
        $("#create_pass_confirm").addClass("text-red");
        $("#create_pass_confirm").css("border", "2px solid red");
        $("#create_pass_confirm").css("box-shadow", "0 0 5px red");
        $("#pass_validation").slideDown();
        valid_confirm_password = false;
      }
    });

    $("#sign_up_submit").click(function (e) {
      e.preventDefault();
      if (
        valid_email &&
        valid_username &&
        valid_password &&
        valid_confirm_password
      ) {
        // Use $.get(...) for a GET request
        $.post(
          "../server/create_account.php",
          {
            email: $("#create_email").val(),
            username: $("#create_username").val(),
            password: $("#create_pass").val(),
          },
          function (data, status) {
            if (status === "success") {
              data = JSON.parse(data);
              if (data.status === "success") {
                // Give user feedback that account was created and give route to login
                $("#sign_up_feedback").html(
                  data.message +
                    "<a class='btn btn-dark w-100 mt-3' href='login.php'>Login</a>"
                );
                $("#sign_up_feedback").removeClass("alert-danger");
                $("#sign_up_feedback").addClass("alert-success");
                $("#sign_up_feedback").slideDown();
                setTimeout(() => {
                  $("#sign_up_feedback").slideUp();
                }, 5000);
              } else {
                // Show error message dynamic error message
                if (data.status === "exists_error")
                  $("#sign_up_feedback").html(
                    data.message +
                      "<a class='btn btn-dark w-100 mt-3' href='login.php'>Login</a>"
                  );
                else $("#sign_up_feedback").html(data.message);
                $("#sign_up_feedback").slideDown();
                setTimeout(() => {
                  $("#sign_up_feedback").slideUp();
                }, 5000);
              }
            } else {
              // Show error message
              $("#sign_up_feedback").html(
                "Something went wrong, please try again."
              );
              $("#sign_up_feedback").slideDown();
              setTimeout(() => {
                $("#sign_up_feedback").slideUp();
              }, 5000);
            }
          }
        );
      } else {
        // If input is invalid on submission
        alert("Please fill all the fields correctly");
      }
    });
  }

  $("#forumTitle").keyup(function () {
    if (/\s/g.test($(this).val())) {
      $("#forumTitle").css("border", "2px solid red");
      $("#forumTitle").css("box-shadow", "0 0 5px red");
      $("#forum_error").html("Forum title cannot contain spaces");
      $("#forum_error").slideDown();
      setTimeout(() => {
        $("#forum_error").slideUp();
      }, 5000);
    } else {
      $("#forumTitle").css("border", "2px solid #2ecf0e");
      $("#forumTitle").css("box-shadow", "0 0 5px #2ecf0e");
    }
  });

  $("#forum-button").click(function (e) {
    e.preventDefault();
    let forumTitle = $("#forumTitle").val();
    let checked = $("#confirm-forum").is(":checked");
    if (forumTitle && checked) {
      $.post(
        "../server/forumProcess.php",
        {
          forumTitle: forumTitle,
          checked: checked,
        },
        function (data, status) {
          console.log(data);
          data = data && JSON.parse(data);
          if (status === "success") {
            if (data.status === "success") {
              $("#forum_success").prepend(data.message);
              $("#goto-forum").attr("href", `forum.php?id=${data.id}`);
              $("#createForum")[0].reset();
              $("#forum_success").slideDown();
            } else {
              // Show error message
              $("#forum_error").html(data.message);
              $("#forum_error").slideDown();
              setTimeout(() => {
                $("#forum_error").slideUp();
              }, 5000);
            }
          } else {
            // Show error message
            $("#forum_error").html(data.message);
            $("#forum_error").slideDown();
            setTimeout(() => {
              $("#forum_error").slideUp();
            }, 5000);
          }
        }
      );
    } else {
      $("#forum_error").html("Inputs cannot be left blank!");
      $("#forum_error").slideDown();
      setTimeout(() => {
        $("#forum_error").slideUp();
      }, 5000);
    }
  });

  $("#postButton").click(function () {
    let formData = new FormData();
    let forum = $("#forum").val();
    let title = $("#postTitle").val();
    let desc = $("#postDesc").val();
    let post_img = $("#postImage")[0].files[0];
    if (forum && title) {
      if (post_img) formData.append("post_img", post_img);
      formData.append("forum", forum);
      formData.append("title", title);
      formData.append("desc", desc);
      $.ajax({
        url: "../server/postProcess.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
          console.log(data);
          data = JSON.parse(data);
          if (status === "success") {
            if (data.status === "success") {
              // Give feedback
              $("#post_success").prepend(data.message);
              $("#goto-post").attr("href", `post.php?id=${data.id}`);
              $("#post_success").slideDown();
            } else {
              // Show error message
              $("#post_error").html(data.message);
              $("#post_error").slideDown();
              setTimeout(() => {
                $("#post_error").slideUp();
              }, 5000);
            }
          } else {
            // Show error message
            $("#post_error").html(data.message);
            $("#post_error").slideDown();
            setTimeout(() => {
              $("#post_error").slideUp();
            }, 5000);
          }
        },
      });
    } else {
      $("#post_error").html("Inputs cannot be left blank!");
      $("#post_error").slideDown();
      setTimeout(() => {
        $("#post_error").slideUp();
      }, 5000);
    }
  });
  // Validate login
  if (window.location.href.includes("login.php")) {
    $("#login-button").click(function (e) {
      e.preventDefault();
      let username = $("#login_username").val();
      let password = $("#login_password").val();

      if (username && password) {
        $.post(
          "../server/loginprocess.php",
          {
            username: username,
            password: password,
          },
          function (data, status) {
            data = data && JSON.parse(data);
            if (status === "success") {
              if (data.status === "success") {
                // Redirect to home page
                window.location.replace("home.php");
              } else {
                // Show error message
                $("#login_feedback").html(data.message);
                $("#login_feedback").slideDown();
                setTimeout(() => {
                  $("#login_feedback").slideUp();
                }, 5000);
              }
            } else {
              // Show error message
              $("#login_feedback").html(data.message);
              $("#login_feedback").slideDown();
              setTimeout(() => {
                $("#login_feedback").slideUp();
              }, 5000);
            }
          }
        );
      }
    });
  }
  let valid_edit_username = false;
  let valid_edit_email = false;
  $("#edit_username").keyup(function (e) {
    valid_edit_username = /^[a-zA-Z0-9]{3,}$/.test($("#edit_username").val());
    if (!valid_edit_username) {
      $("#edit_username").css("border", "2px solid red");
      $("#edit_username").css("box-shadow", "0 0 5px red");
    } else {
      $("#edit_username").css("border", "2px solid #2ecf0e");
      $("#edit_username").css("box-shadow", "0 0 5px #2ecf0e");
    }
  });
  $("#edit_email").keyup(function (e) {
    valid_edit_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(
      $("#edit_email").val()
    );
    if (!valid_edit_email) {
      $("#edit_email").css("border", "2px solid red");
      $("#edit_email").css("box-shadow", "0 0 5px red");
    } else {
      $("#edit_email").css("border", "2px solid #2ecf0e");
      $("#edit_email").css("box-shadow", "0 0 5px #2ecf0e");
    }
  });

  $("#edit_submit").click(function (e) {
    e.preventDefault();
    // Get values
    let username = valid_edit_username && $("#edit_username").val();
    let email = valid_edit_email && $("#edit_email").val();
    let profile_pic = $("#edit_profile_pic")[0].files[0];
    // Check if any of them have value
    if (username || email || profile_pic) {
      // Create FormData object, send off to server
      let formData = new FormData();
      formData.append("username", username);
      formData.append("email", email);
      formData.append("profile_pic", profile_pic);
      $.ajax({
        url: "../server/edit-profile.php",
        type: "POST",
        enctype: "multipart/form-data",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          data = JSON.parse(data);
          if (data.image) {
            // Update profile pic and navbar avatar
            $("#profile-figure").html(
              '<img src="' +
                data.image +
                '" class="rounded-circle border border-3 border-danger" height="100px" width="100px" alt="Profile Picture">'
            );
            $("#avatar-span").html(
              '<img src="' +
                data.image +
                '" class="rounded-circle border border-3 border-danger" height="40px" width="40px" alt="Profile Picture"><i class="bi bi-caret-down-fill"></i>'
            );
          }
          if (data.username) {
            // Update username
            $("#username_text").html(data.username);
          }
          if (data.email) {
            // Update email
            $("#email_text").html(data.email);
          }
          // Reset form after submission
          $("#edit_form")[0].reset();
          $("#editModal").modal("hide");
          // Error handling
          if (data.status === "home") window.location.replace("home.php");
          else {
            if (data.status === "success") {
              $("#edit_success").html(data.message);
              $("#edit_success").slideDown();
            } else {
              $("#edit_error").html(data.message);
              $("#edit_error").slideDown();
            }
          }
        },
        complete: setTimeout(() => {
          $("#edit_success").slideUp();
          $("#edit_error").slideUp();
        }, 5000),
      });
    }
  });

  $("#forgot-button").click(function (e) {
    e.preventDefault();
    let email = $("#forgot_email").val();
    if (email) {
      $.post(
        "../server/forgotProcess.php",
        {
          email: email,
        },
        function (data, status) {
          data = data && JSON.parse(data);
          if (status === "success") {
            if (data.status === "success") {
              $("#forgot_success").html(data.message);
              $("#forgot_success").slideDown();
              setTimeout(() => {
                $("#forgot_success").slideUp();
              }, 5000);
            } else {
              $("#forgot_error").html(data.message);
              $("#forgot_error").slideDown();
              setTimeout(() => {
                $("#forgot_error").slideUp();
              }, 5000);
            }
          } else {
            $("#forgot_error").html(data.message);
            $("#forgot_error").slideDown();
            setTimeout(() => {
              $("#forgot_error").slideUp();
            }, 5000);
          }
        }
      );
    }
  });
  if (window.location.href.includes("reset.php?")) {
    valid_password = false;
    valid_confirm_password = false;
    // Validate password
    $("#new_pass").focus(function (e) {
      $("#pass_validation").slideDown();
    });

    $("#new_pass").keyup(function () {
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
        $("#new_pass").css("border", "2px solid #2ecf0e");
        $("#new_pass").css("box-shadow", "0 0 5px #2ecf0e");
        valid_password = true;
      } else {
        $("#new_pass").css("border", "2px solid red");
        $("#new_pass").css("box-shadow", "0 0 5px red");
        $("#pass_validation").slideDown();
        valid_password = false;
      }
    });

    // Validate confirm password
    $("#new_pass_confirm").keyup(function () {
      if ($(this).val() == $("#new_pass").val()) {
        $("#new_pass_confirm").css("border", "2px solid #2ecf0e");
        $("#new_pass_confirm").css("box-shadow", "0 0 5px #2ecf0e");
        $("#new_pass_confirm").removeClass("text-red");
        $("#new_pass_confirm").addClass("text-green");
        $("#pass_validation").slideUp();
        valid_confirm_password = true;
      } else {
        $("#new_pass_confirm").removeClass("text-green");
        $("#new_pass_confirm").addClass("text-red");
        $("#new_pass_confirm").css("border", "2px solid red");
        $("#new_pass_confirm").css("box-shadow", "0 0 5px red");
        $("#pass_validation").slideDown();
        valid_confirm_password = false;
      }
    });

    // Submit form
    $("#reset-button").click(function (e) {
      e.preventDefault();
      if (valid_password && valid_confirm_password) {
        const urlParams = new URLSearchParams(window.location.search);
        $.post(
          "../server/new-pass.php",
          {
            password: $("#new_pass").val(),
            password_confirm: $("#new_pass_confirm").val(),
            email: urlParams.get("email"),
            token: urlParams.get("token"),
          },
          function (data, status) {
            data = data && JSON.parse(data);
            if (status === "success") {
              if (data.status === "success") {
                $("#reset_success").html(data.message);
                $("#reset_success").slideDown();
                setTimeout(() => {
                  window.location.href = "login.php";
                }, 2500);
              } else {
                $("#reset_error").html(data.message);
                $("#reset_error").slideDown();
                setTimeout(() => {
                  $("#reset_error").slideUp();
                }, 5000);
              }
            } else {
              $("#reset_error").html(data.message);
              $("#reset_error").slideDown();
              setTimeout(() => {
                $("#reset_error").slideUp();
              }, 5000);
            }
          }
        );
      }
    });
  }

  $("#post-comment").click(() => {
    let comment = $("#comment").val();
  });
});
