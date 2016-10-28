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
    options.setAttribute("id", "remove");
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
*   Input parameter: id - sales ID that is to be matched
*                    arr - array of sales items, which includes salesID
*                    
*   Output: total - Number of item in arr which salesID matches id in input
*   
*   Functionality: Find the number of item in arr which salesID matches id in input,
*                  used for rowspan purpose
*   
*/
function total_price(id, arr){
    var total = 0;
    for (var i=0; i<arr.length; i++){
        if (id == arr[i].salesID){
            total += arr[i].salesCount* arr[i].itemPrice;
        }
    }
    return total;
}

/*
*   Input parameter: id - sales ID that is to be matched
*                    arr - array of sales items, which includes salesID
*                    
*   Output: total - Number of item in arr which salesID matches id in input
*   
*   Functionality: Find the number of item in arr which salesID matches id in input,
*                  used for rowspan purpose
*   
*/
function row(id, arr){
    var count = 0;
    for (var i=0; i<arr.length; i++){
        if (id == arr[i].salesID)
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
    if (document.getElementById("remove")){
        document.getElementById("remove").remove();
    }
    var date = document.getElementById("select-month").value;

    ajaxToJson(date,
        function(){
            var arr = JSON.parse(this.responseText);
            // show data of array in tables
            var salesTable = document.getElementById("showSalesData");
            var itemTable = document.getElementById("showItemData");

            // clear tables
            while(salesTable.firstChild){
                salesTable.removeChild(salesTable.firstChild);
            }

            while(itemTable.firstChild){
                itemTable.removeChild(itemTable.firstChild);
            }

            // get sales array, item arr
            var salesArr = arr.sales;
            var salesItemArr = arr.salesItem;

            // initialise monthly total:
            var monthly = 0;

            for(var i=0; i<salesArr.length; i++){
                // find rowspan for this salesID
                var rowspan = row(salesArr[i].salesID, salesItemArr);

                // append first row 
                var tr = document.createElement("tr");
                var salesid_td = document.createElement("td");
                salesid_td.appendChild(document.createTextNode(salesArr[i].salesID));
                salesid_td.setAttribute("rowspan", rowspan);
                tr.appendChild(salesid_td);

                // number of position after first row of sales item
                var rest;

                // find the total amount of the sales
                var amount = total_price(salesArr[i].salesID, salesItemArr);
                monthly += amount;

                //append first row of sales item
                for (var j=0; j<salesItemArr.length; j++){
                    if (salesItemArr[j].salesID == salesArr[i].salesID){
                        var firstSales_td = document.createElement("td");
                        firstSales_td.appendChild(document.createTextNode(salesItemArr[j].itemName));
                        tr.appendChild(firstSales_td);

                        var firstCount_td = document.createElement("td");
                        firstCount_td.appendChild(document.createTextNode(salesItemArr[j].salesCount));
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

                for (var j = rest+1; j<salesItemArr.length; j++){
                    if (salesItemArr[j].salesID == salesArr[i].salesID){
                        var tr2 = document.createElement("tr");

                        var firstSales_td = document.createElement("td");
                        firstSales_td.appendChild(document.createTextNode(salesItemArr[j].itemName));
                        tr2.appendChild(firstSales_td);

                        var firstCount_td = document.createElement("td");
                        firstCount_td.appendChild(document.createTextNode(salesItemArr[j].salesCount));
                        tr2.appendChild(firstCount_td);

                        // append this row into table
                        salesTable.appendChild(tr2);
                    }
                }
            }

            // Display total amount
            var total_row = document.createElement("tr");
            total_row.setAttribute("style", "text-align:center;font-weight:bold;vertical-align:middle");
            
            var total_th = document.createElement("th");
            total_th.appendChild(document.createTextNode("Total amount: "));
            total_th.setAttribute("colspan", 3);
            total_row.appendChild(total_th);
            
            var am_td = document.createElement("td");
            am_td.appendChild(document.createTextNode(monthly));
            total_row.appendChild(am_td);

            salesTable.appendChild(total_row);

            // Store items in sales
            var big = salesItemArr.length;
            var sales = []; 

            for (var i=0; i<salesItemArr.length; i++){
                var sale = {
                    itemID : salesItemArr[i].itemID,
                    itemName : salesItemArr[i].itemName,
                    salesCount : parseInt(salesItemArr[i].salesCount),
                    itemPrice : salesItemArr[i].itemPrice,
                };
                console.log(sales);
                sales = add(sale, sales);
            }
            console.log(sales);
            

            // Display sales in table
            for (var i=0; i<sales.length; i++){
                var tr = document.createElement("tr");

                var id = document.createElement("td");
                id.appendChild(document.createTextNode(sales[i].itemID));
                tr.appendChild(id);
                
                var name = document.createElement("td");
                name.appendChild(document.createTextNode(sales[i].itemName));
                tr.appendChild(name);

                var count = document.createElement("td");
                count.appendChild(document.createTextNode(sales[i].salesCount));
                tr.appendChild(count);

                var total = document.createElement("td");
                var cc = sales[i].salesCount * sales[i].itemPrice;
                total.appendChild(document.createTextNode(cc));
                tr.appendChild(total);

                itemTable.appendChild(tr);
            }
        }
    );
}

/*
   Input parameter: 
*       sale - sale object, 
*       sales: array of sale object
*   Output parameter: 
*       Updated array of sale object
*   Functionality:
*       Search through sales to see if there is any same item in sales, if there is increment of
*       saleCount; if there isn't, add it into sales.
*/
function add(sale, sales){
    if (sales.length == 0){
        sales.push(sale);
        return sales;
    }else{
        for (var i=0; i<sales.length; i++){
            if(sale.itemID == sales[i].itemID){
                // same item found, add to count
                sales[i].salesCount += parseInt(sale.salesCount);
                return sales;
            }
        }
        // No such item in sales, add to sales
        sales.push(sale);
        return sales;
    }
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
