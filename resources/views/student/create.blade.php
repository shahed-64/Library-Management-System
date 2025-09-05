@extends('layouts.app')

@section('main')
                <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">

						@include('layouts.components.massage')
                                <div class="row">
						<div class="col-xl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Add New Student</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group row">
											<label  class="col-lg-3 col-form-label">Name</label>
											<div class="col-lg-9">
												<input name="name" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Email</label>
											<div class="col-lg-9">
												<input name="email" type="email" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Phone</label>
											<div class="col-lg-9">
												<input name="phone" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Student Id</label>
											<div class="col-lg-9">
												<input name="student_id" type="text" class="form-control">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Photo</label>
											<div class="col-lg-9">
												<input name="photo" type="file" class="form-control">
											</div>
										</div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>


							</div>
						</div>
					</div>
					<!-- /Page Header -->



				</div>
			</div>
@endsection
