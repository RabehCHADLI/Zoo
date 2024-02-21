async function select(){

    let eats = document.querySelectorAll(".formManger")
    eats.forEach(eat => {
        eat.addEventListener("submit", async function(event){
            event.preventDefault()
            // const ani_id = eat.querySelector(".ani_id").value
             inputEat = event.target.children[0].value

            let formData = new FormData()
            formData.append('ani_id', inputEat)

            fetch('./process/addFaim.php', {
                method: 'POST',
                body: formData
            }).then((response) => {
                return response.text()
            }).then((data) => {
                const progressBars = document.querySelectorAll('.progressEat')
            })
        })
        
    });
}
            
            





setTimeout(() => {
    select()
}, 500);
// UPDATE animaux SET faim = 100, fatigue = 100;