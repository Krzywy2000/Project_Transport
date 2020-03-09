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
			$result_Bus="SELECT * FROM `vehicles` where id_workshop='0' and `typ_pojazdu`='Bus' ORDER BY `numer_tab`";	
			$result_Tram="SELECT * FROM `vehicles` where id_workshop='0' and `typ_pojazdu`='Tram' ORDER BY `numer_tab`";		
			}
			else
			{
			$result_Bus="SELECT * FROM `vehicles` where id_workshop='0' or id_workshop='NULL' and  `typ_pojazdu`='Bus' and `miasto` like $miasto ORDER BY `numer_tab`";	
			$result_Tram="SELECT * FROM `vehicles` where id_workshop='0' or id_workshop='NULL' and `typ_pojazdu`='Tram' and `miasto` like $miasto ORDER BY `numer_tab`";
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
                                    <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='".$row['id']."'>szczegóły</button><br />
                                    <button data-toggle='modal' data-target='#modal-workshop' data-idmiasto='".$row['miasto']."' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                                    <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='".$row['id']."'>Usuń pojazd</button>
                                    </td>
                                  </tr>";
									
                                }
                            }

                            echo "</table><br/>";
                        }
                    if($_SESSION['access'] == '4')
                    {
                      if($result2 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='TROL' and miasto='$_SESSION[access]' ORDER BY `numer_tab`"))
                      {
                          echo "<table>
                              <tr class='main'>
                                  <td colspan='10'><H2>Trolejbusy</H2></td>
                              </tr>
                              <tr class='main'>
                                  <td>Numer Taborowy</td>
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
                                  <td>".$row2['marka']."</td>
                                  <td>".$row2['model']."</td>
                                  <td>".$row2['rocznik']."</td>
                                  <td>".$row2['rok_wprowadzenia']."</td>
                                  <td>".$row2['uklad_drzwi']."</td>
                                  <td>".$row2['klimatyzacja']."</td>
                                  <td>".$row2['biletomat']."</td>
                                  <td>".$row2['uwagi']."</td>
                                      <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='".$row['id']."'>Edytuj</button><br />
                                      <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='".$row['id']."'>szczegóły</button><br />
                                      <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                                      <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='".$row['id']."'>Usuń pojazd</button>
                                      </td>
                  
                              </tr>";
                          }
                        echo "</table>";
                      }
                    } else {
                      if($result2 = @$connect->query("SELECT * FROM `vehicles` where typ_pojazdu='TRAM' and miasto='$_SESSION[access]' ORDER BY `numer_tab`"))
                      {
                          echo "<table>
                              <tr class='main'>
                                  <td colspan='10'><H2>Tramwaje</H2></td>
                              </tr>
                              <tr class='main'>
                                  <td>Numer Taborowy</td>
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
                                  <td>".$row2['marka']."</td>
                                  <td>".$row2['model']."</td>
                                  <td>".$row2['rocznik']."</td>
                                  <td>".$row2['rok_wprowadzenia']."</td>
                                  <td>".$row2['uklad_drzwi']."</td>
                                  <td>".$row2['klimatyzacja']."</td>
                                  <td>".$row2['biletomat']."</td>
                                  <td>".$row2['uwagi']."</td>
                                      <td><button data-toggle='modal' data-target='#modal-edycja' data-edycja-vehicle='".$row['id']."'>Edytuj</button><br />
                                      <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehiclex='".$row['id']."'>szczegóły</button><br />
                                      <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button><br/>
                                      <button data-toggle='modal' data-target='#modal-delete-vehicles' data-delete-vehicle='".$row['id']."'>Usuń pojazd</button>
                                      </td>
                  
                              </tr>";
                          }
                        echo "</table>";
                      }
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
		        <form action="scripts/php/editor.php" method="POST" id="form-11">
<input type="hidden" id="id-detalis-vehicles" name="id_detalis_vehicles" value="">

    </form>
                 

                 
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
			
Typ pojazdu			:<select name="edycja_vehicle_type"><option value='Bus'>Bus</option><option value='Tram'>Tram</option></select><br /><br/>
Marka				:<input type="text" name="edycja_vehicle_marka"><br /><br/>
Model				:<input type="text" name="edycja_vehicle_model"><br /><br/>
Uklad drzwi			:<input type="text" name="edycja_vehicle_drzwi"><br /><br/>
Rocznik				:<input type="year" name="edycja_vehicle_rocznik"><br /><br/>
Rok wprowadzenia	:<input type="year" name="edycja_vehicle_rok"><br /><br/>
Klimatyzacja		:<select name="edycja_vehicle_klimatyzacja"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
Biletomat			:<SELECT name="edycja_vehicle_biletomat"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
Niska podłoga: <select name="edycja_vehicle_podloga">
<option value='TAK'>TAK</option>
<option value='NIE'>NIE</option>
</select><br/>
Numer tab:			:<input type="number" name="edycja_vehicle_numer"><br /><br/>
Typ taboru:			:<select name="edycja_vehicle_typ_taboru">	
		<option value='MINI'>MINI</option>	
		<option value='MAXI'>MAXI</option>
		<option value='MEGA'>MEGA</option>	
		<option value='Wagon'>Wagon</option>
		<option value='Skład'>Skład</option></SELECT><br /><br/>
Uwagi				:<input type="text" name="edycja_vehicle_uwagi"><br /><br/>
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
Typ pojazdu			:<select name="add_vehicle_type"><option value='Bus'>Bus</option><option value='Tram'>Tram</option></select><br /><br/>
Marka				:<input type="text" name="add_vehicle_marka"><br /><br/>
Model				:<input type="text" name="add_vehicle_model"><br /><br/>
Układ drzwi			:<input type="text" name="add_vehicle_drzwi"><br /><br/>
Rocznik				:<input type="year" name="add_vehicle_rocznik"><br /><br/>
Rok wprowadzenia	:<input type="year" name="add_vehicle_rok"><br /><br/>
Klimatyzacja		:<select name="add_vehicle_klimatyzacja"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
Biletomat			:<SELECT name="add_vehicle_biletomat"><option value='TAK'>TAK</option><option value='NIE'>NIE</option></select><br /><br/>
Niska podłoga: <select name="add_vehicle_podloga">
<option value='TAK'>TAK</option>
<option value='NIE'>NIE</option>
</select><br/>
Numer taborowy		:<input type="number" name="add_vehicle_numer"><br /><br/>
Typ taboru:			:<select name="add_vehicle_typ_taboru">	
					<option value='MINI'>MINI</option>	
					<option value='MAXI'>MAXI</option>
					<option value='MEGA'>MEGA</option>	
					<option value='Wagon'>Wagon</option>
					<option value='Skład'>Skład</option></SELECT><br /><br/>
Uwagi				:<input type="text" name="add_vehicle_uwagi"><br /><br/>
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