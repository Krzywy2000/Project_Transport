<main>
    <div class="container-fluid"></br>
        <div class="row">
            <div class="col-md-6">
                <H2 class="headline">Przydział taboru na dzisiaj</H2>
                <?php
                    include_once("./scripts/php/main_page/list_of_lines.php");
                ?>
            </div>
            <div class="col-md-6">
                <H2 class="headline">Wozy na warsztacie</H2>
                <?php
                    include_once("./scripts/php/main_page/list_of_workshop.php");
                ?>
            </div>
            <div class="col-md-6">
                <H2 class="headline">Najbliższe zjazdy</H2>
            </div>
            <div class="col-md-6">
                <H2 class="headline">Wozy stojące na zajezdni</H2>
                <?php
                    include_once("./scripts/php/main_page/list_of_garage.php");
                ?>
            </div>
        </div>
    </div>
</main>