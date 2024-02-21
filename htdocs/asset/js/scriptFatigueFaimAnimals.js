async function SetFatigueEtFaim() {
  let zoo_id = document.querySelector('#zoo_id').value 
  let formData = new FormData()
  formData.append('zoo_id', zoo_id)
  const response = await fetch('./process/updateFaimFatigueAjax.php', {
    method:'POST',
    body: formData
  })
  const data = await response.text()
}
setInterval(() => {
  SetFatigueEtFaim()
}, 7000);

// async function enclosPropre()
// {
//   Math.floor(Math.random() * 10);
// }
    
