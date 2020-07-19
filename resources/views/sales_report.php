<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

			.title {
				font-size: 24px;
				border-bottom: 1px #DDD solid;
			}

			.vip {
				color: green;
			}

			.warning {
				color: orange;
			}

			.danger {
				color: red;
			}

			th {
				padding: 15px;
			}

			td {
				padding: 15px;
				border_top: 1px #DDD solid;
			}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
				<div class="title">Customer Sales Report</div>
				<table>
					<tr>
						<th>Name</th>
						<th>Number of Orders</th>
						<th>Total Cost of all Orders</th>
						<th>Status</th>
					</tr>
				<?php foreach ($customers as $customer) { ?>
					<?php $class = '';
						$class .= $customer->vip ? 'vip ' : '';
						$class .= $customer->activeNoOrders ? 'warning ' : '';
						$class .= $customer->status === 'Removed' ? 'danger ' : '';
					?>
					<tr class="<?php echo trim($class); ?>">
						<td><?php echo $customer->name; ?></td>
						<td><?php echo $customer->orders; ?></td>
						<td>$<?php echo $customer->total; ?></td>
						<td><?php echo $customer->status; ?></td>
					</tr>
				<?php } ?>
				</div>
        </div>
    </body>
</html>
