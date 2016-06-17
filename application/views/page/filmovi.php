
<!-- CONTAINER BODY -->
			<div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body">
						<h4>Filmovi</h4>
					<!-- Film List -->
						<hr/>
                        <?php foreach($list as $row): ?>
                            <div class="row text-left">
                                <div class="col-sm-4 col-fix-140">
                                    <?PHP
                                        $id = $row['IDFilm'];
                                        $path = $row['Poster'];
                                        $link = site_url("index/film/$id");
                                        echo "<a href="."$link"."><img src='"."$path"."' alt='Image' style='height:200px'></a>";
                                    ?>
                                </div>
                                <div class="col-sm-8">
                                    <?php
                                        $naslov = $row['Naziv'];
                                        echo "<b>$naslov</b>";
                                    ?>
                                    <table class="opis">
                                        <tr>
                                            <td><i>Ocena</i></td>
                                            <td>
                                                <?php
                                                    $ocena = $row['Ocena'];
                                                    echo "<div>";
                                                    for($k=0; $k<10; $k++){
                                                        if($k < $ocena)
                                                            echo "<span class='glyphicon glyphicon-star positiv-rate'></span>";
                                                        else
                                                            echo "<span class='glyphicon glyphicon-star negative-rate'></span>";
                                                    }
                                                    echo "</div>";
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            $original = $row['OriginalNaziv'];
                                            echo "<tr>";
                                            echo "<td><i>Originalni naslov</i></td>";
                                            echo "<td><b>$original</b></td>";
                                            echo "</tr>";
                                            $datum = $row['PocetakPrikazivanja'];
                                            echo "<tr>";
                                            echo "<td><i>Pocetak prikazivanja</i></td>";
                                            echo "<td><b>$datum</b></td>";
                                            echo "</tr>";
                                            $duzina = $row['Duzina'];
                                            echo "<tr>";
                                            echo "<td><i>Duzina trajanja</i></td>";
                                            echo "<td><b>$duzina min</b></td>";
                                            echo "</tr>";
                                            $zanr = $row['Zanr'];
                                            echo "<tr>";
                                            echo "<td><i>Zanr</i></td>";
                                            echo "<td><b>$zanr</b></td>";
                                            echo "</tr>";
                                            $reziser = $row['Reziser'];
                                            echo "<tr>";
                                            echo "<td><i>Reziser</i></td>";
                                            echo "<td><b>$reziser</b></td>";
                                            echo "</tr>";
                                            $poreklo = $row['Poreklo'];
                                            echo "<tr>";
                                            echo "<td><i>Drzava</i></td>";
                                            echo "<td><b>$poreklo</b></td>";
                                            echo "</tr>";
                                        ?>
                                    </table>
                                </div>
                            </div>
                            <hr/>
                        <?php endforeach; ?>
					</div>
				</div>
			</div>            
		</div>
				
	
