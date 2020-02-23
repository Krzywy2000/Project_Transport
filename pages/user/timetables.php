<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
        $miasto = $_SESSION['access'];
    ?>
    <div class="container-fluid"><br/><br/>
        <H2 class="headline">Lista brygad</H2>
        <div class="messages__bar__left">
            <form id="form">
                <input type="text" id="search_timetables" name="search_timetable" placeholder="Znajdź rozkład po nr zad."/>
            </form>
        </div>
        <div class="messages__bar">
            <button class="button" data-toggle="modal" data-target="#modal-add-timetable">Dodaj zadanie</button>
        </div>
        <div id="timetable" class="result">
            <?php
                    if ($result = @$connect->query("SELECT * FROM `timetable` WHERE `miasto` LIKE '$miasto' ORDER BY `nazwa_zm`"))
                        {
                            echo "<table>
                            <tr class='main'>
                                <td>Nazwa zadania</td>
                                <td>Godzina rozpoczęcia</td>
                                <td>Godzina zakończenia</td>
                                <td>Uwagi</td>
                                <td>Ustawienia</td>
                            </tr>";
                            $users = $result->num_rows;
                            if($users>0)
                            {
                                while($row = $result->fetch_array())
                                {
                                    echo "<tr>
                                        <td>".$row['nazwa_zm']."</td>
                                        <td>".$row['godz_roz']."</td>
                                        <td>".$row['godz_zak']."</td>
                                        <td>".$row['uwagi']."</td>
<<<<<<< HEAD
                                        <td><button data-toggle='modal' data-target='#modal-edit-timetable' data-idedit='".$row['id']."'>Edytuj</button><br/><button>Usuń</button><br/><button>Szczegóły</button></td>
=======
                                        <td><button data-toggle='modal' data-target='#modal-edit-timetable'>Edytuj</button><br/><button>Usuń</button><br/><button>Szczegóły</button></td>
>>>>>>> 47e3133b7eecf23334661f05640b3bba61a182d4
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
                ?>    
        </div>        
    <br/><br/></div>

    <!--Add timetable-->
    <div class="modal fade bd-example-modal-lg" id="modal-add-timetable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dodaj rozkład</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="scripts/php/timetables/add.php" method="POST" id="form-timetables">
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-md-4'><a>Nazwa zadania: </a><input type='text' name='name'></div><br/>
                                <div class='col-md-4'><a>Godzina rozpoczęcia: </a><input type='text' name='start'/></div><br/>
                                <div class='col-md-4'> <a>Godzina zakończenia: </a><input type='text' name='end'/></div><br/>
                                <div class='col-md-4'><a>Rodzaj: <input type='text' name='type' placeholder='TRAM/BUS'/></a></div>
                                <div class='col-md-4'><a>Uwagi: <input type='text' name='comment'/></a></div>
                                <div class='col-md-12'><a>Ilość kursów: </a><br/><input type='number' name='count_of_course' id='drive'/>
                                </div>
                                <span id="forms" class="col-sm-12">
                                    
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button form="form-timetables" type="submit" class="btn btn-primary">Potwierdz</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

    <!--Edit timetable-->
    <div class="modal fade bd-example-modal-lg" id="modal-edit-timetable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edytuj rozkład</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="scripts/php/timetables/edit.php" method="POST" id="form-timetables">
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-md-4'><a>Nazwa zadania: </a><input type='text' name='name'></div><br/>
                                <div class='col-md-4'><a>Godzina rozpoczęcia: </a><input type='text' name='start'/></div><br/>
                                <div class='col-md-4'> <a>Godzina zakończenia: </a><input type='text' name='end'/></div><br/>
                                <div class='col-md-4'><a>Rodzaj: <input type='text' name='type' placeholder='TRAM/BUS'/></a></div>
                                <div class='col-md-4'><a>Uwagi: <input type='text' name='comment'/></a></div>
                                <div class='col-md-12'><a>Ilość kursów: </a><br/><input type='text' name='count_of_course' id='drive'/>
                                </div>
                                <span id="forms" class="col-sm-12">
                                    
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button form="form-timetables" type="submit" class="btn btn-primary">Potwierdz</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 47e3133b7eecf23334661f05640b3bba61a182d4

    <!--Edit timetable-->
    <div class="modal fade bd-example-modal-lg" id="modal-edit-timetable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edytuj rozkład</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="scripts/php/timetables/edit.php" method="POST" id="form-edit-timetables">
                        <div class='container-fluid'>
                            <div class='row'>
							<input type="hidden" id="idedit" name="idedit" >
                                <div class='col-md-4'><a>Nazwa zadania: </a><input type='text' name='name'></div><br/>
                                <div class='col-md-4'><a>Godzina rozpoczęcia: </a><input type='text' name='start'/></div><br/>
                                <div class='col-md-4'> <a>Godzina zakończenia: </a><input type='text' name='end'/></div><br/>
                                <div class='col-md-4'><a>Rodzaj: <input type='text' name='type' placeholder='TRAM/BUS'/></a></div>
                                <div class='col-md-4'><a>Uwagi: <input type='text' name='comment'/></a></div>
                                <div class='col-md-12'><a>Ilość kursów: </a><br/><input type='text' name='count_of_course' id='drive'/>
                                </div>
                                <span id="forms" class="col-sm-12">
                                    
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button form="form-edit-timetables" type="submit" class="btn btn-primary">Potwierdz</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                </div>
            </div>
        </div>
    </div>


	<script src="scripts/js/modals.js"></script>
	<script src="scripts/js/time-js.js"></script>
    <script src="scripts/js/search_timetables.js"></script>
    <script src="scripts/js/add_forms.js"></script>
    <script src="scripts/js/add_arrival.js"></script>
</main>