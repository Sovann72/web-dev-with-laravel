<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Nav extends Component
{
	/**
	 * Create a new component instance.
	 */
	public $title;
	public $path;
	public function __construct($title = "E-library")
	{
		$this->title = $title;
		$url = "http://twitter.com/pwsdedtch";
		$path = parse_url($url, PHP_URL_PATH); // gives "/pwsdedtech"
		$this->path = $pathWithoutSlash = substr($path, 1); // gives "pwsdedtech"

	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.nav');
	}
}
