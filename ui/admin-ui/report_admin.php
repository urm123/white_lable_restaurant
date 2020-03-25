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
						<select>
							<option>Select Order Type</option>
						</select>
						<select>
							<option>Time Range</option>
						</select>
						<select>
							<option>Date Range</option>
						</select>
						<button class="print-report">Print Report</button>
						<div class="sort">Sort by:<select><option>Sort by A-Z</option></select></div>
					</div>
				</div>
				<div class="table-report">
					<table>
						<tr>
							<th>Date</th>
							<th>Time</th>
							<th>ID</th>
							<th>Order Type</th>
							<th>Order Amount</th>
							<th>Order Payment Method</th>
							<th>No. of Items</th>
						</tr>
						<tr>
							<td>15-10-2018</td>
							<td>13:05:00</td>
							<td>1234567</td>
							<td>Delivery</td>
                            <td>‎€ 8.25</td>
							<td>Visa Debit</td>
							<td>Visa Debit</td>
						</tr>
						<tr>
							<td>15-10-2018</td>
							<td>13:05:00</td>
							<td>1234567</td>
							<td>Delivery</td>
                            <td>‎€ 8.25</td>
							<td>Visa Debit</td>
							<td>Visa Debit</td>
						</tr>
						<tr>
							<td>15-10-2018</td>
							<td>13:05:00</td>
							<td>1234567</td>
							<td>Delivery</td>
                            <td>‎€ 8.25</td>
							<td>Visa Debit</td>
							<td>Visa Debit</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php';?>