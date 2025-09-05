 @extends('layouts.app')

@section('main')
<div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">

<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img src="{{ URL::to('media/students/' . $student -> photo )}}" alt="">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{ $student -> name }}</h4>
										<h6 class="text-muted">{{ $student -> email }}</h6>

										</div>
									<div class="col-auto profile-btn">

										<a href="#" class="btn btn-primary">
											Edit
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Assign a book</a>
									</li>
								</ul>
							</div>
							<div class="tab-content profile-tab-cont">

								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">

									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span>
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10">{{ $student -> name }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10">{{ $student -> email }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Student Id</p>
														<p class="col-sm-10">{{ $student -> student_id }}</p>
													</div>

												</div>
											</div>

											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" role="dialog" aria-hidden="true" style="display: none;">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<form>
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" class="form-control" value="John">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text" class="form-control" value="Doe">
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" value="24-07-1983">
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="johndoe@example.com">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text" value="+1 202-555-0125" class="form-control">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" class="form-control" value="4663 Agriculture Lane">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" class="form-control" value="Miami">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>State</label>
																			<input type="text" class="form-control" value="Florida">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Zip Code</label>
																			<input type="text" class="form-control" value="22434">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" class="form-control" value="United States">
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->

										</div>


									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->

								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
                                    @include('layouts.components.massage')
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Choose a Book</h5>
											<div class="row">

												<div class="col-md-10 col-lg-6">
													<form action="{{ route('borrow.store') }}" method="POST">
                                                        @csrf
														<div class="form-group">
                                                            <select name="book_id" class="form-control">

                                                                @foreach ( $book as $single_book )
                                                                <option value="{{ $single_book -> id }}">
                                                                    {{ $single_book -> title }}
                                                                </option>
                                                                @endforeach


                                                            </select>
															<label>Return Date</label>
															<input name="return_date" type="date" class="form-control">
														</div>

														<div class="form-group">
															<input name="student_idc" type="hidden" value="{{ $student -> id }}" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Borrow a Book</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->

							</div>
						</div>
					</div>
@endsection
