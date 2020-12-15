@extends('admin_layout')
@section('admin_content')

		
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Manufacture</a></li>
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
			<div id="docoment" class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Manufacture</h2>
						
					</div>					
					<div class="box-content">					
					</p>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Manufacture ID</th>
								  <th>Manufacture Name</th>
								  <th>Manufacture Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

                         @foreach( $all_manufacture_info as $view_manufacture)

						  <tbody>
							<tr>
								<td>{{$view_manufacture->manufacture_id}}</td>
								<td class="center">{{$view_manufacture->manufacture_name}}</td>
								<td class="center">{{$view_manufacture->manufacture_description}}</td>

								<td class="center">
									@if($view_manufacture->publication_status==1)
									<span class="label label-success">Active</span>
								
									@else
									<span class="label label-dager">Unactive</span> 

									@endif
								</td>

								<td class="center">
								  @if($view_manufacture->publication_status==1)
									<a class="btn btn-danger" href="{{url('/unactive-status/'.$view_manufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
                                 @else
								 <a class="btn btn-success" href="{{url('/active-status/'.$view_manufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>

								 @endif

									<a class="btn btn-info" href="{{url('/edit-manufacture/'.$view_manufacture->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" id="delete" href="{{url('/delete-manufacture/'.$view_manufacture->manufacture_id)}}"
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