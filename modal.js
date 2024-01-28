console.log('working fine');

let modal = document.querySelector(".modal-overlay");
let btn = document.querySelector("#new_todo")

btn.onclick = function () {
    modal.style.display = "flex";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

