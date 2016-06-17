
<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/film");
                echo "<form role='form' id='film_form' method='post' enctype='multipart/form-data' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='film'>
                    <input type='hidden' name='option' value='film'>
                    <div class="form-group">
                        <label for="Poreklo">Poreklo:</label>
                        <input type="text" class="form-control" name="Poreklo" id="Poreklo_insert">
                    </div>
                    <div class="form-group">
                        <label for="Zanr">Zanr:</label>
                        <input type="text" class="form-control" name="Zanr" id="Zanr_insert">
                    </div>
                    <div class="form-group">
                        <label for="Naziv">Naziv:</label>
                        <input type="text" class="form-control" name="Naziv" id="Naziv_insert">
                    </div>
                    <div class="form-group">
                        <label for="OriginalNaziv">Original Naziv:</label>
                        <input type="text" class="form-control" name="OriginalNaziv" id="OriginalNaziv_insert">
                    </div>
                    <div class="form-group">
                        <label for="Reziser">Reziser:</label>
                        <input type="text" class="form-control" name="Reziser" id="Reziser_insert">
                    </div>
                    <div class="form-group">
                        <label for="Duzina">Duzina:</label>
                        <input type="text" class="form-control" name="Duzina" id="Duzina_insert">
                    </div>
                    <div class="form-group">
                        <label for="Link">Link:</label>
                        <input type="text" class="form-control" name="Link" id="Link_insert">
                    </div>
                    <div class="form-group">
                        <label for="PocetakPrikazivanja">Pocetak Prikazivanja:</label>
                        <input type="text" class="form-control" name="PocetakPrikazivanja" id="PocetakPrikazivanja_insert">
                    </div>
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <input type="text" class="form-control" name="Status" id="Status_insert">
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary" id="poster_upload">Upload Poster</span>
                                <input name="Poster" id="poster_insert" style="display: none;" type="file">
                            </span>
                            <span class="form-control"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Opis">Opis:</label>
                        <textarea class='form-control' rows='3' id='Opis_insert' name='Opis' form='film_form' style='resize:none' required></textarea>
                    </div>
                    
                    <div class="text-right">
                        <input type='submit' class='btn btn-default' value='Insert'>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="edit_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Row</h4>
            </div>
            <div class="modal-body">
                <form role='form' method='post' enctype='multipart/form-data' id='film_edit'>
                    <input type="hidden" name="IDFilm" id="IDFilm">
                    <div class="form-group">
                        <label for="Poreklo">Poreklo:</label>
                        <input type="text" class="form-control" name="Poreklo" id="Poreklo">
                    </div>
                    <div class="form-group">
                        <label for="Zanr">Zanr:</label>
                        <input type="text" class="form-control" name="Zanr" id="Zanr">
                    </div>
                    <div class="form-group">
                        <label for="Naziv">Naziv:</label>
                        <input type="text" class="form-control" name="Naziv" id="Naziv">
                    </div>
                    <div class="form-group">
                        <label for="OriginalNaziv">Original Naziv:</label>
                        <input type="text" class="form-control" name="OriginalNaziv" id="OriginalNaziv">
                    </div>
                    <div class="form-group">
                        <label for="Reziser">Reziser:</label>
                        <input type="text" class="form-control" name="Reziser" id="Reziser">
                    </div>
                    <div class="form-group">
                        <label for="Duzina">Duzina:</label>
                        <input type="text" class="form-control" name="Duzina" id="Duzina">
                    </div>
                    <div class="form-group">
                        <label for="Link">Link:</label>
                        <input type="text" class="form-control" name="Link" id="Link">
                    </div>
                    <div class="form-group">
                        <label for="PocetakPrikazivanja">Pocetak Prikazivanja:</label>
                        <input type="text" class="form-control" name="PocetakPrikazivanja" id="PocetakPrikazivanja">
                    </div>
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <input type="text" class="form-control" name="Status" id="Status">
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary" id="poster_upload">Change Poster</span>
                                <input name="Poster" id="Poster" style="display: none;" type="file">
                            </span>
                            <span class="form-control"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Opis">Opis:</label>
                        <textarea class='form-control' rows='3' id='Opis' name='Opis' form='film_edit' style='resize:none'></textarea>
                    </div>
                    
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-film">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <?php
            if(!isset($sql)) {
                foreach($column as $c) {
                    echo "<th>";
                    echo $c['COLUMN_NAME'];
                    echo "</th>";
                }
            }
            ?>
        </thead>
        <tbody>
            <?php
            $cnt = 1;
            foreach($row as $r) {
                echo "<tr id='row-"."$cnt"."' >";
                    echo "<td id='row-"."$cnt"."-IDFilm' >";
                        echo $r['IDFilm'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Poreklo' >";
                        echo $r['Poreklo'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Zanr' >";
                        echo $r['Zanr'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Naziv' >";
                        echo $r['Naziv'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-OriginalNaziv' >";
                        echo $r['OriginalNaziv'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Reziser' >";
                        echo $r['Reziser'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Duzina' >";
                        echo $r['Duzina'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Poster' >";
                        echo "<img src='".$r['Poster']."' width='100px'>";
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Opis' >";
                        echo $r['Opis'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Link' >";
                        echo $r['Link'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-PocetakPrikazivanja' >";
                        echo $r['PocetakPrikazivanja'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Status' >";
                        echo $r['Status'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Ocena' >";
                        echo $r['Ocena'];
                    echo "</td>";
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-film'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-film'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>


