// const $ = document.querySelector.bind(document);
// const $$ = document.querySelectorAll(document);

const tabs = document.querySelectorAll(".tab-item");
const panes = document.querySelectorAll(".tab-card");
const line = document.querySelector(".description .line");

// requestIdleCallback(function () {
//     line.style.left = tabActive.offsetLeft + "px";
//     line.style.width = tabActive.offsetWidth + "px";
// });

tabs.forEach(function(tab, index) {
    const pane = panes[index];

    tab.onclick = function () {
        document.querySelector(".tab-item.active").classList.remove("active");
        document.querySelector(".tab-card.active").classList.remove("active");

        // line.style.left = this.offsetLeft + "px";
        // line.style.width = this.offsetWidth + "px";
    
        this.classList.add("active");
        pane.classList.add("active");
    };
});