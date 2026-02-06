
(function(){
  function activePenalty(user){
    const t=DB.today();
    return (user.penalties||[]).some(p=>p.until>=t);
  }
  function activeLoans(db,userId){
    return db.loans.filter(l=>l.userId===userId && l.status==="active");
  }
  function requestLoan(bookId){
    const db=DB.load(); const user=Auth.currentUser();
    if(!user) return {ok:false,msg:"Sin sesión"};
    if(activePenalty(user)) return {ok:false,msg:"Tienes penalización activa. No puedes pedir libros."};
    if(activeLoans(db,user.id).length>=db.settings.maxLoansPerUser) return {ok:false,msg:"Has alcanzado el máximo de préstamos."};
    const book=db.books.find(b=>b.id===bookId);
    if(!book) return {ok:false,msg:"Libro no encontrado"};
    if(book.copiesAvailable<=0) return {ok:false,msg:"No hay copias disponibles"};
    const today=DB.today();
    db.loans.push({id:DB.uid("l_"), userId:user.id, bookId, loanDate:today, dueDate:DB.addDays(today, db.settings.loanDays), returnDate:null, status:"active"});
    book.copiesAvailable-=1; book.loanCount=(book.loanCount||0)+1;
    DB.save(db); return {ok:true};
  }
  function returnLoan(loanId){
    const db=DB.load(); const user=Auth.currentUser();
    const loan=db.loans.find(l=>l.id===loanId);
    if(!loan || loan.userId!==user.id) return {ok:false,msg:"Préstamo no encontrado"};
    if(loan.status!=="active") return {ok:false,msg:"Ese préstamo ya está devuelto"};
    const today=DB.today();
    loan.status="returned"; loan.returnDate=today;
    const book=db.books.find(b=>b.id===loan.bookId);
    if(book) book.copiesAvailable=Math.min(book.copiesTotal, book.copiesAvailable+1);
    if(today>loan.dueDate){
      const daysLate=DB.daysBetween(loan.dueDate,today);
      const until=DB.addDays(today, db.settings.penaltyDaysForLate);
      const u=db.users.find(x=>x.id===user.id);
      u.penalties=u.penalties||[]; u.penalties.push({id:DB.uid("p_"), reason:`Retraso (${daysLate} días)`, until});
      u.stats=u.stats||{lateCount:0}; u.stats.lateCount=(u.stats.lateCount||0)+1;
    }
    DB.save(db); return {ok:true};
  }
  window.Loans={activePenalty,activeLoans,requestLoan,returnLoan};
})();
