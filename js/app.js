/*const card = document.querySelector(".card-home");
const block3 = document.querySelector(".block_3");


//Moving Animation Event
block3.addEventListener("mousemove", (e) => {
    let xAxis = (window.innerWidth / 2 - e.pageX) / 20;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 20;
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
  });

 

/**************GESTION CART OVERLAY************* */



const cartBtn =document.querySelector(".btn-add");
const closeCartBtn =document.querySelector(".close-cart");
const cartDOM =document.querySelector(".cart");
const cartOverlay =document.querySelector(".cart-overlay");
const cartItems =document.querySelector(".cart-items");
const cartContent =document.querySelector(".cart-content");

let buttonsDOM =[];
class UI{

  getCardButtons(){
  
  const buttons=[...document.querySelectorAll(".btn-add") ];
      buttonsDOM =buttons;
      buttons.forEach(button =>{

          button.addEventListener('click', (event)=>{
            //show the cart 
              this.showCart();
          });
      });
} 


    showCart(){
        cartOverlay.classList.add('transparentBcg');
        cartDOM.classList.add('showCart');
    }
    setupAPP(){
      cartBtn.addEventListener('click', this.showCart);
      closeCartBtn.addEventListener('click' ,this.hideCart);
  }
    hideCart(){
      cartOverlay.classList.remove('transparentBcg');
      cartDOM.classList.remove('showCart');
  }

}
  document.addEventListener("DOMContentLoaded", () =>{
    const ui =new UI();
    // setup app
    ui.setupAPP();
    ui.getCardButtons();
  });



