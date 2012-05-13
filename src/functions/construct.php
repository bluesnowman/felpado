<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * f\construct($first, $rest)
 *
 * Returns a new collection with first and rest.
 *
 * f\construct(1, array(2, 3, 4))
 * => array(1, 2, 3, 4)
 */
function construct($first, $rest) {
    $array = to_array($rest);
    array_unshift($array, $first);

    return $array;
}