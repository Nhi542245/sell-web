function clickLiItemMemu (item) {
    cleanActiveLiItemMenu();
    const element = document.getElementById(item);
    element.classList.add("active");
}

function cleanActiveLiItemMenu () {
    let index;
    for (index = 1; index <= 5; index ++) {
        const idString = `item-${index}`
        const aElement = document.getElementById(idString);
        aElement.classList.remove("active");

    }
}

document.getElementById('item-1').addEventListener("click", () => clickLiItemMemu('item-1'));

document.getElementById('item-2').addEventListener("click", () => clickLiItemMemu('item-2'));

document.getElementById('item-3').addEventListener("click", () => clickLiItemMemu('item-3'));

document.getElementById('item-4').addEventListener("click", () => clickLiItemMemu('item-4'));

document.getElementById('item-5').addEventListener("click", () => clickLiItemMemu('item-5'));