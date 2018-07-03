<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
window.onload = function() {
  var x = document.querySelectorAll("[class='video_title']")
  for (var i = 0; i < x.length; i++) {
    document.getElementsByClassName("video_title")[i].classList.add("limit-text");
  }
}

</script>
<!-- end Simple Custom CSS and JS -->
