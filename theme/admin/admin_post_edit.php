<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章编辑——青春在线网站每周话题栏目</title>
<link  type="text/css" rel="stylesheet" href="<?php echo site_url()?>theme/admin/images/style.css">
<script type="text/javascript" src="<?php echo site_url()?>public/ueditor/editor_config.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>public/ueditor/editor_all.js"></script>
<link rel="stylesheet" href="<?php echo site_url()?>public/ueditor/themes/default/ueditor.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>theme/admin/lightbox/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript" src="<?php echo site_url()?>theme/admin/lightbox/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>theme/admin/lightbox/js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript">
$(function() {
	// Use this example, or...
	$('a[@rel*=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel
	// This, or...
	//$('#gallery a').lightBox(); // Select all links in object with gallery ID
	// This, or...
	//$('a.lightbox').lightBox(); // Select all links with lightbox class
	// This, or...
	//$('a').lightBox(); // Select all links in the page
	// ... The possibility are many. Use your creative or choose one in the examples above
});
</script>
</head>
<body>

<div class="main">
    <div class="head">
    	<div class="head_con">
        	<div class="logo"><a href="<?php echo site_url('admin/home')?>"></a></div>
               	<div class="my_link"><a href="<?php echo site_url();?>" target="_blank">首页<a href="<?php echo site_url('admin/logout')?>">退出&nbsp;|&nbsp;</a><a href="<?php echo site_url('admin/user/member')."?name=".$this->session->userdata['name'];?>"><?php echo $this->session->userdata['editname']?> &nbsp;</a></div>
        </div>
    </div>
    <div class="content">
    	<div class="content_con"  style="height:650px;_height:500px;">
    	<div style="height:auto;float:left;_height:100%;">
    		<div class="right_con" >
    			<div class="right">
    				<div class="right_title">
    				<a href=""></a></div>
    				<div class="right_content" >
    					
						<div class="post_form" style="height:auto;">
				           	<ul class="post">
			
				           		
			           		<?php if (isset($error)) { ?>
							<li><span class="post_t" style="color:red;width:200px;font-size:14px;"><?php  echo $error;?></span></li>
							<?php }?>
							<?php echo  form_open_multipart("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>
							<?php echo form_input('id',$id,"style=\"display:none;\""); ?>
							<li><span class="post_t">文章标题：</span><span class="post_c"><?php echo form_input('title',$title,"style=\"width:400px;\""); ?><font size="-1" color="red">(*)</font><?php echo form_error('title');?></span></li>
							
							<li><span class="post_t">所属话题：
							
							</span><span class="post_c">	<select name="tid">
							<?php 
								foreach ($topics as $row)
									{
										echo "<p>";
										echo "<option value=\"".($row['id'])."\"";
										if ($row['id']==$tid){
										echo "selected=\"selected\"";
										};
										echo ">".($row['title'])."</option>";
										echo "</p>";
									}
							?>
							</select><?php echo form_error('tid');?><font size="-1" color="red">(*)</font>
							</span></li>
							
							<li><span class="post_t">标题图片：</span><span class="post_c"><?php echo form_upload('topicbanner',$topicbanner,"style=\"width:150px;\""); ?><?php if (!empty($topicbanner)){echo form_hidden('oldtopicbanner',$topicbanner)?><a href="<?php echo $topicbanner;?>" target="_blank" style="color:red;font-size:12px;" rel="lightbox">（【预览】留空则保留原图220*150）</a><?php }?><font size="-1" color="red">(*)</font><?php echo @$uploaderrors;?></span></li>
							<li><span class="post_t">文章内容：</span><span class="post_c"><?php echo form_textarea('description',$description," id=\"myEditor\" ");?>
							<script type="text/javascript">
								var option = {
									    textarea: 'description' ,//设置提交时编辑器内容的名字
									    minFrameHeight: 400,               //最小高度
					    			toolbars: [
									// 这里定义的toolbars并不是对应多多行，而是在renderToolbarBoxHtml中去放到相应的位置去
									['FontFamily','FontSize','Bold','Italic','Underline','ForeColor','BackColor','|','JustifyLeft','JustifyCenter','JustifyRight','InsertOrderedList','InsertUnorderedList','Emoticon','Image','PlaceName','Link','Unlink','RemoveFormat','|','Undo','Redo',
									 '|','InsertImage','Emotion','InsertVideo','GMap','HighlightCode','|','Source','FullScreen']
									],
								};
								var editor = new baidu.editor.ui.Editor(option);
							    editor.render("myEditor");
							</script>
							</span></li>
							<p><?php echo form_error('description');?></p>
							<li><span class="post_t"></span><span class="post_c" style="margin-top:5px;"><input type="checkbox" name="status"  <?php  if ($status=='1') {?> checked="checked"<?php } ?>/>是否审核&nbsp;<?php if ($status=='2'){echo form_submit('submit','恢复并更新',"id=\"subBtn\" ");}else{ echo form_submit('submit','更新文章',"id=\"subBtn\" ");}?></span></li>
							<?php echo form_close(); ?>
						</ul>
		           	</div>

    			</div>
	    		</div>
	    	</div>
    		<div class="left">
    			<ul>
    				<span class="li_titile" >话题管理</span>
    				<li><a href="<?php echo site_url('admin/topic/add');  ?>" >添加话题</a></li>
    				<li><a href="<?php echo site_url('admin/topic/check'); ?>">话题审核</a></li>
    				<li><a href="<?php echo site_url('admin/topic/pass'); ?>" >话题管理</a></li>
    				<li><a href="<?php echo site_url('admin/topic/recycle'); ?>" >话题回收站</a></li>
    				<li style="height:0px;"></li>
    				<span class="li_titile" >文章管理</span>
    				<li><a href="<?php echo site_url('admin/post/add');  ?>" >添加文章</a></li>
    				<li><a href="<?php echo site_url('admin/post/check'); ?>" <?php if ($status=='0'){?>  class='nav_hover'  <?php }?> >文章审核</a></li>
    				<li><a href="<?php echo site_url('admin/post/pass'); ?>"  <?php if ($status=='1'){?>  class='nav_hover'  <?php }?> >文章管理</a></li>
    				<li><a href="<?php echo site_url('admin/post/recycle'); ?>" <?php if ($status=='2'){?>  class='nav_hover'  <?php }?> >文章回收站</a></li>
    				<li style="height:0px;"></li>
    				<span class="li_titile" >用户管理</span>
    				<li><a href="<?php echo site_url('admin/user/add');?>" >添加用户</a></li>
    				<li><a href="<?php echo site_url('admin/user/member'); ?>" >会员管理</a></li>
    				<li><a href="<?php echo site_url('admin/user/check'); ?>">会员认证</a></li>
    				<li style="height:0px;"></li>
    				<span class="li_titile" >广告管理</span>
    				<li><a href="<?php echo site_url('admin/ad/add');?>"  >添加广告</a></li>
    				<li><a href="<?php echo site_url('admin/ad/pass');?>"  >广告管理</a></li>
    			</ul>
    		</div>
        </div>
        </div>
    </div>
    <div class="foot"><?php echo @$this->config->item('copyright');?></div>
</div>
</body>
</html>
