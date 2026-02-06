
(function(){
  const KEY="BIBLIOTECA_DB_V1";
  function today(){ return new Date().toISOString().slice(0,10); }
  function addDays(iso, days){ const d=new Date(iso+"T00:00:00"); d.setDate(d.getDate()+days); return d.toISOString().slice(0,10); }
  function daysBetween(aISO,bISO){ const a=new Date(aISO+"T00:00:00"); const b=new Date(bISO+"T00:00:00"); return Math.round((b-a)/(1000*60*60*24)); }
  function uid(p){ return p+Math.random().toString(16).slice(2,8)+Date.now().toString(16).slice(-4); }
  function load(){ const raw=localStorage.getItem(KEY); if(!raw) return null; try{return JSON.parse(raw);}catch{return null;} }
  function save(db){ localStorage.setItem(KEY, JSON.stringify(db)); }
  function ensure(){
    if(load()) return;
    const db={
      settings:{ maxLoansPerUser:3, loanDays:14, penaltyDaysForLate:7 },
      users:[{id:"admin", name:"Administrador", email:"admin@biblioteca.local", password:"admin", role:"admin", penalties:[], stats:{lateCount:0}}],
      books:[
        {id:"b1", title:"1984", author:"George Orwell", year:1949, isbn:"9780451524935", description:"Distopía sobre vigilancia y control.", copiesTotal:3, copiesAvailable:3, loanCount:0},
        {id:"b2", title:"Dune", author:"Frank Herbert", year:1965, isbn:"9780441013593", description:"Ciencia ficción épica en Arrakis.", copiesTotal:2, copiesAvailable:2, loanCount:0},
        {id:"b3", title:"Clean Code", author:"Robert C. Martin", year:2008, isbn:"9780132350884", description:"Buenas prácticas para código mantenible.", copiesTotal:2, copiesAvailable:2, loanCount:0},
        {id:"b4", title:"El nombre del viento", author:"Patrick Rothfuss", year:2007, isbn:"9788401352836", description:"Fantasía: la historia de Kvothe.", copiesTotal:2, copiesAvailable:2, loanCount:0},
      ],
      loans:[]
    };
    save(db);
  }
  window.DB={KEY,today,addDays,daysBetween,uid,load,save,ensure};
})();
