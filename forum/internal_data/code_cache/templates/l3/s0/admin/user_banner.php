<?php
// FROM HASH: 495d6c83e49f0dc5e3c6f141760179c3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Обложка профиля');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['user']['Profile']['banner_date']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->func('profile_banner', array($__vars['user'], 'l', false, array(
			'class' => 'memberProfileBanner--small',
		), '')) . '
					<div>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => 'delete_banner',
			'label' => 'Удалить текущую обложку',
			'_type' => 'option',
		))) . '</div>
				', array(
			'label' => 'Текущая обложка профиля',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formUploadRow(array(
		'name' => 'upload',
		'accept' => '.gif,.jpeg,.jpg,.jpe,.png',
	), array(
		'label' => 'Загрузить новую обложку',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/banner', $__vars['user'], ), false),
		'upload' => 'true',
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);