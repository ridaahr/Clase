async function obtenerPokemons(nombre) {
    try {
        let response = await fetch("https://pokeapi.co/api/v2/pokemon?offset=0&limit=1350");
        let pokemons = await response.json();
        let encontrado = false;
        console.log(pokemons);
        for (let i = 0; i < pokemons["results"].length; i++) {
            if (pokemons["results"][i]["name"] == nombre) {
                return pokemons["results"][i]["url"];
            }
        }
        if (encontrado == false) {
            return "No se ha encontrado";
        }
        
    } catch (error) {
        return error;
    }
}

async function obtenerUrl(pokemon) {
    try {
        let valor = await pokemon;
        console.log(valor);
        async function info() {
            try {
                let response = await fetch(valor);
                let info = await response.json();
                console.log(info);
                const div = document.createElement("div");
                const name = document.createElement("p");
                const type = document.createElement("p");
                const img = document.createElement("img");
                name.textContent = "Nombre: " + buscar.value;
                for (let i = 0; i < info["types"].length; i++) {
                    type.textContent += "Tipo: " + info["types"][i]["type"]["name"] + ". ";
                }
                let imgUrl = (info["sprites"]["front_default"]);
                img.setAttribute("src", imgUrl);
                div.appendChild(name);
                div.appendChild(type);
                div.appendChild(img);
                document.body.appendChild(div);
            } catch (error) {
                return error;
            }
        }
        info();
    } catch (error) {
        console.log(error);
        return error;
    }
}



let buscar = document.getElementById("buscar");
let boton = document.getElementById("boton");
boton.addEventListener("click", () => {
    let pokemon = obtenerPokemons(buscar.value);
    obtenerUrl(pokemon);

    //let data = info();
    //console.log(data);
})





boton.addEventListener("click", (e) => {
            for (let i = 0; i < animales.length; i++) {
                const boton2 = document.createElement("button");
                boton2.textContent = animales[i]["name"];
                div.appendChild(boton)
                console.log(animales[i]["name"]);
                boton2.addEventListener("click", (e) => {
                    const ul = document.createElement("ul");
                    const liName = document.createElement("li");
                    liName.textContent = animales[i]["name"];
                    const liClass = document.createElement("li");
                    liClass.textContent = animales[i]["taxonomy"]["class"];
                    const liOrder = document.createElement("li");
                    liOrder.textContent = animales[i]["taxonomy"]["class"];
                    const liFamily = document.createElement("li");
                    liFamily.textContent = animales[i]["taxonomy"]["class"];
                    info.appendChild(ul);
                });
            }
        })