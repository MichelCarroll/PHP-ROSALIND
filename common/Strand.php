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
  
  
  public function __construct($strand, $isDna = true)
  {
    if(!is_array($strand))
    {
      $strand = str_split($strand);
    }
    if(empty($strand))
    {
      throw new Exception('Strand cannot be empty');
    }
    
    $this->isDna = $isDna;
    $this->set($strand);
  }
  
  public function set(array $strand)
  {
    $this->nucleotideBases = $strand;
  }
  
  public function getReverseComplement()
  {
    return new Strand(array_reverse($this->getComplement()));
  }
  
  public function getComplement()
  {
    if($this->isDna)
    {
      return array_map(function($base) {
        return strtr($base, 'ATCG', 'TAGC');
      }, $this->nucleotideBases);
    }
    
    return array_map(function($base) {
      return strtr($base, 'AUCG', 'UAGC');
    }, $this->nucleotideBases);
  }
  
  public function __toString() {
    return implode('', $this->nucleotideBases);
  }
  
  public function getLenght()
  {
    return count($this->nucleotideBases);
  }
  
  public function getGCContent()
  {
    $characterCount = count_chars((string) $this);
    $gc = 0;
    $gc += isset($characterCount[ord('G')])?$characterCount[ord('G')]:0;
    $gc += isset($characterCount[ord('C')])?$characterCount[ord('C')]:0;
    return (double)($gc / $this->getLenght());
  }
}
