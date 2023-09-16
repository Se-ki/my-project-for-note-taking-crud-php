<?php
use Core\Container;

test('it can resolve something out of the container', function () {
    //arange
    $container = new Container();
    $container->bind('foo', fn() => 'bar');
    //act
    $result = $container->resolve('bar');
    //assert/expect
    expect($result)->toEqual('bar');
});