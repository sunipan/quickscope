<!-- Used for importing all JS scripts/files -->
<script src="js/vendor/modernizr-3.11.2.min.js">
</script>
<script src="js/plugins.js">
</script>
<script src="js/main.js"></script>

<!-- jQuery Error Checking -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  window.jQuery ||
    document.write('<script src="/js/jquery-3.6.0.min.js"><\/script>');
</script>

<!-- Bootstrap Error Checking -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  window.jQuery.fn.modal ||
    document.write(
      '<script src="/js/bootstrap/bootstrap.bundle.min.js"><\/script>'
    );
</script>
<script>
  (function($) {
    $(function() {
      if ($("body").css("color") !== "rgb(51, 51, 51)") {
        $("head").prepend(
          '<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">'
        );
      }
    });
  })(window.jQuery);
</script>
<?php
if (isset($scripts))
  foreach ($scripts as $script) {
    echo '<script src="' . $script . '"></script>';
  }
echo '</body></html>';
?>