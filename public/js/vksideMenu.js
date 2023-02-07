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
    // console.log(txt);
    switch (txt) {
        
        case "Dashboard":
            document.getElementById("dashboard").classList.add("dash");
            break;
        case "Reservations":
            document.getElementById("Reservations").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
         
        case "Customers":
            document.getElementById("Customers").classList.add("dash");
            document.getElementById("dashboard").classList.remove("dash");
            break;
        default:
            statementDefault;
    }
}