// Dropdown travelInfo
const items = document.querySelectorAll(".main__left__tripKnowledge__item");
items.forEach((item) => {
  const question = item.querySelector(
    ".main__left__tripKnowledge__item__question"
  );
  const answer = item.querySelector(".main__left__tripKnowledge__item__answer");
  const arrow = item.querySelector(".main__left__tripKnowledge__arrow");

  question.addEventListener("click", () => {
    const isOpen = answer.classList.contains("open");

    // Close all open answers
    document
      .querySelectorAll(".main__left__tripKnowledge__item__question")
      .forEach((a) => a.classList.remove("open"));
    document
      .querySelectorAll(".main__left__tripKnowledge__arrow")
      .forEach((a) => a.classList.remove("open"));

    // Toggle current item
    if (!isOpen) {
      answer.classList.add("open");
      arrow.classList.add("open");
    }
  });
});
