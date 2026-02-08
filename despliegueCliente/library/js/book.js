var navbar=document.getElementById("navbar");
var url=new URLSearchParams(window.location.search);
var bookId=url.get("id");
var titleEl=document.getElementById("bookTitle");
var authEl=document.getElementById("bookAuthor");
var catEl=document.getElementById("bookCategory");
var availEl=document.getElementById("bookAvailability");
var borrowBtn=document.getElementById("borrowBtn");
var msgEl=document.getElementById("bookMessage");

function loadNav(){
 navbar.innerHTML="";
 var b=document.createElement("a"); b.className="navbar-brand"; b.href="#"; b.textContent="Library"; navbar.appendChild(b);
 var d=document.createElement("div"); d.className="navbar-nav";
 var c=document.createElement("a"); c.className="nav-link"; c.href="catalog.html"; c.textContent="Catálogo"; d.appendChild(c);
 var l=document.createElement("a"); l.className="nav-link"; l.href="loans.html"; l.textContent="Mis préstamos"; d.appendChild(l);
 if(localStorage.getItem("role")=="admin"){ var a=document.createElement("a"); a.className="nav-link"; a.href="admin.html"; a.textContent="Administrar"; d.appendChild(a);}
 var out=document.createElement("a"); out.className="nav-link"; out.href="index.html"; out.textContent="Cerrar sesión"; d.appendChild(out);
 navbar.appendChild(d);
}

function loadBook(){
 fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"getBook",id:bookId})})
 .then(function(res){ return res.json(); }).then(function(b){
  if(b.error){ titleEl.textContent="Error"; return;}
  titleEl.textContent=b.title;
  authEl.textContent="Autor: "+b.author;
  catEl.textContent="Categoría: "+b.category;
  if(b.available_copies>0){ availEl.textContent="Disponible"; availEl.className="text-success"; borrowBtn.disabled=false;} 
  else { availEl.textContent="No disponible"; availEl.className="text-danger"; borrowBtn.disabled=true;}
 });
}

borrowBtn.addEventListener("click",function(){
 var userId=localStorage.getItem("userId");
 if(!userId){ window.location.href="index.html"; return;}
 fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"borrowBook",user_id:userId,book_id:bookId})})
 .then(function(res){ return res.json(); }).then(function(d){
  if(d.success){ alert("Préstamo realizado"); loadBook(); } 
  else { msgEl.textContent=d.error; }
 });
});

loadNav();
loadBook();
