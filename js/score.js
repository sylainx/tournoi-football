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

// ===========================================================================
// ========================= TEST FOR STOP FORMULAIRE ========================

// let formulaireSubmit= document.querySelector("#id-checkbox");
// formulaireSubmit.addEventListener("click",empecherEnvoi, false);


// function empecherEnvoi(event) {
//   console.log("Désolé ! preventDefault() ne vous laissera pas envoyer ceci.");
//   event.preventDefault();
//   event.stopPropagation();
  
// }
// -----------------------------------------------------------------------


// Accédez à l'élément form …
{/* 
    <form id="myForm" >
      <label for="myName">Dites-moi votre nom :</label>
      <input id="myName" name="name" value="Test">
      <input type="submit" value="Envoyer !">
    </form> 
*/}


// let match1 = document.getElementById("match-1");
// match1.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match1);
// });

// let match2 = document.getElementById("match-2");
// match2.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match2);
// });

// let match3 = document.getElementById("match-3");
// match3.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match3);
// });

// let match4 = document.getElementById("match-4");
// match4.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match4);
// });

// let match5 = document.getElementById("match-5");
// match5.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match5);
// });

// let match6 = document.getElementById("match-6");
// match6.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match6);
// });

// let match7 = document.getElementById("match-7");
// match7.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match7);
// });

// let match8 = document.getElementById("match-8");
// match8.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match8);
// });

// let match9 = document.getElementById("match-9");
// match9.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match9);
// });

// let match10 = document.getElementById("match-10");
// match10.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match10);
// });

// let match11 = document.getElementById("match-11");
// match11.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match11);
// });

// let match12 = document.getElementById("match-12");
// match12.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match12);
// });

// let match13 = document.getElementById("match-13");
// match13.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match13);
// });

// let match14 = document.getElementById("match-14");
// match14.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match14);
// });

// let match15 = document.getElementById("match-15");
// match15.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match15);
// });

// let match16 = document.getElementById("match-16");
// match16.addEventListener("submit", (event) => {  
//   event.preventDefault();
//   console.log(match16);
// });

// ===========================================================================
// ===========================================================================



//  function test(){
//    document.getElementById("demo").innerHTML="hello world";
  //  event.preventDefault();
//    event.stopPropagation();
//  }

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