{extends file='admin/_layout/main.tpl'}

{block title}首页{/block}

{block breadcrumb}
	<li><i class="icon-home"></i><a href="{route('AdminIndex')}"> 控制台</a></li>
	{*<li class="current"><a href="pages_calendar.html" title="">日历</a></li>*}
{/block}

{block main}
This is Index
{/block}