<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/korisnik");
                echo "<form role='form' method='post' enctype='multipart/form-data' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='korisnik'>
                    <input type='hidden' name='option' value='korisnik'>
                    <div class="form-group">
                        <label for="Username">Username:</label>
                        <input type="text" class="form-control" name="Username" id="Username_insert">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="text" class="form-control" name="Password" id="Password_insert">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" name="Email" id="Email_insert">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary" id="slika_upload">Upload Picture</span>
                                <input name="Slika" id="slika_insert" style="display: none;" type="file">
                            </span>
                            <span class="form-control"></span>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name='ZeliObavestenja' id="ZeliObavestenja_insert"> Zelim Obavestenja</label>
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
                    <input type="hidden" name="IDKorisnik" id="IDKorisnik">
                    <div class="form-group">
                        <label for="Username">Username:</label>
                        <input type="text" class="form-control" name="Username" id="Username">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="text" class="form-control" name="Password" id="Password">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control" name="Email" id="Email">
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary" id="slika_upload">Upload Sliku</span>
                                <input name="Slika" id="Slika" style="display: none;" type="file">
                            </span>
                            <span class="form-control"></span>
                        </div>
                    </div>
                    
                    <div class="checkbox">
                        <label><input type="checkbox" name="ZeliObavestenja" id="ZeliObavestenja"> Zelim Obavestenja</label>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default update-row-korisnik">Update</button>
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
                    echo "<td id='row-"."$cnt"."-IDKorisnik' >";
                        echo $r['IDKorisnik'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Username' >";
                        echo $r['Username'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Password' >";
                        echo $r['Password'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Email' >";
                        echo $r['Email'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-Slika' >";
                        echo "<img src='".$r['Slika']."' width='100px'>";
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-SlikaIme' >";
                        echo $r['SlikaIme'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-ZeliObavestenja' >";
                        echo $r['ZeliObavestenja'];
                    echo "</td>";
                
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm edit-row-korisnik'><span class='glyphicon glyphicon-cog'></span> Edit</button>";
                    echo "</td>";
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-korisnik'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

