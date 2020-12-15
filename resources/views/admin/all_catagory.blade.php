@extends('admin_layout')
@section('admin_content')

		
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Catagory</a></li>
			</ul>
			<p class="alert-success">
					<?php
					   $message=Session::get('message');
					   if($message)
					   {
						   echo $message;
						   Session::put('message',null);
					   }
					   
					?>

			<div id="docoment" class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Catagory</h2>
						
					</div>					
					<div class="box-content">					
					</p>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Catagory ID</th>
								  <th>Catagory Name</th>
								  <th>Catagory Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                         @foreach( $all_catagory_info as $view_catagory)

						  <tbody>
							<tr>
								<td>{{$view_catagory->catagory_id}}</td>
								<td class="center">{{$view_catagory->catagory_name}}</td>
								<td class="center">{{$view_catagory->catagory_description}}</td>

								<td class="center">
									@if($view_catagory->publication_status==1)
									<span class="label label-success">Active</span>
								
									@else
									<span class="label label-dager">Unactive</span> 

									@endif
								</td>

								<td class="center">
								  @if($view_catagory->publication_status==1)
									<a class="btn btn-danger" href="{{url('/unactive/'.$view_catagory->catagory_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                 @else
								 <a class="btn btn-success" href="{{url('/active/'.$view_catagory->catagory_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>

								 @endif

									<a class="btn btn-info" href="{{url('/edit-catagory/'.$view_catagory->catagory_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" id="delete" href="{{url('/delete-catagory/'.$view_catagory->catagory_id)}}"
									onclick='return confirm_alert(this);'>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						
							
						  </tbody>

						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			</div><!--/row-->
    


@endsection