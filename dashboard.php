
<div class="main">
	<div class="container-fluid">
		<!-- Header Section -->
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-lg-12">
				<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px; border-radius: 15px; color: white; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
					<h1 style="margin: 0 0 10px 0; font-weight: 700;">مرحباً، <?php echo $user['name'];?></h1>
					<p style="margin: 0; font-size: 18px; opacity: 0.9;">لوحة التحكم - نظام إدارة الفنادق</p>
				</div>
			</div>
		</div>

		<!-- Stats Cards Row 1 -->
		<div class="row" style="margin-bottom: 25px;">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px; border-radius: 12px; color: white; box-shadow: 0 5px 15px rgba(102,126,234,0.3); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; opacity: 0.9;">مجموع الغرف</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 36px;"><?php include 'counters/room-count.php'?></h2>
						</div>
						<i class="fa fa-bed" style="font-size: 50px; opacity: 0.3;"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); padding: 25px; border-radius: 12px; color: white; box-shadow: 0 5px 15px rgba(17,153,142,0.3); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; opacity: 0.9;">جميع الحجوزات</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 36px;"><?php include 'counters/reserve-count.php'?></h2>
						</div>
						<i class="fa fa-bookmark" style="font-size: 50px; opacity: 0.3;"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 25px; border-radius: 12px; color: white; box-shadow: 0 5px 15px rgba(240,147,251,0.3); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; opacity: 0.9;">طاقم العمل</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 36px;"><?php include 'counters/staff-count.php'?></h2>
						</div>
						<i class="fa fa-users" style="font-size: 50px; opacity: 0.3;"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 25px; border-radius: 12px; color: white; box-shadow: 0 5px 15px rgba(79,172,254,0.3); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; opacity: 0.9;">الغرف المحجوزة</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 36px;"><?php include 'counters/bookedroom-count.php'?></h2>
						</div>
						<i class="fa fa-reorder" style="font-size: 50px; opacity: 0.3;"></i>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats Cards Row 2 -->
		<div class="row" style="margin-bottom: 25px;">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); border-right: 4px solid #11998e; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; color: #7f8c8d;">الغرف المتاحة</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 32px; color: #11998e;"><?php include 'counters/avrooms-count.php'?></h2>
						</div>
						<i class="fa fa-check-circle" style="font-size: 45px; color: #11998e; opacity: 0.2;"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); border-right: 4px solid #f093fb; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; color: #7f8c8d;">تم دفع مبلغ منها</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 32px; color: #f093fb;"><?php include 'counters/checkedin-count.php'?></h2>
						</div>
						<i class="fa fa-check-square-o" style="font-size: 45px; color: #f093fb; opacity: 0.2;"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); border-right: 4px solid #eb3349; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 14px; color: #7f8c8d;">المدفوعات المعلقة</p>
							<h2 style="margin: 10px 0 0 0; font-weight: 700; font-size: 32px; color: #eb3349;"><?php include 'counters/pendingpay-count.php'?></h2>
						</div>
						<i class="fa fa-spinner" style="font-size: 45px; color: #eb3349; opacity: 0.2;"></i>
					</div>
				</div>
			</div>
		</div>

		<!-- Financial Cards -->
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); padding: 30px; border-radius: 12px; color: white; box-shadow: 0 5px 15px rgba(17,153,142,0.3);">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 16px; opacity: 0.9;">المبالغ المدفوعة</p>
							<h2 style="margin: 15px 0 0 0; font-weight: 700; font-size: 42px;">$<?php include 'counters/income-count.php'?></h2>
						</div>
						<i class="fa fa-money" style="font-size: 60px; opacity: 0.3;"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6">
				<div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 30px; border-radius: 12px; color: white; box-shadow: 0 5px 15px rgba(240,147,251,0.3);">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div>
							<p style="margin: 0; font-size: 16px; opacity: 0.9;">في انتظار الدفع</p>
							<h2 style="margin: 15px 0 0 0; font-weight: 700; font-size: 42px;">$<?php include 'counters/pendingpayment.php'?></h2>
						</div>
						<i class="fa fa-credit-card" style="font-size: 60px; opacity: 0.3;"></i>
					</div>
				</div>
			</div>
		</div>

		<!-- Personal Info Section -->
		<div class="row" style="margin-top: 30px;">
			<div class="col-lg-12">
				<div style="background: white; padding: 35px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); text-align: center;">
					<h2 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;">المهندس أحمد ياسين</h2>
					<p style="font-size: 18px; color: #7f8c8d; margin-bottom: 25px;">مبرمج، مسوق إلكتروني، وصانع محتوى تقني</p>
					<a href="https://linktr.ee/ahdevloper" target="_blank" style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 35px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: transform 0.3s ease; box-shadow: 0 4px 15px rgba(102,126,234,0.3);" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
						<i class="fa fa-external-link" style="margin-left: 10px;"></i>زيارة صفحتي الشخصية
					</a>
				</div>
			</div>
		</div>

	</div>
</div>

</body>
</html>