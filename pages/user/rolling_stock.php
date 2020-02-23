<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
		        $miasto = $_SESSION['access'];
    ?>
    <div class="container-fluid"><br/><br/>
        <H2 class="headline">Lista taboru</H2>
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
			$result_Bus="SELECT * FROM `vehicles` where `typ_pojazdu`='Bus' ORDER BY `numer_tab`";	
			$result_Tram="SELECT * FROM `vehicles` where `typ_pojazdu`='Tram' ORDER BY `numer_tab`";		
			}
			else
			{
			$result_Bus="SELECT * FROM `vehicles` where `typ_pojazdu`='Bus' and `miasto` like $miasto ORDER BY `numer_tab`";	
			$result_Tram="SELECT * FROM `vehicles` where `typ_pojazdu`='Tram' and `miasto` like $miasto ORDER BY `numer_tab`";
			}
			

                    if ($result = @$connect->query($result_Bus))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan='11'><H2>Autobusy</H2></td>
                            </tr>
                            <tr class='main'>
                                <td>Numer Taborowy</td>
								<td>typ taboru</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Uwagi</td>
                                <td>Ustawienia</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {

                                while($row = $result->fetch_array())
                                {
                                  echo "<tr style='border-bottom:1pt solid black'>
                                    <td>".$row['numer_tab']."</td>
									<td>".$row['typ_taboru']."</td>
                                    <td>".$row['marka']."</td>
                                    <td>".$row['model']."</td>
                                    <td>".$row['rocznik']."</td>
                                    <td>".$row['rok_wprowadzenia']."</td>
                                    <td>".$row['uklad_drzwi']."</td>
                                    <td>".$row['klimatyzacja']."</td>
                                    <td>".$row['biletomat']."</td>
                                    <td>".$row['uwagi']."</td>
                                    <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='".$row['id']."'>Edytuj</button><br />
                                    <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>Szczegóły</button><br />
									<button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='".$row['id']."'>Usuń pojazd</button>
									<button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."' data-idmiasto='".$miasto."'>Dodaj do warsztatu</button><br/>
                                    </td>
                                  </tr>";
									
                                }
                            }

                            echo "</table><br/>";
                        }
                    if($result2 = @$connect->query($result_Tram))
                    {
                        echo "<table>
                            <tr class='main'>
                                <td colspan='11'><H2>Tramwaje</H2></td>
                            </tr>
                            <tr class='main'>
                                <td>Numer Taborowy</td>
								<td>typ taboru</td>
                                <td>Marka</td>
                                <td>Model</td>
                                <td>Rocznik</td>
                                <td>Rok wprowadzenia</td>
                                <td>Układ drzwi</td>
                                <td>Klimatyzacja</td>
                                <td>Biletomat/Kasa</td>
                                <td>Uwagi</td>
                                <td>Ustawienia</td>
                            </tr>";
                        while($row2 = $result2->fetch_array())
                        {
                            echo "<tr style='border-bottom:1pt solid black'>
                                <td>".$row2['numer_tab']."</td>
								<td>".$row['typ_taboru']."</td>
                                <td>".$row2['marka']."</td>
                                <td>".$row2['model']."</td>
                                <td>".$row2['rocznik']."</td>
                                <td>".$row2['rok_wprowadzenia']."</td>
                                <td>".$row2['uklad_drzwi']."</td>
                                <td>".$row2['klimatyzacja']."</td>
                                <td>".$row2['biletomat']."</td>
                                <td>".$row2['uwagi']."</td>
                                    <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='".$row2['id']."'>Edytuj</button><br />
                                    <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row2['id']."'>Szczegóły</button><br />
									<button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='".$row2['id']."'>Usuń pojazd</button><br />
									<button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row2['id']."' data-idmiasto='".$miasto."'>Dodaj do warsztatu</button><br/>
                                    </td>
								
                            </tr>";
                        }
                      echo "</table>";
                    }
                
                ?>    
        </div> 
    <br/><br/></div>
	
	<!--workshop ------------------------------------------------------------------->
    <div class="modal" id="modal-workshop" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Dodawanie do warsztatu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
      <form action="scripts/php/add_to_work.php" method="POST" id="form-workshop">
          <input type="hidden" id="id-vehicles" name="id_vehicles" value="">
          powód:<textarea name="form_workshop_text"></textarea><br><br/>
          data poczatek:<input type="date" name="form_workshop_data_p"><br><br/>
          data koniec:<input type="date" name="form_workshop_data_k"><br><br/>
		  <input type="hidden" id="form-workshop-miasto" name="form_workshop_miasto"><br><br/>
      </form>

        </div>
          <div class="modal-footer">
          <button form="form-workshop" type="submit" class="btn btn-primary">Potwierdz</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
          </div>
        </div>
      </div>
    </div>
	<!-- detalis ------------------------------------------------------------------->
    <div class="modal" id="modal-szczegoly" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Szczegóły</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                    <?php
                      include("./scripts/php/detalis.php");
                      //$_SESSION('id_vehicles') = $id_vehicles['detalis-id'];
                    ?>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
	<!--edytuj ---------------------------------------------------------------------->
		<div class="modal" id="modal-edycja" tabindex="10" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">edytuj</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
      <form action="scripts/php/editor.php" method="POST" id="form-editor">
<input type="hidden" id="id-edycja-vehicles" name="id_edycja_vehicles" value="">
			
typ_pojazdu			:<select name="edycja_vehicle_type"><option value='Bus'>Bus</option><option value='Tram'>Tram</option></select><br /><br/>
miasto				:<input type="text" name="edycja_vehicle_Miasto"/><br /><br/>
marka				:<input type="text" name="edycja_vehicle_marka"><br /><br/>
model				:<input type="text" name="edycja_vehicle_model"><br /><br/>
uklad_drzwi			:<input type="text" name="edycja_vehicle_drzwi"><br /><br/>
rocznik				:<input type="year" name="edycja_vehicle_rocznik"><br /><br/>
rok_wprowadzenia	:<input type="year" name="edycja_vehicle_rok"><br /><br/>
klimatyzacja		:<select name="edycja_vehicle_klimatyzacja"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
biletomat			:<SELECT name="edycja_vehicle_biletomat"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
numer_tab:			:<input type="number" name="edycja_vehicle_numer"><br /><br/>
typ_taboru:			:<select name="edycja_vehicle_typ_taboru">	
		<option value='MINI'>MINI</option>	
		<option value='MAXI'>MAXI</option>
		<option value='MEGA'>MEGA</option>	
		<option value='Wagon'>Wagon</option>
		<option value='Skład'>Skład</option></SELECT><br /><br/>
uwagi				:<input type="text" name="edycja_vehicle_uwagi"><br /><br/>
<!--id_workshop
w warsztacie:		:<input type="text" name="edycja_vehicle_workshop"><br /><br/>
id_timetable
rozklad:			:<input type="text" name="edycja_vehicle_timetable"><br /><br/>
-->
      </form>

    </div>
    <div class="modal-footer">
	  		                


                            
      <br />
			<button form="form-editor" type="submit" class="btn btn-primary">Potwierdz</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
          </div>
        </div>
      </div>
    </div>
	<!--dodaj pojazd ------------------------------------------------------------------->
			<div class="modal" id="modal-add-vehicle" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Dodaj pojazd</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="scripts/php/add_to_stock.php" method="POST" id="form-add-to-stock">
		<!--id-->	
typ_pojazdu			:<select name="add_vehicle_type"><option value='Bus'>Bus</option><option value='Tram'>Tram</option></select><br /><br/>
miasto				:<input type="text" name="add_vehicle_miasto"/><br /><br/>
marka				:<input type="text" name="add_vehicle_marka"><br /><br/>
model				:<input type="text" name="add_vehicle_model"><br /><br/>
uklad_drzwi			:<input type="text" name="add_vehicle_drzwi"><br /><br/>
rocznik				:<input type="year" name="add_vehicle_rocznik"><br /><br/>
rok_wprowadzenia	:<input type="year" name="add_vehicle_rok"><br /><br/>
klimatyzacja		:<select name="add_vehicle_klimatyzacja"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
biletomat			:<SELECT name="add_vehicle_biletomat"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
numer_taborowy		:<input type="number" name="add_vehicle_numer"><br /><br/>
typ_taboru:			:<select name="add_vehicle_typ_taboru">	
					<option value='MINI'>MINI</option>	
					<option value='MAXI'>MAXI</option>
					<option value='MEGA'>MEGA</option>	
					<option value='Wagon'>Wagon</option>
					<option value='Skład'>Skład</option></SELECT><br /><br/>
uwagi				:<input type="text" name="add_vehicle_uwagi"><br /><br/>
<!--id_workshop-->
<!--id_timetable-->

      </form>
    </div>
      <div class="modal-footer">

<br />
			<button form="form-add-to-stock" type="submit" class="btn btn-primary">Potwierdz</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
      </div>
    </div>
  </div>
</div>
	<!--delete---------------------------------------------------------------------------->
	<div class="modal" id="modal-delete-vehicles" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">usun pojazd</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="scripts/php/delete-from-stock.php" method="POST" id="form-delete-from-stock">
		czy na pewno chcesz usunac ?
<input type="hidden" id="id-delete-vehicles" name="id_delete_vehicles" value="">
      </form>
    </div>
      <div class="modal-footer">

<br />
			<button form="form-delete-from-stock" type="submit" class="btn btn-primary">Potwierdz</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
      </div>
    </div>
  </div>
</div>	

	
	
  <script src="scripts/js/time-js.js"></script>
  <script src="scripts/js/search.js"></script>
	<script src="scripts/js/modals.js"></script>
	
</main>