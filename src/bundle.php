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
require_once __DIR__.'/functions/collection/reduce_while.php';
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
require_once __DIR__.'/functions/collection/pluck.php';
require_once __DIR__.'/functions/collection/prepend.php';
require_once __DIR__.'/functions/collection/range.php';
require_once __DIR__.'/functions/collection/reject.php';
require_once __DIR__.'/functions/collection/reverse.php';
require_once __DIR__.'/functions/collection/slice.php';
require_once __DIR__.'/functions/collection/sort.php';
require_once __DIR__.'/functions/collection/sort_by.php';
require_once __DIR__.'/functions/collection/tail.php';
require_once __DIR__.'/functions/collection/unique.php';
require_once __DIR__.'/functions/collection/update.php';
require_once __DIR__.'/functions/collection/zip.php';
require_once __DIR__.'/functions/logic/all_pass.php';
require_once __DIR__.'/functions/logic/both.php';
require_once __DIR__.'/functions/logic/default_to.php';
require_once __DIR__.'/functions/logic/either.php';
require_once __DIR__.'/functions/logic/if_else.php';
require_once __DIR__.'/functions/logic/is_empty.php';
require_once __DIR__.'/functions/logic/not.php';
require_once __DIR__.'/functions/math/add.php';
require_once __DIR__.'/functions/math/dec.php';
require_once __DIR__.'/functions/math/divide.php';
require_once __DIR__.'/functions/math/inc.php';
require_once __DIR__.'/functions/math/mean.php';
require_once __DIR__.'/functions/math/median.php';
require_once __DIR__.'/functions/math/modulo.php';
require_once __DIR__.'/functions/math/multiply.php';
require_once __DIR__.'/functions/math/subtract.php';
require_once __DIR__.'/functions/object/values.php';
require_once __DIR__.'/functions/object/prop.php';
require_once __DIR__.'/functions/object/assoc.php';
require_once __DIR__.'/functions/object/assoc_path.php';
require_once __DIR__.'/functions/object/has.php';
require_once __DIR__.'/functions/object/keys.php';
require_once __DIR__.'/functions/object/merge.php';
require_once __DIR__.'/functions/object/omit.php';
require_once __DIR__.'/functions/object/path.php';
require_once __DIR__.'/functions/object/pick.php';
require_once __DIR__.'/functions/object/props.php';
require_once __DIR__.'/functions/object/where.php';
require_once __DIR__.'/functions/object/to_pairs.php';

require_once __DIR__.'/functions/type/is_stringable.php';
require_once __DIR__.'/functions/relation/equals.php';
require_once __DIR__.'/functions/relation/max.php';

/* load_macro('collection', 'lensIndex'); */
/* load_macro('object', 'lens'); */
/* load_macro('object', 'lensPath'); */
/* load_macro('object', 'lensProp'); */
/* load_macro('object', 'over'); */
/* load_macro('object', 'set'); */
/* load_macro('object', 'view'); */
/* load_macro('relation', 'clamp'); */
/* load_macro('relation', 'difference'); */
/* load_macro('relation', 'gt'); */
/* load_macro('relation', 'gte'); */
/* load_macro('relation', 'intersection'); */
/* load_macro('relation', 'lt'); */
/* load_macro('relation', 'lte'); */
/* load_macro('relation', 'min'); */
/* load_macro('relation', 'pathEq'); */
/* load_macro('relation', 'propEq'); */
/* load_macro('string', 'match'); */
/* load_macro('string', 'regexp'); */
/* load_macro('string', 'replace'); */
/* load_macro('string', 'split'); */ /* load_macro('string', 'test'); */
/* load_macro('type', 'is'); */
/* load_macro('type', 'typeCond'); */
