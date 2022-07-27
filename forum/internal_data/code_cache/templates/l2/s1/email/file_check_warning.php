<?php
// FROM HASH: 18d7a8170e4fa460403d6bc6f7f7ec9a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'Предупреждение о проверке файлов с сайта ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '' . '
</mail:subject>

<p>' . 'Автоматическая проверка целостности файла была запущена на ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' at ' . $__templater->func('date_time', array($__vars['fileCheck']['check_date'], ), true) . ', и были обнаружены некоторые проблемы, которые должны быть устранены как можно скорее.' . '</p>

';
	if ($__vars['fileCheck']['total_missing'] AND $__vars['fileCheck']['total_inconsistent']) {
		$__finalCompiled .= '
	<p>' . 'После проверки ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' файлов мы обнаружили ' . $__templater->filter($__vars['fileCheck']['total_missing'], array(array('number', array()),), true) . ' отсутствующих и ' . $__templater->filter($__vars['fileCheck']['total_inconsistent'], array(array('number', array()),), true) . ' файлов с неожиданным содержимым.' . '</p>
';
	} else if ($__vars['fileCheck']['total_missing']) {
		$__finalCompiled .= '
	<p>' . 'После проверки ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' файлов мы обнаружили отсутствующие файлы.' . '</p>
';
	} else if ($__vars['fileCheck']['total_inconsistent']) {
		$__finalCompiled .= '
	<p>' . 'После проверки ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' файлов мы обнаружили ' . $__templater->filter($__vars['fileCheck']['total_inconsistent'], array(array('number', array()),), true) . ' файлов с неожиданным содержимым. Если Вы редактировали эти файлы самостоятельно, то можете проигнорировать это предупреждение. В противном случае необходимо проверить эти файлы более детально, поскольку это может быть свидетельством повреждения файла или потенциально вредоносного изменения.' . '</p>
';
	}
	$__finalCompiled .= '

<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
	<tr>
		<td>
			<a href="' . $__templater->func('link_type', array('admin', 'canonical:tools/file-check/results', $__vars['fileCheck'], ), true) . '" class="button">' . 'Пожалуйста, проверьте файлы' . '</a>
		</td>
	</tr>
</table>';
	return $__finalCompiled;
}
);