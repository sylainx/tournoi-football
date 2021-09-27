// id contenant le nom
// const match1 = document.getElementById('match-1');
// const jouerMatch = document.getElementById('valider'); //valider score

// function scoreRand () {
//     min = Math.ceil(0);
//     max = Math.floor(7);
//     return Math.floor(Math.random() * (max - min + 1)) + min;
// }

// console.log('-----------' );
// // console.log(match1);
// console.log('-----------' );

//variable stockant leur nom
// let equipe1 = match1.children[0].innerHTML;
// let equipe2 = match1.children[1].innerHTML;
// console.log(equipe1);
// console.log(equipe2);

// jouerMatch.addEventListener('click', e => {
//     let score1 = document.getElementById('score1'); //valeur input score 1
//     let score2 = document.getElementById('score2'); //valeur input score 2

//     score1.value = scoreRand(); // calculer variable aleatoirement
//     score2.value = scoreRand(); // calculer variable aleatoirement

//     let score1Int = parseInt(score1.value); // convertir variable en entier
//     let score2Int = parseInt(score2.value); // convertir variable en entier

//     console.log('Score du match: ',score1Int,' vs ',score2Int);
    
//     if(score1Int > score2Int ){
//         console.log('victoire de/du ',equipe1);
//     }
//     else if(score1Int == score2Int ){
//         console.log('match null ');
//     }
//     else{
//         console.log('victoire de/du ',equipe2);
//     }


// })

// function myFunctionScore() {
//     let x = document.getElementById("score");
//     if (x.style.display === "none") {
//       x.style.display = "block";
//     } else {
//       x.style.display = "none";
//     }
//   }
 function test(){
   document.getElementById("demo").innerHTML="hello world";
   event.preventDefault();
//    event.stopPropagation();
 }

//  var divs=[];
//  var visibleDivId = null;
//  function divVisibility('divId'){
//    if(visibleDivId === divId){
//      visibleDivId = null;
//    }else{
//      visibleDivId = divId;
//    }
//    hideNonVisibleDivs();
//  }
//   function hideNonVisibleDivs(){
//     var i, divId, div;
//     for (let i = 0; i < divs.length; i++) {
//       divId = divs[i];
//       div = document.getElementById(divId);
//       if(visibleDivId === divId){
//         div.style.display = "block";
//       }else {
//         div.style.display =" none";
//       }
      
//     }
//   } 