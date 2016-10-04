# Simple link sm_shortener

## TODO

* Create tables for links
* Create tables for users
* Create tables for categories
* RUN Migrations
* Build crud and run application - CMD

## TODO 2

* add shortable component and update template for link add
    * Create Shortable Component
    * Create Shortable Behavior - we want to automatically setup shorten string for all created links

## TODO 2.1

SO... what if you cant load component with behavior?

* Create your own Class. :) all classes you will need to add to src/ folder

## todo 2.2

Redirecting to site. - add go function to Links controller

## What I did

* Remove sortened field form template
* Update CreateLinks migration to allow null shortened field
* Removed following from LinksTable.php

```
$validator
    ->requirePresence('shortened', 'create')
    ->notEmpty('shortened');
```

* Created shorten url - New route.

## TODO 3

* Add counter to links - we want to know how many times was link redirected.
    * Update table with count field
    * add function for count update

## TODO 3.1 - Tomorow

* add atuhentication
