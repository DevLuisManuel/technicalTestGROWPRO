<?php

final class GROWPROArrayManipulation
{
    /*
     * Implementar una función PHP que ordene un array de arrays.
     * La función recibirá dos parámetros, el primero con el array a ordenar,
     * y el segundo parámetro será otro array con el criterio de ordenación,
     * donde la key de cada elemento de este segundo array indicará sobre que propiedad hay que ordenar,
     * y el valor de cada elemento indicará la dirección de ordenamiento (ascendente(ASC) o descendente (DESC)).
     * Por ejemplo, para el siguiente array y criterio de ordenación.
        $array = [
            ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
            ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
        ];
        $sortCriterion = ['age' => 'DESC', 'scoring' => 'DESC'];
        $result = fn($array, $sortCriterion);
        $result = [
            ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
            ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
            ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
            ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
        ];
     * Si alguno de los elementos del array a ordenar no contiene la key por la que se pide ordenar,
     * el valor para esa key se considerará null y el elemento se devolverá al principio de la lista si el orden es ASC o al final si el orden es DESC.
     * La función que desarrolles permitirá que el segundo parámetro puede ser null, pero en ese caso devolverá el resultado sin ningún tipo de reordenación.
     * El caso mostrado es solo un ejemplo, se ha de tener en cuenta que podría aceptar cualquier otro array con keys diferentes y número variable de key/values.
     * Otro ejemplo válido sería este:
        $array = [
         ['name' => 'cat', 'age' => 5, 'weight' => 3, 'height' => 24],
         ['name' => 'elephant', 'age' => 10, 'weight' => 10, 'height' => 3100],
        ];
     */
    public function fnA(
        array    $array = [
            ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
            ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
        ], array $sort = ['age' => 'DESC', 'scoring' => 'DESC']): array
    {
        if ($sort === null) {
            return $array;
        }
        usort($array, function ($a, $b) use ($sort) {
            foreach ($sort as $key => $order) {
                $valueA = $a[$key] ?? null;
                $valueB = $b[$key] ?? null;

                if ($valueA === $valueB) {
                    continue;
                }

                if ($order === 'ASC') {
                    return ($valueA <=> $valueB);
                } else if ($order === 'DESC') {
                    return ($valueB <=> $valueA);
                }
            }
            return 0;
        });
        return $array;
    }
}

$class = new GROWPROArrayManipulation();
var_dump($class->fnA());
