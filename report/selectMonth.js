"use strict";

/*
*   Input parameter: arr - array parsed by json, with parameter 'date'
*   Output: none
*
*   Functionality: Get dates from array arr, put in select option. 
*/
function populateSelect(arr){

    var options = document.createElement("option");
    options.value = ""; 
    options.appendChild(document.createTextNode("Select Month"));
    document.getElementById("select-month").appendChild(options);

    for (var i=0; i<arr.length; i++){
        options = document.createElement("option");
        options.value = arr[i].date; 
        options.appendChild(document.createTextNode(arr[i].date));
        document.getElementById("select-month").appendChild(options);
    }
    document.getElementById("select-month").onchange = showData;
}

/*
*   Input parameter: date - input the date for requesting sales data from database 
*                    callback - inline function to obtain the json for async request
*   Output: none, use inline function to obtain responseText
* 
*   Functionality: Get date, connect to database to obtain data. If date is available,
*                  return sales within that date. If date string is empty, it shows all 
*                  dates available for sales reporting.
*   
*   Usage: ajaxToJson(date, 
*       function(){
*           var arr = JSON.parse(this.responseText);
*
*            //do things with arr
*       }
*   );
*
*    Reference: http://stackoverflow.com/questions/5362462/how-can-i-make-xhr-onreadystatechange-return-its-result
*/
function ajaxToJson(date, callback){
    var http = new XMLHttpRequest();
    var url = "month.php?date=" + date;

    var demArr;

    http.onreadystatechange = function(){
        if (http.readyState == 4 && http.status == 200){
            if(typeof callback == "function"){
                callback.apply(http);
            }
        }
    }
    http.open("GET", url, true);
    http.send();

}

/*
    Input: none
    Output: none

    Functionality: Obtain date from select (triggered by onchange), show data from
                   request in server and populate the tables.
*/
function showData(){
    var date = document.getElementById("select-month").value;

    ajaxToJson(date, 
        function(){
            var arr = JSON.parse(this.responseText);

            var salesTable = document.getElementById("showSalesData");
            var itemTable = document.getElementById("showItemData");

            console.log("//TODO: show the data of arr in table");
            
            //TODO: show the data of arr in table
        }
    );

}

// Initialisation of progs
window.onload = function() {
    ajaxToJson("", 
        function(){
            var arr = JSON.parse(this.responseText);
            populateSelect(arr);
        }
    );
}
