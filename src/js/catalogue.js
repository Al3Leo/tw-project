const choosedSearch = document.getElementById("hero__search__choosed__search");
const choosedBudget = document.getElementById("hero__search__choosed__budget");
const whereLink = document.getElementById("hero__search__choose__whereLink");
const budgetLink = document.getElementById("hero__search__choose__budgetLink");
function showWhere(event) {
  event.preventDefault(); // Previene il comportamento predefinito del link
  choosedSearch.style.display = "block";
  choosedBudget.style.display = "none";
  whereLink.style.fontWeight = "bold";
  budgetLink.style.fontWeight = "400";
}
function showBudget(event) {
  event.preventDefault(); // Previene il comportamento predefinito del link
  choosedBudget.style.display = "flex";
  choosedSearch.style.display = "none";

  budgetLink.style.fontWeight = "bold";
  whereLink.style.fontWeight = "400";
}
