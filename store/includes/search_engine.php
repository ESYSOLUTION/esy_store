<div class="header-search">
	<form action="searcher.php" method="get">
		<input class="input search-input" type="text" placeholder="Enter your keyword">
			<select class="input search-categories">
				<option value="0">All Categories
				</option>
				<?php
				$i = 0;
					while($i < count($product_types)){
						$val = strtolower($product_types[$i]);
						$value = strtoupper($product_types[$i]);
						echo "<option value=\"{$val}\">$value</option>";
						$i++;
					}
				?>
			</select>
			<button class="search-btn">
				<i class="fa fa-search">
				</i>
			</button>
		</form>
	</div>