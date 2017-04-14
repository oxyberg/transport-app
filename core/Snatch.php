<?php

/*
	Snatch PHP router 1.0
	Matvey Pravosudov
	github.com/oxyberg/snatch
*/

class Snatch {

	const version = '1.0';
	protected
		$routes = array(),
		$shared = array(),
		$wildcards = array(
			'(:any)' => '([a-zA-Z0-9\.\-_%]+)',
			'(:num)' => '([0-9]+)',
			'(:all)' => '(.*)'
		),
		$error;

	// register new routes
	public function __call($verb, $args) {
		if (in_array($verb, ['get', 'post', 'put', 'delete'])) {
			$this->match($verb, $args[0], $args[1]);
		}
	}

	// register 404 page
	public function missing($callback) {
		$this->error = ($callback);
	}

	// set route
	public function match($methods, $pattern, $callback) {
		foreach (explode('|', $methods) as $method) {
			$pattern = str_replace(array_keys($this->wildcards), array_values($this->wildcards), $pattern);
			$this->routes[$method]['#^' . '/' . trim($pattern, '/') . '$#'] = $callback;
		}
	}

	// add new wildcard
	public function wildcard($name, $pattern = false) {
		if ($pattern) $this->wildcards['(:' . $name . ')'] = $pattern;
		else if (is_array($name) && ! $pattern) {
			foreach ($name as $key => $value) {
				$this->wildcards['(:' . $key . ')'] = $value;
			}
		}
	}

	// run router
	public function run() {
		// get request method
		$method = strtolower($_SERVER['REQUEST_METHOD']);

		// handle all routes
		$handled = 0;
		if ($this->routes[$method]) $handled = $this->handle($this->routes[$method]);

		// 404
		if ($handled === 0) {
			if (is_callable($this->error)) call_user_func($this->error);
			else header('HTTP/1.1 404 Not Found');
		}
	}

	// handle request
	private function handle($routes) {

		$handled = 0;
		$base = $this->current();

		foreach ($routes as $pattern => $callback) {

			if (preg_match_all($pattern, $base, $matches)) {
				$params = array_map (function ($match) {
					$var = explode('/', trim($match, '/'));
					return isset($var[0]) ? $var[0] : null;
				}, array_slice($matches[0], 1));
				call_user_func_array($callback, $params);
				$handled++;
			}

		}

		return $handled;

	}

	// return current url
	public function current() {
		$uri = $_SERVER['REQUEST_URI'];
		// remove rewrite basepath (= allows one to run the router in a subfolder)
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($uri, strlen($basepath));
		// don't take query params into account on the URL
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		// remove trailing slash + enforce a slash at the start
		$uri = '/' . trim($uri, '/');
		return $uri;
	}

}
