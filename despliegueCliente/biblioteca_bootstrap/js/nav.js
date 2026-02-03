
// nav.js - rellena navbar y engancha botones (se usa en todas las páginas excepto login)
document.addEventListener("DOMContentLoaded", ()=>{
  DB.ensure();
  const user = Auth.requireAuth();
  if(!user) return;

  const nameEl = UI.qs("navUserName");
  const roleEl = UI.qs("navUserRole");
  if(nameEl) nameEl.textContent = user.name;
  if(roleEl) roleEl.textContent = user.role;

  const btnCatalog = UI.qs("btnCatalog");
  const btnLoans   = UI.qs("btnMyLoans");
  const btnAdmin   = UI.qs("btnAdmin");
  const btnLogout  = UI.qs("btnLogout");

  if(btnCatalog) btnCatalog.addEventListener("click", ()=>location.href="catalog.html");
  if(btnLoans)   btnLoans.addEventListener("click", ()=>location.href="myloans.html");
  if(btnLogout)  btnLogout.addEventListener("click", Auth.logout);

  if(btnAdmin){
    btnAdmin.hidden = (user.role!=="admin");
    btnAdmin.addEventListener("click", ()=>location.href="admin.html");
  }
});
