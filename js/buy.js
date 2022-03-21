/* Thanh toán */

const buyCart = document.querySelector('.js-buy-cart-btn')
const modalCart = document.querySelector('.js-modal-cart')
const modalCartClose = document.querySelector('.js-cart-close')
const modalCartContainer = document.querySelector('.js-modal-cart-comtainer')

function showCart(){
    modalCart.classList.add('open-cart')
}

function hiddenCart(){
    modalCart.classList.remove('open-cart')
}

modalCartContainer.addEventListener('click', function(event){
    event.stopPropagation()
})

modalCart.addEventListener('click', hiddenCart)
buyCart.addEventListener('click', showCart)
modalCartClose.addEventListener('click', hiddenCart)

/* End thanh toán */
