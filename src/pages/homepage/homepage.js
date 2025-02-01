/* Countdown manager*/
let endDate = new Date("Feb 28, 2021 00:00:00"); //data di scadenza, fine sessione!
let countdown = endDate.getTime();  
if (document.getElementById("main__left__countdown__days")) {
  let x = setInterval(() => {
    let now = new Date().getTime(); // prelevo l'ora attuale
    let distance = countdown - now; // calcolo la distanza con la data prefissata in ms

    if (distance < 0) {  // se il tempo é esaurito, genero una nuova data a partire dal giorno corrente
      clearInterval(x);
      countdown = endDate.setDate(now + 20).getTime();
    }

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));  // converto ms in giorni
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));  // convert ms in ore
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));  // converto ms in m
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);  // converto ms in s
    document.getElementById("main__left__countdown__days").innerHTML = days;
    document.getElementById("main__left__countdown__hours").innerHTML = hours;
    document.getElementById("main__left__countdown__minutes").innerHTML = minutes;
    document.getElementById("main__left__countdown__seconds").innerHTML = seconds;
  }, 1000); //La funzione viene ripetuta ogni secondo
  clearInterval();
}

/*FAQ*/
const faqItems = document.querySelectorAll('.faq__item');
faqItems.forEach(item => {
  const question = item.querySelector('.faq__item__question');
  const answer = item.querySelector('.faq__item__answer');
  const arrow = item.querySelector('.faq__item__arrow');

  question.addEventListener('click', () => {
    const isOpen = answer.classList.contains('open');

    // Chiudo tutti gli item aperti
    document.querySelectorAll('.faq__item__answer').forEach(a => a.classList.remove('open'));
    document.querySelectorAll('.faq__item__arrow').forEach(a => a.classList.remove('open'));

    // Effettuo il toggle
    if (!isOpen) {
      answer.classList.add('open');
      arrow.classList.add('open');
    }
  });
});

/* Copy to clipboard (coupon) 
 * https://www.w3schools.com/howto/howto_js_copy_clipboard.asp
 */
  const copyToClipboard = document.getElementById("copyToClipboard");
  copyToClipboard.onclick = function(event){
    const textToCopy = copyToClipboard.innerText;
    navigator.clipboard.writeText(textToCopy).then(() => {
      copyToClipboard.innerText = "Copied to the clipboard";
      setTimeout(() => {
        copyToClipboard.innerText = textToCopy;
      }, 2000); // resetto il valore originale dopo 2 secondi
    });
  };
