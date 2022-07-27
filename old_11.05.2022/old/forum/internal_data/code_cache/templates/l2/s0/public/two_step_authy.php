<?php
// FROM HASH: 2e1e76668536c7cbc9bd1e6a1348edd0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['context'] == 'setup') {
		$__finalCompiled .= '
	' . $__templater->formInfoRow('
		' . 'Если Вы не использовали Authy раньше, то сначала Вам нужно <a href="https://www.authy.com/install" target="_blank">установить его</a>. Вам будет отправлено SMS-сообщение с инструкциями.<br />
<br />
Затем в приложении Authy для Вас будет сгенерирован код, который нужно будет ввести ниже, чтобы подтвердить свою учётную запись.' . '
	', array(
		)) . '

	' . $__templater->formTextBoxRow(array(
			'name' => 'code',
			'type' => 'number',
			'autofocus' => 'autofocus',
		), array(
			'label' => 'Код подтверждения',
		)) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formInfoRow('
		' . 'Мы отправили push-уведомление в Ваше приложение Authy. Как только Вы его утвердите, Вы автоматически войдёте в систему.<br />
<br />Если Вы не получили или не можете получить уведомление, то можете <a href="' . $__templater->func('link', array('logout', null, array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '">выйти</a> или попробовать другой метод.' . '

		' . $__templater->formHiddenVal('uuid', $__vars['uuid'], array(
		)) . '
	', array(
			'rowclass' => 'js-authyLoginApprovalRow',
		)) . '

	';
		$__templater->inlineJs('
		jQuery.extend(XF.phrases, {
			authy_no_uuid: "' . $__templater->filter('Нет UUID запроса на утверждение. Пожалуйста, попробуйте позже.', array(array('escape', array('js', )),), false) . '",
			authy_no_approval_request: "' . $__templater->filter('Запрос на одобрение с этим UUID не найден. Пожалуйста, попробуйте позже.', array(array('escape', array('js', )),), false) . '",
			authy_denied: "' . $__templater->filter('Запрос на утверждение отклонён, поэтому мы не можем войти в систему в данный момент.', array(array('escape', array('js', )),), false) . '",
			authy_success: "' . $__templater->filter('Запрос на утверждение выполнен успешно. Вы успешно вошли в систему.', array(array('escape', array('js', )),), false) . '"
		});
	');
		$__finalCompiled .= '

	';
		$__templater->inlineJs('
			$(function()
			{
				var $form = $(\'.js-authyLoginApprovalRow\').closest(\'form\'),
					formData = XF.getDefaultFormData($form);

				$form.find(\'.formSubmitRow\').hide();

				var interval = setInterval(function()
				{
					XF.ajax(\'post\', $form.attr(\'action\'), formData, function(data)
					{
						if (data.errors)
						{
							var error = data.errors[0];

							switch (error)
							{
								case \'authy_no_uuid\':
								case \'authy_no_approval_request\':
								{
									clearInterval(interval);

									// these are fatal errors
									XF.alert(XF.phrase(error, null, \'An unexpected error occurred.\'));
									break;
								}
								case \'authy_denied\':
								{
									clearInterval(interval);

									// quite an explicit user choice so display message and redirect to index
									XF.flashMessage(XF.phrase(error), 3000, function()
									{
										XF.redirect(XF.canonicalizeUrl(\'\'));
									});
								}
							}
						}
						else if (data.redirect)
						{
							clearInterval(interval);

							XF.flashMessage(XF.phrase(\'authy_success\'), 3000, function()
							{
								XF.redirect(data.redirect);
							});
						}
					}, { skipDefault: true });
				}, 1000);
			});
	');
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);