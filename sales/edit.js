function populate(arr){
    var salesid = arr.sales[0].salesID;
    var salesdate = arr.sales[0].salesDate;
    var invoice = arr.sales[0].invoice;

    document.getElementById("date").value = salesdate;
    document.getElementById("invoice").value = invoice;

    // TODO: populate items
}

// initialisation
window.onload = function(){
    if (sessionStorage.length > 0){
        document.getElementById("salesID").value = sessionStorage.salesID;

        // take item from edit_fetch
        var http = new XMLHttpRequest();
        var url = "edit_fetch.php";
        var params = "id=" + sessionStorage.salesID;
        http.open("POST", url, true);

        var arr;

       //Send the proper header information along with the request
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		http.onreadystatechange = function() {//Call a function when the state changes.
    		if(http.readyState == 4 && http.status == 200) {
                arr = JSON.parse(http.responseText);
                populate(arr);
    		};
		}
		http.send(params); 
    } else {
		// TODO: no item
	}
};


