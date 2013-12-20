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

function validate_collection_or_throw($collection, $rules, $exceptionClass = 'Exception') {
    $errors = f\validate_collection($collection, $rules);

    if (count($errors)) {
        throw new $exceptionClass(json_encode($errors, true));
    }
}
