<?php

/**
 * Description of Strand
 *
 * @author mcarroll
 */
class Strand 
{
  /**
   * @var array 
   */
  private $nucleotideBases;
  
  /**
   * @var boolean
   */
  private $isDna;
  
  
  public function __construct(array $strand, $isDna = true)
  {
    $this->isDna = $isDna;
    $this->set($strand);
  }
  
  public function set(array $strand)
  {
    $this->nucleotideBases = $strand;
  }
  
  public function getReverseComplement()
  {
    return array_reverse($this->getComplement());
  }
  
  public function getComplement()
  {
    if($this->isDna)
    {
      return array_map(function($base) {
        
      }, $arr1);
      return strtr($this->nucleotideBases, 'AUCG', 'UAGC');
    }
    return strtr($this->nucleotideBases, 'ATCG', 'TAGC');
  }
}
