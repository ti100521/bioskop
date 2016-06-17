<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/sala");
                echo "<form role='form' method='post' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='sala'>
                    <input type='hidden' name='option' value='sala'>
                    
                    <div class="form-group">
                        <label for="BrojRedova">BrojRedova:</label>
                        <input type="text" class="form-control" name="BrojRedova" id="BrojRedova_insert">
                    </div>
                    <div class="form-group">
                        <label for="BrojKolona">BrojKolona:</label>
                        <input type="text" class="form-control" name="BrojKolona" id="BrojKolona_insert">
                    </div>
                    <div class="form-group">
                        <label for="Cena">Cena:</label>
                        <input type="text" class="form-control" name="Cena" id="Cena_insert">
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
                    <input type="hidden" name="IDSala" id="IDSala">
                    <div class="form-group">
                        <label for="BrojRedova">Broj Redova:</label>
                        <input type="text" class="form-control" name="BrojRedova" id="BrojRedova">
                    </div>
                    <div class="form-group">
                        <label for="BrojKolona">Broj Kolona:</label>
                        <input type="text" class="form-control" name="BrojKolona" id="BrojKolona">
                    </div>
                    <div class="form-group">
                        <label for="Cena">Cena:</label>
                        <input type="text" class="form-control" name="Cena" id="Cena">
                    </div>
                    
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-sala">Update</button>
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
                    echo "<td id='row-"."$cnt"."-IDSala' >";
                        echo $r['IDSala'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-BrojRedova' >";
                        echo $r['BrojRedova'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-BrojKolona' >";
                        echo $r['BrojKolona'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Cena' >";
                        echo $r['Cena'];
                    echo "</td>";
                    
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-sala'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-sala'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

