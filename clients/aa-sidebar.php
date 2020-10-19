
<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading"></li>
			
			<li><a href="dashboard.php">
				<i class="metismenu-icon pe-7s-notebook"></i>Dashboard</a>
			</li> 
			
            <li>
                <a href="particulars.php">
                    <i class="metismenu-icon pe-7s-box2"></i>
                    Equipments
                    <i class="metismenu-icon pe-7s-angle-down"></i>
                </a>
               </li>
			   <!--
				<ul>
                    <li>
                        <a href="partmecha.php">
                            <i class="metismenu-icon">
                            </i>Mechanical
                        </a>
                    </li>
					   <li>
                        <a href="partelec.php">
                            <i class="metismenu-icon">
                            </i>Electrical
                        </a>
                    </li>
					  <li>
                        <a href="partcni.php">
                            <i class="metismenu-icon">
                            </i>Control & Instrumental
                        </a>
                    </li>
                </ul>
            </li> -->
	
			
			<li><a href="request.php">
				<i class="metismenu-icon pe-7s-credit"></i>Create Demand</a>
			</li>
			
			<?php $cart = isset($_SESSION['cart'])? count($_SESSION['cart']) : 0; ?>
			<li>
				<?php if (isset($_POST['add_to_cart'])) {
              echo '<a href="request-cart.php">
				<i class="metismenu-icon pe-7s-credit"></i>Cart</a>';
				}
				else
				{
					echo '<a href="request-cart.php">
				<i class="metismenu-icon pe-7s-credit"></i> Cart 
				<span class="text-danger">('.$cart.')</span></a>';
				}
				?>
			</li>

			<li><a href="request-list.php">
				<i class="metismenu-icon pe-7s-credit"></i>My Demand</a>
			</li>
			
            <!--<li><a href="dashboard-boxes.html">
                <i class="metismenu-icon pe-7s-display2"></i>Invoices</a>
            </li>-->
	         
        </ul>
    </div>
</div>
