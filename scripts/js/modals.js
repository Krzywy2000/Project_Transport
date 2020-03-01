$('#modal-workshop').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('idvehicle') // Extract info from data-* attributes
  var id_miasto=button.data('idmiasto')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  console.log(modal.find('.modal-body #id-vehicles'))
  modal.find('.modal-body #id-vehicles').attr("value",id)
  console.log(modal.find('.modal-body #id-vehicles').attr("value"))
    modal.find('.modal-body #form-workshop-miasto').attr("value",id_miasto)
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
$('#modal-edit-timetable').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('idedit') 
  console.log(id)

  var modal = $(this)
    console.log(modal.find('.modal-body #idedit'))
  modal.find('.modal-body .container-fluid .row #idedit').attr("value",id)
  console.log(modal.find('.modal-body #idedit').attr("value"))
})
$('#modal-more-timetable').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('idmore') 
  console.log(id)

  var modal = $(this)
    console.log(modal.find('.modal-body #idmore'))
  modal.find('.modal-body .container-fluid .row #idmore').attr("value",id)
  console.log(modal.find('.modal-body #idmore').attr("value"))
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