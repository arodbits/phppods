<?php 
namespace Axonbits\Arrays;
use \ArrayAccess;

class Undotter implements  ArrayAccess{

	protected $arr; 
	protected $result; 

	public function __construct($arr){
		$this->arr = $arr;
		$c = [];
		foreach($this->arr as $key=> $value ){
			$this->rec($key, $value, $c);
		}
		$this->result = $c;
		return $this;
	}

	public function toJson(){
		return json_encode($this->result);
	}

	public function toArray(){
		return $this->result;
	}

	private function rec ($key, $value, &$c){
		$levels = explode('.', $key);
		if(count($levels)>1){
			$_c = [];
			$key = array_shift($levels);
			if(isset($c[$key]) && is_array($c[$key])){
				$_c = $c[$key];
			}
			$value = $this->rec(implode('.',$levels), $value, $_c);
		}
		$c[$key] = $value;
		return $c;
	}

	 public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->result[] = $value;
        } else {
            $this->result[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->result[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->result[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->result[$offset]) ? $this->result[$offset] : null;
    }
}