/**********GESTION FOCUS ROW************** */
var index =0;
var item = document.getElementsByClassName('group-row');

function currentRow(n){
    showActive(index =n);

}
function showActive(n){
    for(var i =0 ; i < item.length ; i++){
        item[i].className = item[i].className.replace('active','');
    }
    item[n].className +='active';
}


const card = document.querySelector(".card-home");
const block3 = document.querySelector(".block_3");


//Moving Animation Event
block3.addEventListener("mousemove", (e) => {
    let xAxis = (window.innerWidth / 2 - e.pageX) / 20;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 20;
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
  });

 