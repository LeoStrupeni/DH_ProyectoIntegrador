window.addEventListener("load", function() {

    var mySearch = document.querySelector(".paramBusquedajs");
  
    mySearch.onkeyup = function() {
      var search = mySearch.value;
      document.querySelector(".busquedajs").innerHTML = "";
      
        if (search.length > 3) {
            fetch("/api/search?PM=" + search)
            .then(function(data) {
            return data.json();
            })
            .then(function(data) {
                for (var i = 0; i < data.length; i++) {
                    document.querySelector(".busquedajs").innerHTML += "<option value='"+data[i].name+"'></option>";  
                }
            });
        }  
    }
  
  });