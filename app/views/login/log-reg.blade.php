<div class="modal fade" id="log-reg-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header hidden">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Koneksyon / Kreye Kont</h4>
			</div>
			<div class="modal-body">
				<div role="tabpanel">
				    <!-- Nav tabs -->
				    <ul class="nav nav-pills nav-justified" role="tablist">
				        <li role="presentation" class="active">
				            <a
				            	href="#login"
				            	aria-controls="login"
				            	role="tab"
				            	data-toggle="tab">
				            	<i class="fa fa-sign-in"></i> Koneksyon
				            </a>
				        </li>
				        <li role="presentation">
				            <a
				            	href="#register"
				            	aria-controls="register"
				            	role="tab"
				            	data-toggle="tab">
				            	<i class="fa fa-user"></i> Kreye Yon Kont
				            </a>
				        </li>
				    </ul>

					<hr>
				    <!-- Tab panes -->
				    <div class="tab-content">
				        <div role="tabpanel" class="tab-pane active" id="login">

				        	@include('login.form-login')

				        </div>
				        <div role="tabpanel" class="tab-pane" id="register">

				        	@include('login.form-register')

				        </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer hidden">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary"></button>
			</div>
		</div>
	</div>
</div>