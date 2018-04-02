<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle visible-xs visible-sm collapsed pull-left" id="showLeftPush">
				<i class="md md-menu"></i>
			</button>
			<a class="navbar-brand"  href="{{ URL::to('admin/dashboard') }}">Trading Club Academy</a>
			<button type="button" class="navbar-toggle pull-right" id="showRightPush">
				<i class="md md-more-vert"></i>
			</button>
		</div>
		<div class="hidden-xs">

			<ul class="nav navbar-nav navbar-right">

				<li>
					<div class="btn-group navbar-btn">
						<a href="{{ URL::to('admin/logout') }}" class="btn btn-success" > Cerrar Sesión</a>

					</div>
				</li>



			</ul>
		</div>
	</div>
</nav>
