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
			<form class="form-horizontal" action="{{ url('/save-product')}}" method="post" enctype="multipart/form-data">
				@csrf
				<fieldset>

					<div class="control-group">
						<label class="control-label" for="date01">Product Name</label>
						<div class="controls">
							<input type="text" class="input-type" id="date01" name="product_name" required>
						</div>
					</div>

					<div class="control-group">


						<label class="control-label" for="selectError3">Product Catagory</label>


						<div class="controls">
							<select id="selectError3" name="catagory_id">
								<?php
								$all_publish_catagory = DB::table('tbl_catagory')
									->where('publication_status', 1)
									->get();


								foreach ($all_publish_catagory as $view_catagory) { ?>

									<option value="{{$view_catagory->catagory_id}}">{{$view_catagory->catagory_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">sub Catagory</label>


						<div class="controls">
							<select id="selectError3" name="subcatagory_id">
								<?php
								$all_publish_subcatagory = DB::table('tbl_subcatagory')

									->get();


								foreach ($all_publish_subcatagory as $view_subcatagory) { ?>

									<option value="{{$view_subcatagory->subcatagory_id}}">{{$view_subcatagory->subcatagory_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Brand Name</label>
						<div class="controls">
							<select id="selectError3" name="manufacture_id">
								<?php
								$all_publish_manufacture = DB::table('tbl_manufacture')
									->where('publication_status', 1)
									->get();

								foreach ($all_publish_manufacture as $view_manufacture) { ?>
									<option value="{{$view_manufacture->manufacture_id}}">{{$view_manufacture->manufacture_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>


					<div class="control-group hidden-phone">Product short Description</label>
						<div class="controls">
							<textarea class="cleditor" name="product_short_description" id="textarea2" rows="3" required></textarea>
						</div>
					</div>

					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product long Description</label>
						<div class="controls">
							<textarea class="cleditor" name="product_long_description" id="textarea2" rows="3" required></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Price</label>
						<div class="controls">
							<input type="text" class="input-type" id="date01" name="product_price" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="fileInput">Image</label>
						<div class="controls">
							<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Size</label>
						<div class="controls">
							<input type="text" class="input-type" id="date01" name="product_size" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Color</label>
						<div class="controls">
							<input type="text" class="input-type" id="date01" name="product_color" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Publication Status</label>
						<div class="controls">
							<label class="container">
								<input type="radio" name="publication_status" value="1">Yes
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