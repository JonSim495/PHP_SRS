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
    var theForm = document.getElementById("forms");

    var div = document.createElement("div");
    div.appendChild(document.createTextNode('Item '+ count++ + ': '));

    var select = document.createElement("select");
    select.name = "id[]";
    select.form = "sales";
    select.required = "required";

	var opt = document.createElement("option");
	opt.appendChild(document.createTextNode("Please select"));
	opt.value = "";
	select.appendChild(opt);

    for (var i=0; i<arr.length; i++){
        var option = document.createElement("option");
		option.appendChild(document.createTextNode(arr[i].itemName));
        option.value = arr[i].itemID;
        select.appendChild(option);
    }

    div.appendChild(select);

    var div2 = document.createElement("div");
    div2.appendChild(document.createTextNode('Amount bought: '))

    var num = document.createElement("INPUT");
    num.setAttribute("type", "number");
    num.value = "1";
    num.min = "1";
    num.name = "count[]";

    div2.appendChild(num);

    theForm.appendChild(div);
    theForm.appendChild(div2);
}

function moreItem(){
    more(myArr);
}

