
<!-- CONTAINER BODY -->    
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body" >
						<h4>Edit Korisnicki Nalog</h4>
						<hr/>
                        <?php 
                            $u = base_url();
                            echo "<form class='form-horizontal' role='form' enctype='multipart/form-data' method='post' action="."$u"."index.php/index/update_user".">";
                            ?>
                            <div class="form-group">
								<label class="control-label col-sm-2" for="text">old Username:</label>
								<div class="col-sm-10">
                                    <?php
                                        $d = $this->session->userdata('Username');
                                        echo "<input type='text' class='form-control' name='oldusername' placeholder="."$d"." disabled>";
                                    ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="text">new Username:</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="username">
								</div>
							</div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <hr/>
                            </div>
                            <div class="form-group">
								<label class="control-label col-sm-2" for="email">old Email:</label>
								<div class="col-sm-10">
                                    <?php
                                        $d = $this->session->userdata('Email');
                                        echo "<input type='email' class='form-control' name='oldemail' placeholder="."$d"." disabled>";
                                    ?>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">new Email:</label>
								<div class="col-sm-10">
								  <input type="email" class="form-control" name="email" >
								</div>
							</div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <hr/>
                            </div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="pwd">Password:</label>
								<div class="col-sm-10"> 
								  <input type="password" class="form-control" name="password" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="pwd">new Password:</label>
								<div class="col-sm-10"> 
								  <input type="password" class="form-control" name="newpassword" >
								</div>
							</div>
                            <div class="form-group">
								<label class="control-label col-sm-2" for="confirm">Confirm Password:</label>
								<div class="col-sm-10"> 
								  <input type="password" class="form-control" name="confirm" >
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="input-group">
										<span class="input-group-btn">
											<span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Upload Picture</span>
                                            <input name="image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
										</span>
										<span class="form-control"></span>
									</div>
								</div>
							</div>
							
							<div class="form-group"> 
                                <label class="control-label col-sm-2" for="notice">Zelim obavestenja:</label>
								<div class="col-sm-1"> 
                                    <?php
                                        $d = $this->session->userdata('ZeliObavestenja');
                                        if($d == 1){
                                            echo "<input type='checkbox' class='form-control' name='notice' checked>";
                                        } else {
                                            echo "<input type='checkbox' class='form-control' name='notice'>";
                                        }
                                    ?>
								</div>
                                
							</div>
							  
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" class="btn btn-default">Submit</button>
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