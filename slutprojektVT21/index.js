// If modal has been showed we won't show it again
const modalHasBeenShowed = () => {
  return localStorage.getItem('SHOW_OPENING_MODAL') === 'true';
}

const modalWasShowed = () => {
  localStorage.setItem('SHOW_OPENING_MODAL', true);
}
console.log(localStorage.getItem('SHOW_OPENING_MODAL'))
console.log(modalHasBeenShowed())

if (!modalHasBeenShowed()) {
  const wave = document.querySelector('.wave');
  const toggle = document.querySelector('.toggle');
  const body = document.querySelector('body');

  wave.classList.add('active');
  toggle.classList.add('active');
  body.classList.add('modal-open');
}




// Function to show modal

const showModal = () => {
  modalWasShowed();

  // elements
  const wave = document.querySelector('.wave');
  const toggle = document.querySelector('.toggle');
  const body = document.querySelector('#body');
  const wrapper = document.querySelector(".title-wrapper");
  const header = document.querySelector("#header");
  const underText = document.querySelector("#undertext");

  // en funktion som körs varje gång en ändring händer i addEventListener funktionen
  function changeTitle() {
    setTimeout(() => {
      if (wrapper.classList.contains("light")) {
        header.innerHTML = "Welcome";
        underText.innerHTML = "to the online art gallery.";
      } else {
        header.innerHTML = "Turn on the light";
        underText.innerHTML = "to see the artworks.";
      };
    }, 200);
  }

  // tar bort 'aniamte' class. (när classen läggs på igen körs animationen)
  toggle.classList.add('animate'); // lägger till en class i html som finns i css, sätter igång animationen

  setTimeout(() => {
    toggle.classList.toggle("active"); // om class 'active' finns ta bort det, om inte lägg till den
    document.querySelector(".wave").classList.toggle("active");
    body.classList.toggle("modal-open");
    wrapper.classList.toggle("light");
  }, 150);

  changeTitle();
  setTimeout(() => toggle.classList.remove("animate"), 300);

}

document.querySelector('.toggle').addEventListener('click', showModal);




// sidenavActivator js

/* Set the width of the side sidenav to 250px */
function openNav() {
  document.getElementById("sidenav").style.width = "700px";
}

/* Set the width of the side sidenav to 0 */
function closeNav() {
  document.getElementById("sidenav").style.width = "0";
}


// modal js
var signUpModal = document.getElementById('signUpModal')
var signUpBtn = document.getElementById('signUpBtn')

signUpModal.addEventListener('shown.bs.modal', function () {
  signUpBtn.focus()
})

var signInModal = document.getElementById('signInModal')
var signInBtn = document.getElementById('signInBtn')

signInModal.addEventListener('shown.bs.modal', function () {
  signInBtn.focus()
})