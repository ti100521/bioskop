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
            foreach($row as $r) {
                echo "<tr>";
                $arg = "";
                foreach($r as $t) {
                    echo "<td>";
                        echo $t;
                        $arg.=$t."/";
                    echo "</td>";
                }
                echo "<td class='col-fix-100' >";
                    $s1 = site_url("index_admin/edit_row/$option/$arg");
                    echo "<a href='"."$s1"."' class='btn btn-info btn-sm'>"."<span class='glyphicon glyphicon-cog'></span> Edit</a>";
                echo "</td>";
                echo "<td class='col-fix-100' >";
                    $s2 = site_url("index_admin/delete_row/$option/$arg");
                    echo "<a href='"."$s2"."' class='btn btn-info btn-sm'>"."<span class='glyphicon glyphicon-cog'></span> Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
