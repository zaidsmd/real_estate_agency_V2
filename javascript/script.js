document.querySelector("#country").addEventListener("change", () => {
    document.querySelector("#city_modal").innerHTML =" <option value=\"0\" selected disabled>Ville</option>";

    fetch("php/api.php?id=" + document.querySelector("#country").value)
        .then(async (response) => {
            Array = await response.json();
            return Array
        }).then(Array => {
        Array.forEach(city => {
            let option = document.createElement("option");
            option.value = city["name"];
            option.append(city["name"]);
            document.querySelector("#city_modal").append(option);
        })
    })

})
