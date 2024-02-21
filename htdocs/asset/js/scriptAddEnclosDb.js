const form = document.querySelector('#formEnclos');
form.addEventListener('submit', async function (event) {
    event.preventDefault();
    const zoo_id = document.querySelector('#zoo_id').value
    const type_enclos = document.querySelector('#typeEnclos').value
    const espece_enclos = document.querySelector('#espece').value

    let formData = new FormData()
    formData.append('zoo_id', zoo_id)
    formData.append('enclos_type', type_enclos)
    formData.append('espece', espece_enclos)

    const response = await fetch('./process/add_enclos.php', {
        method: 'POST',
        body: formData
    })
    getEnclos();
})




async function getEnclos() {
    const zoo_id2 = document.querySelector('#zoo_id').value
    let formData2 = new FormData()
    formData2.append('zoo_id', zoo_id2)

    const response = await fetch('./process/getEnclos.php', {
        method: 'POST',
        body: formData2
    })
    const dataEnclos = await response.json()
    console.log(dataEnclos);
    let nb_enclos = dataEnclos.length
    if (nb_enclos >= 3) {
        const divform = document.querySelector('#divform')
        divform.innerHTML = ''
    }
    const listEnclos = document.querySelector('#listEnclos')
    listEnclos.innerHTML = ''
    dataEnclos.forEach(enclos => {
        listEnclos.innerHTML += `

        <div class="col-6 cardAddZoo">
            <h3 class='mt-5'>Type d'enclos : ${enclos['enclos_type']}</h3>
            <h3 class='mt-5'>Espece : ${enclos['espece_animal']}</h3>
            <h3 class='mt-5'>Etat : ${enclos["propreté"]}</h3>
            
            <h3 class='mt-5'>Nombre d'animaux :${enclos['nb_animaux']} </h3>
            <form action="./enclos.php" method="post" class='mt-2 mb-1'>
                    <input type="hidden" id='enclos_id' name="enclos_id" value='${enclos['id']}'>
               
                    <input type="hidden" name="zoo_id" value="${enclos['zoo_id']}">
                    <button type="submit" class='btn'>Choisir</button>
                </form>
                <form action="./process/del_enclos.php" method="post" id='formDelEnclos'>
                    <input type="hidden" id='enclos_id_del' name="enclos_id_del" value="${enclos['id']}">
                    <button class='btn' type="submit">Détruire</button>
                </form>
                
        </div>
    </div>
</div>
    `
    });
}
getEnclos();






