

/* Đăng ký */

const signUp = document.querySelector('.js-sign-up')
const modal = document.querySelector('.js-modal')
const modalClose = document.querySelector('.js-close')
const modalContainer = document.querySelector('.js-modal-container')

function showSignUp(){
    modal.classList.add('open')
}

function hiddenSignUp(){
    modal.classList.remove('open')
}

modalContainer.addEventListener('click', function(event){
    event.stopPropagation()
})

modal.addEventListener('click', hiddenSignUp)
signUp.addEventListener('click', showSignUp)
modalClose.addEventListener('click', hiddenSignUp)

/* End Đăng ký */

/* Đăng nhập */

const logIn = document.querySelector('.js-log-in')
const modalLogIn = document.querySelector('.js-modal-log-in')
const closeLogIn = document.querySelector('.js-close-log-in')
const logInContainer = document.querySelector('.js-log-in-container')

function showLogIn(){
    modalLogIn.classList.add('open-login')
}

function hiddenLogIn(){
    modalLogIn.classList.remove('open-login')
}

logIn.addEventListener('click', showLogIn)
modalLogIn.addEventListener('click', hiddenLogIn)
closeLogIn.addEventListener('click', hiddenLogIn)
logInContainer.addEventListener('click', function(event){
    event.stopPropagation()
})

/* End đăng nhập */

/* Xử lý password */

function checkPassWord(){
    const checkPass = document.querySelector('#js-check-pass').value;
    const checkRetypePass = document.querySelector('#js-check-retype-pass').value;

    if(checkPass == checkRetypePass){
        return true;
    }else{
        alert('Password không khớp! mời nhập lại');
        return false;
    }
}

/* End */

// /* Xử lý tăng giảm */

// function upQuantity(){
//     var result = document.getElementById("quantity"); 
//     var qty = result.value; 
//     if( !isNaN(qty) &amp){
//         qty > 1;
//         result.value--;
//     }
//     return false;
// }

// function downQuantity(){
//     var result = document.getElementById('quantity'); 
//     var qty = result.value; 
//     if( !isNaN(qty)) 
//         result.value++;
//     return false;
// }