var navbar=document.getElementById("navbar");
var usersList=document.getElementById("usersList");
var booksList=document.getElementById("booksList");
var statsDiv=document.getElementById("stats");

function loadNav(){
 navbar.innerHTML="";
 var b=document.createElement("a"); b.className="navbar-brand"; b.href="#"; b.textContent="Library"; navbar.appendChild(b);
 var d=document.createElement("div"); d.className="navbar-nav";
 var c=document.createElement("a"); c.className="nav-link"; c.href="catalog.html"; c.textContent="Catálogo"; d.appendChild(c);
 var l=document.createElement("a"); l.className="nav-link"; l.href="loans.html"; l.textContent="Mis préstamos"; d.appendChild(l);
 var a=document.createElement("a"); a.className="nav-link"; a.href="admin.html"; a.textContent="Administrar"; d.appendChild(a);
 var out=document.createElement("a"); out.className="nav-link"; out.href="index.html"; out.textContent="Cerrar sesión"; d.appendChild(out);
 navbar.appendChild(d);
}

function loadUsers(){
 fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"getUsers"})})
 .then(res=>res.json()).then(data=>{
  usersList.innerHTML="";
  for(var i=0;i<data.length;i++){
   var u=data[i];
   var tr=document.createElement("tr");
   tr.innerHTML="<td>"+u.email+"</td><td>"+u.role+"</td>";
   var td=document.createElement("td");
   var btn=document.createElement("button"); btn.className="btn btn-danger"; btn.textContent="Eliminar";
   (function(userId){ btn.addEventListener("click",function(){
    fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"deleteUser",user_id:userId})})
    .then(res=>res.json()).then(d=>{ if(d.success){ loadUsers(); loadStats(); } });
   });})(u.id);
   td.appendChild(btn); tr.appendChild(td);
   usersList.appendChild(tr);
  }
 });
}

function loadBooks(){
 fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"getBooks"})})
 .then(res=>res.json()).then(data=>{
  booksList.innerHTML="";
  for(var i=0;i<data.length;i++){
   var b=data[i];
   var tr=document.createElement("tr");
   tr.innerHTML="<td>"+b.title+"</td><td>"+b.author+"</td><td>"+b.category+"</td><td>"+b.available_copies+"</td>";
   var td=document.createElement("td");
   var btn=document.createElement("button"); btn.className="btn btn-danger"; btn.textContent="Eliminar";
   (function(bookId){ btn.addEventListener("click",function(){
    fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"deleteBook",book_id:bookId})})
    .then(res=>res.json()).then(d=>{ if(d.success){ loadBooks(); loadStats(); } });
   });})(b.id);
   td.appendChild(btn); tr.appendChild(td);
   booksList.appendChild(tr);
  }
 });
}



function loadStats(){
 fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"getStats"})})
 .then(res=>res.json()).then(s=>{
  statsDiv.innerHTML="Libros más prestados: "+s.topBooks.join(", ")+"<br>Usuarios con más retrasos: "+s.topUsers.join(", ")+"<br>Tiempo medio devolución: "+s.avgReturn+" días";
 });
}

loadNav();
loadUsers();
loadBooks();
loadStats();
