
   let btn = document.querySelector('btn')
let select = document.querySelector('select')

select.addEventListener('change', function (e) {
  e.preventDefault()
  var sistema = getUrl()
  alert(sistema);
  /* Para obtener el texto 
  var select = document.getElementById('search_nivel')

  location.href = sistema + 'buscar_nivel.php?grado=' + select.value*/
  
}) 



function getUrl() {
  var loc = window.location
  var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1)
  return loc.href.substring(
    0,
    loc.href.length -
      ((loc.pathname + loc.search + loc.hash).length - pathName.length),
  )
}
