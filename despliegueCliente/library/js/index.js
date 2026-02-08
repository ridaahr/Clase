var form = document.getElementById("loginForm");
var msg = document.getElementById("message");

form.addEventListener("submit", function (e) {
    e.preventDefault();
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    fetch("php/functions.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ action: "login", email: email, password: password })
    }).then(function (res) { return res.json(); }).then(function (data) {
        if (data.success) {
            localStorage.setItem("userId", data.user.id);
            localStorage.setItem("role", data.user.role);
            if (data.user.role == "admin") window.location.href = "admin.html";
            else window.location.href = "catalog.html";
        } else { msg.textContent = data.error; }
    });
});
