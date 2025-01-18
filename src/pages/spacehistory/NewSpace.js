     
const upBtn = document.querySelector(".up");
const downBtn = document.querySelector(".down");
const leftSlides = document.querySelectorAll(".left > div");
const rightSlides = document.querySelectorAll(".right > div");
const totalSlides = leftSlides.length;
let currentSlide = 0;

function updateSlide() {
    const offset = currentSlide * 100;
    leftSlides.forEach(slide => {
        slide.style.transform = `translateY(-${offset}vh)`;
    });
    rightSlides.forEach(slide => {
        slide.style.transform = `translateY(-${offset}vh)`;
    });
}

downBtn.addEventListener("click", () => {
    currentSlide--;
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    }
    updateSlide();
});

upBtn.addEventListener("click", () => {
    currentSlide++;
    if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    updateSlide();
});

document.getElementById('newsForm').addEventListener('input', function (event) { 
event.preventDefault(); 
var dob = document.getElementById('dob').value;
var xhr = new XMLHttpRequest();
xhr.open("GET", "pages/spacehistory/get_news.php?dob=" + dob, true); 
xhr.responseType = 'json'; 
xhr.send(); 
xhr.onload = function() { 
if (xhr.readyState == 4) { 
switch (xhr.status) { 
    case 200: 
        var articles = xhr.response; 
        console.log(articles);  
        createNewsBlocks(articles); 
        break; 
    case 404: 
        alert("La pagina indicata non esiste!"); 
        break; 
    case 500: 
        alert("Si è verificato un errore sul server!"); 
        break; 
    default: alert("Non è possibile elaborare la richiesta (" + xhr.statusText + ")"); 
} 
} }; 

function createNewsBlocks(articles) {
  var newsContainer = document.getElementById('newsContainer');
  newsContainer.style.display = 'grid';
  newsContainer.innerHTML = ''; 
  articles.forEach(function(article) { 
    var newsBlock = '<div class="card"><img class="contenuto4_img" src="' + article.image_url + '" alt="News Image">' +
      '<div class="overlay"><h6>' + article.title + '</h6>' +
      '<p>' + article.summary + '</p></div></div>';
    newsContainer.insertAdjacentHTML('beforeend', newsBlock);
  });
}

});
