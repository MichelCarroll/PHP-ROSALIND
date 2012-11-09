<?php

/**
 * Description of FASTA
 *
 * @author mcarroll
 */
class FASTA 
{
  
  /**
   * @param string $data 
   */
  public function __construct($data)
  {
    $this->data = $data;
  }
  
  public function getStrandMap()
  {
    $lines = explode(PHP_EOL, $this->data);
    $label = '';
    $currentStrand = '';
    $strandMap = array();
    
    foreach($lines as $line)
    {
      if($line[0] === '>')
      {
        if(strlen($currentStrand) && strlen($label))
        {
          $strandMap[$label] = new Strand($currentStrand);
          $currentStrand = '';
        }
        $label = substr($line, 1);
      }
      else
      {
        $currentStrand .= $line;
      }
    }
    
    if(strlen($currentStrand) && strlen($label))
    {
      $strandMap[$label] = new Strand($currentStrand);
      $currentStrand = '';
    }
    
    return $strandMap;
  }
  
}
