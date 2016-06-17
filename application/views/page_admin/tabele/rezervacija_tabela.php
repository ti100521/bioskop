<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/rezervacija");
                echo "<form role='form' method='post' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='rezervacija'>
                    <input type='hidden' name='option' value='rezervacija'>
                    
                    <div class="form-group">
                        <label for="IDKorisnik">IDKorisnik:</label>
                        <input type="text" class="form-control" name="IDKorisnik" id="IDKorisnik_insert">
                    </div>
                    <div class="form-group">
                        <label for="IDProjekcija">IDProjekcija:</label>
                        <input type="text" class="form-control" name="IDProjekcija" id="IDProjekcija_insert">
                    </div>
<!--                    <div class="form-group">
                        <label for="DatumVreme">DatumVreme:</label>
                        <input type="text" class="form-control" name="DatumVreme" id="DatumVreme_insert">
                    </div>-->
<!--                    <div class="form-group">
                        <label for="BrojKarata">BrojKarata:</label>
                        <input type="text" class="form-control" name="BrojKarata" id="BrojKarata_insert">
                    </div>-->
<!--                    <div class="form-group">
                        <label for="Cena">Cena:</label>
                        <input type="text" class="form-control" name="Cena" id="Cena_insert">
                    </div>-->
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <input type="text" class="form-control" name="Status" id="Status_insert">
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
                <form role='form' method='post' >
                    <input type="hidden" name="IDRezervacija" id="IDRezervacija">
                    <div class="form-group">
                        <label for="IDKorisnik">IDKorisnik:</label>
                        <input type="text" class="form-control" name="IDKorisnik" id="IDKorisnik">
                    </div>
                    <div class="form-group">
                        <label for="IDProjekcija">IDProjekcija:</label>
                        <input type="text" class="form-control" name="IDProjekcija" id="IDProjekcija">
                    </div>
                    <div class="form-group">
                        <label for="DatumVreme">Datum Vreme:</label>
                        <input type="text" class="form-control" name="DatumVreme" id="DatumVreme">
                    </div>
                    <div class="form-group">
                        <label for="BrojKarata">Broj Karata:</label>
                        <input type="text" class="form-control" name="BrojKarata" id="BrojKarata">
                    </div>
                    <div class="form-group">
                        <label for="Cena">Cena:</label>
                        <input type="text" class="form-control" name="Cena" id="Cena">
                    </div>
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <input type="text" class="form-control" name="Status" id="Status">
                    </div>
                    
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-rezervacija">Update</button>
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
                    echo "<td id='row-"."$cnt"."-IDRezervacija' >";
                        echo $r['IDRezervacija'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDKorisnik' >";
                        echo $r['IDKorisnik'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDProjekcija' >";
                        echo $r['IDProjekcija'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-DatumVreme' >";
                        echo $r['DatumVreme'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-BrojKarata' >";
                        echo $r['BrojKarata'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Cena' >";
                        echo $r['Cena'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Status' >";
                        echo $r['Status'];
                    echo "</td>";
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-rezervacija'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-rezervacija'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

