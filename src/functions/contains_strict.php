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
 * f\contains_strict($collection, $searched)
 *
 * Same than `containts` but use the strict comparison operator `===`.
 *
 * // strict comparison operator ===
 * f\contains(array(1, 2, 3), '1')
 * => false
 */
function contains_strict($collection, $searched) {
    foreach ($collection as $value) {
        if ($value === $searched) {
            return true;
        }
    }

    return false;
}