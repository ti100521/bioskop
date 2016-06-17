<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/rezervisanomesto");
                echo "<form role='form' method='post' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='rezervisanomesto'>
                    <input type='hidden' name='option' value='rezervisanomesto'>
                    
                    <div class="form-group">
                        <label for="IDProjekcija">IDProjekcija:</label>
                        <input type="text" class="form-control" name="IDProjekcija" id="IDProjekcija_insert">
                    </div>
                    <div class="form-group">
                        <label for="Red">Red:</label>
                        <input type="text" class="form-control" name="Red" id="Red_insert">
                    </div>
                    <div class="form-group">
                        <label for="Kolona">Kolona:</label>
                        <input type="text" class="form-control" name="Kolona" id="Kolona_insert">
                    </div>
                    <div class="form-group">
                        <label for="IDRezervacija">IDRezervacija:</label>
                        <input type="text" class="form-control" name="IDRezervacija" id="IDRezervacija_insert">
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
                    <!--<input type="hidden" name="IDProjekcija" id="IDProjekcija">-->
                    <!--<input type="hidden" name="Red" id="Red">-->
                    <!--<input type="hidden" name="Kolona" id="Kolona">-->
                    
                    <div class="form-group">
                        <label for="IDProjekcija">IDProjekcija:</label>
                        <input type="text" class="form-control" name="IDProjekcija" id="IDProjekcija">
                    </div>
                    <div class="form-group">
                        <label for="Red">Red:</label>
                        <input type="text" class="form-control" name="Red" id="Red">
                    </div>
                    <div class="form-group">
                        <label for="Kolona">Kolona:</label>
                        <input type="text" class="form-control" name="Kolona" id="Kolona">
                    </div>
                    
                    <div class="form-group">
                        <label for="IDRezervacija">IDRezervacija:</label>
                        <input type="text" class="form-control" name="IDRezervacija" id="IDRezervacija">
                    </div>
                    
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-rezervisanomesto">Update</button>
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
                    echo "<td id='row-"."$cnt"."-Red' >";
                        echo $r['Red'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Kolona' >";
                        echo $r['Kolona'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDRezervacija' >";
                        echo $r['IDRezervacija'];
                    echo "</td>";
                    
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-rezervisanomesto'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-rezervisanomesto'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

