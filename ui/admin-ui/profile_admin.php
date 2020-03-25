<?php include 'header.php';?>
<section>
	<div class="container">
		<div class="row res-admin">
			<div class="col-md-2 res-admin-side">
				<?php include 'sidebar-admin.php';?>
			</div>
			<div class="col-md-10" style="/*background-color: #E5E5E5*/">
				<div class="filter-greybox">
					<div class="profile-head">
						<h4>Profile <span><a href="delivery_admin.php"> Delivery Settings</a></span><span><a href="takeaway_admin.php">Takeaway Settings</a></span><span><a href="promotion_admin">Promotions</a></span></h4>
					</div>
				</div>
				<div class="profile_class">
					<h4>Basic Information</h4>
					<div class="row profile_class-section">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Restaurant Name*</p>
									<input type="text" placeholder="Enter Restaurant Name" name="">
								</div>
								<div class="col-md-6">
									<p>Email address*</p>
									<input type="email" placeholder="Enter Email Address" name="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Phone Number*</p>
									<input type="text" placeholder="Enter Phone Number" name="">
								</div>
								<div class="col-md-6">
									<p>Website</p>
									<input type="website" placeholder="Enter Website" name="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Restaurant Country*</p>
									<select>
										<option>Select Country</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Restaurant Street Name*</p>
									<input type="text" placeholder="Enter Restaurant Street Name" name="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Restaurant City*</p>
									<select>
										<option>Select City</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Restaurant Postcode*</p>
									<input type="text" placeholder="Enter Restaurant Postcode" name="">
								</div>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
					<h4>Restaurant Attributes</h4>
					<div class="row profile_class-section">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Restaurant City*</p>
									<select>
										<option>Select City</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Restaurant Postcode*</p>
									<input type="text" placeholder="Enter Restaurant Postcode" name="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Number of Seats*</p>
									<input type="text" placeholder="Enter Number of Seats" name="">
								</div>
								<div class="col-md-6">
									<p>Is Parking Available*</p>
									<select>
										<option>Select Is Parking Available</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>Restaurant Description*</p>
									<textarea rows="6" placeholder="Enter restaurant description"></textarea>
								</div>
							</div>
						</div>
					</div>
					<h4>Restaurant Hours</h4>
					<div class="row profile_class-section">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Monday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Monday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Tuesday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Tuesday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Wednesday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Wednesday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Thursday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Thursday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Friday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Friday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Saturday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Saturday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<p>Sunday - Morning</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
								<div class="col-md-6">
									<p>Sunday - Night</p>
									<select>
										<option>Select Time Frame</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
					</div>
					<button class="profile_admin_btn">Submit Change Request</button>
				</div>
			</div>
		</div>
	</div> 
</section>
<?php include 'footer.php';?>