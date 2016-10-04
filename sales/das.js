function manTable(){
   var totals = document.getElementsByClassName("rem"); 

   totals[0] = totals[totals.length-1];

   for (var i=1; i<totals.length; i++){
       totals[i].parentNode.removeChild(totals[i]);
   }

   totals[0].rowspan="2";
}
