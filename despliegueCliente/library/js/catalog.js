var navbar=document.getElementById("navbar");
var bookList=document.getElementById("bookList");

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

function loadBooks(){
 fetch("php/functions.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({action:"getBooks"})})
 .then(function(res){ return res.json(); }).then(function(data){
  bookList.innerHTML="";
  for(var i=0;i<data.length;i++){
   var book=data[i];
   var col=document.createElement("div"); col.className="col-md-4";
   var card=document.createElement("div"); card.className="card h-100";
   var body=document.createElement("div"); body.className="card-body";
   var title=document.createElement("h5"); title.className="card-title"; title.textContent=book.title;
   var auth=document.createElement("p"); auth.className="card-text"; auth.textContent="Autor: "+book.author;
   var cat=document.createElement("p"); cat.className="card-text"; cat.textContent="Categoría: "+book.category;
   var avail=document.createElement("p"); if(book.available_copies>0){ avail.textContent="Disponible"; avail.className="text-success";} else { avail.textContent="No disponible"; avail.className="text-danger";}
   var btn=document.createElement("a"); btn.className="btn btn-primary mt-2"; btn.href="book.html?id="+book.id; btn.textContent="Ver libro";
   body.appendChild(title); body.appendChild(auth); body.appendChild(cat); body.appendChild(avail); body.appendChild(btn);
   card.appendChild(body); col.appendChild(card); bookList.appendChild(col);
  }
 });
}

loadNav();
loadBooks();
