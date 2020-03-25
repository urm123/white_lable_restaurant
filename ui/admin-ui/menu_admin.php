<?php include 'header.php';?>
<section>
	<div class="container">
		<div class="row res-admin">
			<div class="col-md-2 res-admin-side">
				<?php include 'sidebar-admin.php';?>
			</div>
			<div class="col-md-10" style="/*background-color: #E5E5E5*/">
				<div class="filter-greybox">
					<div class="select-box">
						<select>
							<option>Vegitarian</option>
						</select>
						<div class="sort">Sort by:<select><option>Sort by A-Z</option></select></div>
					</div>
				</div>
				<div class="add-new-field">
					<button class="add-new" data-toggle="modal" data-target="#add-new-item-modal">Add New Item +</button>
					<button class="add-new">Add New Category +</button>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="item-list">
							<div class="row ">
								<div class="col-md-9">
									<div class="">
										<h3>Dish Title Goes Here <span class="on-off"> <label class="switch1"><input type="checkbox" checked><span class="slider1 round"></span></label></span> <span class="text-red" data-toggle="modal" data-target="#edit-item-modal">edit item</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="img-box"></div>
								</div>
							</div>
							<div class="row item-cost">
								<div class="col-md-9"></div>
								<div class="col-md-3">
                                    <h5>‎€ 8.25</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="item-list">
							<div class="row ">
								<div class="col-md-9">
									<div class="">
										<h3>Dish Title Goes Here <span class="on-off"> <label class="switch1"><input type="checkbox" checked><span class="slider1 round"></span></label></span> <span class="text-red" data-toggle="modal" data-target="#edit-item-modal">edit item</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="img-box"></div>
								</div>
							</div>
							<div class="row item-cost">
								<div class="col-md-9"></div>
								<div class="col-md-3">
                                    <h5>‎€ 8.25</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="item-list">
							<div class="row ">
								<div class="col-md-9">
									<div class="">
										<h3>Dish Title Goes Here <span class="on-off"> <label class="switch1"><input type="checkbox" checked><span class="slider1 round"></span></label></span> <span class="text-red" data-toggle="modal" data-target="#edit-item-modal">edit item</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="img-box"></div>
								</div>
							</div>
							<div class="row item-cost">
								<div class="col-md-9 col-xs-6">
									<p>Variation 01</p>
								</div>
								<div class="col-md-3 col-xs-6">
                                    <h5>‎€ 8.25</h5>
								</div>
								<div class="col-md-9 col-xs-6">
									<p>Variation 02</p>
								</div>
								<div class="col-md-3 col-xs-6">
                                    <h5>‎€ 8.25</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="item-list">
							<div class="row ">
								<div class="col-md-9">
									<div class="">
										<h3>Dish Title Goes Here <span class="on-off"> <label class="switch1"><input type="checkbox" checked><span class="slider1 round"></span></label></span> <span class="text-red" data-toggle="modal" data-target="#edit-item-modal">edit item</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="img-box"></div>
								</div>
							</div>
							<div class="row item-cost">
								<div class="col-md-9 col-xs-6">
									<p>Variation 01</p>
								</div>
								<div class="col-md-3 col-xs-6">
                                    <h5>‎€ 8.25</h5>
								</div>
								<div class="col-md-9 col-xs-6">
									<p>Variation 02</p>
								</div>
								<div class="col-md-3 col-xs-6">
                                    <h5>‎€ 8.25</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php';?>
        <!-- Add New Item Modal -->
        <div class="modal fade add-new-item-modal" id="add-new-item-modal" role="dialog">
            
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                    	<h4>Add New Item</h4>
                    	<hr>
                    	<p>Item Category</p>
                    	<select>
                    		<option>Select Item Category</option>
                    	</select>
                    	<p>Item Name*</p>
                    	<input type="text" placeholder="Enter Item Name" name="">
                    	<p>Item Description*</p>
                    	<textarea placeholder="Enter Item Description" rows="6"></textarea>
                    	<p>Item Price*</p>
                    	<input type="text" placeholder="Enter Price" name="">
                        <div class="img-upload-box">Click or Drag Item Image to Upload</div>
                        <p>Additional Notes</p>
                    	<textarea placeholder="Enter Note" rows="6"></textarea>
                    	<hr>
                    	<p>Variant 01</p>
                    	<p>Variant Name*</p>
                    	<input type="text" placeholder="Enter Variant Name" name="">
                    	<p>Variant Price*</p>
                    	<input type="text" placeholder="Enter Variant Price" name="">
                    	<hr>
                    	<p>Addon 01</p>
                    	<p>Addon Name*</p>
                    	<input type="text" placeholder="Enter Variant Addon" name="">
                    	<p>Addon Price*</p>
                    	<input type="text" placeholder="Enter Addon Price" name="">
                        <button class="add-item-varient-btn">Add Item Variant +</button>
                        <button class="add-item-varient-btn">Add Item Addon +</button>
                        <p class="checkbox-modal"><input type="checkbox" name=""> Deactivate Item</p>
                        <input type="submit" name="" value="Submit Change Request">
                    </div>
                </div>

            </div>
        </div>
        
    <!-- Add New Item Modal -->

    <!-- Edit Item Modal -->
        <div class="modal fade add-new-item-modal" id="edit-item-modal" role="dialog">
            
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                    	<h4>Edit Item</h4>
                    	<hr>
                    	<p>Item Category</p>
                    	<select>
                    		<option>Select Item Category</option>
                    	</select>
                    	<p>Item Name*</p>
                    	<input type="text" placeholder="Enter Item Name" name="">
                    	<p>Item Description*</p>
                    	<textarea placeholder="Enter Item Description" rows="6"></textarea>
                    	<p>Item Price*</p>
                    	<input type="text" placeholder="Enter Price" name="">
                        <div class="img-upload-box">Click or Drag Item Image to Upload</div>
                        <p>Additional Notes</p>
                    	<textarea placeholder="Enter Note" rows="6"></textarea>
                    	<hr>
                    	<p>Variant 01</p>
                    	<p>Variant Name*</p>
                    	<input type="text" placeholder="Enter Variant Name" name="">
                    	<p>Variant Price*</p>
                    	<input type="text" placeholder="Enter Variant Price" name="">
                    	<hr>
                    	<p>Addon 01</p>
                    	<p>Addon Name*</p>
                    	<input type="text" placeholder="Enter Variant Addon" name="">
                    	<p>Addon Price*</p>
                    	<input type="text" placeholder="Enter Addon Price" name="">
                    	<hr>
                    	<p>Promo</p>
                    	<p>Promo Code</p>
                    	<input type="text" placeholder="Enter Promo Code" name="">
                    	<p>Promo Type</p>
                    	<select>
                    		<option>Select Disscount Type</option>
                    	</select>
                    	<p>Promo Value</p>
                    	<input type="text" placeholder="Enter Promo Value" name="">
                    	<p>Usage Limit</p>
                    	<select>
                    		<option>Select Usage Limit</option>
                    	</select>
                    	<p>Expiry Date</p>
                    	<select>
                    		<option>Select Expiry Date</option>
                    	</select>
                        <button class="add-item-varient-btn">Add Item Variant +</button>
                        <button class="add-item-varient-btn">Add Item Addon +</button>
                        <p class="checkbox-modal"><input type="checkbox" name=""> Deactivate Item</p>
                        <input type="submit" name="" value="Submit Change Request">
                    </div>
                </div>

            </div>
        </div>
        
    <!-- Edit Item Modal -->