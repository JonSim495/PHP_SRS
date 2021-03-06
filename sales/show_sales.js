var xmlhttp = new XMLHttpRequest();
var url = "show_sales_json.php";
var myArr;
xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
  myArr = JSON.parse(this.responseText);
  go(myArr);
}
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

function go(arr){
   var out = "";
for (var i=0; i<arr.length; i++){
 out += "<tr>";
 var salesID = arr[i].salesID;
 var salesDate = arr[i].salesDate;
 var invoice = arr[i].invoice;

 var items = arr[i].itemInfo;
 var totalAmount = 0, count = items.length;
 out += "<td rowspan=\"" + count + "\">" + arr[i].salesID + "</td>";
 out += "<td rowspan=\"" + count + "\">" + arr[i].salesDate + "</td>";
 out += "<td rowspan=\"" + count + "\">" + arr[i].invoice + "</td>";

 // for rowspan purpose
 var name = [], inn = [];
 for(var j=0; j<items.length; j++){
    name.push("<td>" + items[j].itemName + "</td>");
    inn.push("<td>" + items[j].itemCount + "</td>");
    totalAmount += items[j].itemPrice * items[j].itemCount;
 }

 out += name[0] + inn[0]; //items and amount of purchase
 out += "<td rowspan=\"" + count + "\">" + totalAmount + "</td>";
 out += "<td rowspan=\"" + count + "\"><a onclick=\"edit(" + salesID + ") \">Edit</a></td>";
 out += "<td rowspan=\"" + count + "\"><a href=\"delete.php?id=" + salesID + "\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";

 if (count>1){
     for (var k=1; k<name.length; k++){
   out += "</tr><tr>";
   out += name[k] + inn[k];
}
 }
 out += "</tr>";
}

   document.getElementById("sales").innerHTML = out;
}

// to parse into edit
function edit(n){
    sessionStorage.salesID = n;
    window.location.href = "edit.html";
}
