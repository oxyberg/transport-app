<?php

class Graph
{

    public function dijkstra($g, $a, $b, $n)
    {
        $s = ord($a) - 97; // starting vertex
        define('INFINITY', 1000000000);
        // some Dijkstra magic
        $d = [];
        for ($i = 0; $i < $n; $i++) $d[$i] = INFINITY;
        $d[$s] = 0;
        $p = [];
        $u = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++)
        {
            $v = -1;
            for ($j = 0; $j < $n; $j++) if (! $u[$j] && ($v == -1 || $d[$j] < $d[$v])) $v = $j;
            if ($d[$v] == INFINITY) break;
            $u[$v] = true;
            for ($j = 0; $j < count($g[$v]); $j++)
            {
                $to = $g[$v][$j][0];
                $len = $g[$v][$j][1];
                if ($d[$v] + $len < $d[$to])
                {
                    $d[$to] = $d[$v] + $len;
                    $p[$to] = $v;
                }
            }
        }

        // trace path
        $path = [];
        for ($v = ord($b) - 97; $v != $s; $v = $p[$v]) $path[] = $v;
        $path[] = $s;
        $path = array_reverse($path);
        return $path;
    }

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
