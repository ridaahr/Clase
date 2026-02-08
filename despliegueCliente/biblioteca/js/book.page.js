
document.addEventListener("DOMContentLoaded", ()=>{
  const user = Auth.requireAuth();
  if(!user) return;

  const id = UI.param("id");
  const db = DB.load();
  const book = db.books.find(b=>b.id===id);
  if(!book){ location.href="catalog.html"; return; }

  UI.qs("title").textContent = book.title;
  UI.qs("meta").textContent  = `${book.author} · ${book.year} · ISBN ${book.isbn||"—"}`;
  UI.qs("desc").textContent  = book.description || "—";

  UI.qs("avail").innerHTML = book.copiesAvailable>0
    ? `<span class="badge badge-soft-success">Disponible ${book.copiesAvailable}/${book.copiesTotal}</span>`
    : `<span class="badge badge-soft-danger">Sin copias</span>`;

  const act = Loans.activeLoans(db, user.id).length;
  UI.qs("rules").textContent = `Reglas: máx ${db.settings.maxLoansPerUser} libros · ${db.settings.loanDays} días · activos: ${act}`;

  const blocked = Loans.activePenalty(user) || act>=db.settings.maxLoansPerUser || book.copiesAvailable<=0;
  const btn = UI.qs("btnLoan");
  btn.disabled = blocked;

  btn.addEventListener("click", ()=>{
    const res = Loans.requestLoan(book.id);
    if(!res.ok){ UI.toast(res.msg,"danger"); return; }
    UI.toast("Préstamo solicitado.","success");
    setTimeout(()=>location.href="myloans.html", 400);
  });

  UI.qs("btnBack").addEventListener("click", ()=>history.back());
});
