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

/*Find the total amount of money gained for that id*/
function total(id, arr){
    var total = 0;
    for (var i=0; i<arr.length; i++){
        if (id = arr[i].salesID)
            total += arr[i].itemCount * arr[i].itemPrice;
    }
    return total;
}

/* Find total number of salesID within array, for rowspan purpose */
function rowspan(id, arr){
    var count = 0;
    for (var i=0; i<arr.length; i++){
        if (id = arr[i].salesID)
            count++;
    }
    return count;
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
            // show data of array in tables
            var salesTable = document.getElementById("showSalesData");
            var itemTable = document.getElementById("showItemData");

            // get sales id, item arr
            var salesArr = arr.sales;
            var salesItemArr = arr.salesItem;
            console.log(salesArr);
            console.log(salesItemArr);

            for(var i=0; i<salesArr.length; i++){
                // find rowspan for this salesID
                var rowspan = rowspan(salesArr[i].salesID, salesItemArr);

                // append first row
                var tr = document.createElement("tr");
                var salesid_td = document.createElement("td");
                salesid_td.appendChild(document.createTextNode(salesArr[i].salesID));
                salesid_td.setAttribute("rowspan", rowspan);
                tr.appendChild(salesid_td);

                // number of position after first row of sales item
                var rest;

                // find the total amount of the sales
                var amount = total(salesArr[i].salesID, salesItemArr);
                //append first row of sales item
                for (var j=0; j<salesItemArr.length; j++){
                    if (salesItemArr[j].salesID == salesArr[i].salesID){
                        var firstSales_td = document.createElement("td");
                        firstSales_td.appendChild(document.createTextNode(salesItemArr[j].itemName));
                        tr.appendChild(firstSales_td);

                        var firstCount_td = document.createElement("td");
                        firstCount_td.appendChild(document.createTextNode(salesItemArr[j].itemCount));
                        tr.appendChild(firstCount_td);

                        var amount_td = document.createElement("td");
                        amount_td.appendChild(document.createTextNode(amount));
                        amount_td.setAttribute("rowspan", rowspan);
                        tr.appendChild(amount_td);

                        rest = j;
                        break;
                    }
                }

                // append first row into tbody
                salesTable.appendChild(tr);
                for (;rest<arr[i].length; rest++){
                    if (salesItemArr[rest].salesID == salesArr[i].salesID){
                        var tr = document.createElement("tr");

                        var firstSales_td = document.createElement("td");
                        firstSales_td.appendChild(document.createTextNode(salesItemArr[rest].itemName));
                        tr.appendChild(firstSales_td);

                        var firstCount_td = document.createElement("td");
                        firstCount_td.appendChild(document.createTextNode(salesItemArr[rest].itemCount));
                        tr.appendChild(firstCount_td);

                        // append this row into table
                        salesTable.appendChild(tr);
                }
            }



            //TODO: show the data of arr in table
        }
    });
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
