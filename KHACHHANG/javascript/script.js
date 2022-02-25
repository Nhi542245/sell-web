//----------------menu slidebar of category---------------
const itemslidebar = document.querySelectorAll(".category-left-li")
itemslidebar.forEach(function (menu, index) {
    menu.addEventListener("click", function () {
        menu.classList.toggle("block")
    })
})

//-----------------Product---------------------------------
const baoquan = document.querySelector(".baoquan")
const chitiet = document.querySelector(".chitiet")
const donggoi = document.querySelector(".donggoi")
if (baoquan) {
    baoquan.addEventListener("click", function () {
        document.querySelector(".title-chitiet").style.display = "none"
        document.querySelector(".title-donggoi").style.display = "none"
        document.querySelector(".title-baoquan").style.display = "block"
    })
}
if (chitiet) {
    chitiet.addEventListener("click", function () {
        document.querySelector(".title-chitiet").style.display = "block"
        document.querySelector(".title-donggoi").style.display = "none"
        document.querySelector(".title-baoquan").style.display = "none"
    })
}
if (donggoi) {
    donggoi.addEventListener("click", function () {
        document.querySelector(".title-baoquan").style.display = "none"
        document.querySelector(".title-chitiet").style.display = "none"
        document.querySelector(".title-donggoi").style.display = "block"
    })
}

const button = document.querySelector(".bottom-line")
if (button) {
    button.addEventListener("click", function () {
        document.querySelector(".bottom-content").classList.toggle("active")
    })
}

document.getElementById('add-cart').addEventListener('click', () => {
    document.getElementById('list-notification-id').classList.add('show');
    document.getElementById('list-notification-id').classList.remove('hide');
    setTimeout(() => {
        document.getElementById('list-notification-id').classList.add('hide');
        document.getElementById('list-notification-id').classList.remove('show');
    }, 3000)
})