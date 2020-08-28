<?php

require_once __DIR__.'/functions/assert/assert_object.php';

require_once __DIR__.'/functions/fn/iife.php';
require_once __DIR__.'/functions/fn/t.php';
require_once __DIR__.'/functions/fn/f.php';
require_once __DIR__.'/functions/fn/always.php';
require_once __DIR__.'/functions/fn/apply.php';
require_once __DIR__.'/functions/fn/compose.php';
require_once __DIR__.'/functions/fn/pipe.php';
require_once __DIR__.'/functions/fn/pipe_first.php';
require_once __DIR__.'/functions/fn/identity.php';
require_once __DIR__.'/functions/fn/swap.php';
require_once __DIR__.'/functions/fn/tap.php';
require_once __DIR__.'/functions/fn/throw_exception.php';
require_once __DIR__.'/functions/fn/trampoline.php';
require_once __DIR__.'/functions/fn/unapply.php';
require_once __DIR__.'/functions/fn/invoker.php';
require_once __DIR__.'/functions/fn/n_ary.php';
require_once __DIR__.'/functions/fn/negate.php';
require_once __DIR__.'/functions/fn/once.php';
require_once __DIR__.'/functions/fn/partial.php';
require_once __DIR__.'/functions/fn/partial_right.php';
require_once __DIR__.'/functions/fn/curry_n.php';
require_once __DIR__.'/functions/fn/curry.php';
require_once __DIR__.'/functions/fn/binary.php';
require_once __DIR__.'/functions/fn/unary.php';
require_once __DIR__.'/functions/collection/all.php';
require_once __DIR__.'/functions/collection/any.php';
require_once __DIR__.'/functions/collection/append.php';
require_once __DIR__.'/functions/collection/chunk.php';
require_once __DIR__.'/functions/collection/concat.php';
require_once __DIR__.'/functions/collection/contains.php';
require_once __DIR__.'/functions/collection/filter.php';
require_once __DIR__.'/functions/collection/find.php';
require_once __DIR__.'/functions/collection/from_pairs.php';
require_once __DIR__.'/functions/collection/reduce.php';
require_once __DIR__.'/functions/collection/group_by.php';
require_once __DIR__.'/functions/collection/head.php';
require_once __DIR__.'/functions/collection/init.php';
require_once __DIR__.'/functions/collection/join.php';
require_once __DIR__.'/functions/collection/last.php';
require_once __DIR__.'/functions/collection/collapse.php';
require_once __DIR__.'/functions/collection/flat_map.php';
require_once __DIR__.'/functions/collection/map.php';
require_once __DIR__.'/functions/collection/length.php';
require_once __DIR__.'/functions/collection/map_indexed.php';
require_once __DIR__.'/functions/collection/none.php';
require_once __DIR__.'/functions/collection/nth.php';
require_once __DIR__.'/functions/collection/partition.php';

require_once __DIR__.'/functions/type/is_stringable.php';
require_once __DIR__.'/functions/relation/equals.php';
require_once __DIR__.'/functions/object/values.php';

/* load_macro('collection', 'lensIndex'); */
/* load_macro('collection', 'pluck'); */
/* load_macro('collection', 'prepend'); */
/* load_macro('collection', 'range'); */
/* load_macro('collection', 'reject'); */
/* load_macro('collection', 'reverse'); */
/* load_macro('collection', 'slice'); */
/* load_macro('collection', 'sort'); */
/* load_macro('collection', 'sortBy'); */
/* load_macro('collection', 'tail'); */
/* load_macro('collection', 'unique'); */
/* load_macro('collection', 'update'); */
/* load_macro('logic', 'allPass'); */
/* load_macro('logic', 'both'); */
/* load_macro('logic', 'cond'); */
/* load_macro('logic', 'defaultTo'); */
/* load_macro('logic', 'either'); */
/* load_macro('logic', 'ifElse'); */
/* load_macro('logic', 'isEmpty'); */
/* load_macro('logic', 'not'); */
/* load_macro('math', 'add'); */
/* load_macro('math', 'dec'); */
/* load_macro('math', 'divide'); */
/* load_macro('math', 'inc'); */
/* load_macro('math', 'mean'); */
/* load_macro('math', 'median'); */
/* load_macro('math', 'modulo'); */
/* load_macro('math', 'multiply'); */
/* load_macro('math', 'product'); */
/* load_macro('math', 'subtract'); */
/* load_macro('math', 'sum'); */
/* load_macro('object', 'assoc'); */
/* load_macro('object', 'assocPath'); */
/* load_macro('object', 'eqProps'); */
/* load_macro('object', 'has'); */
/* load_macro('object', 'hasMethod'); */
/* load_macro('object', 'keys'); */
/* load_macro('object', 'lens'); */
/* load_macro('object', 'lensPath'); */
/* load_macro('object', 'lensProp'); */
/* load_macro('object', 'merge'); */
/* load_macro('object', 'objOf'); */
/* load_macro('object', 'omit'); */
/* load_macro('object', 'over'); */
/* load_macro('object', 'path'); */
/* load_macro('object', 'pathOr'); */
/* load_macro('object', 'pick'); */
/* load_macro('object', 'prop'); */
/* load_macro('object', 'props'); */
/* load_macro('object', 'set'); */
/* load_macro('object', 'toPairs'); */
/* load_macro('object', 'view'); */
/* load_macro('object', 'where'); */
/* load_macro('object', 'whereEq'); */
/* load_macro('relation', 'clamp'); */
/* load_macro('relation', 'difference'); */
/* load_macro('relation', 'gt'); */
/* load_macro('relation', 'gte'); */
/* load_macro('relation', 'intersection'); */
/* load_macro('relation', 'lt'); */
/* load_macro('relation', 'lte'); */
/* load_macro('relation', 'max'); */
/* load_macro('relation', 'min'); */
/* load_macro('relation', 'pathEq'); */
/* load_macro('relation', 'propEq'); */
/* load_macro('string', 'match'); */
/* load_macro('string', 'regexp'); */
/* load_macro('string', 'replace'); */
/* load_macro('string', 'split'); */
/* load_macro('string', 'test'); */
/* load_macro('type', 'is'); */
/* load_macro('type', 'typeCond'); */
