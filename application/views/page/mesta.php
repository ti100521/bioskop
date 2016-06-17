
<!-- KORDINATOR -->
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body">
						<div class="row text-center">
							<div class="col-sm-2 form">
                                <a href="<?php echo site_url('index/film')?>"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        
        <!-- Datum, Vreme, Sala-->
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body">
						<?php
                            echo "<div class='row'>";
                                echo "<div class='col-sm-offset-1 col-sm-2'>";
                                    echo "<b>Sala: </b>&nbsp";
                                    echo $info['IDSala'];
                                echo "</div>";
                                echo "<div class='col-sm-3'>";
                                    echo "<b>Datum: </b>&nbsp";
                                    echo $info['Datum'];
                                echo "</div>";
                                echo "<div class='col-sm-3'>";
                                    echo "<b>Vreme: </b>&nbsp";
                                    echo $info['Vreme'];
                                echo "</div>";
                                echo "<div class='col-sm-3'>";
                                    echo "<b>Film: </b>&nbsp";
                                    echo "<i>\" ".$info['Naziv']." \"</i>";
                                echo "</div>";
                            echo "</div>";
                        ?>
					</div>
				</div>
			</div>
            
        <!-- SEDISTA -->
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body">
                       <div class="row">
							<div class="col-sm-3">
								<h4>Odaberi sedista</h4>
							</div>
							<div class="col-sm-9 text-right">
                                
                                <?php
                                    if($this->session->userdata('logged_in')==TRUE) :
                                    $proj = $info['IDProjekcija'];
                                    $u = site_url("index/rezervisi/$proj");
                                    echo "<form role='form' method='post' action='"."$u"."'>";
                                ?>
                                <input type="hidden" id="brojKarata1" name="brojKarata" value="0"></input>
                                <input type="hidden" id="mesta1" name="mesta" value=""></input>
                                <input type="submit" class="btn btn-danger btn-sm" value="Rezervisi"></input>
                                <?php echo "</form>"; 
                                    endif;
                                ?>
							</div>
						</div>
                        
						<hr>
                        <?php
                            if($this->session->userdata('greska') == TRUE){
                                $this->session->set_userdata('greska', false);
                                echo "<div class='text-center'>";
                                    echo "<i>";
                                    echo "<p>".$this->session->userdata('greska_poruka')."</p>";
                                    echo "</i>";
                                echo "</div>";
                            }
                        ?>
                        
						<div class="table-responsive">
							<table class="table text-center">
                                <?php
                                    $red = $info['BrojRedova'];
                                    $kol = $info['BrojKolona'];
                                    $cena = $info['Cena'];
                                    
                                    echo "<input type='hidden' id ='cena1' value='"."$cena"."'>";
                                    
                                    echo "<th>";
                                    for($j=1; $j<=$kol; $j++) {
                                        echo "<td><b>$j</b></td>";
                                    }
                                    echo "</th>";
                                    $cnt = 1;
                                    for($i=1; $i<=$red; $i++) {
                                        echo "<tr>";
                                        echo "<td><b>$i</b></td>";
                                        for($j=1; $j<=$kol; $j++) {
                                            if($zauzeto[$i-1][$j-1] == 0){
                                                echo "<td>";
                                                echo "<button id='"."$cnt"."' class='glyphicon glyphicon-print neaktivno_sediste' onclick='changeImage(id, $i, $j);'></button>";
                                                echo "</td>";
                                            } else {
                                                echo "<td>";
                                                echo "<button id='"."$cnt"."' class='glyphicon glyphicon-print rezervisano_sediste' onclick='changeImage(id, $i, $j);'></button>";
                                                echo "</td>";
                                            }
                                            $cnt++;
                                        }
                                        echo "</tr>";
                                    }
                                ?>
							</table>
						</div>
						<hr/>
                        
                        <div class="row">
                            <label class="control-label col-sm-2" for="text">Cena Karate:</label>
                            <div class="col-sm-1"><?php echo "$cena"; ?></div>
                        </div>
                        <br/>
                        <div class="row">
                            <label class="control-label col-sm-2" for="text">Broj Karata:</label>
                            <div id="brojKarata2" class="col-sm-1">0</div>
                            <label class="control-label col-sm-1" for="email">Cena:</label>
                            <div id="cena2" class="col-sm-1">0</div>
                            <label class="control-label col-sm-1" for="pwd">Mesta:</label>
                            <div id="mesta2" class="col-sm-5"></div>
                        </div>
					</div>
				</div>
			</div>
		</div>
