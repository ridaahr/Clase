
(function(){
  const SESSION="BIBLIOTECA_SESSION_USER";
  function sessionId(){ return localStorage.getItem(SESSION); }
  function setSession(id){ localStorage.setItem(SESSION,id); }
  function clearSession(){ localStorage.removeItem(SESSION); }
  function currentUser(){
    const db=DB.load(); if(!db) return null;
    const id=sessionId(); if(!id) return null;
    return db.users.find(u=>u.id===id) || null;
  }
  function login(email, password){
    const db=DB.load();
    const u=db.users.find(x=>x.email.toLowerCase()===email.toLowerCase());
    if(!u) return {ok:false,msg:"Usuario no encontrado"};
    if(u.password!==password) return {ok:false,msg:"Contraseña incorrecta"};
    setSession(u.id); return {ok:true,user:u};
  }
  function logout(){ clearSession(); window.location.href="login.html"; }
  function requireAuth(){ const u=currentUser(); if(!u) window.location.href="login.html"; return u; }
  function requireAdmin(){ const u=requireAuth(); if(!u) return null; if(u.role!=="admin") window.location.href="catalog.html"; return u; }
  window.Auth={currentUser,login,logout,requireAuth,requireAdmin};
})();
