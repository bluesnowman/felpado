<?php

/*
 * This file is part of Felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace f;

function reduce($callback, $collection, $initialValue = null) {
    $result = null;
    foreach ($collection as $key => $value) {
        if ($result === null) {
            if ($initialValue === null) {
                $result = $value;
                continue;
            } else {
                $result = $initialValue;
            }
        }

        $result = call_user_func($callback, $result, $value);
    }

    return $result;
}