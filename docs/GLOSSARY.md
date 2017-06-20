# Glossary

## main function
Wrapps in `curry()` appropriate *𝑓 function*. Should be treated as "default export"; is bundled with other main functions into `phln\Phln` class.

## 𝑓 function
It's the *real* definition of main function. It's not curried and holds proper type hinting.

## ƛ function
Variation of main function which uses reserved keyword. `ƛ` character is used to "escape" the name.

## bundle
`phln\Phln` class which holds static reference to all main functions and their string references.

## collection
Variable holding array of values. Also may refer to a string (array of chars). This doesn't apply to hash arrays.

## object
Refers to hash array.
