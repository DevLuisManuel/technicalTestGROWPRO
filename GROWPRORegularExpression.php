<?php
final class GROWPRORegularExpression
{
    /*
     * Devolver un array con los identificadores numéricos ordenados por orden, para el patrón @[Franklin](user-gpe-{{id}}), donde {{id}} será el identificador.
     * Por ejemplo, para el texto: $text = "Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)";
        $result = fnA($text);
        $result será [1071, 1061]
    * */
    public function fnA(string $text = "Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)"): array
    {
        preg_match_all('/@\[.+?]\(user-gpe-(\d+)\)/', $text, $matches);
        // var_dump(json_encode($matches));
        $ids = $matches[1];
        // var_dump(json_encode($ids));
        sort($ids, SORT_NUMERIC);
        return $ids;
    }

    /*
     * Devolver el texto reemplazando el patrón @[NameUser](user-gpe-identificador) por @NameUser.
     * Por ejemplo, para el texto: $text = “Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)”;
        $result = fnB($text);
        $result es “Hola @Franklin avisa a @Ludmina”
    * */
    public function fnB(string $text = "Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)"): string
    {
        return preg_replace('/@\[([^]]+)]\(user-gpe-\d+\)/', '@$1', $text);
    }
}

$class = new GROWPRORegularExpression();
var_dump($class->fnA());
var_dump($class->fnB());
