function EnterFunc() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      alert(this.responseText);
    }
  };
  request.open("POST", "script/php_ajax.php", true);
  request.send(document);
}
