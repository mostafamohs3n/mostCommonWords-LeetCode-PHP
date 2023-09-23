<?php
class Solution {

    /**
     * @param String $paragraph
     * @param String[] $banned
     * @return String
     */
    function mostCommonWord($paragraph, $banned) {
        $paragraph = preg_replace('/[^A-Za-z0-9]/', ' ', strtolower($paragraph));
        $paragraphSplit = preg_split('/\s+/', trim($paragraph));
        
        $concurrency = [];
        foreach($paragraphSplit as $word){
          if(in_array($word, $banned)){
            continue;
          }
          if(isset($concurrency[$word])){
            ++$concurrency[$word];
          }else{
            $concurrency[$word] = 1;
          }
        }
      
        arsort($concurrency);

        return array_keys(array_slice($concurrency, 0, 1))[0];
    }
}
