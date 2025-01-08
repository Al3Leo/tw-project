const choosedSearch = document.getElementById("hero__search__choosed__search");
const choosedBudget = document.getElementById("hero__search__choosed__budget");
const choosedPeriod = document.getElementById("hero__search__choosed__period");
const choosed = [choosedSearch, choosedBudget, choosedPeriod];

const whereLink = document.getElementById("hero__search__choose__whereLink");
const budgetLink = document.getElementById("hero__search__choose__budgetLink");
const periodLink = document.getElementById("hero__search__choose__periodLink");
const links = [whereLink, budgetLink, periodLink];

function showSection(index) {
  choosed.forEach((element, i) => {
    if (i === index) {
      element.style.display = "flex";
    } else {
      element.style.display = "none";
    }
  });

  links.forEach((link, i) => {
    if (i === index) {
      link.style.fontWeight = "bold";
    } else {
      link.style.fontWeight = "400";
    }
  });
}

links.forEach((link, index) => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    showSection(index);
  });
});
