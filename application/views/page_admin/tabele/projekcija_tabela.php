<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/projekcija");
                echo "<form role='form' method='post' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='projekcija'>
                    <input type='hidden' name='option' value='projekcija'>
                    
                    <div class="form-group">
                        <label for="IDSala">IDSala:</label>
                        <input type="text" class="form-control" name="IDSala" id="IDSala_insert">
                    </div>
                    <div class="form-group">
                        <label for="IDFilm">IDFilm:</label>
                        <input type="text" class="form-control" name="IDFilm" id="IDFilm_insert">
                    </div>
                    <div class="form-group">
                        <label for="Datum">Datum:</label>
                        <input type="text" class="form-control" name="Datum" id="Datum_insert">
                    </div>
                    <div class="form-group">
                        <label for="Vreme">Vreme:</label>
                        <input type="text" class="form-control" name="Vreme" id="Vreme_insert">
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
                    <input type="hidden" name="IDProjekcija" id="IDProjekcija">
                    <div class="form-group">
                        <label for="IDSala">IDSala:</label>
                        <input type="text" class="form-control" name="IDSala" id="IDSala">
                    </div>
                    <div class="form-group">
                        <label for="IDFilm">IDFilm:</label>
                        <input type="text" class="form-control" name="IDFilm" id="IDFilm">
                    </div>
                    <div class="form-group">
                        <label for="Datum">Datum:</label>
                        <input type="text" class="form-control" name="Datum" id="Datum">
                    </div>
                    <div class="form-group">
                        <label for="Vreme">Vreme:</label>
                        <input type="text" class="form-control" name="Vreme" id="Vreme">
                    </div>
                    
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-projekcija">Update</button>
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
                    echo "<td id='row-"."$cnt"."-IDProjekcija' >";
                        echo $r['IDProjekcija'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDSala' >";
                        echo $r['IDSala'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDFilm' >";
                        echo $r['IDFilm'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Datum' >";
                        echo $r['Datum'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Vreme' >";
                        echo $r['Vreme'];
                    echo "</td>";
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-projekcija'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-projekcija'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

