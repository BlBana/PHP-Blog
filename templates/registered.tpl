<{include file='header.tpl'}>
<script type="text/javascript" src="templates/javascript/blog.js"></script>
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">
			<div style="margin:10px 0px 50px 120px">
				<h2>注 册</h2>
				<form action="http://localhost/Worker/Blog/?action=SubmitRegistered" method="post" class="form" onsubmit="return checkRegistered();">
					<ul>
						<li>
							<label >用户名<font color="red"> *字母数字下划线</font></label>
							<input type="text" size="45" class="input-text" name="user_name" id="name"/>
							<font color="red" <{if $error_name != 1}>style="display:none"<{/if}> id="name_error"> *请正确输入用户名</font>
						</li>
						
						<li>
							<label >密码 </label>
							<input type="password" size="45" class="input-text"  name="password"  id='password'/>
							<font color="red" style="display:none" id="password_error"> *请输入密码</font>
                            <font color="red" <{if $error_password != 1}>style="display:none"<{/if}> id="password1_error"> <{$error_password_msg}></font>
						</li>
						<li>
							<label>再次输入密码 </label>
							<input type="password" size="45" class="input-text"  name="apassword" id="apassword"/>
							<font color="red" style="display:none" id="apassword_error"> *两次密码不一致</font>
						</li>

						<li>
							<label >昵称<font color="red"> *0~20个字符</font></label>
							<input type="text" size="45" class="input-text"  name="nick_name" id="nick_name"/>
							<font color="red" style="display:none" id="nick_name_error"> *昵称不能为空</font>
                            <font color="red" <{if $error_nick_name != 1}>style="display:none"<{/if}> id="nick_name_error"> *昵称输入不能为空</font>
						</li>
						<li>
							<label >个人签名<font color="red"> *最多30个汉字</font></label>
							<textarea cols="47" rows="2" class="input-text"  name="tips" id='tips'></textarea>
							<font color="red" style="display:none" id="tips_error"> *个人签名不能为空</font>
                            <font color="red" <{if $error_tips != 1}>style="display:none"<{/if}> id="tips_error"> *个性签名不能为空</font>
						</li>
						
						<li><input type="submit" value=" 提交 " class="input-submit" /></li>
                        <font color="red" <{if $error_register != 1}>style="display:none"<{/if}> id="tips_error"> *注册成功</font>
                        <font color="red" <{if $error_checkUserExisted != 1}>style="display:none"<{/if}> id="tips_error"> *用户已存在</font>
					</ul>
				</form>
			</div>
		</div> <!-- /content -->

		<!-- SIDEBAR -->
	<{include file='right.tpl'}>

	</div> <!-- /section -->

</div> <!-- /main -->	
	
<{include file='footer.tpl'}>

