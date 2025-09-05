@extends('layouts.app')

@section('main')
                <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">All Students</h3>

							</div>
						</div>
					</div>
					<!-- /Page Header -->
                        <a class="btn btn-primary" href="{{ route('student.create') }}"> Create a Student</a>
                </br>
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Photo</th>
													<th>Name</th>
													<th>Email</th>
													<th>phone</th>
													<th>student_id</th>

													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											@foreach($students as $student)
												<tr>
													<td>1</td>
                                                    <td><img style="width:50px; height:60px;" src="{{ URL::to('media/students/'. $student -> photo) }}" alt=""></td>
													<td>{{$student -> name}}</td>
													<td>{{$student -> email}}</td>
													<td>{{$student -> phone}}</td>
													<td>{{$student -> student_id}}</td>

													<td></td>
												</tr>
											@endforeach




											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
@endsection
