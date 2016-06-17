        <footer class="text-center">
            <div class="container">       
                <div class="row text-center">
                    <div class="col-sm-12">
                        Author: Igor Trajanovic
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        Purpose: Educational
                    </div>
                </div>
                <br/>
                <?php if($this->session->userdata('logged_in') == false ): ?>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <a href='#' data-toggle='modal' data-target='#adminLogin'><small><span class='glyphicon glyphicon-log-in'></span> Log in as admin</small></a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </footer>

        <?php if($this->session->userdata('admin') == false) : ?>
        <div id="adminLogin" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Log in as admin</h4>
					</div>
					<div class="modal-body">
                        <?php
                            $login = site_url('index/admin_login');
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
							<div class="checkbox">
								<label><input type="checkbox"> Remember me</label>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <?php endif; ?>

    </body>
</html>

