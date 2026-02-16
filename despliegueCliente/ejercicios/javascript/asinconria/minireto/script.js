async function obtenerLibros() {
    try {
        const response = await fetch('https://stephen-king-api.onrender.com/api/books');
        const books = await response.json();
        const table = document.getElementById('books');
        let trHeader = document.createElement('tr');
        let th = document.createElement('th'); 
        th.textContent = "Título";
        let thYear = document.createElement('th'); 
        thYear.textContent = "Año";
        trHeader.appendChild(th);
        trHeader.appendChild(thYear);
        table.appendChild(trHeader);
        for (let i = 0; i < books['data'].length; i++) {
            let tr = document.createElement('tr');
            let tdTitle = document.createElement('td');
            tdTitle.textContent = books['data'][i]['Title'];
            tr.appendChild(tdTitle);
            let tdYear = document.createElement('td');
            tdYear.textContent = books['data'][i]['Year'];
            tr.appendChild(tdYear);
            table.appendChild(tr);
            console.log(books['data'][i]['Title']);
        }
        //console.log(books);
        //console.log(books['data'][0]['Title']);
    } catch (e) {
        console.log(e);
    }
}
obtenerLibros();