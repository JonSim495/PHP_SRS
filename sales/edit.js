function populate(arr){
    var salesid = arr.sales[0].salesID;
    var salesdate = arr.sales[0].salesDate;
    var invoice = arr.sales[0].invoice;

    document.getElementById("date").value = salesdate;
    document.getElementById("invoice").value = invoice;

    var items = arr.saleItems;
    // make things columns for all items
    for (var i=0; i<items.length-1; i++)
        moreItem();
    
    var selects = document.getElementsByTagName("select");
    var counts = document.getElementsByTagName("input"); 
    
    // counts are from 3rd input onwards
    for (var i=0; i<items.length; i++){
        selects[i].value = items[i].itemID;
        counts[i+3].value = items[i].itemCount;
    }
}

// initialisation
window.onload = function(){
    if (sessionStorage.length > 0){
        document.getElementById("salesID").value = sessionStorage.salesID;
        document.getElementById("salesID").readOnly = true;

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


