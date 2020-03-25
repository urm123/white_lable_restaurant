<?php include 'header.php';?>
<section>
	<div class="container">
		<div class="row res-admin">
			<div class="col-md-2 res-admin-side">
				<?php include 'sidebar-admin.php';?>
			</div>
			<div class="col-md-10" style="/*background-color: #E5E5E5*/">
				<div class="filter-greybox">
					<div class="select-box1" style="display: none;">
						<h4>Reviews <a href="resturant_review_support.php"> <span class="p"> Support Tickets</span></a> 
						<select>
							<option>Date Range</option>
						</select>
						<div class="sort">Sort by:<select><option>Sort by A-Z</option></select></div></h4>
					</div>
				</div>
				<div class="billing">
					<h4>Account Plan Subscription</h4>
					<table>
						<tr>
							<th>Subscription Status</th>
							<td>Active</td>
						</tr>
						<tr>
							<th>Billing Period Start</th>
							<td>December 27th 2018, 12:27:32 am</td>
						</tr>
						<tr>
							<th>Billing Period End</th>
							<td>December 27th 2018, 12:27:32 am</td>
						</tr>
						<tr>
							<th>Latest Invoice</th>
							<td>Download</td>
						</tr>
					</table>
					<h4>Active Card</h4>
					<table>
						<tr>
							<th>John Doe - VISA - XXXX-XXXX-XXXX 2978 </th>
							<td>Active</td>
						</tr>
						<tr>
							<th>France</th>
							<td>Expires: 11/2021</td>
						</tr>
					</table>
					<p class="add-card-class">
						<button class="button-add-card">Add New Card +</button>
						<button class="button-add-card">Update Card</button>
					</p>
					<h4>Past Invoices</h4>
					<table>
						<tr>
							<th>December 27th 2018</th>
							<td>Monthly Subscription</td>
							<td><a href="">Download invoice</a></td>
						</tr>
						<tr>
							<th>December 27th 2018</th>
							<td>Monthly Subscription</td>
							<td><a href="">Download invoice</a></td>
						</tr>
						<tr>
							<th>December 27th 2018</th>
							<td>Monthly Subscription</td>
							<td><a href="">Download invoice</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php';?>