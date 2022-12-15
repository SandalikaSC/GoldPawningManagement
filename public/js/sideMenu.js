let bars = document.getElementById("bars");
let panel = document.getElementById("panel");

bars.addEventListener("click", () => {
    panel.classList.toggle("hide");
})

window.onload = function () {
    func();
};
function func() {
    let dashboard_btn = document.getElementById("title");
    var txt = dashboard_btn.innerHTML;
    console.log(txt);
    switch (txt) {
        case "Appointments":
            document.getElementById("appointment").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        case "Dashboard":
            document.getElementById("dashboard").classList.add("dash");
            break;
        case "Locker":
            document.getElementById("locker").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        case "Pawn Articles":
            document.getElementById("pawnArticles").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        case "Contact Us":
            document.getElementById("contactUs").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        case "About":
            document.getElementById("about").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        default:
            statementDefault;
    }
}
