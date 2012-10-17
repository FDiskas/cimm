<html>
<head>
    <title>{$m.demo.title}</title>
</head>
<body>
{anchor('music','Shania Twain')}

{form_open()}
{*{css('file.css')}, {js('file.js')}, {lang('demo_welcome',$m.demo.body)}*}

   Demo: {$m.demo.body}
   {$this->lang->line('about.gender')}
	<a href="{$this->lang->switch_uri('fr')}">FR</a>
	<br/>
   <p>Check out this amazing item <em>{'http://google.com'|helper:'url':'anchor':'Website':'class="more params"'}</em>.</p>
</body>
</html>