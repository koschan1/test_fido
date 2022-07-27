<?php
// FROM HASH: 65ecddc3d154ebe67e17c4d04a2fba39
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['checkStrength']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'prod' => 'xf/password_box-compiled.js',
			'dev' => 'vendor/dropbox/zxcvbn.min.js, xf/password_box.js',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__vars['input'] = $__templater->preEscaped('
	<input type="password" name="' . $__templater->escape($__vars['name']) . '" value="' . $__templater->escape($__vars['value']) . '"
		class="input js-password ' . ($__vars['hideShow'] ? 'input--passwordHideShow' : '') . '" ' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . ' />
');
	$__finalCompiled .= '

<div data-xf-init="' . ($__vars['checkStrength'] ? 'password-strength' : null) . ' ' . ($__vars['hideShow'] ? 'password-hide-show' : '') . '"
	data-show-text="' . $__templater->filter('Показать', array(array('for_attr', array()),), true) . '" data-hide-text="' . $__templater->filter('Скрыть', array(array('for_attr', array()),), true) . '">
	';
	if ($__vars['hideShow']) {
		$__finalCompiled .= '
		<div class="inputGroup inputGroup--joined">
			' . $__templater->filter($__vars['input'], array(array('raw', array()),), true) . '
			' . $__templater->filter($__vars['afterInputHtml'], array(array('raw', array()),), true) . '
			<div class="inputGroup-text">
				' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'labelclass' => 'iconic--hideShow js-hideShowContainer',
			'label' => 'Показать',
			'_type' => 'option',
		))) . '
			</div>
		</div>
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->filter($__vars['input'], array(array('raw', array()),), true) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['checkStrength']) {
		$__finalCompiled .= '
		<meter min="0" max="100" class="meterBar js-strengthMeter" low="40" high="80" optimum="100"></meter>
		<span class="js-strengthText meterBarLabel">' . 'Требуется указать пароль.' . '</span>
		<script class="js-zxcvbnLanguage" type="application/json">
			{
				"Straight rows of keys are easy to guess": "' . $__templater->filter('Прямые последовательности символов легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Short keyboard patterns are easy to guess": "' . $__templater->filter('Короткие сочетания клавиш легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Repeats like \\"aaa\\" are easy to guess": "' . $__templater->filter('Повторяющиеся символы, такие как "aaa", легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Repeats like \\"abcabcabc\\" are only slightly harder to guess than \\"abc\\"": "' . $__templater->filter('Повторяющиеся символы, такие как "abcabcabc", лишь немного сложнее угадать, чем "abc".', array(array('escape', array('json', )),), true) . '",
				"Avoid repeated words and characters": "' . $__templater->filter('Избегайте повторяющихся слов и символов.', array(array('escape', array('json', )),), true) . '",
				"Sequences like abc or 6543 are easy to guess": "' . $__templater->filter('Такие последовательности, как "abc"или "6543" очень легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Recent years are easy to guess": "' . $__templater->filter('Последние годы легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Dates are often easy to guess": "' . $__templater->filter('Даты легко угадать.', array(array('escape', array('json', )),), true) . '",
				"This is a top-10 common password": "' . $__templater->filter('Этот пароль входит в список 10 наиболее распространённых паролей.', array(array('escape', array('json', )),), true) . '",
				"This is a top-100 common password": "' . $__templater->filter('Этот пароль входит в список 100 наиболее распространённых паролей.', array(array('escape', array('json', )),), true) . '",
				"This is a very common password": "' . $__templater->filter('Этот слишком простой и распространённый пароль.', array(array('escape', array('json', )),), true) . '",
				"This is similar to a commonly used password": "' . $__templater->filter('Этот пароль похож на часто используемые пароли.', array(array('escape', array('json', )),), true) . '",
				"A word by itself is easy to guess": "' . $__templater->filter('Это слово легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Names and surnames by themselves are easy to guess": "' . $__templater->filter('Имена и фамилии легко угадать.', array(array('escape', array('json', )),), true) . '",
				"Common names and surnames are easy to guess": "' . $__templater->filter('Распространённые имена и фамилии легко угадать.', array(array('escape', array('json', )),), true) . '",

				"The chosen password could be stronger": "' . $__templater->filter('Указанный пароль не достаточно сложный.', array(array('escape', array('json', )),), true) . '",
				"Entering a password is required": "' . $__templater->filter('Требуется указать пароль.', array(array('escape', array('json', )),), true) . '",
				"This is a very strong password": "' . $__templater->filter('Это очень надёжный пароль.', array(array('escape', array('json', )),), true) . '",
				"This is a reasonably strong password": "' . $__templater->filter('Это достаточно надёжный пароль.', array(array('escape', array('json', )),), true) . '"
			}
		</script>
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);