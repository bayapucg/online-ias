<head>
	<title>Online IAS Academy | By Kiran Anishetti </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="onlineiasacademy, online-ias-academy, online ias academy in hyderabad, political science, upsc mains, civil services" name="keywords"/>
  <meta content="Online IAS Academy - The vision to reach millions of Civil Service aspirants all over India especially with optional subjects Political Science and International Relations." name="description"/>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158852895-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158852895-1');
</script>
</head>
			  <span id="chat_msgs_id">
			  <div class="panel-body px-2 panel-body-cus" id="div1">
				<?php if(isset($vd_li) && count($vd_li)>0){ ?>
                    <ul class="chat">
						<?php foreach($vd_li as $vli){ ?>
							<?php if($vli['type']=='Reply'){ ?>
								<li class="left clearfix"><span class="chat-img pull-left">
									<img src="<?php echo base_url('assets/design/img/u.png'); ?>" alt="User Avatar" class="img-circle" />
								</span>
									<div class="chat-body clearfix">
										<div class="header">
											<strong class="primary-font"><?php echo isset($vli['c_name'])?$vli['c_name']:''; ?></strong> <small class="pull-right text-muted">
												<span class="glyphicon glyphicon-time"></span><?php echo isset($vli['created_at'])?$vli['created_at']:''; ?></small>
										</div>
										<p>
											<?php echo isset($vli['m_text'])?$vli['m_text']:''; ?>
										</p>
									</div>
								</li>
							<?php }else{ ?>
								<li class="right clearfix"><span class="chat-img pull-right">
									<img src="<?php echo base_url('assets/design/img/me.png'); ?>" alt="User Avatar" class="img-circle" />
								</span>
									<div class="chat-body clearfix">
										<div class="header">
											<small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo isset($vli['created_at'])?$vli['created_at']:''; ?></small>
											<strong class="pull-right primary-font"><?php echo isset($vli['ad_name'])?$vli['ad_name']:''; ?></strong>
										</div>
										<p>
											<?php echo isset($vli['m_text'])?$vli['m_text']:''; ?>
										</p>
									</div>
								</li>
							<?php } ?>
						<?php } ?>
                        
                        
                    </ul>
				<?php } ?>
                </div>
				</span>
                