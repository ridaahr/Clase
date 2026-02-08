
document.addEventListener("DOMContentLoaded", ()=>{
  const user = Auth.requireAdmin();
  if(!user) return;

  const tabs = ["tabBooks","tabUsers","tabPen","tabSettings","tabStats"];
  function show(id){
    tabs.forEach(t=> UI.qs(t).hidden = (t!==id));
    document.querySelectorAll("[data-tab]").forEach(b=> b.classList.toggle("btn-primary", b.dataset.tab===id));
  }
  document.querySelectorAll("[data-tab]").forEach(b=> b.addEventListener("click", ()=>show(b.dataset.tab)));
  show("tabBooks");

  UI.qs("bookForm").addEventListener("submit",(e)=>{
    e.preventDefault();
    const db = DB.load();
    const id = UI.qs("bookId").value.trim();
    const title = UI.qs("bTitle").value.trim();
    const author = UI.qs("bAuthor").value.trim();
    const year = parseInt(UI.qs("bYear").value,10) || "";
    const isbn = UI.qs("bIsbn").value.trim();
    const desc = UI.qs("bDesc").value.trim();
    const copies = Math.max(1, parseInt(UI.qs("bCopies").value,10) || 1);

    if(!title || !author){ UI.toast("Título y autor son obligatorios","danger"); return; }

    if(id){
      const b = db.books.find(x=>x.id===id);
      const active = db.loans.filter(l=>l.bookId===id && l.status==="active").length;
      b.title=title; b.author=author; b.year=year; b.isbn=isbn; b.description=desc;
      b.copiesTotal=copies; b.copiesAvailable=Math.max(0, copies-active);
      UI.toast("Libro actualizado","success");
    }else{
      db.books.push({id:DB.uid("b_"), title, author, year, isbn, description:desc, copiesTotal:copies, copiesAvailable:copies, loanCount:0});
      UI.toast("Libro creado","success");
    }
    DB.save(db);
    UI.qs("bookForm").reset(); UI.qs("bookId").value="";
    render();
  });

  UI.qs("bookClear").addEventListener("click", ()=>{ UI.qs("bookForm").reset(); UI.qs("bookId").value=""; });

  UI.qs("userForm").addEventListener("submit",(e)=>{
    e.preventDefault();
    const db = DB.load();
    const id = UI.qs("userId").value.trim();
    const name = UI.qs("uName").value.trim();
    const email = UI.qs("uEmail").value.trim().toLowerCase();
    const pass = UI.qs("uPass").value;
    const role = UI.qs("uRole").value;

    if(!name || !email){ UI.toast("Nombre y email son obligatorios","danger"); return; }
    if(!/^\S+@\S+\.\S+$/.test(email)){ UI.toast("Email inválido","danger"); return; }
    if(db.users.some(u=>u.email.toLowerCase()===email && u.id!==id)){ UI.toast("Ese email ya existe","danger"); return; }

    if(id){
      const u = db.users.find(x=>x.id===id);
      u.name=name; u.email=email; u.role=role;
      if(pass) u.password=pass;
      UI.toast("Usuario actualizado","success");
    }else{
      if(!pass){ UI.toast("Contraseña obligatoria al crear","danger"); return; }
      db.users.push({id:DB.uid("u_"), name, email, password:pass, role, penalties:[], stats:{lateCount:0}});
      UI.toast("Usuario creado","success");
    }
    DB.save(db);
    UI.qs("userForm").reset(); UI.qs("userId").value="";
    render();
  });

  UI.qs("userClear").addEventListener("click", ()=>{ UI.qs("userForm").reset(); UI.qs("userId").value=""; });

  UI.qs("penForm").addEventListener("submit",(e)=>{
    e.preventDefault();
    const db = DB.load();
    const userId = UI.qs("pUser").value;
    const days = Math.max(1, parseInt(UI.qs("pDays").value,10) || 1);
    const reason = UI.qs("pReason").value.trim() || "Penalización";
    const u = db.users.find(x=>x.id===userId);
    if(!u){ UI.toast("Selecciona un usuario","danger"); return; }
    u.penalties=u.penalties||[];
    u.penalties.push({id:DB.uid("p_"), reason, until:DB.addDays(DB.today(), days)});
    DB.save(db);
    UI.toast("Penalización asignada","success");
    render();
  });

  UI.qs("settingsForm").addEventListener("submit",(e)=>{
    e.preventDefault();
    const db = DB.load();
    db.settings.maxLoansPerUser = Math.max(1, parseInt(UI.qs("sMax").value,10)||1);
    db.settings.loanDays = Math.max(1, parseInt(UI.qs("sDays").value,10)||1);
    db.settings.penaltyDaysForLate = Math.max(1, parseInt(UI.qs("sPenDays").value,10)||1);
    DB.save(db);
    UI.toast("Ajustes guardados","success");
    render();
  });

  function render(){
    const db = DB.load();

    // Books table
    const bt = UI.qs("booksBody");
    bt.innerHTML="";
    db.books.slice().sort((a,b)=>a.title.localeCompare(b.title)).forEach(b=>{
      const tr=document.createElement("tr");
      tr.innerHTML = `
        <td>${UI.esc(b.title)}</td>
        <td>${UI.esc(b.author)}</td>
        <td>${b.year||"—"}</td>
        <td><span class="badge badge-soft">${b.copiesAvailable}/${b.copiesTotal}</span></td>
        <td class="text-end">
          <button class="btn btn-sm btn-outline-primary me-1" data-e="edit">Editar</button>
          <button class="btn btn-sm btn-outline-danger" data-e="del">Borrar</button>
        </td>`;
      tr.querySelector('[data-e="edit"]').addEventListener("click", ()=>{
        UI.qs("bookId").value=b.id;
        UI.qs("bTitle").value=b.title;
        UI.qs("bAuthor").value=b.author;
        UI.qs("bYear").value=b.year||"";
        UI.qs("bIsbn").value=b.isbn||"";
        UI.qs("bDesc").value=b.description||"";
        UI.qs("bCopies").value=b.copiesTotal;
        show("tabBooks");
      });
      tr.querySelector('[data-e="del"]').addEventListener("click", ()=>{
        const db2=DB.load();
        if(db2.loans.some(l=>l.bookId===b.id && l.status==="active")){ UI.toast("No se puede borrar: hay préstamos activos","danger"); return; }
        db2.books=db2.books.filter(x=>x.id!==b.id);
        DB.save(db2);
        UI.toast("Libro borrado","success");
        render();
      });
      bt.appendChild(tr);
    });

    // Users table + select penalties
    const ut=UI.qs("usersBody"); ut.innerHTML="";
    const sel=UI.qs("pUser"); sel.innerHTML="";
    db.users.slice().sort((a,b)=>a.name.localeCompare(b.name)).forEach(u=>{
      if(u.role!=="admin"){
        const opt=document.createElement("option");
        opt.value=u.id; opt.textContent=`${u.name} (${u.email})`;
        sel.appendChild(opt);
      }
      const active = db.loans.filter(l=>l.userId===u.id && l.status==="active").length;
      const hasPen = (u.penalties||[]).some(p=>p.until>=DB.today());
      const penBadge = hasPen ? `<span class="badge badge-soft-danger">Sí</span>` : `<span class="badge badge-soft-success">No</span>`;
      const tr=document.createElement("tr");
      tr.innerHTML = `
        <td>${UI.esc(u.name)}</td>
        <td class="mono">${UI.esc(u.email)}</td>
        <td><span class="badge badge-soft">${u.role}</span></td>
        <td>${active}</td>
        <td>${penBadge}</td>
        <td class="text-end">
          <button class="btn btn-sm btn-outline-primary me-1" data-e="edit">Editar</button>
          <button class="btn btn-sm btn-outline-danger" data-e="del">Borrar</button>
        </td>`;
      tr.querySelector('[data-e="edit"]').addEventListener("click", ()=>{
        UI.qs("userId").value=u.id;
        UI.qs("uName").value=u.name;
        UI.qs("uEmail").value=u.email;
        UI.qs("uPass").value="";
        UI.qs("uRole").value=u.role;
        show("tabUsers");
      });
      tr.querySelector('[data-e="del"]').addEventListener("click", ()=>{
        if(u.id==="admin"){ UI.toast("No se puede borrar el admin inicial","danger"); return; }
        const db2=DB.load();
        if(db2.loans.some(l=>l.userId===u.id && l.status==="active")){ UI.toast("No se puede borrar: tiene préstamos activos","danger"); return; }
        db2.users=db2.users.filter(x=>x.id!==u.id);
        DB.save(db2);
        UI.toast("Usuario borrado","success");
        render();
      });
      ut.appendChild(tr);
    });

    // Settings
    UI.qs("sMax").value = db.settings.maxLoansPerUser;
    UI.qs("sDays").value = db.settings.loanDays;
    UI.qs("sPenDays").value = db.settings.penaltyDaysForLate;

    // Stats
    const topBooks = db.books.slice().sort((a,b)=>(b.loanCount||0)-(a.loanCount||0)).slice(0,5);
    UI.qs("topBooks").innerHTML = topBooks.map(b=>`
      <div class="d-flex justify-content-between py-1">
        <span>${UI.esc(b.title)}</span><span class="badge badge-soft">${b.loanCount||0}</span>
      </div>`).join("") || "<div class='text-muted small'>—</div>";

    const topLate = db.users.slice().sort((a,b)=>((b.stats&&b.stats.lateCount)||0)-((a.stats&&a.stats.lateCount)||0)).slice(0,5);
    UI.qs("topLate").innerHTML = topLate.map(u=>`
      <div class="d-flex justify-content-between py-1">
        <span>${UI.esc(u.name)}</span><span class="badge badge-soft">${(u.stats&&u.stats.lateCount)||0}</span>
      </div>`).join("") || "<div class='text-muted small'>—</div>";

    const ret = db.loans.filter(l=>l.status==="returned" && l.returnDate);
    UI.qs("avgReturn").textContent = ret.length
      ? ((ret.reduce((acc,l)=>acc+DB.daysBetween(l.loanDate,l.returnDate),0)/ret.length).toFixed(1) + " días")
      : "—";
  }

  render();
});
