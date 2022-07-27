<?php
// FROM HASH: 56684b883b0123b8a4632cd76098ecd5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Тест исходящей почты');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Используйте этот инструмент для диагностики проблем отправки электронной почты.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['result']) {
		$__finalCompiled .= '
	';
		if ($__vars['result']['code'] > 0) {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--success">
			' . 'Письмо успешно отправлено. Ошибок нет.' . '
			';
			if ($__vars['transportClass'] == 'Swift_SendmailTransport') {
				$__finalCompiled .= '
				' . 'Обратите внимание, что отслеживание ошибок может быть ограничено при использовании sendmail. Если Вы не получили письмо, пожалуйста, проверьте журнал электронной почты сервера для получения более подробной информации.' . '
			';
			}
			$__finalCompiled .= '
		</div>
	';
		} else {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--error">
			' . 'При попытке отправить письмо были обнаружены ошибки.' . '
		</div>
	';
		}
		$__finalCompiled .= '
	';
		if ($__vars['result']['log']) {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">
				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						' . 'Развернуть подробности журнала' . '
					</span>
				</h3>
				<div class="block-body block-body--contained block-body--collapsible" tabindex="-1">
					<div class="block-row">
						<pre>' . $__templater->escape($__vars['result']['log']) . '</pre>
					</div>
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['transportExtra']) {
		$__compilerTemp1 .= ' (' . $__templater->escape($__vars['transportExtra']) . ')';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'email',
		'value' => $__vars['email'],
		'type' => 'email',
		'dir' => 'ltr',
	), array(
		'label' => 'Электронная почта',
	)) . '

			' . $__templater->formRow('
				<code>\\' . $__templater->escape($__vars['transportClass']) . $__compilerTemp1 . '</code>
			', array(
		'label' => 'Класс транспорта электронной почты',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Запустить тест',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/test-email', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);