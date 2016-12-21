<{include file='header.tpl'}>
<link rel="stylesheet" media="screen,projection" type="text/css" href="templates/css/botton.css" />
	<div id="section" class="box">
		<button class="button black" onclick="javascript:window.location.href='./?action=postblog'"> 写博文 </button>

		<div style="border-bottom: 1px dotted #CCC;margin: 10px 0 0 0"></div>
		<ul class="articles box">
			<{if !empty($data.myblog_list)}>
				<{foreach from=$data.myblog_list item=item key=key}>
					<li>
						<h2><a href="./?action=bloginfo&id=<{$item.id}>"><{$item.title}></a></h2>

						<div class="article-info box">

							<p class="f-right"><a href="#" class="comment">评论 (<{$item.comment_total}>)</a></p>

							<p class="f-left"><{$item.create_time}> | 分类  <{$item.blog_type_name}></p>

						</div> <!-- /article-info -->	

						<p>
							<{$item.blog}>
						</p>
						<p class="more"><a href="./?action=deleteBlog&id=<{$item.id}>&page=<{$pageInfo.page}>"  onclick= "if(confirm( '是否确定！ ')==false)return   false; ">删除&raquo;</a></p>
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
						<a href="./?action=myblog&page=<{$pageInfo.page-1}>">上一页 &raquo;</a>
					<{/if}>
					<{foreach from=$pageInfo.page_arr item=item}>
						<a href="./?action=myblog&page=<{$item}>" <{if $item==$pageInfo.page}>class="current"<{/if}>><{$item}></a>
					<{/foreach}>
					<{if $pageInfo.page < $pageInfo.page_max}>
					<a href="./?action=myblog&page=<{$pageInfo.page+1}>">下一页 &raquo;</a>
					<{/if}>
				</p>
				<p class="f-left"> <{$pageInfo.page}> / <{$pageInfo.page_max}> 页</p>
			</div> 
			<{/if}>
	</div> 

</div> <!-- /main -->	
<{include file='footer.tpl'}>
