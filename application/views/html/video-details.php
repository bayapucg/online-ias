
<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-8">
			<video controls width="100%">
					<source src="<?php echo base_url('assets/video/'.$v_de['video']); ?>" type="video/mp4">
					<source src="<?php echo base_url('assets/video/'.$v_de['video']); ?>" type="video/ogg">
				</video>
		</div>
		<div class="col-md-4 bg-white" style="border:1px solid #ddd;">
		
			  <div class="panel-heading bg-primary text-white p-1">	<h4> Chat Box</h4>
			  </div>
			  <span id="chat_msgs_id">
			  <div class="panel-body px-2 panel-body-cus" id="div0">
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
                <div class="panel-footer">
                    <div class="input-group">
                        <input  type="text" id="msg_text" name="msg_text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-sm" id="btn-chat" onclick="send_msg_chat();">
                                Send</button>
                        </span>
                    </div>
                </div>
		</div>
		</div>
		</div>
	</section>
	<script>
	function send_msg_chat(){
		var m_s_g=$('#msg_text').val();
		jQuery.ajax({
                    url: "<?php echo base_url('videos/send_chat_msg');?>",
                    data: {
                        msg: m_s_g,
                        v_id: '<?php echo isset($v_de['v_id'])?$v_de['v_id']:''; ?>',
                    },
                    type: "POST",
                    format: "HTML",
                    success: function(data) {
						$('#msg_text').val('');
						$('#chat_msgs_id').empty();
						$('#chat_msgs_id').append(data);
						scrollToBottom('div1');
                    }
                });
	}
	</script>
