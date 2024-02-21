const form = document.querySelector('#form');
form.addEventListener('submit', async function (event) {
    event.preventDefault()
    const espece = document.querySelector('#espece').value 
    const enclos_id = document.querySelector('#enclos_id').value
    const nameAni = document.querySelector('#nameAni').value 
    let formData = new FormData()
    formData.append('name',nameAni)
    formData.append('espece',espece)
    formData.append('enclos_id',enclos_id)
    const response = await fetch('./process/AddAnimal.php',{
        method: 'POST',
        body: formData
    })
       getAnimals();

       if (response.ok) {
           const data = await response.json();
           console.log(data);
       }
})



async function getAnimals() {
    const enclos_id2 = document.querySelector('#enclos_id').value
    formData2 = new FormData()
    formData2.append('id', enclos_id2)
    const response2 = await fetch('./process/getAnimals.php',{
        method:'POST',
        body:formData2
    })
    let data2 = await response2.json()

    console.log(data2)
    const divli = document.querySelector('#liAni')
    divli.innerHTML =''
    data2.forEach(animal => {
        if (animal["sante"]=== 1) {
            let maladie = 'Parfaite santé'

        }else{
            let maladie = 'Malade de fou'
        }
        divli.innerHTML +=`
        <div class="card b-radius rounded-4 m-3 p-3" style="width: 18rem;">
        <img src="./image/${animal['espece']}.png" class="card-img-top text-center" alt="...">
        <div class="card-body text-white">
            <h5 class="text-white">${animal['name']}</h5>
            <ul>
                <li id='ajaaxFaim'>
                    Faim :
                    
                    <div class="progress " role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger progressEat" name='p' style="width: ${animal['faim']}%"></div>
                    </div>
                    <form action="./process/addFaim.php" method="post" class="m-2 formManger" '>
                    <input type="hidden" class='ani_id' name="ani_id" value='${animal['id']}'>
                        <button type="submit" class="btn-card">Nourir</button>

                    </form>
                </li>
                <li class="mb-2">
                    Fatigue :
                    <div class="progress " role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar ajaxFatigue" style="width: ${animal['fatigue']}%"></div>
                    </div>
                    <form action="./process/repos.php" method="post" class="m-2">
                    <input type="hidden" id='ani_id' name="ani_id" value='${animal['id']}'>
                        <button type="submit" class="btn-card">RedBull</button>

                    </form>
                </li>
                <li class="mb-2">
                    Maladie :
                    

                    <form action="./process/nourir.php" method="post">
                        <input type="hidden" name="ani_id" value='${animal['id']}'>
                        <button type="submit" class="btn-card">Soigné</button>

                    </form>
                </li>

                <li class="mb-2">
                    Poids : ${animal['poids']}
                </li>

                <li class="mb-2">
                    Taille : ${animal['taille']}cm
                </li>
        </div>
        </ul>
    </div>
        
    `});
    
}

getAnimals()
setInterval(() => {
}, 5000);
setInterval(() => {

}, 4000);