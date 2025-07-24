history.pushState(null,null, location.href);

window.addEventListener("popstate", function () {
    console.warn("seta do navegador usada.");
    sessionStorage.clear()
    window.location.href = "../../index.php";
});