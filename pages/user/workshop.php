<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
		        $miasto = $_SESSION['access'];
    ?>
    <div class="container-fluid"><br/><br/>
        <H2 class="headline">Warsztat</H2>
        <div class="messages__bar__left">
            <form id="form">
                <input type="text" id="search" name="search" placeholder="Znajdź pojazd po nr tab."/>
            </form>
        </div>
        <div class="messages__bar">
                <button data-toggle="modal" data-target="#modal-add-vehicle">Dodaj pojazd/pojazdy</button>
        </div>
        <div id="result" class="result table-responsive">
            <?php
			if($_SESSION['access'] == 1)
			{
				$result_Bus="SELECT * FROM `workshop` inner join `vehicles` on `workshop`.`id_pojazdu`=`vehicles`.`id` where typ_pojazdu='Bus' ORDER BY `workshop`.`id`";	
				$result_Tram="SELECT * FROM `workshop` inner join `vehicles` on `workshop`.`id_pojazdu`=`vehicles`.`id` where typ_pojazdu='Tram' ORDER BY `workshop`.`id`";		
				$result_T="SELECT * FROM `workshop` inner join `vehicles` on `workshop`.`id_pojazdu`=`vehicles`.`id` where typ_pojazdu='t' ORDER BY `workshop`.`id`";		
			
			}
			else
			{
				$result_Bus="SELECT * FROM `workshop` inner join `vehicles` on `workshop`.`id_pojazdu`=`vehicles`.`id` where typ_pojazdu='Bus' and `workshop`.`miasto` like $miasto ORDER BY `workshop`.`id`";	
				$result_Tram="SELECT * FROM `workshop` inner join `vehicles` on `workshop`.`id_pojazdu`=`vehicles`.`id` where typ_pojazdu='Tram' and `workshop`.`miasto` like $miasto ORDER BY `workshop`.`id`";
				$result_T="SELECT * FROM `workshop` inner join `vehicles` on `workshop`.`id_pojazdu`=`vehicles`.`id` where typ_pojazdu='t' ORDER BY `workshop`.`id`";		
			
			}


			if ($result = @$connect->query($result_Bus))
				{
					echo "<table>
					<tr class='main'>
						<td colspan='11'><H2>Autobusy</H2></td>
					</tr>
					<tr class='main'>
						<td>id</td>
						<td>id_pojazdu</td>
						<td>powod</td>
						<td>data_roz</td>
						<td>data_zak</td>
						
					</tr>";
					$users = $result->num_rows;
					if($users>0)
					{

						while($row = $result->fetch_array())
						{
						  echo "<tr style='border-bottom:1pt solid black'>
							<td>".$row['id']."</td>
							<td>".$row['id_pojazdu']."</td>
							<td>".$row['powod']."</td>
							<td>".$row['data_roz']."</td>
							<td>".$row['data_zak']."</td>
							
							<td><button data-toggle='modal' data-target='#modal-workshop-edycja' data-workshop-edit='".$row['id']."'>Edytuj</button><br />
							<button data-toggle='modal' data-target='#modal-workshop-delete' data-workshop-delete='".$row['id']."'>Usuń pojazd</button>
							</td>
						  </tr>";
							
						}
					}

					echo "</table><br/>";
				}
			
			  if($result2 = @$connect->query("$result_Tram"))
			  {
				  echo "<table>
					  <tr class='main'>
						  <td colspan='10'><H2>Tramwaje</H2></td>
					  </tr>
					  <tr class='main'>
						<td>id</td>
						<td>id_pojazdu</td>
						<td>powod</td>
						<td>data_roz</td>
						<td>data_zak</td>
						
					  </tr>";
				  while($row2 = $result2->fetch_array())
				  {
					  echo "<tr style='border-bottom:1pt solid black'>
							<td>".$row['id']."</td>
							<td>".$row['id_pojazdu']."</td>
							<td>".$row['powod']."</td>
							<td>".$row['data_roz']."</td>
							<td>".$row['data_zak']."</td>
							
							  <td><button data-toggle='modal' data-target='#modal-workshop-edycja' data-workshop-edit='".$row['id']."'>Edytuj</button><br />
							  <button data-toggle='modal' data-target='#modal-workshop-delete' data-workshop-delete='".$row['id']."'>Usuń pojazd</button>
							  </td>
		  
					  </tr>";
				  }
				echo "</table>";
			  }
			  if($result2 = @$connect->query("$result_T"))
			  {
				  echo "<table>
					  <tr class='main'>
						  <td colspan='10'><H2>TROLEJBUSY</H2></td>
					  </tr>
					  <tr class='main'>
						<td>id</td>
						<td>id_pojazdu</td>
						<td>powod</td>
						<td>data_roz</td>
						<td>data_zak</td>
						
					  </tr>";
				  while($row2 = $result2->fetch_array())
				  {
					  echo "<tr style='border-bottom:1pt solid black'>
							<td>".$row['id']."</td>
							<td>".$row['id_pojazdu']."</td>
							<td>".$row['powod']."</td>
							<td>".$row['data_roz']."</td>
							<td>".$row['data_zak']."</td>
							
							  <td><button data-toggle='modal' data-target='#modal-workshop-edycja' data-workshop-edit='".$row['id']."'>Edytuj</button><br />
							  <button data-toggle='modal' data-target='#modal-workshop-delete' data-workshop-delete='".$row['id']."'>Usuń pojazd</button>
							  </td>
		  
					  </tr>";
				  }
				echo "</table>";
			  }
                    
                ?>    
        </div> 
    <br/><br/></div>
	
	<!---edytuj-->
	<div class="modal" id="modal-workshop-edycja" tabindex="10" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">edytuj</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
      <form action="scripts/php/workshop_editor.php" method="POST" id="form-workshop-editor">
<input type="hidden" id="edycja-workshop-edit" name="edycja_workshop_edit" value="">
			
powod				:<input type="text" name="edycja_workshop_powod"><br /><br/>
data_roz			:<input type="date" name="edycja_workshop_data_roz"><br /><br/>
data_zak			:<input type="date" name="edycja_workshop_data_zak"><br /><br/>
<br/>

      </form>

    </div>
    <div class="modal-footer">
	  		                


                            
      <br />
			<button form="form-workshop-editor" type="submit" class="btn btn-primary">Potwierdz</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
          </div>
        </div>
      </div>
    </div>
	<!---delete-->
	<div class="modal" id="modal-workshop-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">usun pojazd</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="scripts/php/delete-workshop.php" method="POST" id="form-workshop-delete">
		czy na pewno chcesz usunac ?
<input type="hidden" id="id-workshop-delete" name="id_workshop_delete" value="">
      </form>
    </div>
      <div class="modal-footer">

<br />
			<button form="form-workshop-delete" type="submit" class="btn btn-primary">Potwierdz</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
      </div>
    </div>
  </div>
</div>	
	
  <script src="scripts/js/time-js.js"></script>
  <script src="scripts/js/search.js"></script>
	<script src="scripts/js/modals.js"></script>
	
</main>