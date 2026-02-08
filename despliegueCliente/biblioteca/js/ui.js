
(function(){
  function qs(id){ return document.getElementById(id); }
  function qsa(sel){ return Array.from(document.querySelectorAll(sel)); }
  function param(name){ return new URL(window.location.href).searchParams.get(name); }
  function esc(s){ return String(s).replace(/[&<>"']/g,c=>({ "&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#039;" }[c])); }
  function toast(msg, type){
    const el = qs("toast");
    if(!el){ alert(msg); return; }
    el.className = "alert alert-" + (type||"secondary") + " d-flex align-items-center gap-2";
    el.innerHTML = `<span>${esc(msg)}</span>`;
    el.hidden = false;
    clearTimeout(el._t);
    el._t = setTimeout(()=> el.hidden = true, 2600);
  }
  window.UI={qs,qsa,param,esc,toast};
})();
