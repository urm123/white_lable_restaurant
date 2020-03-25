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
						<h4><a href="profile_admin.php">Profile</a> <span> Delivery Settings</span><span><a href="takeaway_admin.php">Takeaway Settings</a></span><span><a href="promotion_admin">Promotions</a></span></h4>
					</div>
				</div>
				<div class="delivery_admin">
					<h4>Add Post Codes for Delivery</h4>
					<p>Post Code</p>
					<div class="row">
						<div class="col-md-8">
							<div class="row delivery_admin-section1">
								<div class="col-md-8">
									<input type="text" placeholder="Enter Post Code" name="">
								</div>
								<div class="col-md-4">
									<button class="profile_admin_btn">Add Post Code +</button>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
					<div class="row delivery_admin-section">
						<div class="col-md-1">
							<div class="rect"></div>
						</div>
						<div class="col-md-2">
							<p>N10 Muswell Hill</p>
						</div>
						<div class="col-md-2">
							<input type="text" placeholder="Delivery Time" name="">
						</div>
						<div class="col-md-2">
							<input type="text" placeholder="Delivery Cost" name="">
						</div>
						<div class="col-md-2">
							<input type="text" placeholder="Miniumum Cart Value" name="">
						</div>
						<div class="col-md-2">
							<p><input type="checkbox" name=""> Free Delivery</p>
						</div>
						<div class="col-md-1">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="row delivery_admin-section">
						<div class="col-md-1">
							<div class="rect"></div>
						</div>
						<div class="col-md-2">
							<p>N11 Friern Barnet</p>
						</div>
						<div class="col-md-2">
							<input type="text" placeholder="Delivery Time" name="">
						</div>
						<div class="col-md-2">
							<input type="text" placeholder="Delivery Cost" name="">
						</div>
						<div class="col-md-2">
							<input type="text" placeholder="Miniumum Cart Value" name="">
						</div>
						<div class="col-md-2">
							<p><input type="checkbox" name=""> Free Delivery</p>
						</div>
						<div class="col-md-1">
							<label class="switch">
							  <input type="checkbox" checked>
							  <span class="slider round"></span>
							</label>
						</div>
					</div>
					<button class="profile_admin_btn admin_submit">Submit Change Request</button>
				</div>
			</div>
		</div>
	</div> 
</section>
<?php include 'footer.php';?>