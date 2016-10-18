<html>
<body>
	<table style="width:400px;">
		<tbody>
			<tr>
				<td style="width:200px;">Name</td>
				<td style="width:200px;"><?php if(isset($data['name']) && !empty($data['name']))
				print $data['name']; ?></td>
			</tr>
			<tr>
				<td style="width:200px;">Email</td>
				<td style="width:200px;"><?php if(isset($data['e_mail']) && !empty($data['e_mail']))
				print $data['e_mail'];?></td>
			</tr>
			<tr>
				<td style="width:200px;">Job title</td>
				<td style="width:200px;"><?php if(isset($data['job_title']) && !empty($data['job_title']))
				print $data['job_title']; ?></td>
			</tr>
			<tr>
				<td style="width:200px;">Organization</td>
				<td style="width:200px;"><?php if(isset($data['organization']) && !empty($data['organization']))
				print $data['organization']; ?></td>
			</tr>
			<tr>
				<td style="width:200px;">ZIP code</td>
				<td style="width:200px;"><?php if(isset($data['zip_code']) && !empty($data['zip_code']))
				print $data['zip_code']; ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>