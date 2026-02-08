import { apiRequest } from "./api.js";
const navbar = document.getElementById("navbar");
function loadNavbar() {
    navbar.innerHTML = "";
    const brand = document.createElement("a");
    brand.className = "navbar-brand";
    brand.href = "#";
    brand.textContent = "Library";
    navbar.appendChild(brand);
    const div = document.createElement("div");
    div.className = "navbar-nav";
    const catalogLink = document.createElement("a");
    catalogLink.className = "nav-link";
    catalogLink.href = "catalog.html";
    catalogLink.textContent = "Catálogo";
    div.appendChild(catalogLink);
    const loansLink = document.createElement("a");
    loansLink.className = "nav-link";
    loansLink.href = "loans.html";
    loansLink.textContent = "Mis préstamos";
    div.appendChild(loansLink);
    const logout = document.createElement("a");
    logout.className = "nav-link";
    logout.href = "index.html";
    logout.textContent = "Cerrar sesión";
    div.appendChild(logout);
    navbar.appendChild(div);
}
loadNavbar();

const urlParams = new URLSearchParams(window.location.search);
const bookId = urlParams.get("id");

const titleEl = document.getElementById("bookTitle");
const authorEl = document.getElementById("bookAuthor");
const categoryEl = document.getElementById("bookCategory");
const availEl = document.getElementById("bookAvailability");
const borrowBtn = document.getElementById("borrowBtn");

async function loadBook() {
    const book = await apiRequest("php/functions.php", { action: "getBook", id: bookId });
    if (book.error) {
        titleEl.textContent = "Error";
        return;
    }
    titleEl.textContent = book.title;
    authorEl.textContent = "Autor: " + book.author;
    categoryEl.textContent = "Categoría: " + book.category;
    if (book.available_copies > 0) {
        availEl.textContent = "Disponible";
        availEl.className = "text-success";
        borrowBtn.disabled = false;
    } else {
        availEl.textContent = "No disponible";
        availEl.className = "text-danger";
        borrowBtn.disabled = true;
    }
}
loadBook();

borrowBtn.addEventListener("click", async function () {
    alert("Funcionalidad de solicitar préstamo pendiente de implementar");
});
