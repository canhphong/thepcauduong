<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
//replace h4 tag in page to <a><h4>.....</h4></a>
//var grand = document.getElementById("post-news");

var parent = document.getElementById("et-recent-posts-2");

if(parent !== null) {
  var title = parent.getElementsByTagName("h4");
  var link = document.createElement("a");
  link.href = "/tin-tuc/";
  var title1 = document.createElement("h4");
  title1.className = "widgettitle";
  var textLink = document.createTextNode("TIN TỨC");
  title1.append(textLink);
  link.append(title1);
  parent.replaceChild(link,title[0]);

}


//as same as Eng home page
var newsHome = document.getElementById("et-recent-posts-3");

if(newsHome !== null) {
  var title = newsHome.getElementsByTagName("h4");
  var link = document.createElement("a");
  link.href = "/news/";
  var title1 = document.createElement("h4");
  title1.className = "widgettitle";
  var textLink = document.createTextNode("NEWS");
  title1.append(textLink);
  link.append(title1);
  newsHome.replaceChild(link,title[0]);
}


</script>
<!-- end Simple Custom CSS and JS -->
