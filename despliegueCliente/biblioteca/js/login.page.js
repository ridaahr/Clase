
document.addEventListener("DOMContentLoaded", ()=>{
  DB.ensure();
  if(Auth.currentUser()) window.location.href="catalog.html";

  const form = UI.qs("loginForm");
  form.addEventListener("submit",(e)=>{
    e.preventDefault();
    const email = UI.qs("email").value.trim();
    const pass  = UI.qs("password").value;
    const res = Auth.login(email, pass);
    if(!res.ok){ UI.toast(res.msg, "danger"); return; }
    window.location.href = (res.user.role==="admin") ? "admin.html" : "catalog.html";
  });
});
