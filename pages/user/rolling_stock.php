<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
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
        <div id="result" class="result">
            <?php
                if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * FROM `vehicles` where type='bus' ORDER BY `Numer_tab`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td colspan='10'><H2>Autobusy</H2></td>
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
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                  echo "<tr style='border-bottom:1pt solid black'>
                                    <td>".$row['numer_tab']."</td>
                                    <td>".$row['marka']."</td>
                                    <td>".$row['model']."</td>
                                    <td>".$row['rocznik']."</td>
                                    <td>".$row['rok_wprowadzenia']."</td>
                                    <td>".$row['uklad_drzwi']."</td>
                                    <td>".$row['klimatyzacja']."</td>
                                    <td>".$row['biletomat']."</td>
                                    <td>".$row['uwagi']."</td>
                                    <td><button data-toggle='modal' data-target='#modal-edycja' data-idvehicle='".$row['id']."'>Edytuj</button><br />
                                    <button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>szczegóły</button><br />
                                    <button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button>
                                    </td>
                                  </tr>";
									
                                }
                            }

                            echo "</table><br/>";
                        }
                    if($result2 = @$connect->query("SELECT * FROM `vehicles` where type='tram' ORDER BY `numer_tab`"))
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
                                <td><button data-toggle='modal' data-target='#modal-edycja' data-idvehicle='".$row['id']."'>Edytuj</button><br />
								<button data-toggle='modal' data-target='#modal-szczegoly' data-idvehicle='".$row['id']."'>szczegóły</button><br />
								<button data-toggle='modal' data-target='#modal-workshop' data-idvehicle='".$row['id']."'>Dodaj do warsztatu</button>
								
								</td>
								
                            </tr>";
							echo "<hr>";
                        }
                      
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
            <h5 class="modal-title">szczegóły</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
      <form action="scripts/php/detalis.php" method="POST" id="form-detalis">

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
          <input type="hidden" id="id-edycja-vehicles" name="id_vehicles" value="">
            typ				:<input type="text" name="edycja_vehicle_type"><br /><br/>
            Numer Taborowy	:<input type="number" name="edycja_vehicle_numer"><br /><br/>
            Marka			:<input type="text" name="edycja_vehicle_marka"><br /><br/>
            Model			:<input type="text" name="edycja_vehicle_model"><br /><br/>
            Rocznik			:<input type="year" name="edycja_vehicle_rocznik"><br /><br/>
            Rok wprowadzenia:<input type="year" name="edycja_vehicle_rok"><br /><br/>
            Układ drzwi		:<input type="text" name="edycja_vehicle_drzwi"><br /><br/>
            Klimatyzacja	:<input type="text" name="edycja_vehicle_klimatyzacja"><br /><br/>
            Biletomat/Kasa	:<input type="text" name="edycja_vehicle_biletomat"><br /><br/>
            Uwagi			:<input type="text" name="edycja_vehicle_uwagi"><br /><br/>
      </form>

    </div>
    <div class="modal-footer">
	  		                


                            
      <br />
			<button form="form-workshop" type="submit" class="btn btn-primary">Potwierdz</button>
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
			<input type="hidden" id="id-edycja-vehicles" name="id_vehicles" value="">
								typ				:<input type="text" name="add_vehicle_type"><br /><br/>
                                Numer Taborowy	:<input type="number" name="add_vehicle_numer"><br /><br/>
                                Marka			:<input type="text" name="add_vehicle_marka"><br /><br/>
                                Model			:<input type="text" name="add_vehicle_model"><br /><br/>
                                Rocznik			:<input type="year" name="add_vehicle_rocznik"><br /><br/>
                                Rok wprowadzenia:<input type="year" name="add_vehicle_rok"><br /><br/>
                                Układ drzwi		:<input type="text" name="add_vehicle_drzwi"><br /><br/>
                                Klimatyzacja	:<input type="text" name="add_vehicle_klimatyzacja"><br /><br/>
                                Biletomat/Kasa	:<input type="text" name="add_vehicle_biletomat"><br /><br/>
                                Uwagi			:<input type="text" name="add_vehicle_uwagi"><br /><br/>
	</form>
      </div>
      <div class="modal-footer">

<br />
			<button form="form-workshop" type="submit" class="btn btn-primary">Potwierdz</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
      </div>
    </div>
  </div>
</div>
	
    <script src="scripts/js/time-js.js"></script>
    <script src="scripts/js/search.js"></script>
    <script src="scripts/js/pop_up.js"></script>
	<script src="scripts/js/modals.js"></script>
	
</main>