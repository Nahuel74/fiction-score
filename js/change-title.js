const mainTitle = document.getElementById("main-title")
const selectCategory = document.getElementById("select-category")

selectCategory.onchange = function () {
    mainTitle.innerHTML = "RATE THE " + selectCategory[selectCategory.selectedIndex].innerHTML.toUpperCase()
}
