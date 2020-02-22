$('#modal-workshop').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('idvehicle') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  console.log(modal.find('.modal-body #id-vehicles'))
  modal.find('.modal-body #id-vehicles').attr("value",id)
  console.log(modal.find('.modal-body #id-vehicles').attr("value"))
})

$('#modal-edycja').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('edycja-vehicle') 
//edycja-vehicle
//form-editor
  var modal = $(this)
    console.log(modal.find('.modal-body #id-edycja-vehicles'))
  modal.find('.modal-body #id-edycja-vehicles').attr("value",id)
  console.log(modal.find('.modal-body #id-edycja-vehicles').attr("value"))

})
$('#modal-szczegoly').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('idvehicle') 

  var modal = $(this)

})
$('#modal-add-vehicle').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
 
   var add = button.data('form-add-to-stock')


  var modal = $(this)

})
$('#modal-add-timetable').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('idvehicle') 

  var modal = $(this)

})
$('#modal-delete-vehicles').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('delete-vehicle') 
//delete-vehicle
//form-editor
  var modal = $(this)
    console.log(modal.find('.modal-body #id-delete-vehicles'))
  modal.find('.modal-body #id-delete-vehicles').attr("value",id)
  console.log(modal.find('.modal-body #id-delete-vehicles').attr("value"))

})