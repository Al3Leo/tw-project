/* Countdown manager*/
let countdown = new Date("Feb 27, 2025 00:00:00").getTime();
let x = setInterval(function () {
  let now = new Date().getTime();
  let distance = countdown - now;
  let days = Math.floor(distance / (1000 * 60 * 60 * 24));
  let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("main__left__countdown__days").innerHTML = days;
  document.getElementById("main__left__countdown__hours").innerHTML = hours;
  document.getElementById("main__left__countdown__minutes").innerHTML = minutes;
  document.getElementById("main__left__countdown__seconds").innerHTML = seconds;
}, 1000); //riesegui la funzione ogni secondo
clearInterval();

/*Photo slider*/
let slideIndex = 0;
carousel();

function carousel() {
  let i;
  let x = document.getElementsByClassName("slide");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {
    slideIndex = 1;
  }
  x[slideIndex - 1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}

/*FAQ*/
const faqItems = document.querySelectorAll('.faq__item');
faqItems.forEach(item => {
  const question = item.querySelector('.faq__item__question');
  const answer = item.querySelector('.faq__item__answer');
  const arrow = item.querySelector('.faq__item__arrow');

  question.addEventListener('click', () => {
    const isOpen = answer.classList.contains('open');

    // Close all open answers
    document.querySelectorAll('.faq__item__answer').forEach(a => a.classList.remove('open'));
    document.querySelectorAll('.faq__item__arrow').forEach(a => a.classList.remove('open'));

    // Toggle current item
    if (!isOpen) {
      answer.classList.add('open');
      arrow.classList.add('open');
    }
  });
});