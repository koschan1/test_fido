<?php
// FROM HASH: bb31859158a75646a0ccc0581ec19ec1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'a[data-nav-id="siropuChat"]
{
	.badge--highlighted
	{
		background: @xf-siropuChatNoUserCountBadgeColor;
		color: @xf-siropuChatNoUserCountColor;
	}
	.badge--active
	{
		background: @xf-siropuChatActiveUserCountBadgeColor;
		color: @xf-siropuChatActiveUserCountColor;
	}
}
a.p-navgroup-link--chat.badgeContainer.badgeContainer--highlighted:after
{
	background: @xf-siropuChatActiveUserCountBadgeColor;
	color: @xf-siropuChatActiveUserCountColor;
}
button[id="xfCustom_chat-1"]
{
	display: none;
}';
	return $__finalCompiled;
}
);