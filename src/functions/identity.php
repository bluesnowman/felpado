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
 * f\identity($v)
 *
 * Returns the same value.
 *
 * f\identity('foo');
 * => 'foo'
 *
 * f\identity(2);
 * => 2
 */
function identity($value) {
    return $value;
}
