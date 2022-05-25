<?
    function mapped_implode($glue, $array, $symbol = '=') {
        return implode($glue, array_map(
                function($k, $v) use($symbol) {
                    return $k . $symbol . $v;
                },
                array_keys($array),
                array_values($array)
                )
            );
    }