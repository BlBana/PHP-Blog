<{include file='header.tpl'}>
<link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/botton.css" />
	<div id="section" class="box">

		<ul class="articles box">
			<{if !empty($data.bloglist)}>
				<{foreach from=$data.bloglist item=item key=key}>
					<li>
						<h2><a href="http://localhost/blog/?action=bloginfo&id=<{$item.id}>"><{$item.title}></a></h2>

						<div class="article-info box">

							<p class="f-right"><a href="#" class="comment">评论 (<{$item.comment_total}>)</a></p>

							<p class="f-left"><{$item.create_time}> | 分类  <{$item.blog_type_name}></p>

						</div> <!-- /article-info -->	

						<p>
							<{$item.blog}>
						</p>
						<p class="more"><a href="/blog/?action=deleteBlog&id=<{$item.id}>&page=<{$pageInfo.page}>"  onclick= "if(confirm( '是否确定！ ')==false)return   false; ">删除&raquo;</a></p>
					</li>
				<{/foreach}>
			<{else}>
			<h1>
				暂无博文
			</h1>
			<{/if}>	
				
			</ul>
			<{if $pageInfo.page_max > 1}>
			<div class="pagination box">
				<p class="f-right">
					<{if $pageInfo.page > 1}>
						<a href="http://localhost/blog/?action=bloglist&page=<{$pageInfo.page-1}>&user_id=<{$params.safe.user_id}>">上一页 &raquo;</a>
					<{/if}>
					<{foreach from=$pageInfo.page_arr item=item}>
						<a href="http://localhost/blog/?action=bloglist&page=<{$item}>&user_id=<{$params.safe.user_id}>" <{if $item==$pageInfo.page}>class="current"<{/if}>><{$item}></a>
					<{/foreach}>
					<{if $pageInfo.page < $pageInfo.page_max}>
					<a href="http://localhost/blog/?action=bloglist&page=<{$pageInfo.page+1}>&user_id=<{$params.safe.user_id}>">下一页 &raquo;</a>
					<{/if}>
				</p>
				<p class="f-left"> <{$pageInfo.page}> / <{$pageInfo.page_max}> 页</p>
			</div> 
			<{/if}>
	</div> 

</div> <!-- /main -->	
<{include file='footer.tpl'}>
