<?php

/**
 * Description of RNA
 *
 * @author michel
 */
class mRNA extends NucleicAcid
{
  public static $START_CODON = 'AUG';
  public static $END_CODONS = array('UAA','UAG','UGA');
  
  public static $CODON_TABLE = array(
    'UUU' => 'F', 'CUU' => 'L', 'AUU' => 'I', 'GUU' => 'V',
    'UUC' => 'F', 'CUC' => 'L', 'AUC' => 'I', 'GUC' => 'V',
    'UUA' => 'L', 'CUA' => 'L', 'AUA' => 'I', 'GUA' => 'V',
    'UUG' => 'L', 'CUG' => 'L', 'AUG' => 'M', 'GUG' => 'V',
    'UCU' => 'S', 'CCU' => 'P', 'ACU' => 'T', 'GCU' => 'A',
    'UCC' => 'S', 'CCC' => 'P', 'ACC' => 'T', 'GCC' => 'A',
    'UCA' => 'S', 'CCA' => 'P', 'ACA' => 'T', 'GCA' => 'A',
    'UCG' => 'S', 'CCG' => 'P', 'ACG' => 'T', 'GCG' => 'A',
    'UAU' => 'Y', 'CAU' => 'H', 'AAU' => 'N', 'GAU' => 'D',
    'UAC' => 'Y', 'CAC' => 'H', 'AAC' => 'N', 'GAC' => 'D', 
    'CAA' => 'Q', 'AAA' => 'K', 'GAA' => 'E', 'CAG' => 'Q', 
    'AAG' => 'K', 'GAG' => 'E',
    'UGU' => 'C', 'CGU' => 'R', 'AGU' => 'S', 'GGU' => 'G',
    'UGC' => 'C', 'CGC' => 'R', 'AGC' => 'S', 'GGC' => 'G', 
    'CGA' => 'R', 'AGA' => 'R', 'GGA' => 'G',
    'UGG' => 'W', 'CGG' => 'R', 'AGG' => 'R', 'GGG' => 'G'
  );
  
  public function getCodedProtein()
  {
    $strandStr = (string) $this;
    
    $startPos = strpos($strandStr, self::$START_CODON);
    if($startPos === false)
    {
      return null;
    }
    
    $codons = str_split(substr($strandStr, $startPos), 3);
    
    $proteinStrand = '';
    foreach($codons as $codon)
    {
      if(in_array($codon, self::$END_CODONS)) {
        break;
      }
      
      $proteinStrand .= self::$CODON_TABLE[$codon];
    }
    
    return $proteinStrand;
  }
  
  public function getComplement()
  {
    return new self(array_map(function($base) {
      return strtr($base, 'AUCG', 'UAGC');
    }, $this->nucleotideBases));
  }
}
