
<!-- LOGIN -->
		<div class="container-fluid">
			<div class="row log-in-bar">
				<div class="col-xs-12" >
					<ul class="nav navbar-nav navbar-right">
                        <?php 
                            if($this->session->userdata('logged_in') == TRUE) {
                                $user = $this->session->userdata('Username');
                                $site = site_url('index/nalog');
                                $off  = site_url('index/logoff');
                                echo "<li><a href='"."$site"."'><small><span class='glyphicon glyphicon-user'></span> "."$user"."</small></a></li>";
                                echo "<li><a href='"."$off"."'><small><span class='glyphicon glyphicon-log-in'></span> Log off</small></a></li>";
                            } else {
                                $site = site_url('index/register');
                                echo "<li><a href='"."$site"."'><small><span class='glyphicon glyphicon-user'></span> Sign Up</small></a></li>";
                                echo "<li><a href='#' data-toggle='modal' data-target='#myModal'><small><span class='glyphicon glyphicon-log-in'></span> Log in</small></a></li>";
                            }
                        ?>
					</ul>
				</div>
			</div>
		</div>
		
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Log in</h4>
					</div>
					<div class="modal-body">
                        <?php
                            $login = site_url('index/login');
                            echo "<form role='form' method='post' action='"."$login"."'>"
                        ?>
							<div class="form-group">
								<label for="username">Username:</label>
								<input type="text" class="form-control" name="username" id="username">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" name="password" id="password">
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    <!-- NAVBAR -->
		<div class="container" >
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span> 
						</button>
						<a class="navbar-brand" href="#" style="background-color:#006699">
						BIOSKOP
						</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><?php echo anchor('index/home', 'Home')?></li>
                            <li><?php echo anchor('index/repertoar', 'Repertoar')?></li>
                            <li><?php echo anchor('index/filmovi', 'Filmovi')?></li>
						</ul>
						
                        
                        <?php
                            $link = site_url("index/filmNaziv");
                            echo "<form class='navbar-form navbar-right' method='GET' role='search' action='"."$link"."'>";
                        ?>
							<div class="form-group">
                                <?php
                                    $link = site_url("index/ajaxSearchHint");
                                    echo "<input id='pretraga' name='pretraga' href='"."$link"."' type='text' class='form-control' list='hints' placeholder='Search'>";
                                ?>
                                <datalist id="hints">
                                  <option value="Internet Explorer">
                                  <option value="Firefox">
                                </datalist>
                                
                            </div>
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</div>
				</div>
			</nav>