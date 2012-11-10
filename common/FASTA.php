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
  
  public function getNucleicAcidMap()
  {
    $lines = explode(PHP_EOL, $this->data);
    $label = '';
    $currentNucleicAcid = '';
    $strandMap = array();
    
    foreach($lines as $line)
    {
      if(!strlen($line))
      {
        continue;
      }
      
      if($line[0] === '>')
      {
        if(strlen($currentNucleicAcid) && strlen($label))
        {
          $strandMap[$label] = new NucleicAcid($currentNucleicAcid);
          $currentNucleicAcid = '';
        }
        $label = substr($line, 1);
      }
      else
      {
        $currentNucleicAcid .= $line;
      }
    }
    
    if(strlen($currentNucleicAcid) && strlen($label))
    {
      $strandMap[$label] = new NucleicAcid($currentNucleicAcid);
      $currentNucleicAcid = '';
    }
    
    return $strandMap;
  }
  
}
