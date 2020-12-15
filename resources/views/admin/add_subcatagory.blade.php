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
					<a href="#">Add Catagory</a>
				</li>
				<p class="alert-success">
					<?php
					   $message=Session::get('message');
					   if($message)
					   {
						   echo $message;
						   Session::put('message',null);
					   }
					   
					?>
			</ul>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Catagory </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/save-subcatagory')}}" method="post">
                            @csrf 
						  <fieldset>
                                                        
                            <div class="control-group">                            	
                            <label class="control-label" for="selectError3">Select Catagory</label>
                               
								<div class="controls">
								  <select id="selectError3" name="catagory_id">
                                  <?php 
							            $all_publish_catagory=DB::table('tbl_catagory')
												  ->where('publication_status',1)
												  ->get();
							
							
                                        foreach($all_publish_catagory as $view_catagory) { ?>
                                                     
									<option value="{{$view_catagory->catagory_id}}" >{{$view_catagory->catagory_name}}</option>
                                  <?php } ?> 
								  </select>
								</div>
                            </div> 
                            <div class="control-group">
							  <label class="control-label" for="date01">Sub Catagory Name</label>
							  <div class="controls">
								<input type="text" class="input-type" id="date01" name="subcatagory_name" required>
							  </div>
                            </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection