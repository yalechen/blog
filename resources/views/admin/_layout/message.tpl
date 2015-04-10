<!-- Call merged included template "layout/message.tpl" -->
{if Session::has('message_success') or $message_success}
	{assign "global_message" Session::get('message_success')|default:$message_success}
	<div class="alert alert-success fade in">
{/if}

{if Session::has('message_info') or $message_info}
	{assign "global_message" Session::get('message_info')|default:$message_info}
	<div class="alert alert-info fade in">
{/if}

{if Session::has('message_warning') or $message_warning}
	{assign "global_message" Session::get('message_warning')|default:$message_warning}
	<div class="alert alert-warning fade in">
{/if}

{if Session::has('message_error') or isset($message_error)}
	{assign "global_message" Session::get('message_error')|default:$message_error}
	<div class="alert alert-danger fade in">
{/if}

{if $global_message}
	<i class="icon-remove close" data-dismiss="alert"></i>
	{if is_array($global_message)}
		{foreach $global_message as $message}
			{if $message@last}{$message}{else}{$message}<br>{/if}
		{/foreach}
	{else}
		{$global_message}
	{/if}
	</div>
{/if}
<!-- End of included template "layout/message.tpl" -->