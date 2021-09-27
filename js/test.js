// function togglePopup(){
//     document.getElementById("popup-1")
//     .classList.toggle("active");
// }

var divs=["popup-1", "popup-2", "popup-3", "popup-4", "popup-5", "popup-6", "popup-7", "popup-8"];
 var visibleDivId = null;
 function togglePopup(divId){
   if(visibleDivId === divId){
     visibleDivId = null;
   }else{
     visibleDivId = divId;
   }
   hideNonVisibleDivs();
 }
  function hideNonVisibleDivs(){
    var i, divId, div;
    for (let i = 0; i < divs.length; i++) {
      divId = divs[i];
      div = document.getElementById(divId);
      if(visibleDivId === divId){
        div.classList.toggle("active");
      }else{
        div.classList.remove("active");
      }
      
    }
  } 




// var divs=["popup-3", "popup-4"];
// function togglePopup(divId){
//     var i, divId, div;
//     for (let i = 0; i < divs.length; i++) {
//               divId = divs[i];
//               div = document.getElementById(divId);
//               if(divs[i]=== divId){
//                 div.classList.toggle("active");
//               }
              
//             }

    
// }