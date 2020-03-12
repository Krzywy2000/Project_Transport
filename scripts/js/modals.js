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
  var id = button.data('idvehiclex') 

  var modal = $(this)
  console.log(modal.find('.modal-body #id-detalis-vehicles'))
  modal.find('.modal-body #id-detalis-vehicles').attr("value",id)
  console.log(modal.find('.modal-body #id-detalis-vehicles').attr("value"))

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
  modal.find('.modal-body #idedit').attr("value", id)
  console.log(modal.find('.modal-body #idedit').attr("value"))
})
$('#modal-szczegoly2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idvehicle2') 
  console.log(id)

  var modal = $(this)
    console.log(modal.find('.modal-body #id-edycja-vehicles2'))
  modal.find('.modal-body #id-edycja-vehicles2').attr("value",id)
  console.log(modal.find('.modal-body #id-edycja-vehicles2').attr("value"))
  //.container-fluid .row
})
$('#modal-delete-vehicles').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('delete-vehicle') 
//delete-vehicle
//form-editor
  var modal = $(this)
    console.log(modal.find('.modal-body #id-edycja-vehicles2'))
  modal.find('.modal-body #id-edycja-vehicles2s').attr("value",id)
  console.log(modal.find('.modal-body #id-edycja-vehicles2').attr("value"))

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

$('#modal-workshop-edycja').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('workshop-edit') 
//delete-vehicle
//form-editor
  var modal = $(this)
    console.log(modal.find('.modal-body #edycja-workshop-edit'))
  modal.find('.modal-body #edycja-workshop-edit').attr("value",id)
  console.log(modal.find('.modal-body #edycja-workshop-edit').attr("value"))

})

$('#modal-workshop-delete').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('workshop-delete') 
//delete-vehicle
//form-editor
  var modal = $(this)
    console.log(modal.find('.modal-body #id-workshop-delete'))
  modal.find('.modal-body #id-workshop-delete').attr("value",id)
  console.log(modal.find('.modal-body #id-workshop-delete').attr("value"))

})
$('#modal-timetable-usun').on('show.bs.modal', function (event) {
	
  var button = $(event.relatedTarget) 
  var id = button.data('idusun') 

  var modal = $(this)
    console.log(modal.find('.modal-body #id-usun'))
  modal.find('.modal-body #id-usun').attr("value",id)
  console.log(modal.find('.modal-body #id-usun').attr("value"))

})