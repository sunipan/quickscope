var debounce;

$(window).scroll(() => {
  var pos = $(window).scrollTop();
  console.log(pos);
  if (pos > 35) {
    $(".about-us-home").css({
      position: "fixed",
      top: "60px",
    });
    $(".create-a-forum").css({
      position: "fixed",
      top: "60px",
    });
  } else {
    if ($(".about-us-home").css("position") == "fixed") {
      $(".about-us-home").css({
        position: "absolute",
        top: "initial",
      });
    }
    if ($(".create-a-forum").css("position") == "fixed") {
      $(".create-a-forum").css({
        position: "absolute",
        top: "initial",
      });
    }
  }
});
