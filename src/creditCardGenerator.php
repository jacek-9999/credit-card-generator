<?php
namespace jacek9999;

class creditCardGenerator
{
    protected $bin;
    protected $message;

    public function setBin($bin) 
    {
        $this->bin = $bin;
    }

    public function getCC() 
    {
        if (($this->bin <= 0) || !isset($this->bin)) {
            $message[0] = 'Set bin first';
            return $message;
        } else if ($this->bin > 9999999999999999) {
            $message[0] = 'Bin to long';
            return $message;
        } else {
            $output = $this->ccNumber($this->bin, 16, 10);
            return $output;
        }
    }

    protected function completedNumber($prefix, $length)
    {
        $ccnumber = $this->bin;
    
        while ( strlen($ccnumber) < ($length - 1) ) {
            $ccnumber .= rand(0,9);
        }
    
        # Calculate sum
        $sum = 0;
        $pos = 0;
        $reversedCCnumber = strrev( $ccnumber );
    
        while ( $pos < $length - 1 ) {
            $odd = $reversedCCnumber[ $pos ] * 2;
            if( $odd > 9 ) {
                $odd -= 9;
            }
            $sum += $odd;
    
            if( $pos != ($length - 2) ) {
    
                $sum += $reversedCCnumber[ $pos +1 ];
            }
            $pos += 2;
        }
    
        # Calculate check digit
        $checkdigit = (( floor($sum/10) + 1) * 10 - $sum) % 10;
        $ccnumber .= $checkdigit;
        return $ccnumber;
    }
    
    
    protected function ccNumber($prefixList, $length, $howMany) 
    {
        for ($i = 0; $i < $howMany; $i++) {
            $result[] = $this->completedNumber($this->bin, $length);
        }
        return $result;
    }

}
