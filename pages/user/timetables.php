<main>
    <?php 
        require_once("scripts/php/db_connect.php");
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
    ?>
    <div class="container-fluid"><br/><br/>
        <H2 class="headline">Lista brygad</H2>
        <div class="messages__bar__left">
            <form id="form">
                <input type="text" id="search" name="search" placeholder="Znajdź rozkład po nr zad."/>
            </form>
        </div>
        <div class="messages__bar">
            <button class="button" data-toggle="modal" data-target="#modal-add-timetable">Dodaj zadanie</button>
        </div>
        <div id="result" class="result">
            <?php
                if($_SESSION['access'] == 2)
                {
                    if ($result = @$connect->query("SELECT * FROM `timetables_gw` ORDER BY `nr_zadania`"))
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
                                        <td>".$row['nr_zadania']."</td>
                                        <td>".$row['godz_roz']."</td>
                                        <td>".$row['godz_kon']."</td>
                                        <td>".$row['uwagi']."</td>
                                        <td><button>Edytuj</button><br/><button>Usuń</button><br/><button>Szczegóły</button></td>
                                    </tr>";
                                }
                            }

                            echo "</table><br/>";
                        }
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
                                <div class='col-md-4'><a>Nazwa zadania: </a><input type='text'></div><br/>
                                <div class='col-md-4'><a>Godzina rozpoczęcia: </a><input type='text'/></div><br/>
                                <div class='col-md-4'> <a>Godzina zakończenia: </a><input type='text'/></div><br/>
                                <div class='col-md-12'><a>Ilość kursów: </a><br/><input type='text' id='drive'/>
                                </div>
                                <span id="forms" class="col-sm-12">
                                    
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
        </div>



	<script src="scripts/js/time-js.js"></script>
    <script src="scripts/js/search_timetables.js"></script>
    <script src="scripts/js/add_forms.js"></script>
    <script src="scripts/js/timetable/add_arrival.js"></script>
</main>