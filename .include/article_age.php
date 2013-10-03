<?php
if (!isset($__INCLUDE_ARTICLE_AGE_PHP))
  {
    function xdate_diff($date1, $date2) { 
      $current = $date1; 
      $datetime2 = date_create($date2); 
      $count = 0; 
      while(date_create($current) < $datetime2){ 
        $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current))); 
        $count++; 
      } 
      return $count; 
    } 

    class ArticleAge
    {
      public $value;
      public $unit;
      function __construct($days)
      {
	if ($this->value = $days)
	  $this->unit = "day";
	else
	  $this->unit = "days";

	if ($this->value > 1)
	  $this->unit .= "s";
      }
      function __toString()
      {
	return "$this->value $this->unit ago";
      }
    }

    /** PHP 5.3 version:
     * oops my server is 5.2, should have checked before writing this.
     class ArticleAge
     {
     public $value;
     public $unit;
     function __construct($age)
     {
     if (($this->value = $age->y) != 0)
     {
     $this->unit = "year";
     }
     elseif (($this->value = $age->days) != 0)
     {
     $this->unit = "day";
     }
     elseif (($this->value = $age->h) != 0)
     {
     $this->unit = "hour";
     }
    
     if ($this->value > 1) $this->unit .= "s";
     }
  
     function __toString()
     {
     return "$this->value $this->unit ago";
     }
     }
    */
  }
$__INCLUDE_ARTICLE_AGE_PHP = 1;
?>
