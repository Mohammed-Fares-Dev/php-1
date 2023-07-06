const closeBtn = document.getElementsByClassName('close-btn')[0],openBtn = document.getElementsByClassName('open-btn')[0],sideBare = document.getElementById('sidenav'),mainSection = document.getElementsByTagName('main')[0],indexModal = document.getElementById('staticBackdrop'),splSec = document.getElementById('spl-sec');

closeBtn.addEventListener('click',function(){
    sideBare.classList.toggle('active');
    mainSection.classList.toggle('active');
    if (splSec)
    {
      splSec.classList.toggle('active-sidbar');
    }
})

openBtn.addEventListener('click',function(){
    sideBare.classList.toggle('active');
    mainSection.classList.toggle('active');
    if (splSec)
    {
      splSec.classList.toggle('active-sidbar');
    }
})



function confirmRedirect(e) {
  let c = confirm('You have to be authenticated. Continue to login?');
  if (!c) {
    e.preventDefault();
  }
}
