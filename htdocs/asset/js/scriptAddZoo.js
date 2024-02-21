const form = document.querySelector('#form');
form.addEventListener('submit', async function (e) {
    e.preventDefault();
    const user_id = document.querySelector('#user_id').value
    const namezoo = document.querySelector('#namezoo').value
    const nameEmploye = document.querySelector('#nameEmploye').value
    const age = document.querySelector('#age').value
    const sexe = document.querySelector('#sexe').value

    let formData = new FormData()
    formData.append('user_id',user_id)
    formData.append('namezoo',namezoo)
    formData.append('nameEmploye', nameEmploye)
    formData.append('age', age)
    formData.append('sexe', sexe)

    const response = await fetch('./process/AddZooEmploye.php', {
        method: 'POST',
        body: formData
    })
    await getZoo()
    
    
    
})


async function getZoo() {
    const response = await fetch('./process/getZoo.php')
    const dataZoo = await response.json()
    console.log(dataZoo)
    const divList = document.querySelector('#divZoo')
    console.log(divList)
    divList.innerHTML = ''
    dataZoo.forEach(zoo => {
        divList.innerHTML += `
        <div class="cardList">
            <h4 class='mt-4 fw-medium text-white'>Nom du zoo: <span class='fw-light'>${zoo['zoo_name']}</span></h4>
            <h4 class='fw-medium text-white'>Nombre d'enclos: <span class='fw-light'>${zoo['nb_enclos']}</span></h4>
            <form action="./zoo.php" method="post">
                <input type="hidden" name ='zoo_id' value='${zoo['zoo_id']}'>
                <button type="submit" class='btn'>Choisir </button>
            </form>

        </div>
        `
    });
    
}
getZoo();