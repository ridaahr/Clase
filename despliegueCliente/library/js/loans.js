var navbar = document.getElementById("navbar");
var loansList = document.getElementById("loansList");
var userId = localStorage.getItem("userId");

function loadNav() {
    navbar.innerHTML = "";
    var b = document.createElement("a"); b.className = "navbar-brand"; b.href = "#"; b.textContent = "Library"; navbar.appendChild(b);
    var d = document.createElement("div"); d.className = "navbar-nav";
    var c = document.createElement("a"); c.className = "nav-link"; c.href = "catalog.html"; c.textContent = "Catálogo"; d.appendChild(c);
    var l = document.createElement("a"); l.className = "nav-link"; l.href = "loans.html"; l.textContent = "Mis préstamos"; d.appendChild(l);
    if (localStorage.getItem("role") == "admin") { var a = document.createElement("a"); a.className = "nav-link"; a.href = "admin.html"; a.textContent = "Administrar"; d.appendChild(a); }
    var out = document.createElement("a"); out.className = "nav-link"; out.href = "index.html"; out.textContent = "Cerrar sesión"; d.appendChild(out);
    navbar.appendChild(d);
}

function loadLoans() {
    fetch("php/functions.php", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ action: "getLoans", user_id: userId }) })
        .then(function (res) { return res.json(); }).then(function (data) {
            loansList.innerHTML = "";
            for (var i = 0; i < data.length; i++) {
                var loan = data[i];
                var tr = document.createElement("tr");
                var pen = loan.penalty > 0 ? loan.penalty + " €" : "-";
                tr.innerHTML = "<td>" + loan.title + "</td><td>" + loan.date_loan + "</td><td>" + loan.date_return + "</td><td>" + pen + "</td>";
                var td = document.createElement("td");
                if (loan.returned == 0) {
                    var btn = document.createElement("button"); btn.className = "btn btn-success"; btn.textContent = "Devolver";
                    (function (loanId) {
                        btn.addEventListener("click", function () {
                            fetch("php/functions.php", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ action: "returnBook", loan_id: loanId }) })
                                .then(function (res) { return res.json(); }).then(function (d) {
                                    if (d.success) { loadLoans(); } else { alert(d.error); }
                                });
                        });
                    })(loan.id);
                    td.appendChild(btn);
                } else { td.textContent = "-"; }
                tr.appendChild(td);
                loansList.appendChild(tr);
            }
        });
}

loadNav();
loadLoans();
