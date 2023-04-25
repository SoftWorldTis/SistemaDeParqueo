const modal = document.getElementById('modal');
const btnopen = document.getElementById('modal-open');
const btnclose = document.getElementById('modal-close');


btnclose.addEventListener('click', () => {
  modal.style.display = 'none';
});

btnopen.addEventListener('click', () => {
  modal.style.display = 'flex';
});