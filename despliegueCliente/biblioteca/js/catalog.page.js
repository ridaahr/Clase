
document.addEventListener("DOMContentLoaded", ()=>{
  const user = Auth.requireAuth();
  if(!user) return;

  const search = UI.qs("search");
  search.addEventListener("input", render);
  render();

  function render(){
    const db = DB.load();
    const q  = search.value.trim().toLowerCase();
    const list = UI.qs("list");
    list.innerHTML = "";

    const active = Loans.activeLoans(db, user.id).length;
    UI.qs("limits").textContent = `Máx ${db.settings.maxLoansPerUser} · ${db.settings.loanDays} días · Activos: ${active}`;

    const penaltyBox = UI.qs("penaltyBox");
    if(Loans.activePenalty(user)){
      penaltyBox.hidden = false;
      penaltyBox.className = "alert alert-danger mb-3";
      penaltyBox.textContent = "Tienes una penalización activa: no puedes pedir libros.";
    }else{
      penaltyBox.hidden = true;
    }

    let books = db.books.slice();
    if(q){
      books = books.filter(b =>
        (b.title||"").toLowerCase().includes(q) ||
        (b.author||"").toLowerCase().includes(q) ||
        String(b.year||"").includes(q) ||
        (b.isbn||"").toLowerCase().includes(q)
      );
    }

    books.forEach(b=>{
      const col = document.createElement("div");
      col.className = "col-12";
      const badge = b.copiesAvailable>0
        ? `<span class="badge badge-soft-success">Disponible ${b.copiesAvailable}/${b.copiesTotal}</span>`
        : `<span class="badge badge-soft-danger">Sin copias</span>`;

      col.innerHTML = `
        <div class="card p-3">
          <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
              <div class="fw-semibold fs-5">${UI.esc(b.title)}</div>
              <div class="small-muted">${UI.esc(b.author)} · ${b.year} · <span class="mono">ISBN ${UI.esc(b.isbn||"—")}</span></div>
            </div>
            <div class="d-flex align-items-center gap-2">
              ${badge}
              <button class="btn btn-primary">Ver detalle</button>
            </div>
          </div>
        </div>
      `;
      col.querySelector("button").addEventListener("click", ()=>location.href=`book.html?id=${encodeURIComponent(b.id)}`);
      list.appendChild(col);
    });

    if(!books.length){
      list.innerHTML = `<div class="col-12"><div class="alert alert-secondary mb-0">No hay resultados.</div></div>`;
    }
  }
});
