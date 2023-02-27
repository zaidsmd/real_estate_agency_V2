let url = window.location.search.match(/\d/)[0] ;
document.querySelector('.settings button').addEventListener('click',e=>{
    e.target.classList.toggle("rotate");
    fetch("dataapi.php?id=" + url)
        .then(async (response) => {
            Array = await response.json();
            return Array
        }).then(Array => {
           document.querySelector('#country').value = Array[0]["country"];
           document.querySelector('#title').value = Array[0]["title"];
           document.querySelector('#price_modal').value = Array[0]["price"];
           document.querySelector('#area').value = Array[0]["area"];
           document.querySelector('#adresse').value = Array[0]["adresse"];
           document.querySelector('#type_modal').value = Array[0]["type"];
           document.querySelector('#category_select').value = Array[0]["category"];
           document.querySelector('#description_modal').value = Array[0]["description"];
           return Array
    }).then(Array=>{
        fetch("api.php?id=" + document.querySelector("#country").value+"&fetch=true")
            .then(async (response) => {
                Array1 = await response.json();
                return Array1
            }).then(Array1 => {
            Array1.forEach(city => {
                let option = document.createElement("option");
                option.value = city["name"];
                option.append(city["name"]);
                document.querySelector("#city_modal").append(option);
            })
            document.querySelector('#city_modal').value = Array[0]["city"];
            })
    })

})
document.querySelector('.settings button').addEventListener('blur',e=>{
    e.target.style.transform="rotate(0)"
})