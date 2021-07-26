<?php

it('test BasicTest', function () {
  $this
        ->getJson('api/messages')
        ->assertSuccessful();
});
