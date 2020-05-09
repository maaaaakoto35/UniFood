const tabs = document.querySelectorAll(".tabs li a");
const contents = document.querySelectorAll(".contents li");

for(let i = 0; i < tabs.length; i++) {
  tabs[i].addEventListener("click", function(e) {
    e.preventDefault();
    for(let j = 0; j < tabs.length; j++) {
      tabs[j].classList.remove("active");
    }
    for(let j = 0; j < contents.length; j++) {
      contents[j].classList.remove("active");
    }
    this.classList.add("active");
    contents[i].classList.add("active");
  });
}