@extends('layouts.app')

@section('main')
                <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">

                                @if(Session::has('success'))
                                    {{ Session::get('success'); }}
                                @endif
                                <div class="row">
						<div class="col-xl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Add New Book</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group row">
											<label  class="col-lg-3 col-form-label">Title</label>
											<div class="col-lg-9">
												<input name="title" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Author</label>
											<div class="col-lg-9">
												<input name="author" type="text" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">ISBN</label>
											<div class="col-lg-9">
												<input name="isbn" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Copies</label>
											<div class="col-lg-9">
												<input name="copies" type="text" class="form-control">
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Cove</label>
											<div class="col-lg-9">
												<input name="cover" type="file" class="form-control">
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
