<?php

class ValidationHelper {
	
	//public static $errors = array();

	public static function fieldname_as_text($fieldname) {
	  $fieldname = str_replace("_", " ", $fieldname);
	  $fieldname = ucfirst($fieldname);
	  return $fieldname;
	}

	// * presence
	// use trim() so empty spaces don't count
	// use === to avoid false positives
	// empty() would consider "0" to be empty
	public static function has_presence($value) {
		return isset($value) && $value !== "";
	}

	public static function validate_presences($required_fields) {
	 
	  foreach($required_fields as $field) {
	    $value = trim($_POST[$field]);
	  	if (!static::has_presence($value)) {
	  		Session::$errors[$field] = static::fieldname_as_text($field) . " can't be blank";
	  	}
	  }
	}

	// * string length
	// max length
	public static function has_max_length($value, $max) {
		return strlen($value) <= $max;
	}

	public static function validate_max_lengths($fields_with_max_lengths) {
		global $errors;
		// Expects an assoc. array
		foreach($fields_with_max_lengths as $field => $max) {
			$value = trim($_POST[$field]);
		  if (!has_max_length($value, $max)) {
		    $errors[$field] = fieldname_as_text($field) . " is too long";
		  }
		}
	}

	// * inclusion in a set
	public static function has_inclusion_in($value, $set) {
		return in_array($value, $set);
	}
}
?>