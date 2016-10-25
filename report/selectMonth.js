"use strict";

function populateSelect(arr){
    // TODO: month decision 
    for (int i=0; i<arr.length; i++){
        var options = document.createElement("option");
        options.value = arr[i].month; 
        options.appendChild(document.createTextNode(arr[i].month));
        document.getElementById("select-month").appendChild(options);
    }
}

function ajaxToJson(date){
    var http = new XMLHttpRequest();
    var url = "month.php";
    var params = "date="+date;

    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var demArr;

    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            demArr = JSON.parse(this.responseText);
            return demArr;
        }
    }
    http.send();
}

function showData(){
    var date = document.getElementById("select-month").value;
    var arr = ajaxToJson(date);

    var table = document.getElementById("showData");
    //TODO: show the data of arr in table

}

window.onload = function() {
    var arr = ajaxToJson("");
    populateSelect(arr);
    document.getElementById("select-month").onchange = showData;
}
