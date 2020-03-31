function recherche() {
  // Declare variables
  var input = document.getElementById("myInput");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("comptes");
  var line = table.getElementsByClassName("line");

  // Loop through all table rows, and hide those who don't match the search query
  for (var i = 0; i < line.length; i++) {
    var nom = line[i].getElementsByClassName("nom")[0];
    if (nom){
      if (nom.innerHTML.toUpperCase().indexOf(filter) > -1) {
        line[i].style.display = "block";
      } else {
        line[i].style.display = "none";
      }
    }
  }
}
