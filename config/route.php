<?php
Moor::setNotFoundCallback('not_found');

Moor::route('/', 'Welcome::index');
