// Get DOM Elements
const modal3 = document.querySelector('#my-modal3');
const modalBtn3 = document.querySelector('#modal-btn3');
const closeBtn3 = document.querySelector('.close');

// Events
modalBtn3.addEventListener('click', openModal)
closeBtn3.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal3.style.display = 'block';
}

// Close
function closeModal() {
  modal3.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal3) {
    modal3.style.display = 'none';
  }
}
