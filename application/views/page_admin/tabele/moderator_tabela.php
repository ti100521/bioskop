<div id="insert_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insert Row</h4>
            </div>
            <div class="modal-body">
                <?php
                $akcija = site_url("index_admin/insert_row/moderator");
                echo "<form role='form' method='post' action='"."$akcija"."'>";
                ?>
                    <input type='hidden' name='table' value='moderator'>
                    <input type='hidden' name='option' value='moderator'>
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
                        <label for="Privilegija">Privilegija:</label>
                        <input type="text" class="form-control" name="Privilegija" id="Privilegija_insert">
                    </div>
                    
                    <div class="text-right">
                        <input type='submit' class='btn btn-default' value='Insert'>
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
                    echo "<td id='row-"."$cnt"."-IDModerator' >";
                        echo $r['IDModerator'];
                    echo "</td>";
                    echo "<td id='row-"."$cnt"."-IDAdmin' >";
                        echo $r['IDAdmin'];
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
                    echo "<td id='row-"."$cnt"."-Privilegija' >";
                        echo $r['Privilegija'];
                    echo "</td>";
                    
                    echo "<td class='col-fix-100' >";
                        echo "<button id='"."$cnt"."' class='btn btn-info btn-sm delete-row-moderator'><span class='glyphicon glyphicon-cog'></span> Delete</button>";
                    echo "</td>";
                echo "</tr>";
                $cnt++;
            }
            ?>
        </tbody>
    </table>
</div>

