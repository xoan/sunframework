<?php
function __autoload($class)
{
	$dirs = array(
		LIB_PATH.'/flourish/classes',
		LIB_PATH.'/moor',
		APP_PATH.'/classes',
		APP_PATH.'/controllers',
		APP_PATH.'/models'
	);
	foreach ($dirs as $dir) {
		if (file_exists($file = $dir.'/'.$class.'.php')) {
			return require $file;
		}
	}
	throw new Exception('The class '.$class.' could not be loaded');
}

function render($data = null, $callback = null, $format = 'html')
{
	static $called = false;
	if ($called) {
		return;
	} else {
		$called = true;
	}
	extract($data);
	if (is_null($callback)) {
		$callback = Moor::getActiveCallback();
	}
	$format = fRequest::getValid('format', array($format, 'rss', 'json'));
	$tmpl = new fTemplating(APP_PATH.'/views');
	$tmpl->set(array(
		'header' => 'header.'.$format.'.php',
		'footer' => 'footer.'.$format.'.php'
	));
	$view = APP_PATH.'/views'.Moor::pathTo($callback).'.'.$format.'.php';
	if (file_exists($view)) {
		return include $view;
	} else {
		throw new MoorNotFoundException();
	}
}

function not_found()
{
	header('HTTP/1.1 404 Not Found');
	fHTML::sendHeader();
	exit('<h1>404 Not Found</h1>'."\n".
	'<p>The page that you have requested could not be found.</p>'."\n");
}

function link_to()
{
	$args = func_get_args();
	return call_user_func_array(
		'Moor::linkTo', $args
	);
}
