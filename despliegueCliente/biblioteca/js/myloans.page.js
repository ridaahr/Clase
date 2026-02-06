
document.addEventListener("DOMContentLoaded", ()=>{
  const user = Auth.requireAuth();
  if(!user) return;

  render();

  function render(){
    const db = DB.load();
    const me = Auth.currentUser(); // refrescar
    const today = DB.today();

    const activePen = (me.penalties||[]).filter(p=>p.until>=today);
    const box = UI.qs("penaltyBox");
    if(activePen.length){
      box.className="alert alert-danger";
      box.innerHTML="<div class='fw-semibold mb-1'>Penalización activa</div>"+activePen.map(p=>`<div>• ${UI.esc(p.reason)} hasta <b>${p.until}</b></div>`).join("");
    }else{
      box.className="alert alert-success";
      box.textContent="Sin penalizaciones activas.";
    }

    const loans = db.loans.filter(l=>l.userId===me.id).sort((a,b)=>b.loanDate.localeCompare(a.loanDate));
    const act = loans.filter(l=>l.status==="active");
    const ret = loans.filter(l=>l.status==="returned");
    UI.qs("summary").textContent = `Activos: ${act.length} · Devueltos: ${ret.length}`;

    const activeWrap = UI.qs("activeWrap");
    activeWrap.innerHTML = "";
    if(!act.length){
      activeWrap.innerHTML = `<div class="alert alert-secondary mb-0">No tienes préstamos activos.</div>`;
    }else{
      act.forEach(l=>{
        const book = db.books.find(b=>b.id===l.bookId);
        const late = today > l.dueDate;
        const badge = late ? `<span class="badge badge-soft-warning">Retrasado</span>` : `<span class="badge badge-soft-success">En plazo</span>`;
        const card = document.createElement("div");
        card.className="card p-3 mb-3";
        card.innerHTML = `
          <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
              <div class="fw-semibold">${UI.esc(book?book.title:l.bookId)}</div>
              <div class="small-muted">Inicio ${l.loanDate} · Vence <b>${l.dueDate}</b></div>
              <div class="mt-2">${badge}</div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <button class="btn btn-outline-primary">Ver libro</button>
              <button class="btn btn-primary">Devolver</button>
            </div>
          </div>
        `;
        const [btnView, btnReturn] = card.querySelectorAll("button");
        btnView.addEventListener("click", ()=>location.href=`book.html?id=${encodeURIComponent(l.bookId)}`);
        btnReturn.addEventListener("click", ()=>{
          const res = Loans.returnLoan(l.id);
          if(!res.ok){ UI.toast(res.msg,"danger"); return; }
          UI.toast("Libro devuelto.","success");
          render();
        });
        activeWrap.appendChild(card);
      });
    }

    const tbody = UI.qs("returnedBody");
    tbody.innerHTML = "";
    if(!ret.length){
      tbody.innerHTML = `<tr><td colspan="5" class="small text-muted">Sin historial.</td></tr>`;
    }else{
      ret.slice(0,50).forEach(l=>{
        const book = db.books.find(b=>b.id===l.bookId);
        const late = l.returnDate > l.dueDate;
        const badge = late ? `<span class="badge badge-soft-warning">Tarde</span>` : `<span class="badge badge-soft-success">OK</span>`;
        const tr = document.createElement("tr");
        tr.innerHTML = `<td>${UI.esc(book?book.title:l.bookId)}</td><td>${l.loanDate}</td><td>${l.dueDate}</td><td>${l.returnDate||"—"}</td><td>${badge}</td>`;
        tbody.appendChild(tr);
      });
    }
  }
});
