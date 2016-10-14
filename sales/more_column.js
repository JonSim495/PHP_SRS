var xmlhttp = new XMLHttpRequest();
var url = "show_item.php";
var myArr;

xmlhttp.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
  myArr = JSON.parse(this.responseText);
  more(myArr);
}
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

var count=1;
function more(arr){
    var out = "Item " + count++ + ": <select name=\"item[id][]\" form=\"sales\" required>";
out += "<option value=\"\">Please Select</option>";
for (var i=0; i<arr.length; i++){
  out+="<option value=\"" + arr[i].itemID + "\">" + arr[i].itemName + "</option>";
}

out+="Amount bought: <input type=\"number\" name=\"item[count][]\" min=\"1\" required>"
    out+="</select><br />"
document.getElementById("forms").innerHTML+=out;
}

function moreItem(){
    more(myArr);
}

window.onload = moreItem;
