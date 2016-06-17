<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/komentar");
                echo "<form role='form' id='komentar_form' method='post' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='komentar'>
                    <input type='hidden' name='option' value='komentar'>
                    <div class="form-group">
                        <label for="IDFilm">IDFilm:</label>
                        <input type="text" class="form-control" name="IDFilm" id="IDFilm_insert">
                    </div>
                    <div class="form-group">
                        <label for="IDKorisnik">IDKorisnik:</label>
                        <input type="text" class="form-control" name="IDKorisnik" id="IDKorisnik_insert">
                    </div>

                    <div class="form-group">
                        <label for="Text">Text:</label>
                        <textarea class='form-control' rows='3' id='Text_insert' name='Text' form='komentar_form' style='resize:none' required></textarea>
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
                    <input type="hidden" name="IDKomentar" id="IDKomentar">
                    <div class="form-group">
                        <label for="IDFilm">IDFilm:</label>
                        <input type="text" class="form-control" name="IDFilm" id="IDFilm">
                    </div>
                    <div class="form-group">
                        <label for="IDKorisnik">IDKorisnik:</label>
                        <input type="text" class="form-control" name="IDKorisnik" id="IDKorisnik">
                    </div>
                    <div class="form-group">
                        <label for="DatumVreme">DatumVreme:</label>
                        <input type="text" class="form-control" name="DatumVreme" id="DatumVreme">
                    </div>
                    <div class="form-group">
                        <label for="Text">Text:</label>
                        <textarea class='form-control' rows='3' id='Text' name='Text'  style='resize:none' required></textarea>
                    </div>
                    
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-komentar">Update</button>
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
                    echo "<td id='row-"."$cnt"."-IDKomentar' >";
                        echo $r['IDKomentar'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDFilm' >";
                        echo $r['IDFilm'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDKorisnik' >";
                        echo $r['IDKorisnik'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-DatumVreme' >";
                        echo $r['DatumVreme'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Text' >";
                        echo $r['Text'];
                    echo "</td>";
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-komentar'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-komentar'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

