<?php

/*
 * This file is part of felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace felpado;

use felpado as f;

/**
 * assoc($collection, $key, $value)
 *
 * Returns an array based on collection with value added and keyed.
 *
 * conjoin(array('a' => 1, 'b' => 2), 'c', 3);
 * => array(array('a' => 1, 'b' => 2, 'c' => 3))
 */
function assoc($collection, $key, $value) {
    $result = f\to_array($collection);
    $result[$key] = $value;

    return $result;
}
