<?php

/**
 * Description of NucleicAcid
 *
 * @author mcarroll
 */
abstract class NucleicAcid 
{
  /**
   * @var array 
   */
  private $nucleotideBases;
  
  
  public function __construct($strand)
  {
    if(!is_array($strand))
    {
      $strand = str_split($strand);
    }
    if(empty($strand))
    {
      throw new Exception('NucleicAcid cannot be empty');
    }
    $this->set($strand);
  }
  
  public function set(array $strand)
  {
    $this->nucleotideBases = $strand;
  }
  
  public function getReverseComplement()
  {
    return new self(array_reverse($this->getComplement()->getStrand()));
  }
  
  public function getComplement()
  {
    return new self(array_map(function($base) {
      return strtr($base, 'ATCG', 'TAGC');
    }, $this->nucleotideBases));
  }
  
  public function __toString() {
    return implode('', $this->nucleotideBases);
  }
  
  public function getLenght()
  {
    return count($this->nucleotideBases);
  }
  
  public function getNucleotideBases()
  {
    return $this->nucleotideBases;
  }
  
  public function getHammingDistance(NucleicAcid $strand)
  {
    if($strand->getLenght() != $this->getLenght())
    {
      throw new Exception('NucleicAcids must have equal lenghts to find Hamming Distance');
    }
    
    $distance = 0;
    $otherBases = $strand->getNucleotideBases();
    for($x = 0; $x < count($this->nucleotideBases); $x++)
    {
      if($this->nucleotideBases[$x] !== $otherBases[$x])
      {
        $distance++;
      }
    }
    
    return $distance;
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
