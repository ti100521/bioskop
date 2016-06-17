
<!-- CONTAINER BODY -->
           	<div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body" >
                        <?PHP
                            $Titl = $film['Naziv'];
                            echo "<h4>$Titl</h4>";
                        ?>
						<hr/>
						<div class="row" style="background-color:black">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<div class="embed-responsive embed-responsive-16by9">
                                    <?php
                                        $youtube = $film['Link'];
                                        echo "<iframe class='embed-responsive-item' width='640' height='360' src='"."$youtube"."' frameborder='0'></iframe>";
                                    ?>
								</div>
							</div>
							<div class="col-sm-2"></div>
						</div>
						
						<hr>
						<div class="row text-left">
							<div class="col-sm-4 col-fix-240">
                                <?php
                                    $path = $film['Poster'];
                                    echo "<img src='"."$path"."' alt='Image' style='height:300px'>";
                                ?>
							</div>
							<div class="col-sm-7">
                                <?php
                                    $naziv = $film['Naziv'];
                                    echo "<h4><i>$naziv</i></h4>";
                                    $opis = $film['Opis'];
                                    echo "<p>$opis</p>";
                                ?>
								<table class="opis">
									<tr>
										<td><i>Ocena</i></td>
                                        <td>
                                            <?php
                                                $ocena = $film['Ocena'];
                                                echo "<div>";
                                                for($k=0; $k<$ocena; $k++){
                                                    echo "<span id='grade-"."$k"."' class='glyphicon glyphicon-star positiv-rate'></span>";
                                                }
                                                for($k=$ocena; $k<10; $k++){
                                                    echo "<span id='grade-"."$k"."' class='glyphicon glyphicon-star negative-rate'></span>";
                                                }
                                                echo "</div>";
                                            ?>
										</td>
									</tr>
                                    <?php
                                        $original = $film['OriginalNaziv'];
                                        echo "<tr>";
                                        echo "<td><i>Originalni naslov</i></td>";
                                        echo "<td><b>$original</b></td>";
                                        echo "</tr>";
                                        $datum = $film['PocetakPrikazivanja'];
                                        echo "<tr>";
                                        echo "<td><i>Pocetak prikazivanja</i></td>";
                                        echo "<td><b>$datum</b></td>";
                                        echo "</tr>";
                                        $duzina = $film['Duzina'];
                                        echo "<tr>";
                                        echo "<td><i>Duzina trajanja</i></td>";
                                        echo "<td><b>$duzina min</b></td>";
                                        echo "</tr>";
                                        $zanr = $film['Zanr'];
                                        echo "<tr>";
                                        echo "<td><i>Zanr</i></td>";
                                        echo "<td><b>$zanr</b></td>";
                                        echo "</tr>";
                                        $reziser = $film['Reziser'];
                                        echo "<tr>";
                                        echo "<td><i>Reziser</i></td>";
                                        echo "<td><b>$reziser</b></td>";
                                        echo "</tr>";
                                        $poreklo = $film['Poreklo'];
                                        echo "<tr>";
                                        echo "<td><i>Drzava</i></td>";
                                        echo "<td><b>$poreklo</b></td>";
                                        echo "</tr>";
                                    ?>
								</table>
							</div>
						</div>
						
						<hr/>
						<h3>Projekcije</h3>
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">

                                <?php
                                $today = strtotime("today");
                                $i = 0;
                                $j = 0;
                                foreach($projekcije as $row) {
                                    if(!empty($row)){
                                        $off = strtotime("+".$i." days", $today);
                                        $danas = date("l d.m.Y",$off);
                                        echo "<div class='row'>";
                                            echo "<div class='col-sm-1 col-fix-100'>";
                                                echo $danas;
                                            echo "</div>";
                                            echo "<div class='col-sm-9'>";
                                                echo "<div class='row'>";
                                                foreach($row as $p) {
                                                    echo "<div class='col-sm-1 col-fix-100'>";
                                                        $idp = $p['IDProjekcija'];
                                                        $sala = $p['IDSala'];
                                                        $vreme = date_parse($p['Vreme']);
                                                        $plink = site_url("index/mesta/$idp");
                                                        echo "<a href='"."$plink"."'>";
                                                            $dm = "";
                                                            $dh = "";
                                                            if(strlen($vreme['minute']) < 2) $dm = "0";
                                                            if(strlen($vreme['hour']) < 2) $dh = "0";
                                                            
                                                            echo "".$dh."".$vreme['hour'].":".$dm."".$vreme['minute']." <span class='glyphicon glyphicon-tag'></span>";
                                                            echo "<br>";
                                                            echo "Sala $sala";
                                                        echo "</a>";
                                                    echo "</div>";
                                                }
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<br/>";
                                        $j++;
                                    }
                                    $i++;
                                }
                                if($j == 0){
                                    echo "<div class='col-sm-9'>";
                                        echo "<p><i>Za ovaj film trenutno nema Projekcija</i></p>";
                                    echo "</div>";
                                }
                                ?>
							</div>
						</div>
						<br/>
					</div>
				</div>
			</div>
         
        <!-- OCENI -->
        <?php
            if($this->session->userdata('logged_in') == TRUE) {
                echo "<div class='panel-group'>";
                    echo "<div class='panel panel-default'>";
                        echo "<div class='panel-body'>";
                            echo "<h4>Oceni FILM</h4>";
                            echo "<hr/>";
                                echo "<div class='ocena text-center'>";
                                for($k=1; $k<=10; $k++){
                                    echo "<button id="."$k"." class='glyphicon glyphicon-star negative-rate' onclick='rateFilm(id);'></button>";
                                }
                                echo "</div>";
                            echo "<br/>";
                            echo "<div class='text-center'>";
                                $id = $film['IDFilm'];
                                $oceni = site_url("index/oceni/$id");
                                echo "<form role='form' method='post' action='"."$oceni"."'>";
                                    echo "<input type='hidden' id='ocena' name='ocena' value='0'>";
//                                    echo "<input type='submit' class='btn btn-success btn-sm grade-film' value='Posalji Ocenu'>";
                                    $oceni = site_url("index/ajaxRate/$id");
                                    echo "<button href='"."$oceni"."' class='btn btn-success btn-sm grade-film'>Posalji Ocenu</button>";
                                echo "</from>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
        <!-- KOMENTARI -->
            <div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>Leave a Comment</h4>
                        
                        <!-- BEZ OVOG FORM-a 'komentar' FORM SE NE PRIKAZUJE ?!?! -->
                        <form role='form' method='post' action="">
                        </form>
                        <!-- ---------------------------------------------------- -->
						
                        <?PHP
                        if($this->session->userdata('logged_in') == TRUE) {
                            $id = $film['IDFilm'];
                            $komentar = site_url("index/komentar/$id");
                            echo "<textarea class='form-control' rows='3' id='komentar' name='komentar' form='koment' style='resize:none' required></textarea>";
                            echo "<form role='form' id='koment' method='post' action='".""."'>";
                                echo "<br/>";
                                echo "<div class='text-right'>";
                                    $ajaxkomentar = site_url("index/ajaxComment");
//                                    echo "<button class='btn btn-success btn-sm' onclick='komentarisi(\"$id\",\"$ajaxkomentar\")'>Submit</button>";
                                    echo "<input id='id_url' type='hidden' value='"."$ajaxkomentar"."'>";
                                    echo "<input id='id_film' type='hidden' value='"."$id"."'>";
                                    echo "<button id='dugme_komentar' class='btn btn-success btn-sm'>Submit</button>";
                                echo "</div>";
                            echo "</form>";
                        }
                        ?>
                        
                        <div id="komentari">
                            <?php
                                foreach($koment as $row) {
                                    $img = $row['Slika'];
                                    $idK = $row['IDKomentar'];
                                    echo "<hr id='hr-"."$idK"."' />";
                                    echo "<div class='row' id='row-"."$idK"."' >";
                                        echo "<div class='col-sm-2 text-center'>";
                                            echo "<img src='"."$img"."' class='img-circle' height='65' width='65' alt='Avatar'>";
                                        echo "</div>";

                                        $name = $row['Username'];
                                        $date =new DateTime($row['DatumVreme']);
                                        $datum = $date->format("M d, Y, H:i:s");
                                        $text = $row['Text'];
                                        echo "<div class='col-sm-10'>";
                                            echo "<h4>$name<small>&nbsp $datum</small></h4>";
                                            echo "<p>$text</p>";
                                            if($name == $this->session->userdata('Username') && $this->session->userdata('logged_in')) {
                                                $idf = $film['IDFilm'];
                                                $dlink = site_url("index/ajaxDeleteComment/$idf/$idK");
//                                                echo "<a id='"."$idK"."' href='"."$dlink"."' class='btn btn-danger btn-xs delete_row_class'> delete </a>";
                                                echo "<button id='"."$idK"."' href='"."$dlink"."' class='btn btn-danger btn-xs delete_row_class'> delete </button>";
                                            }
                                            echo "<br>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                            ?>
                        </div>
					</div>
				</div>
			</div>
		</div>