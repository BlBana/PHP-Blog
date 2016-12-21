		<!-- SIDEBAR -->
<div id="aside">

			<!-- SIDEBAR MENU -->
			<h3 class="nomb">名人推荐</h3>
			
			<ul class="sponsors">
			<{foreach item=item from=$hot_user}>
				<li>
					<a href="http://localhost/blog/?action=blogList&user_id=<{$item.user_id}>"><{$item.nick_name}></a><br />
					<{$item.tips}>
				</li>
			<{/foreach}>
			</ul>			
		
</div> <!-- /aside -->