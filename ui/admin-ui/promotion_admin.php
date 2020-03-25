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
						<h4><a href="profile_admin.php">Profile</a> <span> <a href="delivery_admin.php">Delivery Settings</a></span><span><a href="takeaway_admin.php">Takeaway Settings</a></span><span>Promotions</span></h4>
					</div>
				</div>
				<div class="delivery_admin">
					<h4>Site Wide Discount<label class="switch switch_promotion"> <input type="checkbox" checked><span class="slider round"></span></label></h4>
					<p>Post Code</p>
					<div class="row">
						<div class="col-md-8">
							<div class="row delivery_admin-section1">
								<div class="col-md-4">
									<p>Discount Type  (Flat Rate / %)</p>
									<select>
										<option>Select Discount Type</option>
									</select>
								</div>
								<div class="col-md-4">
									<p>Discount Value</p>
									<input type="text" placeholder="Enter Discount Value" name="">
								</div>
								<div class="col-md-4">
									<p>Discount Duration</p>
									<select>
										<option>Select Duration</option>
									</select>
								</div>
								<button class="profile_admin_btn admin_save">Save Changes</button>
							</div>
							<h4>Discount Specific Menu Items<label class="switch switch_promotion1"> <input type="checkbox" checked><span class="slider round"></span></label></h4>
							<h5>Activating this option will activation promotional fields for individual menu items. Visit the Menu, and edit menu items were you would like to apply promotions to.</h5>
							<h4>Promo Codes<label class="switch switch_promotion2"> <input type="checkbox" checked><span class="slider round"></span></label></h4>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-12">
							<table>
								<tr>
									<th>FREEDELIVERY2019</th>
									<td>Percentage Discount</td>
									<td>50%</td>
									<td>Free shipping on all items in the cart</td>
									<td>0 / ∞</td>
									<td>November 5, 2018</td>
									<td>
										<div class="row">
											<div class="col-md-4">
												<svg width="23" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M24.9993 3.99158C24.9993 2.93053 24.5782 1.92 23.7888 1.16211C22.9993 0.40421 21.9467 0 20.8414 0C19.7361 0 18.6835 0.40421 17.894 1.16211L2.26244 16.1432L0.025598 22.6358C-0.184928 23.4442 0.57823 24.1768 1.42034 23.9747L8.15718 21.8021L23.7624 6.82105C24.5782 6.06316 24.9993 5.07789 24.9993 3.99158ZM6.63086 17.6084C5.97297 16.9768 5.20981 16.5474 4.3677 16.2947L17.0519 4.11789L20.6835 7.60421L7.99928 19.8063C7.73613 18.9726 7.26244 18.24 6.63086 17.6084ZM3.5256 17.6589C5.05191 17.9621 6.26244 19.1242 6.60455 20.6147L2.60455 22.1305C2.23612 22.2316 1.89402 21.9032 1.99928 21.5495L3.5256 17.6589ZM21.8151 6.54316L18.1835 3.05684L19.0256 2.24842C20.0256 1.28842 21.6572 1.28842 22.6572 2.24842C23.6572 3.20842 23.6572 4.77474 22.6572 5.73474L21.8151 6.54316Z" fill="#219653"/>
</svg>

											</div>
											<div class="col-md-4">
												<svg width="22" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.557 2.05795C16.127 2.05795 16.5629 1.61204 16.5629 1.02893C16.5964 0.480113 16.1605 0.0342028 15.6241 -9.80224e-05C15.5906 -9.80224e-05 15.5906 -9.80224e-05 15.557 -9.80224e-05H7.44333C6.90689 -0.0343988 6.47103 0.411511 6.4375 0.960324C6.4375 0.994625 6.4375 0.994625 6.4375 1.02893C6.4375 1.61204 6.87336 2.05795 7.44333 2.05795H15.557Z" fill="#EB5757"/>
<path d="M9.15231 19.9971C9.68876 19.9628 10.1246 19.5169 10.1581 18.9681V11.5934C10.1581 11.0103 9.72229 10.5644 9.15231 10.5644C8.61587 10.5301 8.18001 10.976 8.14648 11.5248C8.14648 11.5591 8.14648 11.5591 8.14648 11.5934V18.9681C8.14648 19.5512 8.58234 19.9971 9.15231 19.9971Z" fill="#EB5757"/>
<path d="M13.8476 19.9972C14.4176 19.9972 14.8535 19.5513 14.8535 18.9681V11.5935C14.887 11.0447 14.4511 10.5988 13.9147 10.5645C13.8812 10.5645 13.8812 10.5645 13.8476 10.5645C13.2777 10.5645 12.8418 11.0104 12.8418 11.5935V18.9681C12.8753 19.517 13.3112 19.9629 13.8476 19.9972Z" fill="#EB5757"/>
<path d="M21.9942 4.52725H1.00583C0.469388 4.49294 0.0335277 4.93886 0 5.48767C0 5.52197 0 5.52197 0 5.55627C0 6.13938 0.43586 6.58529 1.00583 6.58529H2.51458V22.9125C2.51458 24.6275 3.85569 25.9995 5.53207 25.9995H17.4679C19.1443 25.9995 20.4854 24.6275 20.4854 22.9125V6.58529H21.9942C22.5641 6.58529 23 6.13938 23 5.55627C23.0335 5.00746 22.5977 4.56155 22.0612 4.52725C22.0277 4.52725 22.0277 4.52725 21.9942 4.52725ZM18.4738 22.9125C18.5073 23.4613 18.0714 23.9072 17.535 23.9415C17.5015 23.9415 17.5015 23.9415 17.4679 23.9415H5.53207C4.99563 23.9758 4.55977 23.5299 4.52624 22.9811C4.52624 22.9468 4.52624 22.9468 4.52624 22.9125V6.58529H18.4738V22.9125Z" fill="#EB5757"/>
</svg>

											</div>
											<div class="col-md-4">
												<svg width="38" height="22" viewBox="0 0 39 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect y="3.79297" width="39" height="14.4138" rx="7.2069" fill="#6FCF97"/>
<ellipse cx="28.125" cy="11" rx="10.875" ry="11" fill="#219653"/>
</svg>

											</div>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<button class="profile_admin_btn admin_submit admin_new_promo">Add New Code +</button>
					<button class="profile_admin_btn admin_submit">Submit Change Request</button>
				</div>
			</div>
		</div>
	</div> 
</section>
<?php include 'footer.php';?>