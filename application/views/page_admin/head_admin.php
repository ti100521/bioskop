	<!-- LOGIN -->
		<div class="container-fluid">
			<div class="row log-in-bar">
				<div class="col-xs-12" >
					<ul class="nav navbar-nav navbar-right">
                        <?php
                            $user = $this->session->userdata('Username');
                            $site = site_url('index_admin/nalog');
                            $off  = site_url('index_admin/logoff');
                            $db = site_url('index_admin/db');
                            echo "<li><a href='"."$db"."'><span class='glyphicon glyphicon-tasks'></span> DB</a></li>";
                            echo "<li><a href='"."$site"."'><small><span class='glyphicon glyphicon-user'></span> "."$user"."</small></a></li>";
                            echo "<li><a href='"."$off"."'><small><span class='glyphicon glyphicon-log-in'></span> Log off</small></a></li>";
                        ?>
					</ul>
				</div>
			</div>
		</div>