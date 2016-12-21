<{include file='header.tpl'}>

	<!-- COLUMNS -->
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">

			<!-- LIST OF ARTICLES -->
			<ul class="articles box">
				<{foreach item=item from=$data.list key=key}>
				<li>
					<h2><a href="./?action=bloginfo&id=<{$item.id}>"><{$item.title}></a></h2>

					<div class="article-info box">

						<p class="f-right"><a href="#" class="comment">评论 (<{$item.comment_total}>)</a></p>

						<p class="f-left"><{$item.create_time}> | 作者 <a href="./?action=blogList&user_id=<{$item.user_info.user_id}>"><{$item.user_info.nick_name}></a> </p>

					</div> <!-- /article-info -->	

					<p><{$item.blog}>
					</p>
					<p class="more"><a href="./?action=bloginfo&id=<{$item.id}>">查看全文&raquo;</a></p>
				</li>
				<{/foreach}>
			</ul>

			<{if $pageInfo.page_max > 1}>
			<div class="pagination box">
				<p class="f-right">
					<{if $pageInfo.page > 1}>
						<a href="./?page=<{$pageInfo.page-1}>">上一页 &raquo;</a>
					<{/if}>
					<{foreach from=$pageInfo.page_arr item=item}>
						<a href="./?page=<{$item}>" <{if $item==$pageInfo.page}>class="current"<{/if}>><{$item}></a>
					<{/foreach}>
					<{if $pageInfo.page < $pageInfo.page_max}>
					<a href="./?page=<{$pageInfo.page+1}>">下一页 &raquo;</a>
					<{/if}>
				</p>
				<p class="f-left"> <{$pageInfo.page}> / <{$pageInfo.page_max}> 页</p>
			</div> 
			<{/if}>
		</div> 
		<!-- 名人推荐 -->
		<{include file='right.tpl'}>

	</div> <!-- /section -->
<{include file='footer.tpl'}>