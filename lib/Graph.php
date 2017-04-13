<?php

class Graph
{

    public function convertVertices($array, $to)
    {
        $new = [];
        foreach ($array as $vertex => $pairs)
        {
            $count = 0;
            foreach ($pairs as $pair)
            {
                if ($to == 'num')
                {
                    $new[ord($vertex) - 97][$count][0] = ord($pair[0]) - 97;
                    $new[ord($vertex) - 97][$count][1] = $pair[1];
                }
                else if ($to == 'sym')
                {
                    $new[chr($vertex + 97)][$count][0] = chr($pair[0] + 97);
                    $new[chr($vertex + 97)][$count][1] = $pair[1];
                }
                $count++;
            }
        }
        return $new;
    }

}
