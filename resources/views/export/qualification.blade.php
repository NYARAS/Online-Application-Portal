<style type="text/css">
	html,body{
		padding: 0;
		margin: 0;
		width: 100%;
		background: #fff;
		font-family:Arial, 'Sans Serif','Time News Romain';
		font-size: 10pt;
	}

	table{
		width: 700px;
		margin: 0 auto;
		text-align: left;
		border-collapse: collapse;
	}

	th{padding-left: 2px;}
	td{padding: 2px;}

	.aeu{
		text-align: right;
		padding-right: 10px;
		font-family: 'time news romain','Khmer OS Moul Light';
	}

	.line-top{
		border-left: 1px solid;
		padding-left: 10px;
		font-family: 'time news romain','Khmer OS Moul Light';
	}

	.verify{
		font-family: 'time news romain','Khmer OS Moul Light';
	}

	.imageAeu{width: 100px; height: 70px;}

	.th{
		background-color: #ddd;
		border:1px solid;
		text-align: center;
	}


	.line-row{
		background-color: #fff;
		border:1px solid;
		text-align: center;
	}

	#container{
		width: 100%;
		margin: 0 auto;
	}

	.khm-os{
		font-family: 'time news romain';
	}

	.divide{width: 100%; margin: 0 auto;}


	hr{
		width: 100%;
		margin-right: 0;
		margin-left: 0;
		padding: 0;
		margin-top: 35px;
		margin-bottom: 20px;
		border:0 none;
		border-top: 1px solid #322f32;
		background: none;
		height: 0;

	}

	button{
		margin: 0 auto;
		text-align: center;
		height: 100%;
		width: 100%;
		cursor: pointer;
		font-weight: bold;
	}

	.length-limit{max-height: 350px;min-height: 350px;}

	.div-button{
		width: 100%;
		margin-top: 0px;
		height: 50px;
		text-align: center;
		margin-bottom: 10px;
		border-bottom: 1px solid;
		background: #ccc;
	}
	.avatar{
			border-radius: 100px;
			max-width: 120px;
	}

	h1,h2,h3,h4,h5,h6{
		font-family: Poppins;
	}

	</style>

  @foreach( $qualifications ->all() as $q )



<table>



<tr>
	<td style="padding-left: 6px;">
		<p style="font-weight: normal; font-size:6pt" class="">Tel: +254 020 5131400, P. O. Box 861 - 20500, Narok, Kenya</p>
		<p style="font-weight:normal;font-size:6pt">Email:calvineotieno@gmail.com</p>
	</td>



	<td  style="padding-left:140px; width: 100px;"><img src="{{url('public/images/mmu2.jpg')}}" width="100" height="100" alt=""/>


				</td>
				<td colspan="2" style="text-align: right;"></td>
	<td colspan="0" style="text-align: right; padding-left: 80px;">
			<img src="{{$q->applicant_photo}}" class="imageAeu"/>

				</td>
					<h5 style="text-align:center">Office of Deputy Vice Chancellor (Administration, Finance and Planning)</h5>
<h4 style="text-align:center">Maasai Mara University</h4>

			       </h5>

</tr>



</table>

{{------------------------}}
<hr>
<table>
<tr>
<td style="width: 120px; padding: 5px 0px;">
<u style="font-family:Poppins">Applicant ID: <b>{{sprintf("%05d", $q->applicant_id)}}</b></u>
	</td>


</tr>
<tr>
		<td><h3><u>PERSONAL INFORMATION</h3></u></td>
</tr>
<tr>



	<td style="width: 200px; padding: 5px 0px;">
	Full Name: <b>	{{$q->name}}</b>

	</td>
	<td style="width: 120px; padding: 5px 0px;">
	Marital Status: <b>	{{$q->marital_status}}</b>

	</td>

	<td style="width: 200px; padding: 5px 0px;">
Sex: <b>	{{$q->gender}}</b>

	</td>
	<td style="width: 120px; padding: px 0px;">
Birth Date: <b>	{{$q->dob}}</b>

	</td>



</tr>
<tr>
		<td style="width: 12px;">
		Post Applied: <b>{{$q->vacancy}}</b>
	</td>
</tr>
</table>


{{-------------------}}
<hr>
<table>
<tr>
		<td style="width: 200px; padding: 5px 0px;">
			<h3><u>QUALIFICATIONS</h3>(<i>Please check with the downloaded files for verification</i>)</u></td>
</tr>
<tr>




	<td style="width: 200px; padding: 5px 0px;">
	Year: <b>	{{$q->year_of_completion}}</b>

	</td>






</tr>
<tr>



	<td style="width: 200px; padding: 5px 0px;">
	{{$q->academic_level}}: <b>	{{$q->institution_name}}</b>

	</td>
	<td style="width: 200px; padding: 5px 0px;">
	Year: <b>	{{$q->year_of_completion}}</b>

	</td>






</tr>

</table>
{{------------------------}}

<hr>
<table>
<tr>
		<td style="width: 200px; padding: 5px 0px;">
			<h3><u>EXPERIENCE</h3>(<i>Please check with the downloaded files for verification</i>)</u></td>
</tr>
</table>
{{-------------------------------}}

<table width="1290" border="1">

		<thead>


		<tr>

			<th>Institution Name</th>
			<th>Worked As</th>
			<th>From</th>
			<th>TO</th>

		</tr>
			</thead>
				<tbody>
		<tr>
			<td>{{$q->job_category}}</td>
			<td>{{$q->start_date}}</td>





		</tr>

	</tbody>
	</table>

{{---------------------------}}

{{------------------------}}

<hr>
<table>
<tr>
		<td style="width: 200px; padding: 5px 0px;">
			<h3><u>PUBLICATIONS AND WORKSHOPS</h3>(<i>Please check with the downloaded files for verification</i>)</u></td>
</tr>
</table>
{{-------------------------------}}


{{---------------------------}}

<hr>
<table>
<tr>
		<td style="width: 200px; padding: 5px 0px;">
			<h3><u>REFEREES</h3>(<i>Please check with the downloaded files for verification</i>)</u></td>
</tr>
</table>
{{-------------------------------}}
<table width="1290" border="1">

		<thead>


		<tr>

			<th class="th">Referee Name</th>




		</tr>
			</thead>

	</table>



{{-------------------}}

{{--------------------}}

<table>
	<tr>
		<td>
			<b class="verify">Note:</b>
			<p style="display: inline-block;">
			Please check the downloaded files for verification
			</p>
		</td>
		<td>


		<br><br>
		Printed: {{date('d-M-Y g:i:s A')}}
</td>
		<td style="vertical-align: top;">
			Printed By: {{Auth::user()->user_type}}
		</td>
	</tr>
</table>


</div>
<br><br><br><br><br><br>
{{---------------------}}

<table>
<tr>
	<td style="font-size: 10pt; text-align: center;">
Tel: +254 020 5131400, P. O. Box 861 - 20500, Narok, Kenya

	</td>

</tr>
<tr>
<td style="font-size: 10pt; text-align: center;">
Phone:(+254) 716 862 55/ 776210228 Email:calvineotieno@gmail.com

</td>
</tr>

</table>


<hr>


@endforeach
