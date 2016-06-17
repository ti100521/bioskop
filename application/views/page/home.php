

        <!-- CONTAINER BODY -->
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body">
						<h4>Novi filmovi</h4>
						<hr>
						
                        <?php
                            $num = count($list);
                            echo "<div class='row text-center'>";
                                for($j=0, $i=0; $i<$num; $i++){
                                    $j++;
                                    if($j%5 == 0){
                                        $j = 0;
                                        echo "</div>";
                                        echo "<br>";
                                        echo "<div class='row text-center'>";
                                    }
                                    echo "<div class='col-sm-3'>";
                                        $img = $list[$i]['Poster'];
                                        echo "<img src='"."$img"."' alt='Image'  width='200'>";
                                        echo "<br>";
                                        $id = $list[$i]['IDFilm'];
                                        $name = $list[$i]['Naziv'];
                                        $link = site_url("index/film/$id");
                                        echo "<a href='"."$link"."' class='novinaslov' ><b>"."$name"."</b></a>";
                                    echo "</div>";
                                }
                            echo "</div>";
                            echo "<br>";
                        ?>
                        
					</div>
				</div>
			</div>
		</div>
		