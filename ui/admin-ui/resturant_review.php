<?php include 'header.php';?>
<section>
	<div class="container">
		<div class="row res-admin">
			<div class="col-md-2 res-admin-side">
				<?php include 'sidebar-admin.php';?>
			</div>
			<div class="col-md-10" style="/*background-color: #E5E5E5*/">
				<div class="filter-greybox">
					<div class="select-box1">
						<h4>Reviews <a href="resturant_review_support.php"> <span class="p"> Support Tickets</span></a> 
						<select>
							<option>Date Range</option>
						</select>
						<div class="sort">Sort by:<select><option>Sort by A-Z</option></select></div></h4>
					</div>
				</div>
				<div class="table-report table-report_res_review">
					<table>
						<tr>
							<th>Date</th>
							<th>Name</th>
							<th>Rating</th>
							<th>Comment</th>
							<th></th>
						</tr>
						<tr>
							<td>15-10-2018</td>
							<td>John Doe</td>
							<td><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accu....</td>
							<td>
								<svg data-toggle="modal" data-target="#review-response-modal" width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M0 18.4766C0 19.1365 0.553691 19.6864 1.21812 19.6864H6.14597V25.7902C6.14597 26.2301 6.42282 26.6701 6.8104 26.89C6.97651 27 7.19799 27 7.36409 27C7.64094 27 7.86242 26.945 8.08389 26.78L17.995 19.6314H31.7819C32.4463 19.6314 33 19.0815 33 18.4216V1.20978C33 0.549898 32.4463 0 31.7819 0H1.21812C0.553691 0 0 0.549898 0 1.20978V18.4766ZM2.43624 2.41955H30.5084V17.2118H17.6074C17.3305 17.2118 17.1091 17.2668 16.8876 17.4318L8.63758 23.4257V18.4766C8.63758 17.8167 8.08389 17.2668 7.41946 17.2668H2.49161L2.43624 2.41955Z" fill="#828282"/><path d="M8.41516 8.08301C5.75745 8.08301 5.75745 12.1523 8.41516 12.1523C11.0729 12.1523 11.0729 8.08301 8.41516 8.08301Z" fill="#828282"/><path d="M16.4991 12.1523C19.1569 12.1523 19.1569 8.08301 16.4991 8.08301C13.8414 8.08301 13.8414 12.1523 16.4991 12.1523Z" fill="#828282"/><path d="M24.5831 12.1523C27.2409 12.1523 27.2409 8.08301 24.5831 8.08301C21.9254 8.08301 21.9254 12.1523 24.5831 12.1523Z" fill="#828282"/></g><defs><clipPath id="clip0"><rect width="33" height="27" fill="white"/></clipPath></defs></svg>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php';?>

 <!-- Edit Item Modal -->
        <div class="modal fade review-response-modal" id="review-response-modal" role="dialog">
            
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                    	<h4>Review Response</h4>
                    	<hr>
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<p>Date:</p>
							</div>
							<div class="col-md-8 col-xs-8">
								<p class="detail">15-10-2018</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<p>Name:</p>
							</div>
							<div class="col-md-8 col-xs-8">
								<p class="detail">John Doe</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<p>Rating</p>
							</div>
							<div class="col-md-8 col-xs-8">
								<p class="detail"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-xs-4">
								<p>Comment</p>
							</div>
							<div class="col-md-8 col-xs-8">
								<p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan felis ut eleifend euismod. Mauris turpis nulla, pretium sed felis et, mollis tincidunt ligula. Quisque id justo neque.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>Admin Response</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<textarea class="" placeholder="Enter comment" rows="6"></textarea>
							</div>
						</div>
                        <input type="submit" name="" value="Submit Change Request">
                    </div>
                </div>

            </div>
        </div>
        
    <!-- Edit Item Modal -->