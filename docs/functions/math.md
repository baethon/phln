## add
`Number a => a -> a -> a`

Add two values



## dec
`Int a => a -> a`

Decrement its argument



## divide
`Number a => a -> a -> a`

Divide numbers. Equivalent of `a / b`



## inc
`Int a => a -> a`

Increment its argument



## mean
`Number a => [a] -> a`

Returns the mean of the given list of numbers.



```php
P::mean([2, 7, 9]) // 6
```

## median
`Number a => [a] -> a`

Returns the median of the given list of numbers.



```php
\\phln\\math\\median([7, 2, 9]) // 7
\\phln\\math\\median([7, 2, 10, 9]) // 8
```

## modulo
`Number a => a -> a -> a`

Divides the first parameter by the second and returns the remainder.



```php
\\phln\\math\\modulo(1, 2) // 1
```

## multiply
`Number a => a -> a -> a`

Multiplies two numbers



```php
$triple = P::multiply(3);
$triple(7); // 21
```

## product
`Number a => [a] -> a`

Multiplies together all the elements of a list.



```php
P::product([2, 4, 6, 8, 100, 1]); // 38400
```

## subtract
`Number a => a -> a -> a`

Subtracts its second argument from its first argument.



```php
$complementaryAngle = P::subtract(90);
$complementaryAngle(30); //=> 60
```

## sum
`[Number] -> Number`

Adds together all the elements of a list.



```php
P::sum([1, 2, 3, 4]); // 10
```

