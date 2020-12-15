@extends('admin_layout')
@section('admin_content')


<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add Product</a>
	</li>
	<p class="alert-success">
		<?php
		$message = Session::get('message');
		if ($message) {
			echo $message;
			Session::put('message', null);
		}

		?>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product </h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>

		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/save-slider')}}" method="post" enctype="multipart/form-data">
				@csrf
				<fieldset>
				
					<div class="control-group">
						<label class="control-label" for="fileInput">Slider Image</label>
						<div class="controls">
							<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file" required>
						</div>
					</div>

				
					<div class="control-group">
						<label class="control-label" for="date01">Publication Status</label>
						<div class="controls">
							<label class="container">
								<input type="radio" name="publication_status" value="1" >Yes
								<span class="checkmark"></span>
							</label>
						</div>

						<div class="controls">
							<label class="container">
								<input type="radio" name="publication_status" value="0">No
								<span class="checkmark"></span>
							</label>
						</div>

						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Save changes</button>
							<button type="reset" class="btn">Cancel</button>
						</div>
				</fieldset>
			</form>

		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->
@endsection