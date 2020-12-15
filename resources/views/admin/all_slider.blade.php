@extends('admin_layout')
@section('admin_content')

		
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All slider</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All sliders</h2>
						
					</div>					
					<div class="box-content">					
					</p>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th>Id</th>								
								  <th>slider image</th>								  								 	                                  
								  <th>Status</th>
								  <th>Action</th>
								  
							  </tr>
						  </thead>   

                          @foreach( $all_slider_info as $view_slider)

						  <tbody>
							<tr>
								<td >{{$view_slider->slider_id}}</td>

								<td ><img src="{{$view_slider->slider_image}}" style="height: 100px;width: 300px;">
								</td>
								                              						                              								
                                
								<td class="center">
									@if($view_slider->publication_status==1)
									<span class="label label-success">Active</span>
								
									@else
									<span class="label label-dager">Unactive</span> 

									@endif
								</td>

								<td class="center">
								  @if($view_slider->publication_status==1)
									<a class="btn btn-danger" href="{{url('/unactive-slider/'.$view_slider->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                 @else
								 <a class="btn btn-success" href="{{url('/active-slider/'.$view_slider->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>

								 @endif
									<a class="btn btn-danger" id="delete" href="{{url('/delete-slider/'.$view_slider->slider_id)}}"
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