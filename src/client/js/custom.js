$(window).scroll(() => {
  var pos = $(window).scrollTop();
  if (pos > 35) {
    if ($(".about-us-home").css("position") == "absolute")
      $(".about-us-home").css({
        position: "fixed",
        top: "60px",
      });
    if ($(".create-a-forum").css("position") == "absolute")
      $(".create-a-forum").css({
        position: "fixed",
        top: "60px",
      });
  } else {
    if ($(".about-us-home").css("position") == "fixed")
      $(".about-us-home").css({
        position: "absolute",
        top: "initial",
      });
    if ($(".create-a-forum").css("position") == "fixed")
      $(".create-a-forum").css({
        position: "absolute",
        top: "initial",
      });
  }
});
