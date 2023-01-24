let bars = document.getElementById("bars");
    let panel = document.getElementById("panel");

    bars.addEventListener("click", () => {
        panel.classList.toggle("hide");
    })