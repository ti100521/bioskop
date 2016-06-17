        <div class="container" >
        <!-- CONTAINER BODY -->    
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body" >
						<!--<h4>Korisnicki Nalog</h4>-->
                        <div class="row">
							<div class="col-sm-3">
								<h4>Admin Nalog</h4>
							</div>
							<div class="col-sm-9 text-right">
                                <?php
                                    if($this->session->userdata('Privilegija') == 'a'){
                                        $site = site_url('index_admin/nalog_edit');
                                        echo "<a href='"."$site"."' class='btn btn-info btn-sm'>"."<span class='glyphicon glyphicon-cog'></span> Edit</a>";
                                    }
                                ?>
								
							</div>
						</div>
						<hr/>
                        
                        <form class='form-horizontal' role='form' method='post' action="#">
							<div class="form-group">
								<label class="control-label col-sm-2" for="text">Username:</label>
								<div class="col-sm-10">
                                    <?php
                                        $d = $this->session->userdata('Username');
                                        echo "<input type='text' class='form-control' name='username' placeholder="."$d"." disabled>";
                                    ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">Email:</label>
								<div class="col-sm-10">
                                    <?php
                                        $d = $this->session->userdata('Email');
                                        echo "<input type='email' class='form-control' name='email' placeholder="."$d"." disabled>";
                                    ?>
								</div>
							</div>
						</form>
                        
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php echo validation_errors('<p class="error">'); ?>
						</div>
						<hr/>
					</div>
				</div>
			</div>
		</div>