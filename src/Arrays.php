<?php

namespace Axonbits;

class Arrays{

	protected static $returnFormat = "toArray";

	public static function toJson(){
		static::$returnFormat = "toJson";
		return new static;
	}

	public static function toArray(){
		static::$returnFormat = "toJson";
		return new static;
	}

	public static function undot(array $array)
	{
		return call_user_func([(new \Axonbits\Arrays\Undotter($array)), static::$returnFormat]);
	}
}