

<style>
   .direct-chat .box-body {
   border-bottom-right-radius: 0;
   border-bottom-left-radius: 0;
   position: relative;
   overflow-x: hidden;
   padding: 0;
   }
   .direct-chat.chat-pane-open .direct-chat-contacts {
   -webkit-transform: translate(0, 0);
   -ms-transform: translate(0, 0);
   -o-transform: translate(0, 0);
   transform: translate(0, 0);
   }
   .direct-chat-messages {
   -webkit-transform: translate(0, 0);
   -ms-transform: translate(0, 0);
   -o-transform: translate(0, 0);
   transform: translate(0, 0);
   padding: 10px;
   height: 350px;
   overflow: auto;
   }
   .direct-chat-msg,
   .direct-chat-text {
   display: block;
   }
   .direct-chat-msg {
   margin-bottom: 10px;
   }
   .direct-chat-msg:before,
   .direct-chat-msg:after {
   content: " ";
   display: table;
   }
   .direct-chat-msg:after {
   clear: both;
   }
   .direct-chat-messages,
   .direct-chat-contacts {
   -webkit-transition: -webkit-transform 0.5s ease-in-out;
   -moz-transition: -moz-transform 0.5s ease-in-out;
   -o-transition: -o-transform 0.5s ease-in-out;
   transition: transform 0.5s ease-in-out;
   }
   .direct-chat-text {
   border-radius: 5px;
   position: relative;
   padding: 5px 10px;
   background: #d2d6de;
   border: 1px solid #d2d6de;
   margin: 5px 0 0 50px;
   color: #444444;
   }
   .direct-chat-text:after,
   .direct-chat-text:before {
   position: absolute;
   right: 100%;
   top: 15px;
   border: solid transparent;
   border-right-color: #d2d6de;
   content: ' ';
   height: 0;
   width: 0;
   pointer-events: none;
   }
   .direct-chat-text:after {
   border-width: 5px;
   margin-top: -5px;
   }
   .direct-chat-text:before {
   border-width: 6px;
   margin-top: -6px;
   }
   .right .direct-chat-text {
   margin-right: 50px;
   margin-left: 0;
   }
   .right .direct-chat-text:after,
   .right .direct-chat-text:before {
   right: auto;
   left: 100%;
   border-right-color: transparent;
   border-left-color: #d2d6de;
   }
   .direct-chat-img {
   border-radius: 50%;
   float: left;
   width: 40px;
   height: 40px;
   }
   .right .direct-chat-img {
   float: right;
   }
   .direct-chat-info {
   display: block;
   margin-bottom: 2px;
   font-size: 12px;
   }
   .direct-chat-name {
   font-weight: 600;
   }
   .direct-chat-timestamp {
   color: #999;
   }
   .direct-chat-contacts-open .direct-chat-contacts {
   -webkit-transform: translate(0, 0);
   -ms-transform: translate(0, 0);
   -o-transform: translate(0, 0);
   transform: translate(0, 0);
   }
   .direct-chat-contacts {
   -webkit-transform: translate(101%, 0);
   -ms-transform: translate(101%, 0);
   -o-transform: translate(101%, 0);
   transform: translate(101%, 0);
   position: absolute;
   top: 0;
   bottom: 0;
   height: 250px;
   width: 100%;
   background: #222d32;
   color: #fff;
   overflow: auto;
   }
</style>
<div class="content-wrapper">
   <section class="content-header mb-4">
      <h1>
         Suggestion
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Suggestion</li>
      </ol>
   </section>
   <section class="content">
      <div class="bg-white">
         <div class="row">
            <!-- left column -->
            <div class="col-md-6 bg-white col-md-offset-3">
               <!-- general form elements -->
               <div class=" ">
                  <div style="padding:20px;">
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Chat List</legend>
                        <div class=" row ">
                           <div class="box box-warning direct-chat direct-chat-primary card">
                              <div class="box-header with-border bg-primary text-white">
                                 <h3 class="box-title">Chat</h3>
                              </div>
                               <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="div1">
				  <?php if(isset($c_u_d) && count($c_u_d)>0){ ?>
				  <?php foreach ($c_u_d as $list){ ?>
                  
						<?php if($list['type']=='Reply'){ ?>
						
							<div class="direct-chat-msg right">
									  <div class="direct-chat-info clearfix">
										<span class="direct-chat-name pull-right"><?php echo $list['c_name']; ?></span>
										<span class="direct-chat-timestamp pull-left"><?php echo $list['created_at']; ?></span>
									  </div>
						  
										<?php if($list['p_pic']!=''){ ?>
											   <img class="direct-chat-img" src="<?php echo base_url('assets/profile_pic/'.$list['p_pic']); ?>" alt="<?php echo $list['p_pic']; ?>">
										<?php }else{ ?>
										<img class="direct-chat-img" src="<?php echo base_url('assets/profile_pic/default.jpg'); ?>" alt="Image">
										<?php }?>										
										<div class="direct-chat-text">
										<?php echo $list['m_text']; ?>
									  </div>
										</div>
							
						<?php }else{ ?>
						
								 <div class="direct-chat-msg">
								  <div class="direct-chat-info clearfix">
									<span class="direct-chat-name pull-left"><?php echo $list['ad_name']; ?> </span>
									<span class="direct-chat-timestamp pull-right"><?php echo $list['created_at']; ?></span>
								  </div>
								<?php if($list['profile_pic']!=''){ ?>
									   <img class="direct-chat-img" src="<?php echo base_url('assets/profile_pic/'.$list['profile_pic']); ?>" alt="<?php echo $list['profile_pic']; ?>">
								<?php }else{ ?>
								<img class="direct-chat-img" src="<?php echo base_url('assets/profile_pic/default.jpg'); ?>" alt="Image">
								<?php }?>
								  
								  <div class="direct-chat-text">
									<?php echo $list['m_text']; ?>
								  </div>
								</div>
								
						<?php } ?>
					
					
				  <?php } ?>
				  <?php } ?>
					
					
					
					
                    
                    <!-- /.direct-chat-msg -->

                  </div>
                  <!--/.direct-chat-messages-->

                 
                </div>
                                 <!--/.direct-chat-messages-->
                             
                              <!-- /.box-body -->
                                <form action="<?php echo base_url('video/chatpost'); ?>" method="post">
									<input type="hidden" name="v_id" value="<?php echo isset($v_d['v_id'])?$v_d['v_id']:''; ?>">
                                 <div class="box-footer">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <input type="text" id="message" name="message" placeholder="Message ..." class="form-control" required="">
                                       </div>
                                       <div class="col-md-4">
                                          <select class="form-control" name="u_id">
                                             <option value=""> Select</option>
											 <?php if(isset($u_list) && count($u_list)>0){ ?>
												<?php foreach($u_list as $li){ ?>
												<option value="<?php echo $li['c_id']; ?>"><?php echo $li['name']; ?></option>
												<?php } ?>
											 <?php } ?>
                                          </select>
                                       </div>
                                       <div class="col-md-2"> <button type="submit" class="btn btn-primary  waves-effect waves-light">Send</button>
                                       </div>
                                    </div>
                                 </div>
                          
                           </form>
						
						    </div>
                           <!-- /.box-footer-->
                        </div>
                  </div>
                  </fieldset>
               </div>
               <!-- /.box -->
            </div>
         </div>
      </div>
      <!--/.col (right) -->
</div>
<!-- /.row -->
</section>
</div>
<script type="text/javascript">
        var div = document.getElementById('div1');
        div.scrollTop = div.scrollHeight - div.clientHeight;
  
</script>

