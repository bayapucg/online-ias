

<?php //echo '<pre>';print_r($details); exit;?>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #fb3;
    color: white;
}
</style>
<div style="padding:0px;margin:0px auto;width:600px;border:1px #e7e7e7 solid">
			<div style="background:#ddd repeat-x;height:100px">
				<div style="float:left;margin:25px 0px 0px 25px;padding:0px;width:200px;height:100px">
				<img style="width:100px;height:auto" src="<?php echo base_url(); ?>assets/design/img/logo.png" class=""> 
				</div>
			</div>
			<div>
				<div style="background:none repeat scroll 0 0 #fff;color:#6e7179;font-size:16px;font-weight:300;line-height:24px;padding:10px 69px"> 			<p style="text-align:left">&nbsp;</p>
				<p style="text-align:left">Dear <?php echo isset($details['name'])?$details['name']:'';?>,</p>
							<p><strong>Greetings from onlineiasacademy! <img goomoji="263a" data-goomoji="263a" style="margin:0 0.2ex;vertical-align:middle;max-height:24px" alt="☺" src="https://mail.google.com/mail/e/263a" class="CToWUd"></strong></p>
						<table id="customers">
						  <tr>
							<th>Your Password</th>
											  
						  </tr>
						  <tr>
							<td><?php echo isset($details['org_pwd'])?$details['org_pwd']:'';?></td>
						  
						  </tr>
						  
						</table>
					 <p> Thanks &amp; Regards <br>
						onlineiasacademy</p>
				</div>
				<div style="clear:both"> </div>
				</div>
				</div> 
</div>
